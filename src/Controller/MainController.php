<?php

namespace App\Controller;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(CommentRepository $commentRepository): Response
    {
        //$comments = $commentRepository->getNameCommentUser();
        //dd($comments);
        return $this->render('main/index.html.twig',['controller_name' => 'MainController',]);
    }

    /*#[Route('/test', name: 'app_index')]
    public function testComment(CommentRepository $commentRepository): Response
    {
        $comments = $commentRepository->getNameCommentUser();
        //dd($comments);
        return $this->render('main/index.html.twig',['controller_name' => 'MainController', 'comments' => $comments]);
    }*/

}
