<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param CategorieRepository $categorieRepository
     * @return Response
     * @Route("/", name="app_home")
     */
    public function index(Request $request, CategorieRepository $categorieRepository): Response
    {
        $template = $request->query->get('ajax') ? '_list.html.twig' : 'index.html.twig';
        $user = $this->getUser();
        $categories = $categorieRepository->findPersonalCategorie($user);

        return $this->render('home/' . $template, [
            'categories' => $categories,
        ]);
    }
}
