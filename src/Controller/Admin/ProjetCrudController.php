<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projet::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('ref_projet'),
            TextField::new('label'),
            AssociationField::new('bien'),
            AssociationField::new('sites'),
            DateField::new('created_at'),
            DateField::new('updated_at'),
            DateField::new('deleted_at'),
        ];
    }

}
