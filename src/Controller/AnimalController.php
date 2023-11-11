<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;


class AnimalController extends AbstractController
{
    /* php 7 private $animalRepository;

    public function __construct(AnimalRepository $animalRepository)
    {
        $this->animalRepository = $animalRepository;
    }*/

    // php8 injecter directement AnimalRepository => reutilisable dans toute la classe
    //Constructor property promotion
    public function __construct(private AnimalRepository $animalRepository)
    {
        
    }

    #[Route('/animal', name: 'liste_animal')]
    public function index(): Response
    {
        //$repository = $doctrine->getRepository(Animal::class);
        $listAnimaux = $this->animalRepository->findAll();
        //dd($listAnimaux);
        
        return $this->render('animal/index.html.twig', [
            'animaux' => $listAnimaux
        ]);
    }   


    #[Route('/animal/{id}', name: 'afficher_animal')]
    public function afficherAnimal(Animal $animal): Response
    {

        return $this->render('animal/afficherAnimal.html.twig', [
            "infoAnimal" => $animal
        ]);
    }
}