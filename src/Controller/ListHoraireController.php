<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\HoraireRepository;

class ListHoraireController extends AbstractController
{

    public function index(HoraireRepository $horaireRepository): Response
    {
        return $this->render('list_horaire/index.html.twig', [
            'controller_name' => 'ListHoraireController',
            'horaires' => $horaireRepository->findAll([]),
        ]);
    }
}
