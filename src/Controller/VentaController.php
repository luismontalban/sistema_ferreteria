<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Producto;
use App\Entity\Usuario;
use App\Entity\Venta;
use App\Form\VentaType;

class VentaController extends AbstractController
{
    /**
     * @Route("/venta", name="venta")
     */
    public function index(): Response
    {
        return $this->render('venta/index.html.twig', [
            'controller_name' => 'VentaController',
        ]);
    }
    
     public function creationventa(Request $request, UserInterface $user) {

        $venta = new Venta();

        $form = $this->createForm(VentaType::class, $venta);
        $form->handleRequest($request);


        //COMPROBAR SI EL FORM SE HA ENVIDO Y ES VALIDO
        if ($form->isSubmitted() && $form->isValid()) {

//            $task->setCreatedAt(new \DateTime('now'));
            $venta->setUsuario($user);


            //GUARDAR USUARIO

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($venta);
            $entityManager->flush();

            //SESION FLASH

            $session = new Session();

            $session->getFlashBag()->add('message', 'Venta registrada');

            return $this->redirectToRoute('menu');

            
        }









        return $this->render('venta/index.html.twig', [
                    'form' => $form->createView()
        ]);
    }
    
    
    
    
}
