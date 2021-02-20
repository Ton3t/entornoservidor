<?php

namespace App\Controller;

use App\Entity\Editorial;
use App\Entity\Libro;
use Doctrine\ORM\Mapping\Entity;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType as TypeEntityType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\Request;

class LibroController extends AbstractController
{

    private $libros = array(
        array("isbn" => "A001", "titulo" => "Jarry Choped", "autor" => "JK Bowling", "paginas" => 100),
        array("isbn" => "A002", "titulo" => "El señor de los palillos", "autor"
        => "JRR TolQuien", "paginas" => 200),
        array("isbn" => "A003", "titulo" => "Los polares de la tierra", "autor"
        => "Ken Follonett", "paginas" => 300),
        array("isbn" => "A004", "titulo" => "Los juegos de enjambre", "autor"
        => "Suzanne Collonins", "paginas" => 400)
    );

    /**
     * @Route("/libro/editar/{isbn}", name="editar_libro")
     */
    public function modificar(Request $request, $isbn) {
        $repositorio = $this->getDoctrine()->getRepository(Libro::class);
        $libro = $repositorio->find($isbn);
        $formulario = $this->createFormBuilder($libro)
        ->add('isbn', TextType::class)
        ->add('titulo', TextType::class)
        ->add('autor', TextType::class)
        ->add('paginas', IntegerType::class)
        ->add('editorial', EntityType::class, array('class' => Editorial::class, 'choice_label' => 'nombre'))
        ->add('save', SubmitType::class, array('label' => 'Enviar'))
        ->getForm();
        
        $formulario->handleRequest($request);

        if($formulario->isSubmitted() && $formulario->isValid()) {
            $libro = $formulario->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($libro);
            $entityManager->flush();
            return $this->redirectToRoute('arrayLibros');
        }
        return $this->render('editar_libro.html.twig', array('formulario' => $formulario->createView()));
    }

    /**
     * @Route("/nuevo", name="nuevo_libro")
     */
    public function nuevo(Request $request) {
        $libro = new Libro();
        $formulario = $this->createFormBuilder($libro)
        ->add('isbn', TextType::class)
        ->add('titulo', TextType::class)
        ->add('autor', TextType::class)
        ->add('paginas', IntegerType::class)
        ->add('editorial', EntityType::class, array('class' => Editorial::class, 'choice_label' => 'nombre'))
        ->add('save', SubmitType::class, array('label' => 'Enviar'))
        ->getForm();

        $formulario->handleRequest($request);

        if($formulario->isSubmitted() && $formulario->isValid()) {
            $libro = $formulario->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($libro);
            $entityManager->flush();
            return $this->redirectToRoute('arrayLibros');
        }
        return $this->render('nuevo_libro.html.twig', array('formulario' => $formulario->createView()));
    }

    /**
     * @Route("/libro/insertar", name="insertar")
     */
    public function insertar_libro()
    {
        foreach ($this->libros as $item) {
            $libro = new Libro();
            $libro->setIsbn($item["isbn"]);
            $libro->setTitulo($item["titulo"]);
            $libro->setAutor($item["autor"]);
            $libro->setPaginas($item["paginas"]);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($libro);
            $entityManager->flush();
        }
        return $this->render('layout.html.twig');
    }

    /**
     * @Route("/libro/eliminar/{isbn}", name="eliminarLibro")
     */
    public function eliminar_libro($isbn)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repositorio = $this->getDoctrine()->getRepository(Libro::class);
        $libro = $repositorio->find($isbn);
        if ($libro) {
            $entityManager->remove($libro);
            $entityManager->flush();
        }
        return $this->redirectToRoute('arrayLibros');
    }

    /**
     * @Route("/libros/paginas/{paginas}", name="filtrarPaginas")
     */
    public function menoresDe($paginas)
    {
        $repositorio = $this->getDoctrine()->getRepository(Libro::class);
        $libro = $repositorio->findOneBy(["paginas" => $paginas]);
        return $this->render('lista_libros_paginas.html.twig', array("libros" => $libro));
    }

    /**
     * @Route("/libro/insertarConEditorial/{texto}", name="insertarConEditorial")
     */
    public function editoria($texto)
    {
        $editorial = new Editorial();
        $editorial->setNombre($texto);
        $libro = new Libro();
        $libro->setIsbn("2222BBBu");
        $libro->setTitulo("Libro de prueba con editorial");
        $libro->setAutor("Autor de prueba con editorial");
        $libro->setPaginas(200);
        $libro->setEditorial($editorial);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($editorial);
        $entityManager->persist($libro);
        $entityManager->flush();
        return $this->redirectToRoute('arrayLibros');
    }

    /**
     * @Route("/libro/{isbn}", name="libro")
     */
    public function isnb_libro($isbn)
    {
        $codigo = null;
        $repositorio = $this->getDoctrine()->getRepository(Libro::class);
        $libros = $repositorio->findAll();
        foreach($libros as $item) {
            if($item->getIsbn() == $isbn){
                $codigo = $item;
            }
        }
        return $this->render('ficha_libro.html.twig', array("libros" => $codigo));
    }

    /**
     * @Route ("/libros", name="arrayLibros")
     */
    public function listar_libros()
    {
        $repositorio = $this->getDoctrine()->getRepository(Libro::class);
        $libros = $repositorio->findAll();
        return $this->render('lista_libros.html.twig', array("libros" => $libros));
    }
}
