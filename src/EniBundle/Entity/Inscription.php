<?php

namespace EniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription")
 * @ORM\Entity(repositoryClass="EniBundle\Repository\InscriptionRepository")
 */
class Inscription
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
     * @var \DateTime
     *
     * @ORM\Column(name="dureeValidite", type="datetime")
     */
    private $dureeValidite;

    /**
     * @var int
     *
     * @ORM\Column(name="tempsEcoule", type="integer")
     */
    private $tempsEcoule;

    /**
     * @var int
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;

    /**
     * @var int
     *
     * @ORM\Column(name="resultatObtenu", type="integer")
     */
    private $resultatObtenu;
    
     /**
     * @ORM\OneToMany(targetEntity="QuestionTirage", mappedBy="inscription")
     * 
     */
    private $questionTirage;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * 
     */
    private $utilisateur;
            
    /**
     * @ORM\ManyToOne(targetEntity="Test")
     * 
     */
    private $test;


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
     * Set dureeValidite
     *
     * @param \DateTime $dureeValidite
     *
     * @return Inscription
     */
    public function setDureeValidite($dureeValidite)
    {
        $this->dureeValidite = $dureeValidite;

        return $this;
    }

    /**
     * Get dureeValidite
     *
     * @return \DateTime
     */
    public function getDureeValidite()
    {
        return $this->dureeValidite;
    }

    /**
     * Set tempsEcoule
     *
     * @param integer $tempsEcoule
     *
     * @return Inscription
     */
    public function setTempsEcoule($tempsEcoule)
    {
        $this->tempsEcoule = $tempsEcoule;

        return $this;
    }

    /**
     * Get tempsEcoule
     *
     * @return int
     */
    public function getTempsEcoule()
    {
        return $this->tempsEcoule;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return Inscription
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return int
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set resultatObtenu
     *
     * @param integer $resultatObtenu
     *
     * @return Inscription
     */
    public function setResultatObtenu($resultatObtenu)
    {
        $this->resultatObtenu = $resultatObtenu;

        return $this;
    }

    /**
     * Get resultatObtenu
     *
     * @return int
     */
    public function getResultatObtenu()
    {
        return $this->resultatObtenu;
    }
    
    function getTest() {
        return $this->test;
    }


}

