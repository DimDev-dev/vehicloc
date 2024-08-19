<?php

namespace App\Controller\Admin;

use App\Entity\Voiture;
use App\Form\VoitureType;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route("/admin/voiture")]
class VoituresController extends AbstractController
{
    #[Route('/', name: 'app_admin_car')]
    public function index(VoitureRepository $voitures): Response
    {
        // if (!$this->isGranted('ROLE_ADMIN')) {
        //     return $this->redirectToRoute('app_voitures_accueil');
        // } 
        $voitures = $voitures->findAll();

        return $this->render('admin/voitures/index.html.twig', [
            'controller_name' => 'VoituresController',
            'voitures' => $voitures
        ]);
    }

    #[Route('/new', name: 'admin_voiture_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
     
        // if (!$this->isGranted('ROLE_ADMIN')) {
        //     return $this->redirectToRoute('app_voitures_accueil');
        // } 
        $voiture = new Voiture();
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($voiture);
            $em->flush();

            return $this->redirectToRoute('app_admin_car');
        }


        return $this->render('admin/voitures/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'admin_voiture_car', requirements: ['id' => '\d+'])]
    public function voiture(int $id, VoitureRepository $voitureRepository): Response
    {
        $voiture = $voitureRepository->find($id);

        return $this->render('admin/voitures/voiture.html.twig', [
            'voiture' => $voiture,
        ]);
    }

    #[Route('/{id}/edit', name:'admin_voiture_edit', requirements: ['id' => '\d+'])]
    public function edit(int $id, VoitureRepository $voitureRepository, Request $request, EntityManagerInterface $em): Response
    {
        $voiture = $voitureRepository->find($id);
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($voiture);
            $em->flush();

            return $this->redirectToRoute('admin_voiture_car', [
                'voiture' => $voiture,
                'id' => $id
            ]);
        }
        return $this->render('admin/voitures/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/{id}/delete', name:'admin_voiture_delete')]
    public function deleteVoiture(int $id, VoitureRepository $voitureRepository, EntityManagerInterface $entityManagerInterface): Response 
    {
        $voiture = $voitureRepository->find($id);

        if ($voiture) {
            $entityManagerInterface->remove($voiture);
            $entityManagerInterface->flush();
        }

        return $this->redirectToRoute('app_admin_car');
    }
}
