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
     * @ORM\ManyToOne(targetEntity="QuestionTirage")
     * 
     */
    private $questionTirage;
    
    /**
     * @ORM\ManyToOne(targetEntity="ReponseProposee")
     * 
     */
    private $reponseProposee;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function getQuestionTirage() {
        return $this->questionTirage;
    }

    public function getReponseProposee() {
        return $this->reponseProposee;
    }

    public function setQuestionTirage($questionTirage) {
        $this->questionTirage = $questionTirage;
        return $this;
    }

    public function setReponseProposee($reponseProposee) {
        $this->reponseProposee = $reponseProposee;
        return $this;
    }
}