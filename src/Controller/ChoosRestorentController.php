<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ChoosRestorentController extends AbstractController
{
    #[Route('/', name: 'app_choos_restorent')]
    public function index(): Response
    {
        return $this->render('choos_restorent/choosRestorent.html.twig', [
            'controller_name' => 'ChoosRestorentController',
        ]);
    }
    
    
}
