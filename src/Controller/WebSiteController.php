<?php


namespace App\Controller;


use App\Form\ContactType;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
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
     * @param Request $request
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function navbar(Request $request, CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render(
            '_header.html.twig',
            [
                'categories' => $categories,
                'route' => $request->get('_route'),
            ]
        );
    }

    /**
     * @Route("/contactez-moi", name="contact")
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function contactForm(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $mail = (new Email())
                ->from($form->getData()['email'])
                ->to($_ENV['MAILER_RECEIVER'])
                ->subject("message sur tritiss'B de ".$form->getData()['name'])
                ->text($form->getData()['message']);

            $mailer->send($mail);
            $this->addFlash(
                'success',
                "votre message a bien été envoyé, nous nous efforçons d'y répondre dans les meilleurs délais"
            );
            return $this->redirectToRoute('home');
        }

        return $this->render(
            '/pages/contact.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     *
     * @Route("/admin", name="admin_access")
     * @param SessionInterface $session
     * @return Response
     */
    public function adminAccess(SessionInterface $session): Response
    {
        if ($session->get('admin') === true) {
            return $this->render('/admin/adminAccess.html.twig');
        }

        return $this->redirectToRoute('login');
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

    /**
     * @Route("/mes-creations/category/{slug}", name="category_details")
     * @param $slug
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function categoryDetailsPage(
        $slug,
        CategoryRepository $categoryRepository
    ): Response {
        $category = $categoryRepository->findOneBySlug($slug);
        $articles = $category->getArticles();

        return $this->render(
            'pages/categoryDetails.html.twig',
            [
                'category' => $category,
                'articles' => $articles,
            ]
        );
    }
}