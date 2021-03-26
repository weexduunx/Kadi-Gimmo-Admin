<?php

namespace App\Controller\Admin;

use App\Entity\TypeDeBien;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TypeDeBienCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeDeBien::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('label'),
        ];
    }

}
