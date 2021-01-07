<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifypasswdController extends AbstractController
{
    /**
     * @Route("/modifypasswd", name="modifypasswd")
     */
    public function index(): Response
    {
        return $this->render('modifypasswd/index.html.twig', [
            'controller_name' => 'ModifypasswdController',
        ]);
    }
}
