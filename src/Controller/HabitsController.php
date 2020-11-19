<?php

namespace App\Controller;

use App\Entity\Habits;
use App\Form\HabitsType;
use App\Repository\HabitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/habits")
 */
class HabitsController extends AbstractController
{
    /**
     * @Route("/", name="habits_index", methods={"GET"})
     */
    public function index(HabitsRepository $habitsRepository): Response
    {
        return $this->render('habits/index.html.twig', [
            'habits' => $habitsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="habits_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $habit = new Habits();
        $form = $this->createForm(HabitsType::class, $habit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($habit);
            $entityManager->flush();

            return $this->redirectToRoute('habits_index');
        }

        return $this->render('habits/new.html.twig', [
            'habit' => $habit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="habits_show", methods={"GET"})
     */
    public function show(Habits $habit): Response
    {
        return $this->render('habits/show.html.twig', [
            'habit' => $habit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="habits_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Habits $habit): Response
    {
        $form = $this->createForm(HabitsType::class, $habit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('habits_index');
        }

        return $this->render('habits/edit.html.twig', [
            'habit' => $habit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="habits_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Habits $habit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$habit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($habit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('habits_index');
    }
}
