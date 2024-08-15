<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VoituresController extends AbstractController
{
    #[Route('/', name: 'app_voitures_accueil')]
    public function index(VoitureRepository $voitureRepository): Response
    {
        $voitures = $voitureRepository->findAll();

        return $this->render('acceuil.html.twig', [
            'controller_name' => 'VoituresController',
            'voitures' => $voitures,
        ]);
    }

    #[Route('/voiture/{id}', name: 'voiture_car', requirements: ['id' => '\d+'])]
    public function voiture(int $id, VoitureRepository $voitureRepository): Response
    {
        $voiture = $voitureRepository->find($id);

        return $this->render('voiture.html.twig', [
            'voiture' => $voiture,
        ]);
    }


}
