<?php

namespace App\Controller\Admin;

use App\Entity\Occasion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OccasionCrudController extends AbstractCrudController
{
    use Trait\ReadOnlyTrait;

    public static function getEntityFqcn(): string
    {
        return Occasion::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
