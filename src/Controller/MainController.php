<?php

namespace App\Controller;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
       // $comments = $commentRepository->getNameCommentClient();
        return $this->render('main/index.html.twig',['controller_name' => 'MainController']);
    }

}
