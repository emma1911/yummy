<?php

namespace App\Controller;

use App\Entity\Command;
use App\Entity\Comment;
use App\Form\CommandType;
use App\Form\CommentType;
use App\Repository\UserRepository;
use App\Repository\AboutRepository;
use App\Repository\CommentRepository;
use App\Repository\FooditemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CommentController extends AbstractController
{
    /*#[Route('/', name: 'app_comment_index', methods: ['GET'])]
    public function index(CommentRepository $commentRepository): Response
    {
        return $this->render('comment/index.html.twig', [
            'comments' => $commentRepository->findAll(),
        ]);
    }*/
    
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/', name: 'app_comment_index', methods: ['GET', 'POST'])]
    public function new(AboutRepository $aboutRepository,UserRepository $userRepository,FooditemRepository $fooditemRepository,Request $request, EntityManagerInterface $entityManager, CommentRepository $commentRepository): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Get the currently authenticated user
            $user = $this->security->getUser();
            // Set the user of the comment
            $comment->setUser($user);

            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
        }
        $command = new Command();
        $form2 = $this->createForm(CommandType::class, $command);
        $form2->handleRequest($request);

        if ($form2->isSubmitted() && $form2->isValid()) {
            $user = $this->security->getUser();
            // Set the user of the command
            $command->setUser($user);
            $entityManager->persist($command);
            $entityManager->flush();

            return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
        }
        $comments = $commentRepository->getNameCommentUser();
        $itemStart = $fooditemRepository->findByTypeStart();
        $itemBreakfast = $fooditemRepository->findByTypeBreakfast();
        $itemLunch = $fooditemRepository->findByTypeLunch();
        $itemDinner = $fooditemRepository->findByTypeDinner();
        $users = $userRepository->countUsers();

        $user = $this->getUser();

        // Check if a user is logged in
        if ($user) {
            // Get the email of the logged-in user
            $email = $user->getUserIdentifier();
        } else {
            // User is not logged in, handle accordingly
            $email = 'Guest';
        }
        
        return $this->render('comment/new.html.twig', ['comment' => $comment, 
                                                        'form' => $form, 
                                                        'form2' => $form2, 
                                                        'comments' => $comments,
                                                        'itemStart' => $itemStart, 
                                                        'itemBreakfast' => $itemBreakfast,
                                                        'itemLunch' => $itemLunch,
                                                        'itemDinner' => $itemDinner,
                                                        'users' => $users,
                                                        'abouts' => $aboutRepository->findAll(),
                                                        'fooditemsStart' => $fooditemRepository->findByTypeStart(),
                                                        'itemBreakfast' => $fooditemRepository->findByTypeBreakfast(),
                                                        'itemLunch' => $fooditemRepository->findByTypeLunch(),
                                                        'itemDinner' => $fooditemRepository->findByTypeDinner(),
                                                        'email' => $email,
                                                    ]);
    }


    
/*
   #[Route('/{id}', name: 'app_comment_show', methods: ['GET'])]
    public function show(Comment $comment): Response
    {
        return $this->render('comment/show.html.twig', [
            'comment' => $comment,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_comment_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Comment $comment, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comment/edit.html.twig', [
            'comment' => $comment,
            'form' => $form,
        ]);/* 
    }

    #[Route('/delete/{id}', name: 'app_comment_delete', methods: ['POST'])]
    public function delete(Request $request, Comment $comment, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
            $entityManager->remove($comment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
    }*/
}
