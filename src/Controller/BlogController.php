<?php

namespace App\Controller;

use App\Entity\BlogPost;
use App\Repository\BlogPostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class BlogController extends AbstractController
{

    /**
     * @var BlogPostRepository
     */
    private $blogPostRepository;
    /**
     * @var EntityManagerInterface
     */
    private $objectManager;

    public function __construct(BlogPostRepository $blogPostRepository, EntityManagerInterface $objectManager)
    {
        $this->blogPostRepository = $blogPostRepository;
        $this->objectManager = $objectManager;
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function showPosts(Security $security)
    {
        $user = $security->getUser();
        $blogPosts = $this->blogPostRepository->findBy(["author" => $user->getId()]);
        $blogPostsAll = $this->blogPostRepository->findAll();
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'users_posts' => $blogPosts,
            'blog_posts_all' => $blogPostsAll,
            'user' => $user
        ]);
    }

    /**
     * @Route("/newPost", name="postblog", methods="POST")
     */
    public function addPost(Request $request, Security $security) {
        $user = $security->getUser();
        $dateTime = new \DateTime();
        $blogPost = new BlogPost();
        $blogPost->setTitle($request->get("title"));
        $blogPost->setDescription($request->get("description"));
        $blogPost->setBody($request->get("body"));
        $blogPost->setAuthor($user);
        $blogPost->setCreateAt($dateTime);
        $blogPost->setUpdatedAt($dateTime);
        $blogPost->setSlug("slug");
        $this->objectManager->persist($blogPost);
        $this->objectManager->flush();
        return $this->showPosts($security);
    }
}
