<?php

namespace App\Controller;

use App\Entity\Card;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckUserController extends AbstractController
{
    /**
     * @Route("/check/user/{email}", name="check_user")
     */
    public function index($email)
    {
//        return $this->render('check_user/index.html.twig', [
//            'controller_name' => 'CheckUserController',
//        ]);

        $card = $this->getDoctrine()
            ->getRepository(Card::class)
            ->findOneBy(['email' => $email]);

        if (!$card) {
//            throw $this->createNotFoundException(
//                'No user found for email '.$email
//            );
            return new Response(' No email found: '.$email);
        }

        return new Response('Check out this great email: '.$card->getEmail());

    }
}
