<?php

namespace App\Controller\Admin;

use App\Entity\Reclamation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReclamationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reclamation::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('ref_rec'),
            AssociationField::new('client'),
            AssociationField::new('etats'),
            AssociationField::new('canals'),
            TextEditorField::new('commentaire'),
            BooleanField::new('status'),
        ];
    }

}
