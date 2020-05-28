<?php

namespace App\Controller;

use http\Env\Response;
use Sk\SmartId\Api\Data\AuthenticationHash;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class LoginController extends AbstractController
{


    /**
     * @Route("/login", name="login")
     */
    public function login(Security $security, Request $request)
    {
        if ($security->isGranted('ROLE_ADMIN')) {
            return new RedirectResponse("/blog", 302);
        }

        $error = $request->getSession()->get("error");
        if (!$error) {
            $error=false;
        }

        return $this->render("login/index.html.twig", [
            'controller_name' => 'LoginController',
            'verification_code' => false,
            'personal_id' => false,
            'login_error' => $error,
            'country' => "NO"
        ]);
    }

    //The authentication hash gets generated and binded to the session, as well as user data

    /**
     * @Route("/startLogin", name="start_login")
     */
    public function startLogin(Request $request) {

        $authenticationHash = AuthenticationHash::generate();

        $verificationCode = $authenticationHash->calculateVerificationCode();

        $nationalIdentityNumber = $request->get("personal-id");
        $country = $request->get("country");

        $request->getSession()->set("national-identity-number", $nationalIdentityNumber);
        $request->getSession()->set("country", $country);
        $request->getSession()->set("auth-hash", $authenticationHash);

        return $this->render("login/index.html.twig", [
            'controller_name' => 'LoginController',
            'verification_code' => $verificationCode,
            'personal_id' => $nationalIdentityNumber,
            'login_error' => false,
            'country' => $country
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(Security $security)
    {
        throw new \Exception('This should never be reached!');
    }
}
