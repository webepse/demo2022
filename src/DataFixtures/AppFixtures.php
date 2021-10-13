<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for($c = 1; $c <=5; $c++)
        {
            $category = new Category();
            $category->setTitle('Category '.$c);
            $manager->persist($category);

            $max = rand(10,30);
            for($p=1; $p <= $max; $p++)
            {
                $product = new Product();
                $product->setTitle('Produit '.$p)
                        ->setPrice(25.15)
                        ->setDescription('lorem ipsum')
                        ->setCategory($category);
                $manager->persist($product);
            }

        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
