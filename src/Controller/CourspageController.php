<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CourspageController extends AbstractController
{
    #[Route('/courspage', name: 'app_courspage')]
    public function index(): Response
    {
        return $this->render('courspage/index.html.twig', [
            'controller_name' => 'CourspageController',
        ]);
    }
}
