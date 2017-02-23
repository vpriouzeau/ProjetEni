<?php

namespace EniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SectionTest
 *
 * @ORM\Table(name="section_test")
 * @ORM\Entity(repositoryClass="EniBundle\Repository\SectionTestRepository")
 */
class SectionTest
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="nbQuestionsATirer", type="integer")
     */
    private $nbQuestionsATirer;
    
    /**
     * @ORM\ManyToOne(targetEntity="Test")
     * 
     */
    private $test;
    
    /**
     * @ORM\ManyToOne(targetEntity="Theme")
     * 
     */
    private $theme;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nbQuestionsATirer
     *
     * @param integer $nbQuestionsATirer
     *
     * @return SectionTest
     */
    public function setNbQuestionsATirer($nbQuestionsATirer)
    {
        $this->nbQuestionsATirer = $nbQuestionsATirer;

        return $this;
    }
    function getTheme() {
        return $this->theme;
    }

     /**
     * Get nbQuestionsATirer
     *
     * @return int
     */
    public function getNbQuestionsATirer()
    {
        return $this->nbQuestionsATirer;
    }
}

