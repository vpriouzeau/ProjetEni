<?php

namespace EniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QestionTirage
 *
 * @ORM\Table(name="qestion_tirage")
 * @ORM\Entity(repositoryClass="EniBundle\Repository\QestionTirageRepository")
 */
class QestionTirage
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
     * @var bool
     *
     * @ORM\Column(name="estMarquee", type="boolean")
     */
    private $estMarquee;


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
     * Set estMarquee
     *
     * @param boolean $estMarquee
     *
     * @return QestionTirage
     */
    public function setEstMarquee($estMarquee)
    {
        $this->estMarquee = $estMarquee;

        return $this;
    }

    /**
     * Get estMarquee
     *
     * @return bool
     */
    public function getEstMarquee()
    {
        return $this->estMarquee;
    }
}

