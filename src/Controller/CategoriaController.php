<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Categoria;
use App\Form\CategoriaType;

class CategoriaController extends AbstractController
{
    /**
     * @Route("/categoria", name="categoria")
     */
   
     public function createcategoria(Request $request) {
        
        
        $cate = new Categoria();
        
        $form = $this->createForm(CategoriaType::class, $cate);
        
        
        //RELLENAR EL OBJETO CON LOS DATOS DEL FORM
        $form->handleRequest($request);
        
        
        //COMPROBAR SI EL FORM SE HA ENVIDO Y ES VALIDO
        if ($form->isSubmitted() && $form->isValid()) {
            
            //GUARDAR USUARIO
           
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cate);
            $entityManager->flush();

            //SESION FLASH

            $session = new Session();

            $session->getFlashBag()->add('message', 'Categoria Registrada');

            return $this->redirectToRoute('crear-categoria');
        }
        
        
        
        
        
        
        return $this->render('categoria/index.html.twig', [
             'form' => $form->createView()
        ]);
        
        
    }
    
    
}
