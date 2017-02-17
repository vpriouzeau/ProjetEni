<?php

namespace EniBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function viewAction()
    {
        
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('EniBundle:Inscription');
            $userManager = $this->container->get('fos_user.user_manager');
            $user = $userManager->findUserByUsername($this->container->get('security.context')
                    ->getToken()
                    ->getUser());
            $inscriptions = $repository -> getInscription($user->getId());          
            return $this->render('EniBundle::candidat.html.twig',array('inscriptions'=>$inscriptions));
    }
    
    public function confirmTestAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('EniBundle:Test');
            $test = $repository->find($id);
                    
            return $this->render('EniBundle::confirmtest.html.twig',array('test'=>$test));
    }
    
}
