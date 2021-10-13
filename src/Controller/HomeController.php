<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
