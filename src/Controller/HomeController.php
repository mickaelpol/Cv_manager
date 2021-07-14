<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     * @return Response
     */
    public function index(): Response
    {

        $user = $this->getUser()->getUsername();
        return $this->render('home/index.html.twig', [
            'user' => $user,
        ]);
    }
}
