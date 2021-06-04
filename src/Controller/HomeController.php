<?php

namespace App\Controller;

use App\Entity\MailTemplates;
use App\Repository\MailTemplatesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param MailTemplatesRepository $repository
     * @return Response
     */
    public function index(MailTemplatesRepository $repository): Response
    {
        $templ = $repository->findAll();
        return $this->render('home/index.html.twig', [
            'templates' => $templ
        ]);
    }
}
