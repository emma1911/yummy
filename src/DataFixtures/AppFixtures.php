<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this -> passwordHasher =$passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<=5;$i++){
            $user = new User();

            $user ->setEmail("user".$i."@iset.com")
                  ->setPassword($this ->passwordHasher->hashPassword($user,"user".$i))
                  ->setRoles(['ROLE_USER']);
            $manager -> persist(($user));
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}

