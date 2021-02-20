<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InicioController extends AbstractController{
/**
 * @Route("/", name="inicio")
 */
public function inicio() {
    date_default_timezone_set("Europe/Madrid");
    $hoy = date("H:i:s"); 
    return $this->render('inicio.html.twig', ["fecha" => $hoy]);
}
}
?>