<?php

namespace EniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="EniBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

         /**
     * @ORM\ManyToOne(targetEntity="Promotion")
     * 
     */
    private $promotion;
    
     /**
     * @ORM\OneToMany(targetEntity="Inscription", mappedBy="utilisateur")
     * 
     */
    private $inscription;
    
     /**
     * @ORM\OneToMany(targetEntity="Test", mappedBy="utilisateur")
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
    
    function __construct() {
        parent::__construct();
    }

}

