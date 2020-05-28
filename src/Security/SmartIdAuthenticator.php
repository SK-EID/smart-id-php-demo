<?php


namespace App\Security;


use App\Controller\VerificationCodeController;
use App\Entity\Author;
use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;
use Sk\SmartId\Api\AuthenticationResponseValidator;
use Sk\SmartId\Api\Data\AuthenticationHash;
use Sk\SmartId\Api\Data\CertificateLevelCode;
use Sk\SmartId\Api\Data\NationalIdentity;
use Sk\SmartId\Client;
use Sk\SmartId\Exception\InvalidParametersException;
use Sk\SmartId\Exception\SessionTimeoutException;
use Sk\SmartId\Exception\SmartIdException;
use Sk\SmartId\Exception\TechnicalErrorException;
use Sk\SmartId\Exception\UserAccountNotFoundException;
use Sk\SmartId\Exception\UserRefusedException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;

class SmartIdAuthenticator extends AbstractGuardAuthenticator
{

    private $authorRepo;

    private $objectManager;
    /**
     * @var Client
     */
    private $smartIdClient;
    /**
     * @var VerificationCodeController
     */
    private $verificationCodeController;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(AuthorRepository $authorRepository,
                                EntityManagerInterface $objectManager,
                                LoggerInterface $logger)
    {
        $this->authorRepo = $authorRepository;
        $this->objectManager = $objectManager;
        $this->smartIdClient = new Client();
        $this->logger=$logger;
        $this->smartIdClient
            ->setRelyingPartyUUID( '00000000-0000-0000-0000-000000000000' )
            ->setRelyingPartyName( 'DEMO' )
            ->setHostUrl( 'https://sid.demo.sk.ee/smart-id-rp/v1/' ) //setting endpoint
            ->useOnlyDemoPublicKey(); //->useOnlyLivePublicKey(); use this in case smart id live environment
    }


    public function supports(Request $request)
    {
        if ($request->getPathInfo() != '/login' || !$request->isMethod('POST')) {
            return;
        }
        return true;
    }

    public function getCredentials(Request $request)
    {
        if ($request->getPathInfo() != '/login' || !$request->isMethod('POST')) {
            return;
        }

        $nationalIdentityNumber = $request->getSession()->get("national-identity-number");
        $authHash = $request->getSession()->get("auth-hash");
        $country = $request->getSession()->get("country");
        $this->logger->info($nationalIdentityNumber);

        return [
            "national-identity-number" => $nationalIdentityNumber,
            "auth-hash" => $authHash,
            "session" => $request->getSession(),
            "country" => $country
        ];
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $username = $credentials['national-identity-number'];
        $user = $this->authorRepo->findOneBy(["username" => $username]);
        if ($user == null) {
            $author = new Author();
            $author
                ->setName($username)
                ->setTitle('Smart ID User')
                ->setUsername($username)
                ->setCompany('Development')
                ->setShortBio('I write php')
                ->setPhone('070000000');
            $this->objectManager->persist($author);
            $this->objectManager->flush();
            return $author;
        }
        return $user;
    }

    public function checkCredentials($credentials, UserInterface $user)
    {

        $nationalIdentityNumber = $credentials["national-identity-number"];
        $authenticationHash = $credentials["auth-hash"];
        $session = $credentials["session"];
        $country = $credentials["country"];

        $identity = new NationalIdentity( $country, $nationalIdentityNumber);

        //sleep so in case when user logs in from smart device, he/she can see the verification code on the webpage before the smart id application comes up

        sleep(2);

        try
        {
            $authenticationResponse = $this->smartIdClient->authentication()
                ->createAuthentication()
                ->withNationalIdentity( $identity ) // or with document number: ->withDocumentNumber( 'PNOEE-10101010005-Z1B2-Q' )
                ->withAuthenticationHash( $authenticationHash )
                ->withCertificateLevel( CertificateLevelCode::QUALIFIED ) // Certificate level can either be "QUALIFIED" or "ADVANCED"
                ->authenticate();
        }
        catch (UserRefusedException $e) {
            $session->set("error", "You canceled the sign on operation");
            throw new AuthenticationException("Smart id login failed");
        }
        catch (UserAccountNotFoundException $e) {
            $session->set("error", "You tried to sign in with national identity \"".$nationalIdentityNumber."\" and country \"".$country."\", but no such user excists in smart-id");
            throw new AuthenticationException("Smart id login failed");
        }
        catch (SessionTimeoutException $e) {
            $session->set("error", "Sign on with smart-id timed out");
            throw new AuthenticationException("Smart id login failed");
        }
        catch (InvalidParametersException $e) {
            $session->set("error", "You entered invalid credentials");
        }
        catch (TechnicalErrorException $e) {
            $session->set("error", "There was a technical error while trying to sign on");
        }
        catch (SmartIdException $e) {
            $this->logger->error("smart id exception", $e->getTrace());
            $session->set("error", "Smart id login failed for unknown reason");
            throw new AuthenticationException("Smart id login failed");
        }

        $authenticationResponseValidator = new AuthenticationResponseValidator();
        $authenticationResponseValidator->addTrustedCACertificateLocation(realpath(__DIR__."/../trusted_certificates/TEST_of_EID-SK_2016.pem.crt"));
        $authenticationResponseValidator->addTrustedCACertificateLocation(realpath(__DIR__."/../trusted_certificates/TEST_of_NQ-SK_2016.pem.crt"));
        $authenticationResponseValidator->addTrustedCACertificateLocation(realpath(__DIR__."/../trusted_certificates/TEST_of_EE_Certification_Centre_Root_CA.pem.crt"));
        foreach ($authenticationResponseValidator->getTrustedCACertificates() as $ca) {
            $this->logger->info($ca);
        }
        $authenticationResult = $authenticationResponseValidator->validate( $authenticationResponse );
        $this->logger->info("Authentication result ".$authenticationResult->isValid());
        foreach ($authenticationResult->getErrors() as $e) {
            $this->logger->info($e);
        }
        // authentication validity result
        return $authenticationResult->isValid();
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $request->getSession()->set(Security::AUTHENTICATION_ERROR, $exception);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey)
    {
        return null;
    }

    public function supportsRememberMe()
    {
        return false;
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        return new RedirectResponse("/login");
    }
}