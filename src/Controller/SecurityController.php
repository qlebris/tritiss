<?php


namespace App\Controller;


use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @Route("/login", name="login")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function login(Request $request)
    {
        if (!$this ->session->get('admin')) {
            $form = $this->createForm(LoginType::class);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $data = $form->getData();
                if ($data['email'] === $_ENV['adminMail'] &&
                    $data['password'] === $_ENV['adminPass']) {
                    $this ->session->set('admin', true);

                    return $this->redirectToRoute('admin_access');
                }
                $this->addFlash('danger', 'identification incorrecte');
            }
            return $this->render(
                '/security/login.html.twig',
                [
                    'form' => $form->createView(),
                ]
            );
        }

        return $this->redirectToRoute('admin_access');
    }

/**
 * @Route("/admin_logout", name="admin_logout")
 */
    public function logout(): RedirectResponse
    {
        if ($this ->session->get('admin')) {
            $this ->session->set('admin', false);
        }
            return $this->redirectToRoute('home');
    }
}