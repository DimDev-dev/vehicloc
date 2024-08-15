<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EntityDisplayController extends AbstractController
{
    #[Route('/admin', name: 'app_admin_entity_display')]
    public function index(): Response
    {
        return $this->render('admin/acceuil.html.twig', [
            'controller_name' => 'EntityDisplayController',
        ]);
    }
}
