<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\VoitureType;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/voiture/new', name: 'voiture_car_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
     
        $voiture = new Voiture();
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($voiture);
            $em->flush();

            return $this->redirectToRoute('app_voitures_accueil');
        }


        return $this->render('new.html.twig', [
            'form' => $form->createView(),
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

    #[Route('/voiture/{id}/delete', name:'voiture_car_delete')]
    public function deleteVoiture(int $id, VoitureRepository $voitureRepository, EntityManagerInterface $entityManagerInterface): Response 
    {
        $voiture = $voitureRepository->find($id);

        if ($voiture) {
            $entityManagerInterface->remove($voiture);
            $entityManagerInterface->flush();
        }

        return $this->redirectToRoute('app_voitures_accueil');
    }
}
