<?php

namespace App\Controller\Admin;

use App\Entity\PaintingVideo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PaintingVideoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PaintingVideo::class;
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
