<?php

namespace EniBundle\Controller;

use EniBundle\Entity\QuestionTirage;
use EniBundle\Entity\ReponseDonnee;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{
    public function initTestAction($id,$numQuestion, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //on recup l'entité Test
        $testrep = $em->getRepository('EniBundle:Test');
        $test = $testrep->find($id);
        
        //on recup les Sections de ce test
        $sectionrep = $em->getRepository('EniBundle:SectionTest');
        $sectionsTest = $sectionrep->findBy(array('test' => $id));
        
        //calcul du nombre de questions total
        $nbrquestion=0;
        for ($i=0 ; $i<count($sectionsTest) ; $i++ ){
            $nbrquestion += $sectionsTest[$i]->getNbQuestionsATirer();
        }

        //on recup les questions de maniere aléatoire            
        $questionrep = $em->getRepository('EniBundle:Question');

        for ( $i = 0; $i<count($sectionsTest) ; $i++ ){
            $questions = $questionrep->getQuestion($sectionsTest[$i]->getTheme()->getId(),$sectionsTest[$i]->getNbQuestionsATirer());
            for ($j = 0 ; $j<count($questions) ; $j++){
                $qt = new QuestionTirage();
                $qt->setQuestion($questions[$j]);
                $qt->setEstMarquee(false);
                //$qt->setInscription($test->inscription);
                
                $em->persist($qt);
                $em->flush();  
            }                
        }
        
//            $questionrep = $em->getRepository('EniBundle:Question');
//            for ( $i = 0; $i<count($sectionsTest) ; $i++ ){
//                $questions = $questionrep->findBy(array('theme' => $sectionsTest[$i]->getTheme()),null,$sectionsTest[$i]->getNbQuestionsATirer());
//                
//            }  // ça ça fonctionne , mais pas en random.
        
        return $this->passerTestAction($id, $numQuestion, $request, $test, $nbrquestion);
    }
    
    public function passerTestAction($id,$numQuestion, Request $request, $test, $nbrquestion)
    {
        
        $em = $this->getDoctrine()->getManager();
        
        //on recup toutes les questions de question tirage
        $questiontrep = $em->getRepository('EniBundle:QuestionTirage');
        $questionst = $questiontrep->findAll();
        
        for ($i=0; $i<count($questionst) ; $i++){                                                 // pirouette pour recup les questions à partir de question tirage
            $tab[$i] = $questionst[$i]->getQuestion()->getId();                                   // on parcourt les questionTirage et on enregistre leurs Id qu'on colle dans un tableau 
        }
        $questionrep = $em->getRepository('EniBundle:Question');
        $questions = $questionrep->findBy(array('id'=>$tab));                                     // ça permet de faire 1 findBy pour rechopper les questions.

        $test->setInit(1);
        $em->persist($test);
        $em->flush();

        $question =  $questions[$numQuestion];

        //on recup les propositions de réponses liées aux questions tirées
        $reponserep = $em->getRepository('EniBundle:ReponseProposee');
        $reponses = $reponserep->findBy(array('question'=>$question));


        $reponseDonnee = new ReponseDonnee();

        $builder = $this-> createFormBuilder($reponseDonnee);
//        for ($i=0; $i<count($reponses) ; $i++){
//            $builder->add($i, CheckboxType::class, array('label' => $reponses[$i]->getEnonce()));
//        }
        $builder->add('Valider', 'submit');
        $form = $builder->getForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $reponseDonnee->setQuestionTirage($questionst);
            $reponseDonnee->setReponseProposee($reponses);
            $em->persist($reponseDonnee);
            $em->flush();            
        }



        return $this->render('EniBundle::test.html.twig',array('test'=>$test , 'question' => $question,'reponses' => $reponses, 'form' => $form->createView(), 'numQuestion' => $numQuestion, 'nbrquestion' => $nbrquestion ));
    }
}