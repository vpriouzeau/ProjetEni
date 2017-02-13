<?php

namespace EniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionTirage
 *
 * @ORM\Table(name="question_tirage")
 * @ORM\Entity(repositoryClass="EniBundle\Repository\QuestionTirageRepository")
 */
class QuestionTirage
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
     * @ORM\ManyToOne(targetEntity="Inscription")
     * 
     */
    private $inscription;
    
    /**
     * @ORM\ManyToOne(targetEntity="Question")
     * 
     */
    private $question;
    
    /**
     * @ORM\OneToMany(targetEntity="ReponseDonnee", mappedBy="question_tirage")
     * 
     */
    private $ReponseDonnee;
    
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
     * @return QuestionTirage
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

