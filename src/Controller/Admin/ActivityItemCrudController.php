<?php

namespace App\Controller\Admin;

use App\Entity\ActivityItem;
use App\Repository\ActivityLabelRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Generated\PrototypeActivityType;

class ActivityItemCrudController extends AbstractCrudController
{
    private ActivityLabelRepository $labelRepository;

    public function __construct(ActivityLabelRepository $labelRepository)
    {
        $this->labelRepository = $labelRepository;
    }

    public static function getEntityFqcn(): string
    {
        return ActivityItem::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['sort' => 'ASC'])
            ->setEntityLabelInSingular('Activity')
            ->setEntityLabelInPlural('Activities');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex()->onlyOnDetail(),
            TextField::new('title'),
            TextEditorField::new('description'),
            ChoiceField::new('type')->setChoices([
                'Article' => PrototypeActivityType::ARTICLE,
                'Podcast' => PrototypeActivityType::PODCAST,
                'Fact'    => PrototypeActivityType::FACT,
            ]),
            ChoiceField::new('labels')
                ->allowMultipleChoices()
                ->setChoices($this->getLabels())
                ->renderAsBadges(),
            UrlField::new('imageUrl')->onlyOnForms(),
            ImageField::new('imageUrl')->onlyOnIndex(),
            UrlField::new('link', 'Source link')->onlyOnForms(),
            IntegerField::new('sort'),
        ];
    }

    private function getLabels(): array
    {
        $labels = [];
        $labelEntities = $this->labelRepository->findAll();
        foreach ($labelEntities as $label) {
            $labels[$label->getName()] = $label->getCode();
        }

        return $labels;
    }
}
