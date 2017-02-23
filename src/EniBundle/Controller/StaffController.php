<?php

namespace EniBundle\Controller;

use Doctrine\ORM\EntityRepository;
use EniBundle\Entity\Question;
use EniBundle\Entity\Theme;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\NotBlank;

class StaffController extends Controller
{
    
    public function addquestionAction(){
        
        $theme = new Theme();
        $buildertheme = $this->createFormBuilder($theme);
        $themeOptions = array('label' => 'Thèmes',
                              'class' => 'EniBundle:Theme',
                              'query_builder' => function(EntityRepository $er) {
                                return $er->createQueryBuilder('t');                                
                              },
                              'property' => 'libelle',                                              
                              'constraints' => array(new NotBlank)
                            );
        $buildertheme->add('id', 'entity', $themeOptions);
        $formtheme = $buildertheme->getForm();
        
        $question = new Question();
        $builderquestion = $this->createFormBuilder($question);
        $questionOptions = array('label' => 'Questions',
                              'class' => 'EniBundle:Question',
                              'query_builder' => function(EntityRepository $er) {
                                return $er->createQueryBuilder('q');                                
                              },
                              'property' => 'enonce',                                              
                              'constraints' => array(new NotBlank)
                            );
        $builderquestion->add('id', 'entity', $questionOptions);
        $formquestion = $builderquestion->getForm(); 
        
        
        $args = array('form1' => $formtheme->createView(),'form2' => $formquestion->createView());
        return $this->render('EniBundle:Staff:questionview.html.twig', $args);
    }
    
    
    public function themeviewAction()
    {
        $theme = new Theme();
        
        $builder1 = $this->createFormBuilder($theme);                                               // le 1er formulaire pour afficher les theme existants
        $builder2 = $this->createFormBuilder($theme);
        
        $themeOptions = array('label' => 'Thèmes',
                              'class' => 'EniBundle:Theme',
                              'query_builder' => function(EntityRepository $er) {
                                return $er->createQueryBuilder('t');                                // t est un alias de la classe Theme
                              },
                              'property' => 'libelle',                                              // il faut avoir prevu ici une fonction getLibelle() dans la class Theme
                              'constraints' => array(new NotBlank)
                            );
        $builder1->add('id', 'entity', $themeOptions);
        
        $libelleOptions = array('label' => 'Nouveau thème', 'constraints' => array(new NotBlank));  // le 2 eme pour saisir un nouveau theme
        $builder2->add('libelle', 'text', $libelleOptions);
        $submitOptions = array('label' => 'Enregistrer');
        $builder2->add('validate', 'submit', $submitOptions);

        // Get form object
        $form1 = $builder1->getForm();
        $form2 = $builder2->getForm();
        
        $form2->handleRequest($this->get('request'));
        
        if ($form2->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $themerep = $em->getRepository('EniBundle:Theme');
            $themes = $themerep->findAll();
            $newlibelle = $form2->get('libelle')->getData();
            $existant=0;
            for ($i=0;$i<count($themes);$i++){                                      //on verifie que le theme saisie n'existe pas deja en base.
                if($themes[$i]->getLibelle() == $newlibelle) {
                    $existant++;
                }
            }
            if($existant>0){
                echo "Cette categorie existe deja!";
            }
            else{
                $theme->setLibelle($newlibelle);
                $em->persist($theme);
                $em->flush();
            }
        }
        $args = array('form1' => $form1->createView(),'form2' => $form2->createView());
        return $this->render('EniBundle:Staff:themeview.html.twig', $args);
    }

}