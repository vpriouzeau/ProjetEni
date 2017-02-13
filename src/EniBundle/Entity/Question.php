<?php

namespace EniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="EniBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="enonce", type="text")
     */
    private $enonce;

    /**
     * @var string
     *
     * @ORM\Column(name="media", type="string", length=255)
     */
    private $media;
    
    /**
     * @ORM\OneToMany(targetEntity="QuestionTirage", mappedBy="question")
     * 
     */
    private $questionTirage;
    
    /**
     * @ORM\OneToMany(targetEntity="ReponseProposee", mappedBy="question")
     * 
     */
    private $ReponseProposee;
    
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
     * Set enonce
     *
     * @param string $enonce
     *
     * @return Question
     */
    public function setEnonce($enonce)
    {
        $this->enonce = $enonce;

        return $this;
    }

    /**
     * Get enonce
     *
     * @return string
     */
    public function getEnonce()
    {
        return $this->enonce;
    }

    /**
     * Set media
     *
     * @param string $media
     *
     * @return Question
     */
    public function setMedia($media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return string
     */
    public function getMedia()
    {
        return $this->media;
    }
}

