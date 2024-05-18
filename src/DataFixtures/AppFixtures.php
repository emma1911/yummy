<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Comment;
use App\Entity\Fooditem;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Create an admin user
        $admin = new User();
        $admin->setEmail($faker->email())
            ->setPassword($this->passwordHasher->hashPassword($admin, "admin19112002"))
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        // Create fake users
        for ($i = 1; $i <= 5; $i++) {
            $user = new User();
            $user->setEmail($faker->email())
                ->setPassword($this->passwordHasher->hashPassword($user, "user" . $i))
                ->setRoles(['ROLE_USER']);
            $manager->persist($user);
        }

        // Create fake comments
        for ($i = 1; $i <= 5; $i++) {
            $comment = new Comment();
            $comments = ['woooow', 'amazing', 'hahahaha', 'niiiiice'];
            $comment->setMessage($comments[array_rand($comments)]);
            $comment->setUser($user);
            $manager->persist($comment);
        }

        // Create food items
        $imageNames = ['breakfast2.jpeg', 'breakfast.jpeg', 'dinner.png', 'dinner2.png', 'dinner3.png'];
        $types = ['start', 'breakfast', 'lunch', 'dinner'];
        $foodNames = ['Echbaa Barka', 'Sehr', 'Haja Lotf'];
        for ($i = 0; $i < 10; $i++) {
            $foodItem = new Fooditem();
            $foodItem->setPhoto($imageNames[array_rand($imageNames)])
                ->setPrice(mt_rand(10, 50))
                ->setDescription('Default description')
                ->setType($types[array_rand($types)])
                ->setGerant($admin) // Set the admin as the gerant
                ->setNameFood($foodNames[array_rand($foodNames)]);
            $manager->persist($foodItem);
        }

        $manager->flush();
    }
}
