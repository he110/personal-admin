<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserCrudController extends AbstractCrudController
{
    private UserPasswordHasherInterface $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('email'),
            TextField::new('plainPassword', 'New password')->onlyOnForms(),
        ];
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof User) {
            $entityInstance = $this->updatePassword($entityInstance);
        }
        parent::updateEntity($entityManager, $entityInstance);
    }

    /**
     * @param EntityManagerInterface $entityManager
     * @param User                   $entityInstance
     */
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof User) {
            $entityInstance = $this->updatePassword($entityInstance);
        }
        parent::persistEntity($entityManager, $entityInstance);
    }

    private function updatePassword(User $user): User
    {
        if ($user->getPlainPassword()) {
            $hashedPassword = $this->passwordEncoder->hashPassword($user, $user->getPlainPassword());
            $user->setPassword($hashedPassword);
            $user->eraseCredentials();
        }
        return $user;
    }
}
