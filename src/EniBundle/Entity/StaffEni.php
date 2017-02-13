<?php

namespace EniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StaffEni
 *
 * @ORM\Table(name="staff_eni")
 * @ORM\Entity(repositoryClass="EniBundle\Repository\StaffEniRepository")
 */
class StaffEni
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

