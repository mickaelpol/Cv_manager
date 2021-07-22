<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param CategorieRepository $categorieRepository
     * @return Response
     * @Route("/", name="app_home")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        $user = $this->getUser();
        $categories = $categorieRepository->findPersonalCategorie($user);

        return $this->render('home/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
