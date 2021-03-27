<?php

namespace App\Controller\Admin;

use App\Entity\Bien;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BienCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bien::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('ref_bien'),
            ImageField::new('image')
                ->onlyOnIndex()
                ->setBasePath($this->getParameter("app.path.product_images")),
            AssociationField::new('typeDeBien'),
            AssociationField::new('projets'),
            TextField::new('nature_du_bien'),
            MoneyField::new('prix_du_bien')->setCurrency('XOF'),
            NumberField::new('superficie'),
            TextareaField::new('imageFile',"Image du produit")
                ->setFormType(VichImageType::class)
                ->hideOnIndex()
                ->setFormTypeOption('allow_delete',false),
            AssociationField::new('achat'),
            AssociationField::new('candidature'),
            BooleanField::new('status'),
        ];
    }

}
