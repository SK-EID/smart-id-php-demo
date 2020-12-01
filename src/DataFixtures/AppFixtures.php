<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $author = new Author();
        $author
            ->setName('John Doe')
            ->setTitle('Developer')
            ->setUsername('auth0-username')
            ->setCompany('The Writing Company')
            ->setShortBio('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.')
            ->setPhone('070000000');

        $manager->persist($author);

        $blogPost = new BlogPost();
        $blogPost
            ->setTitle('John Doe Jr')
            ->setSlug('first-post')
            ->setDescription('My dad is an awesome developer. He teached me PHP :D')
            ->setBody('I luv PHP')
            ->setCreateAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setAuthor($author);
        $manager->persist($blogPost);

        $manager->flush();
    }
}
