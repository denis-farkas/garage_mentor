<?php

namespace App\Controller;



use App\Repository\OccasionRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ApiController extends AbstractController
{

  #[Route('/api', name: 'app_api', methods: ['GET'])]
  public function getOccasions(OccasionRepository $occasionRepository): JsonResponse
  {
    $occasions = $occasionRepository->findAll();
    return $this->json($occasions);
  }
}
