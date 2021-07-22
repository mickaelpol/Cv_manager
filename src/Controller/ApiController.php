<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'api_')]
class ApiController extends AbstractController
{
    #[Route('/index', name: 'home')]
    public function index(CategorieRepository $categorieRepository)
    {
        $user = $this->getUser();
        $categories = $categorieRepository->findPersonalCategorie($user);
        return $this->json($categorieRepository->findPersonalCategorie($user), 200, [], ['groups' => 'cat:read']);
    }
}
