<?php

namespace App\Controller;

use App\Entity\Card;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddPointsController extends AbstractController
{
    /**
     * @Route("/add/points/{email}", name="add_points")
     */
//    public function index()
//    {
//        return $this->render('add_points/index.html.twig', [
//            'controller_name' => 'AddPointsController',
//        ]);
//    }

    public function number($email)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $card = $entityManager->getRepository(Card::class)->findOneBy(['email' => $email]);

        if (!$card) {
//            throw $this->createNotFoundException(
//                'No user found for email '.$email
//            );
            return new Response(' No email found: '.$email);
        }

        $pointsBefore = $card->getNumber();

        $card->setNumber($pointsBefore);
        $entityManager->flush();

        return new Response( 'Points: '.$card->getNumber());

    }
}
