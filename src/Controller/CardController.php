<?php

namespace App\Controller;

use App\Entity\Card;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    /**
     * @Route("/card", name="card")
     */
    public function index()
    {
//        return $this->render('card/index.html.twig', [
//            'controller_name' => 'CardController',
//        ]);

        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $card = new Card();
        $card->setEmail('tristanhannet@gmail.com');
        $card->setNumber(300);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($card);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Nouvel utilisateur créé avec l\'id:'.$card->getId());
    }
}
