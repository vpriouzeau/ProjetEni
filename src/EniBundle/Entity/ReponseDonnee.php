<?php

namespace EniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReponseDonnee
 *
 * @ORM\Table(name="reponse_donnee")
 * @ORM\Entity(repositoryClass="EniBundle\Repository\ReponseDonneeRepository")
 */
class ReponseDonnee
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

