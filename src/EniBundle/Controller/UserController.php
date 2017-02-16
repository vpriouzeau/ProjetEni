<?php

namespace EniBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function viewAction()
    {
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('EniBundle:Inscription');
            $inscriptions = $repository -> getInscription();
                        
            return $this->render('EniBundle::candidat.html.twig',array('inscriptions'=>$inscriptions));
        
    }
        
        
        
        
        
//        // Get current post to display
//        $em = $this->getDoctrine()->getManager();
//        $rep = $em->getRepository('EniBundle:Inscription');
//        $this->post = $rep->findBy($id);
//
//        // Get form to add comment
//        $formComment = $this->getFormComment();
//        if ($formComment->isValid())
//        {
//            $this->createComment($formComment, $this->post);
//            $formComment = $this->getFormComment();
//        }
//
//        $args = array(
//            'post' => $this->post,
//            'formComment' => $formComment->createView(),
//            'confirm' => $this->confirm,
//        );
//        return $this->render('BlogFrontBundle:Post:view.html.twig', $args);
}
