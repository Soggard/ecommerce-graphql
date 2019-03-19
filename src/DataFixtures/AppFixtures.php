<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = [];

        // Categories
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName('Cat' . $i);

            $manager->persist($category);
            $categories[] = $category;
        }

        // Products
        for ($i = 0; $i < 100; $i++) {
            $product = new Product();
            $product->setName('Prod' . $i);
            $product->setPrice(rand(10,50));
            $product->setCategory( $categories[rand(0, 9)] );

            $manager->persist($product);
        }

        $manager->flush();
    }
}
