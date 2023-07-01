<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReactExampleController extends AbstractController
{
    #[Route('/react/example', name: 'app_react_example')]
    public function index(): Response
    {
        return $this->render('react_example/index.html.twig', [
            'controller_name' => 'ReactExampleController',
        ]);
    }
}
