<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\Usuario;
use App\Form\RegisterType;

class UsuarioController extends AbstractController
{
    /**
     * @Route("/usuario", name="usuario")
     */
    
  
    
    public function login(AuthenticationUtils $authenticationUtils) {
        
         $error = $authenticationUtils->getLastAuthenticationError();
         $lastUsername = $authenticationUtils->getLastUsername();
         
         
         
          return $this->render('usuario/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
         
         
    }
    
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        
        //CREAR FORMULARIO
        $usuario = new Usuario();
        
        $form = $this->createForm(RegisterType::class, $usuario);
        
        //RELLENAR EL OBJETO CON LOS DATOS DEL FORM
        $form->handleRequest($request);
        
        
        //COMPROBAR SI EL FORM SE HA ENVIDO Y ES VALIDO
        if ($form->isSubmitted() && $form->isValid()) {

            
            
            
            
//            //MODIFICANDO EL OBJETO PARA GUARDARLO
//            $user->setRole('ROLE_USER');
//           
//            $user->setCreatedAt(new \DateTime('now'));
            
            //CIFRANDO LA CONTRASEÑA
            $encoded = $encoder->encodePassword($usuario, $usuario->getPassword());
            $usuario->setPassword($encoded);

            
            //GUARDAR USUARIO
           
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usuario);
            $entityManager->flush();

            //SESION FLASH

            $session = new Session();

            $session->getFlashBag()->add('message', 'Usuario Registrado');

            return $this->redirectToRoute('registro');
        }
        
        return $this->render('usuario/registro.html.twig',[
            'form' => $form->createView()
        ]);
    }
    
    
    
    
    
    
}
