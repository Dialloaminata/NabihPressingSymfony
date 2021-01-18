<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\ModifypasswordType;

class ModifypasswdController extends AbstractController
{
    /**
     * @Route("/modifypasswd", name="modifypasswd")
     */
    public function index(): Response
    {
        $user = new User();
       
        $form = $this->createForm(ModifypasswordType::class, $user);
        $form->handleRequest($request);
        return $this->render('modifypasswd/index.html.twig', [
            'form' => $form->createView(),
        ]);
       
    }
}
