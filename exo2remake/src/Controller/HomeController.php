<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\BienRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(BienRepository $bienRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'biens' => $bienRepository->findAll(),
        ]);
    }
}
