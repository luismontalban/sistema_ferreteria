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
    
     public function creationventa(UserInterface $user) {

      
     $venta = new Venta();    
     $pro = new Producto();    
         
         
            
        



     }





       
    
    
    
    
    
    
    
    
    
    
}
