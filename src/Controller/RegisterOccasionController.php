<?php

namespace App\Controller;

use App\Entity\Occasion;
use App\Form\RegisterOccasionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class RegisterOccasionController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/newOccasion', name: 'app_register_occasion')]
    public function index(Request $request, SluggerInterface $slugger): Response
    {


        $occasion = new Occasion();
        $form = $this->createForm(RegisterOccasionType::class, $occasion);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $occasion = $form->getData();
            /** @var UploadedFile $file */
            $file = $form->get("file")->getData();
            $filename = sprintf(
                "images/%s-%s.%s",
                $slugger->slug($file->getClientOriginalName()),
                uniqid(),
                $file->getClientOriginalExtension()
            );
            $file->move($this->getParameter('image_directory'), $filename);

            $occasion->setImage($filename);

            /** @var UploadedFile $file2 */
            $file2 = $form->get("file2")->getData();
            $filename2 = sprintf(
                "images/%s-%s.%s",
                $slugger->slug($file2->getClientOriginalName()),
                uniqid(),
                $file2->getClientOriginalExtension()
            );
            $file2->move($this->getParameter('image_directory'), $filename2);

            $occasion->setImage2($filename2);

            /** @var UploadedFile $file3 */
            $file3 = $form->get("file3")->getData();
            $filename3 = sprintf(
                "images/%s-%s.%s",
                $slugger->slug($file3->getClientOriginalName()),
                uniqid(),
                $file3->getClientOriginalExtension()
            );
            $file3->move($this->getParameter('image_directory'), $filename3);

            $occasion->setImage3($filename3);
            $this->entityManager->persist($occasion);
            $this->entityManager->flush();
            return $this->redirectToRoute('app_accueil');
        }
        return $this->render('register_occasion/index.html.twig', [
            'controller_name' => 'RegisterOccasionController',
            'form' => $form->createView()
        ]);
    }
}
