<?php

namespace EniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StaffEni
 *
 * @ORM\Table(name="staff_eni")
 * @ORM\Entity(repositoryClass="EniBundle\Repository\StaffEniRepository")
 */
class StaffEni extends Utilisateur
{
    /**
     * @ORM\OneToMany(targetEntity="Inscription", mappedBy="staff_eni")
     * 
     */
    private $inscription;
    
    /**
     * @ORM\OneToMany(targetEntity="Test", mappedBy="staff_eni")
     * 
     */
    private $test;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

