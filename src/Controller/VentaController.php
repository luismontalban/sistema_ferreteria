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

class VentaController extends AbstractController {

    /**
     * @Route("/venta", name="venta")
     */
    public function index(): Response {
        return $this->render('venta/index.html.twig', [
                    'controller_name' => 'VentaController',
        ]);
    }

    public function creationventa(Request $request, $id, UserInterface $user) {


        $venta = new Venta();

        $form = $this->createForm(VentaType::class, $venta);


        //RELLENAR EL OBJETO CON LOS DATOS DEL FORM
        $form->handleRequest($request);


        //COMPROBAR SI EL FORM SE HA ENVIDO Y ES VALIDO
        if ($form->isSubmitted() && $form->isValid()) {



            //GUARDAR USUARIO

            $entityManager = $this->getDoctrine()->getManager();


            $producto = $entityManager
                    ->getRepository(Producto::class)
                    ->find($id);


            $venta->setUsuario($user);
            $venta->addProducto($producto);
            
            $venta->getCantidad();
            $producto->getStock();
            
            $stock = $producto;
            
            $cant= $venta;
            
            
            $desc = $stock-$cant;
            $producto->setStock($desc);
           
            
            




            $entityManager->persist($venta);
            $entityManager->flush();

            //SESION FLASH

            $session = new Session();

            $session->getFlashBag()->add('message', 'Venta registrada');

            return $this->redirectToRoute('venta');
        }

        return $this->render('venta/index.html.twig', [
                    'form' => $form->createView()
        ]);
    }

}
