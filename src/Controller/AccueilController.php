<?php

namespace App\Controller;

use App\Repository\HoraireRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(HoraireRepository $horaireRepository, ServiceRepository $serviceRepository): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController', 'horaires' => $horaireRepository->findAll([]), 'services' => $serviceRepository->findAll([])
        ]);
    }
}
