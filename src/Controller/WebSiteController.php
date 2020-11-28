<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebSiteController extends AbstractController
{
    /**
     * @Route("/concept", name="concept")
     * @return Response
     */
    public function conceptPage(): Response
    {
        return $this->render('pages/concept.html.twig');
    }
}