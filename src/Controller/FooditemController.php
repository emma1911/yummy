<?php

namespace App\Controller;

use App\Entity\Fooditem;
use App\Form\FooditemType;
use App\Repository\FooditemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/fooditem')]
class FooditemController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /*#[Route('/', name: 'app_fooditem_index', methods: ['GET'])]
    public function index(FooditemRepository $fooditemRepository): Response
    {
        return $this->render('fooditem/index.html.twig', [
            'fooditems' => $fooditemRepository->findAll(),
        ]);
    }*/

    #[Route('/new', name: 'app_fooditem_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_comment_index');
        }
        $fooditem = new Fooditem();
        $form = $this->createForm(FooditemType::class, $fooditem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Set the currently authenticated user as the gerant
            $user = $this->security->getUser();
            if ($user !== null) {
                $fooditem->setGerant($user);
            }

            $entityManager->persist($fooditem);
            $entityManager->flush();

            return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fooditem/new.html.twig', [
            'fooditem' => $fooditem,
            'form' => $form,
        ]);
    }

    /*#[Route('/{id}', name: 'app_fooditem_show', methods: ['GET'])]
    public function show(Fooditem $fooditem): Response
    {
        return $this->render('fooditem/show.html.twig', [
            'fooditem' => $fooditem,
        ]);
    }*/

    #[Route('/{id}/edit', name: 'app_fooditem_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fooditem $fooditem, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_comment_index');
        }
        $form = $this->createForm(FooditemType::class, $fooditem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fooditem/edit.html.twig', [
            'fooditem' => $fooditem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fooditem_delete', methods: ['POST'])]
    public function delete(Request $request, Fooditem $fooditem, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_comment_index');
        }
        if ($this->isCsrfTokenValid('delete'.$fooditem->getId(), $request->request->get('_token'))) {
            $entityManager->remove($fooditem);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
    }
}
