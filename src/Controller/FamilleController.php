<?php

namespace App\Controller;

use App\Repository\FamilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Famille;

class FamilleController extends AbstractController
{

    public function __construct(private FamilleRepository $familleRepository) //PHP8
    {
        
    }

    #[Route('/familles', name: 'familles')]
    public function index(): Response
    {
        $familles = $this->familleRepository->findAll();
        //dd($familles);
        //Recuperer les infos de la famille
        return $this->render('famille/index.html.twig', [
            'familles' => $familles
        ]);
    }

    #[Route('/familles/{id}', name: 'afficher_famille')]
    public function afficherFamille(Famille $famille): Response
    {
        //dd($famille);
        return $this->render('famille/afficherFamille.html.twig', [
            'famille' => $famille,
        ]);
    }
}
