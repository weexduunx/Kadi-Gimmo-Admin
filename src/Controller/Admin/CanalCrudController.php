<?php

namespace App\Controller\Admin;

use App\Entity\Canal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CanalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Canal::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('label'),
            AssociationField::new('reclamation'),
        ];
    }

}
