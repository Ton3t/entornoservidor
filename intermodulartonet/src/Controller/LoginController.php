<?php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends AbstractController {

    /**
    * @Route("/login", name="login")
    */
    public function login(AuthenticationUtils $authenticationUtils) {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        // stores an attribute in the session for later reuse
        return $this->render('login.html.twig', array('error' => $error, 'lastUsername' => $lastUsername));

    }
}
?>
