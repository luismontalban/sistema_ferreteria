<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Producto;
use App\Form\ProductoType;

class ProductoController extends AbstractController
{
    /**
     * @Route("/producto", name="producto")
     */
   
    public function index() {
        $repository = $this->getDoctrine()->getRepository(Producto::class);



        $productos = $repository->findBy([], ['id' => 'DESC']);





        /*

          $user_repo = $this->getDoctrine()->getRepository(User::class);
          $users = $user_repo->findAll();


          foreach($users as $user){
          echo "<h1>{$user->getName()} {$user->getSurname()}</h1>";

          foreach($user->getTasks() as $task){
          echo $task->getTitle()."<br/>";
          }


          }

         * 
         */
        return $this->render('producto/show.html.twig', [
                    'productos' => $productos,
        ]);
    }

    
    
    
    
    
    
    
    public function createproducto(Request $request) {
        
        
        $producto = new Producto();
        
        $form = $this->createForm(ProductoType::class, $producto);
        
        
        //RELLENAR EL OBJETO CON LOS DATOS DEL FORM
        $form->handleRequest($request);
        
        
        //COMPROBAR SI EL FORM SE HA ENVIDO Y ES VALIDO
        if ($form->isSubmitted() && $form->isValid()) {
            
            //GUARDAR USUARIO
           
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($producto);
            $entityManager->flush();

            //SESION FLASH

            $session = new Session();

            $session->getFlashBag()->add('message', 'Producto registrado');

            return $this->redirectToRoute('menu');
        }
        
        
        
        
        
        
        return $this->render('producto/index.html.twig', [
             'form' => $form->createView()
        ]);
        
        
    }
    
    
    
    
    
}
