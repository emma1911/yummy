<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Fooditem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
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
        // Create and persist an admin user
        $admin = new Admin();
        $admin->setFullName('Admin ADMINE');
        $admin->setEmail('admin@gmail.com');
        $admin->setPhone('23247623');

        // Set other properties as needed
        $manager->persist($admin);

        // Generate food items associated with the admin
        $this->generateFoodItems($manager, $admin);

        // Flush all changes to the database
        $manager->flush();
    }

    private function generateFoodItems(ObjectManager $manager, Admin $admin): void
    {
        $imageNames = ['menu-item-1.png', 'menu-item-2.png', 'menu-item-3.png', 'menu-item-4.png', 'menu-item-5.png'];
        $type = ['start', 'breakfast', 'lunch', 'dinner'];

        for ($i = 0; $i < 10; $i++) {
            $foodItem = new Fooditem();
            $foodItem->setPhoto($imageNames[array_rand($imageNames)]);
            $foodItem->setPrice(mt_rand(10, 50));
            $foodItem->setDescription('Default description');
            $foodItem->setType($type[array_rand($type)]);
            $foodItem->setGerant($admin); // Associate the admin with the food item
            $manager->persist($foodItem);
        }
    }
}
