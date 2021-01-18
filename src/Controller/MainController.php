<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use App\Entity\Achat;
use App\Form\AchatType;
use App\Repository\AchatRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\LotHabit;
use App\Form\LotHabitType;
use App\Repository\LotHabitRepository;
class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
     /**
     * @Route("/main", name="main")
     */
    
    public function ind(AchatRepository $achatRepository,LotHabitRepository $lotHabitRepository,Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        
        $RAW_QUERY = ' SELECT SUM(prix_achat)from achat;';
        
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();

        $result = $statement->fetchAll();
        return $this->render('base.html.twig', [
            'achats' => $achatRepository->findAll(),
            'lot_habits' => $lotHabitRepository->findAll(),
            'results'=> $statement,
        ]);
    }
  


}
