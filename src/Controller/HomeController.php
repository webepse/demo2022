<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {

        $prenoms = [
            "Maxime" => 26,
            "Nando" => 30,
            "Remy" => 32,
            "Romeo" => 22,
            "Yann" => 23,
            "Jordan" => 25
        ];

        return $this->render('home/index.html.twig', [
            'controller_name' => 'Mon controller',
            'nom' => 'Berti',
            'prenom' => 'JORDAN',
            'tableau' => $prenoms
        ]);
    }

    /**
     * Permet de voir les produits
     * @Route("/products", name="products")
     * @return Response
     */
    public function products(ProductRepository $repo)
    {
        //$repo = $this->getDoctrine()->getRepository(Product::class); 

        $products = $repo->findAll();

        return $this->render('prod/index.html.twig',[
            'products' => $products
        ]);

    }

    /**
     * Permet d'afficher un produit
     * @Route("/products/{id}", name="product")
     * @return Response
     */
    public function product($id, Product $product)
    {
        //$repo = $this->getDoctrine()->getRepository(Product::class);
        //$product = $repo->find($id);

        return $this->render("prod/show.html.twig",[
            'product'=> $product
        ]); 
    }

    /**
     * Permet d'afficher les catégories
     * 
     * @Route("/categories", name="categories")
     * @param CategoryRepository $repo
     * @return Response
     */
    public function category(CategoryRepository $repo)
    {
        $categories = $repo->findAll();
        return $this->render('cat/index.html.twig',[
            'categories' => $categories
        ]);
    }
}
