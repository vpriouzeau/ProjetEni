<?php

namespace EniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test")
 * @ORM\Entity(repositoryClass="EniBundle\Repository\TestRepository")
 */
class Test
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;

    /**
     * @var int
     *
     * @ORM\Column(name="seuil", type="integer")
     */
    private $seuil;
    
    /**
     * @var int
     *
     * @ORM\Column(name="init", type="integer")
     */
    private $init;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * 
     */
    private $utilisateur;
    
    /**
     * @ORM\OneToMany(targetEntity="Inscription", mappedBy="test")
     * 
     */
    private $inscription;
    
    /**
     * @ORM\OneToMany(targetEntity="SectionTest", mappedBy="test")
     * 
     */
    private $sectionTest;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Test
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Test
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     *
     * @return Test
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return int
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set seuil
     *
     * @param integer $seuil
     *
     * @return Test
     */
    public function setSeuil($seuil)
    {
        $this->seuil = $seuil;

        return $this;
    }
    function getInit() {
        return $this->init;
    }

    function setInit($init) {
        $this->init = $init;
    }
    
    public function getUtilisateur() {
        return $this->utilisateur;
    }

    public function getInscription() {
        return $this->inscription;
    }

    public function getSectionTest() {
        return $this->sectionTest;
    }

    public function setUtilisateur($utilisateur) {
        $this->utilisateur = $utilisateur;
        return $this;
    }

    public function setInscription($inscription) {
        $this->inscription = $inscription;
        return $this;
    }

    public function setSectionTest($sectionTest) {
        $this->sectionTest = $sectionTest;
        return $this;
    }

    
    
    /**
     * Get seuil
     *
     * @return int
     */
    public function getSeuil()
    {
        return $this->seuil;
    }
}

