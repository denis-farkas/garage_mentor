<?php

namespace App\Controller;

use App\Entity\OccasionSearch;
use App\Form\OccasionSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OccasionRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class OccasionsController extends AbstractController
{
    #[Route('/occasions', name: 'app_occasions')]
    public function index(
        OccasionRepository $occasionRepository,
        Request $request,
        PaginatorInterface $paginator
    ): Response {
        $search = new OccasionSearch();
        $form = $this->createForm(OccasionSearchType::class, $search);
        $form->handleRequest($request);
        $pagination = $paginator->paginate(
            $occasionRepository->paginationQuery(),
            $request->query->get("page", 1),
            5
        );
        return $this->render('occasions/index.html.twig', [


            'pagination' => $pagination,
            'form' => $form->createView()
        ]);
    }
}
