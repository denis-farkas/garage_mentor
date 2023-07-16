<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setFirstName('denis');
        $user->setName('dede');
        $user->setEmail('admin@admin.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword('$2y$13$eXUGRc8e/yDAI5mhYhi0hOUMcLkmUBtpoP7mSatxH3vTkvG5d2luy');
        $manager->persist($user);
        $manager->flush();
    }
}
