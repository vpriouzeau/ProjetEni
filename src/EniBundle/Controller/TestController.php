<?php

namespace EniBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller
{
    public function passerTestAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $testrep = $em->getRepository('EniBundle:Test');
            $test = $testrep->find($id);
            
            
            
            return $this->render('EniBundle::test.html.twig',array('test'=>$test));
    }
}
