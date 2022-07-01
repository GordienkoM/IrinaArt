<?php

namespace App\Tests\Unit;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CaterogyTest extends KernelTestCase
{
    public function getEntity(): Category
    {
        return (new Category())
            ->setName('Портрет')
            ->setNameEn('Portrait');
    }

    public function testEntityIsValid(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $category = $this->getEntity();

        $errors = $container->get('validator')->validate($category);

        $this->assertCount(0, $errors);
    }

}
