<?php

namespace App\Controller;

use App\Repository\ContinentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Continent;

class ContinentController extends AbstractController
{
    public function __construct(private ContinentRepository $continentRepository)
    {
        
    }

    #[Route('/continents', name: 'continents')]
    public function index(): Response
    {
        $continents = $this->continentRepository->findAll();
        return $this->render('continent/index.html.twig', [
            'continents' => $continents
        ]);
    }


    #[Route('/continent/{id}', name: 'afficher_continent')]
    public function afficherContinent(Continent $continent): Response
    {
        //dd($continent->getAnimaux());
        return $this->render('continent/afficherContinent.html.twig', [
            'continent' => $continent
        ]);
    }
}
