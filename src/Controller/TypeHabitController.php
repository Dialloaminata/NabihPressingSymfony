<?php

namespace App\Controller;

use App\Entity\TypeHabit;
use App\Form\TypeHabitType;
use App\Repository\TypeHabitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/habit")
 */
class TypeHabitController extends AbstractController
{
    /**
     * @Route("/", name="type_habit_index", methods={"GET"})
     */
    public function index(TypeHabitRepository $typeHabitRepository): Response
    {
        return $this->render('type_habit/index.html.twig', [
            'type_habits' => $typeHabitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_habit_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeHabit = new TypeHabit();
        $form = $this->createForm(TypeHabitType::class, $typeHabit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeHabit);
            $entityManager->flush();

            return $this->redirectToRoute('type_habit_index');
        }

        return $this->render('type_habit/new.html.twig', [
            'type_habit' => $typeHabit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_habit_show", methods={"GET"})
     */
    public function show(TypeHabit $typeHabit): Response
    {
        return $this->render('type_habit/show.html.twig', [
            'type_habit' => $typeHabit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_habit_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeHabit $typeHabit): Response
    {
        $form = $this->createForm(TypeHabitType::class, $typeHabit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_habit_index');
        }

        return $this->render('type_habit/edit.html.twig', [
            'type_habit' => $typeHabit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_habit_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeHabit $typeHabit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeHabit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeHabit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_habit_index');
    }
}
