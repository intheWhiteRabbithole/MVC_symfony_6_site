<?php

namespace App\DataFixtures;

use App\Entity\Article1;
use App\Entity\Category1;
use App\Entity\User1;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Contact;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create();
        $users = [];
        for ($i = 0; $i < 50; $i++) {
            $user = new User1();
            $user->setUsername($faker->name);
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setEmail($faker->email);
            $user->setPassword($faker->password());
            $user->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($user);
            $users[] = $user;
        }
        $categories = [];
        for ($i = 0; $i < 15; $i++) {
            $category = new Category1();
            $category->setTitle($faker->text(50));
            $category->setDescription($faker->text(250));
            $category ->setImage($faker->imageUrl());
            $manager->persist($category);
            $categories[] = $category;
        }
        $articles = [];
        for ($i = 0; $i < 100; $i++) {
            $article = new Article1();
            $article->setTitle($faker->text(50));
            $article->setContent($faker->text(6000));
            $article->setImage($faker->imageUrl());
            $article->setCreatedAt(new \DateTimeImmutable());
            $article->addCategory1($categories[$faker->numberBetween(0, 14)]);
            $article->setAuthor1($users[$faker->numberBetween(0,49)]);
            $manager->persist($article);
        }

        // Contact
    $contacts = [];
        for ($i = 0; $i < 5;$i++) {
            $contact = new Contact();
            $contact->setFullName($faker->name);
            $contact->setEmail($faker->email);
            $contact->setSubject('Demande' . ($i + 1));
            $contact->setMessage($faker->text);

        $manager->persist($contact);
        }
        $manager->flush();


    }
}
