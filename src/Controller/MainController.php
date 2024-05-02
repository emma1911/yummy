<?php

namespace App\Controller;
use App\Repository\ClientRepository;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(CommentRepository $commentRepository): Response
    {
        $comments = $commentRepository->findAll();
        return $this->render('main/index.html.twig',['controller_name' => 'MainController', 'comments' => $comments]);
    }

    #[Route('/comments', name: 'app_comments')]
    public function comments(CommentRepository $commentRepository): Response
    {
        $comments = $commentRepository->findAll();
        $nameComments = $commentRepository->getNameOfClient();
        //dd($comments);
        return $this->render('main/comments.html.twig',['comments' => $comments, 'nameComments' => $nameComments]);
    }
}
