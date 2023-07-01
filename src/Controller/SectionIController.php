<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class SectionIController extends AbstractController
{

    public function index(): Response
    {
        return $this->render('section_i/index.html.twig', [
            'controller_name' => 'SectionIController',
        ]);
    }
}
