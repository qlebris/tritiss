<?php


namespace App\Controller;


use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebSiteController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function homePage(): Response
    {
        return $this->render('pages/home.html.twig');
    }

    /**
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function navbar(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render('header.html.twig', [
            'categories' => $categories
        ]);
    }


    /**
     * @param CategoryRepository $categoryRepository
     * @return Response
     * @Route("/mes-creations", name="creations")
     */
    public function creationsPage(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render(
            'pages/creations.html.twig',
            [
                'categories' => $categories,
            ]
        );
    }
}