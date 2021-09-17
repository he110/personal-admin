<?php

namespace App\Controller\Admin;

use App\Entity\ActivityLabel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ActivityLabelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ActivityLabel::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('code'),
            TextField::new('name'),
        ];
    }
}
