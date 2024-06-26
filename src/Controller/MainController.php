<?php

namespace App\Controller;
use App\Repository\CommentRepository;
use App\Repository\FooditemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(FooditemRepository $fooditemRepository): Response
    {
        $items = $fooditemRepository->findByTypeStart($this->getUser()->getUserIdentifier());
        return $this->render('main/index.html.twig',['controller_name' => 'MainController','items' => $items]);
    }

    /*#[Route('/test', name: 'app_index')]
    public function testComment(CommentRepository $commentRepository): Response
    {
        $comments = $commentRepository->getNameCommentUser();
        //dd($comments);
        return $this->render('main/index.html.twig',['controller_name' => 'MainController']);
    }
*/
}
