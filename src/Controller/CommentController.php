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
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CommentController extends AbstractController
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/theWise', name: 'app_comment_index', methods: ['GET', 'POST'])]
public function new(
    AboutRepository $aboutRepository,
    UserRepository $userRepository,
    FooditemRepository $fooditemRepository,
    Request $request,
    EntityManagerInterface $entityManager,
    CommentRepository $commentRepository
): Response {
    // Check if the user is authenticated
    $user = $this->security->getUser();

    // Define variables for food items
    $itemStart = null;
    $itemBreakfast = null;
    $itemLunch = null;
    $itemDinner = null;

    // Define other variables
    $comment = new Comment();
    $form = $this->createForm(CommentType::class, $comment);
    $form->handleRequest($request);

    // Handle comment form submission
    if ($form->isSubmitted() && $form->isValid()) {
        // Set the user of the comment
        $comment->setUser($user);

        $entityManager->persist($comment);
        $entityManager->flush();

        return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
    }

    // Define form and handle request for command form
    $command = new Command();
    $form2 = $this->createForm(CommandType::class, $command);
    $form2->handleRequest($request);

    // Handle command form submission
    if ($form2->isSubmitted() && $form2->isValid()) {
        // Set the user of the command
        $command->setUser($user);
        $entityManager->persist($command);
        $entityManager->flush();

        return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
    }

    // Retrieve comments
    $comments = $commentRepository->getNameCommentUser();

    // If user is authenticated, retrieve food items
    if ($this->isGranted('ROLE_ADMIN')) {
        $itemStart = $fooditemRepository->findByTypeStartAndUser($user);
        $itemBreakfast = $fooditemRepository->findByTypeBreakfastAndUser($user);
        $itemLunch = $fooditemRepository->findByTypeLunchAndUser($user);
        $itemDinner = $fooditemRepository->findByTypeDinnerAndUser($user);
    }
    else{
        $itemStart = $fooditemRepository->findByTypeStart();
        $itemBreakfast = $fooditemRepository->findByTypeBreakfast();
        $itemLunch = $fooditemRepository->findByTypeLunch();
        $itemDinner = $fooditemRepository->findByTypeDinner();
    }
    // Retrieve other data (e.g., users, email, abouts)
    $users = $userRepository->countUsers();
    $email = $user ? $user->getUserIdentifier() : 'Guest';
    $abouts = $aboutRepository->findAll();

    
    return $this->render('comment/new.html.twig', [
        'comment' => $comment,
        'form' => $form,
        'form2' => $form2,
        'comments' => $comments,
        'itemStart' => $itemStart,
        'itemBreakfast' => $itemBreakfast,
        'itemLunch' => $itemLunch,
        'itemDinner' => $itemDinner,
        'users' => $users,
        'abouts' => $abouts,
        'email' => $email,
    ]);
}


#[Route('/saadana', name: 'app_comment_saadana', methods: ['GET', 'POST'])]
public function saadana(
    AboutRepository $aboutRepository,
    UserRepository $userRepository,
    FooditemRepository $fooditemRepository,
    Request $request,
    EntityManagerInterface $entityManager,
    CommentRepository $commentRepository
): Response {
    // Check if the user is authenticated
    $user = $this->security->getUser();

    // Define variables for food items
    $itemStart = null;
    $itemBreakfast = null;
    $itemLunch = null;
    $itemDinner = null;

    // Define other variables
    $comment = new Comment();
    $form = $this->createForm(CommentType::class, $comment);
    $form->handleRequest($request);

    // Handle comment form submission
    if ($form->isSubmitted() && $form->isValid()) {
        // Set the user of the comment
        $comment->setUser($user);

        $entityManager->persist($comment);
        $entityManager->flush();

        return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
    }

    // Define form and handle request for command form
    $command = new Command();
    $form2 = $this->createForm(CommandType::class, $command);
    $form2->handleRequest($request);

    // Handle command form submission
    if ($form2->isSubmitted() && $form2->isValid()) {
        // Set the user of the command
        $command->setUser($user);
        $entityManager->persist($command);
        $entityManager->flush();

        return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
    }

    // Retrieve comments
    $comments = $commentRepository->getNameCommentUser();

    // If user is authenticated, retrieve food items
    if ($this->isGranted('ROLE_ADMIN')) {
        $itemStart = $fooditemRepository->findByTypeStartAndUser($user);
        $itemBreakfast = $fooditemRepository->findByTypeBreakfastAndUser($user);
        $itemLunch = $fooditemRepository->findByTypeLunchAndUser($user);
        $itemDinner = $fooditemRepository->findByTypeDinnerAndUser($user);
    }
    else{
        $itemStart = $fooditemRepository->findByTypeStart();
        $itemBreakfast = $fooditemRepository->findByTypeBreakfast();
        $itemLunch = $fooditemRepository->findByTypeLunch();
        $itemDinner = $fooditemRepository->findByTypeDinner();
    }
    // Retrieve other data (e.g., users, email, abouts)
    $users = $userRepository->countUsers();
    $email = $user ? $user->getUserIdentifier() : 'Guest';
    $abouts = $aboutRepository->findAll();

    
    return $this->render('comment/saadana.html.twig', [
        'comment' => $comment,
        'form' => $form,
        'form2' => $form2,
        'comments' => $comments,
        'itemStart' => $itemStart,
        'itemBreakfast' => $itemBreakfast,
        'itemLunch' => $itemLunch,
        'itemDinner' => $itemDinner,
        'users' => $users,
        'abouts' => $abouts,
        'email' => $email,
    ]);
}

}
