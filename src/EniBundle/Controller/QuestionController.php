<?php

namespace EniBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QuestionController extends Controller
{
    public function addQuestionAction(){
        return $this->render('EniBundle:Staff:question.html.twig', $args);
    }
}
