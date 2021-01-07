<?php

namespace App\Controller;

use App\Entity\LotHabit;
use App\Form\LotHabitType;
use App\Repository\LotHabitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lot/habit")
 */
class LotHabitController extends AbstractController
{
    /**
     * @Route("/", name="lot_habit_index", methods={"GET"})
     */
    public function index(LotHabitRepository $lotHabitRepository): Response
    {
        return $this->render('lot_habit/index.html.twig', [
            'lot_habits' => $lotHabitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lot_habit_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lotHabit = new LotHabit();
        $form = $this->createForm(LotHabitType::class, $lotHabit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lotHabit);
            $entityManager->flush();

            return $this->redirectToRoute('lot_habit_index');
        }

        return $this->render('lot_habit/new.html.twig', [
            'lot_habit' => $lotHabit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lot_habit_show", methods={"GET"})
     */
    public function show(LotHabit $lotHabit): Response
    {
        return $this->render('lot_habit/show.html.twig', [
            'lot_habit' => $lotHabit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lot_habit_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LotHabit $lotHabit): Response
    {
        $form = $this->createForm(LotHabitType::class, $lotHabit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lot_habit_index');
        }

        return $this->render('lot_habit/edit.html.twig', [
            'lot_habit' => $lotHabit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lot_habit_delete", methods={"DELETE"})
     */
    public function delete(Request $request, LotHabit $lotHabit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lotHabit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lotHabit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lot_habit_index');
    }
}
