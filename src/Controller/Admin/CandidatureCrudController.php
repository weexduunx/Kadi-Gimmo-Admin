<?php

namespace App\Controller\Admin;

use App\Entity\Candidature;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CandidatureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Candidature::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('clients'),
            AssociationField::new('product'),
            TextField::new('nom_du_bien'),
            TextField::new('type_de_candidature'),
            MoneyField::new('cout_global')->setCurrency('XOF'),
            MoneyField::new('monthly')->setCurrency('XOF'),
            BooleanField::new('status'),
        ];
    }

}
