<?php

namespace App\Controller;

use App\Entity\Contacto;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ContactoController extends AbstractController
{
    private $contactos = array(
        array(
            "codigo" => 1, "nombre" => "Juan Pérez", "telefono" => "966112233",
            "email" => "juanp@gmail.com"
        ),
        array(
            "codigo" => 2, "nombre" => "Ana López", "telefono" => "965667788",
            "email" => "anita@hotmail.com"
        ),
        array("codigo" => 3, "nombre" => "María Moreno", "telefono" =>
        "965929190", "email" => "maria.mor@gmail.com"),
        array(
            "codigo" => 4, "nombre" => "Eva Martín", "telefono" => "611223344",
            "email" => "em2000@gmail.com"
        ),
        array("codigo" => 5, "nombre" => "Nora Fuentes", "telefono" =>
        "638765432", "email" => "norafuentes@hotmail.com")
    );

    /**
     * @Route("/contacto/id/{id}", name="mayor_edad")
     */
    public function revisarid() {
        $repositorio = $this->getDoctrine()->getRepository(Contacto::class);
        $contactos = $repositorio->revisarid();
    }

    /**
     * @Route("/contacto/{codigo}", name="ficha_contacto", requirements={"codigo"="\d+"})
     */
    public function ficha($codigo = 1)
    {
        $contacto = NULL;
        foreach ($this->contactos as $con) {
            if ($con["codigo"] == $codigo)
                $contacto = $con;
        }
        return $this->render('ficha_contacto.html.twig', array('contacto' => $contacto));
    }


    /**
     * @Route("/contacto/insertar", name="insertar")
     */
    public function insertar()
    {
        $contacto = new Contacto();
        $contacto->setNombre('Inserción de prueba');
        $contacto->setTelefono('900110011');
        $contacto->setEmail('insercion.de.prueba@contacto.es');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($contacto);
        try {
            $entityManager->flush();
        }
        catch(\Exception $e) {
            return new Response("Error insertando objeto: " . $e);
        }
    }

    
    /**
     * @Route("/contacto/{texto}", name="buscar_contacto")
     */
    public function buscar($texto)
    {

        $repositorio = $this->getDoctrine()->getRepository(Contacto::class);
        $resul = $repositorio->findByName($texto);
        return $this->render('lista_contactos.html.twig', array('contactos' => $resul));
        /*
        $resultado = array_filter(
            $this->contactos,
            function ($con) use ($texto) {
                return strpos($con["nombre"], $texto) !== false;
            }
        );
        return $this->render('lista_contactos.html.twig', array('contactos' => $resultado));
        */
    }
    
    
    
}
