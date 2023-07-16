<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\OccasionRepository;

class SectionOccasionController extends AbstractController
{

    public function index(OccasionRepository $occasionRepository): Response
    {
        return $this->render('section_occasion/index.html.twig', [
            'controller_name' => 'SectionOccasionController',
            'occasions' => $occasionRepository->findBy(array(), null,  3, null)
        ]);
    }
}
