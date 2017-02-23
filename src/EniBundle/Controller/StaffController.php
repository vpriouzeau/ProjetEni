<?php

namespace EniBundle\Controller;

use Doctrine\ORM\EntityRepository;
use EniBundle\Entity\Question;
use EniBundle\Entity\Test;
use EniBundle\Entity\Theme;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;


class StaffController extends Controller
{
    public function viewAction(Request $id){
        
        return $this->render('EniBundle:Staff:staff.html.twig');
    }
    public function viewTestAction(){
        $test= new Test();
        $theme = new Theme();
        $formTest = $this->getFormTest($test);
        /*$formTheme = $this->getFormTheme($test);*/
        
        $args = array('formTest' => $formTest->createView()/*, 'formTheme' => $formTheme->createView()*/);
        return $this->render('EniBundle:Staff:staff_test.html.twig', $args);
    }
    
    public function getFormTest($test){
        $builder = $this->createFormBuilder();
        $testOptions = array(
            'label' => 'Test',
            'class' => 'EniBundle:Test',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('t');
            },
            'property' => 'libelle',
            'constraints' => array(new NotBlank)
        );
        $builder->add('test', 'entity', $testOptions);
        $builder->add('libelle', 'text');
        $testOptions = array('label' => 'Seuil réussite', 'constraints' => array(new NotBlank, new Assert\Range(array('min'=> 0,'max'=> 100))));
        $builder->add('Reussite','integer', $testOptions);
        $testOptions = array('label' => 'Temps de passage', 'constraints' => array(new NotBlank, new Assert\Range(array('min'=> 10,'max'=> 3600))));
        $builder->add('temps','integer', $testOptions);
        $testOptions = array('label' => 'Validité');
        $builder->add('date','date', $testOptions);
        $testThemeOptions = array(
            'label' => 'Theme',
            'class' => 'EniBundle:Theme',
            'query_builder' => function(EntityRepository $er2) {
                return $er2->createQueryBuilder('th');
            },
            'property' => 'libelle',
            'constraints' => array(new NotBlank)
        );
        $builder->add('theme', 'entity', $testThemeOptions);
        $testOptions = array('label' => '+', 'attr' => array('onClick' => 'addForm();'));
        $builder->add('addTheme','button', $testOptions);
        $testOptions = array('label' => 'nbQuestion', 'constraints' => array(new NotBlank, new Assert\Range(array('min'=> 1))));
        $builder->add('nbQuestion','integer', $testOptions);
        $builder->add('valider','submit');
        
        $form = $builder->getForm();
        return $form;
    }
   /* public function getFormTheme($theme){
        $builder = $this->createFormBuilder();
        $testOptions = array('label' => 'addTheme', 'attr' => array('onClick' => 'addForm();'));
        $builder->add('addTheme','button', $testOptions);
        $form = $builder->getForm();
        return $form;
    }*/
    
    public function viewQuestionAction(Request $id){
        $question= new Question();
        $question = new Question();
        $formQuestion = $this->getFormQuestion($question);
        /*$formTheme = $this->getFormTheme($test);*/
        
        $args = array('formQuestion' => $formQuestion->createView());
        return $this->render('EniBundle:Staff:staff_question.html.twig', $args);
    }
    
    public function getFormQuestion($question){
        $builder = $this->createFormBuilder();
        $testThemeOptions = array(
            'label' => 'Theme : ',
            'class' => 'EniBundle:Theme',
            'query_builder' => function(EntityRepository $er2) {
                return $er2->createQueryBuilder('th');
            },
            'property' => 'libelle',
            'constraints' => array(new NotBlank)
        );
        $builder->add('theme', 'entity', $testThemeOptions);
        $testOptions = array(
            'label' => 'Question : ',
            'class' => 'EniBundle:Question',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('q');
            },
            'property' => 'enonce',
            'constraints' => array(new NotBlank)
        );
        $builder->add('question', 'entity', $testOptions);
        $testOptions = array('label' => '+', 'attr' => array('onClick' => 'addQuestion();'));
        $builder->add('addQuestion','button', $testOptions);
        
        $builder->add('valider', 'submit');
        
        $form = $builder->getForm();
        return $form;
    }
}
