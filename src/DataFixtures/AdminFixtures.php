<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{
    private const DEFAULT_PASSWORD = 'ChangeMe';

    private UserPasswordHasherInterface $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('admin@domain.com')
            ->setRoles(['ROLE_ADMIN', 'ROLE_USER']);

        $user->setPassword($this->passwordEncoder->hashPassword($user, self::DEFAULT_PASSWORD));
        $manager->persist($user);
        $manager->flush();
    }
}
