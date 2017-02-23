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
            if($user==null){
                return $this->redirect('/ProjetEni/web/app_dev.php/login');
            }
            $inscriptions = $repository -> getInscription($user->getId());
            $roles=$user->getRoles();
            for($i=0; $i<count($roles); $i++)
            {
                if($roles[$i]=='ROLE_ADMIN' || $roles[$i]=='ROLE_SUPER_ADMIN'){
                    return $this->redirect($this->generateUrl('accueilstaff_route'));
                }
                else{
                    return $this->render('EniBundle::candidat.html.twig',array('inscriptions'=>$inscriptions));
                }
            }
            
           
    }
    
    public function confirmTestAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('EniBundle:Test');
            $test = $repository->find($id);
                    
            return $this->render('EniBundle::confirmtest.html.twig',array('test'=>$test));
    }
    
}
