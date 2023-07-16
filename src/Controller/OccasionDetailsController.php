<?php

namespace App\Controller;

use App\Repository\OccasionRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OccasionDetailsController extends AbstractController
{
    #[Route('/occasion/{id}', name: 'app_occasion_details')]
    public function index($id, OccasionRepository $occasionRepository): Response
    {
        return $this->render('occasion_details/index.html.twig', [
            'controller_name' => 'OccasionDetailsController',
            'occasion' => $occasionRepository->find(['id' => $id])
        ]);
    }
}
