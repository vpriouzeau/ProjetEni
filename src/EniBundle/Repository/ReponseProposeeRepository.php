<?php

namespace EniBundle\Repository;

/**
 * ReponseProposeeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReponseProposeeRepository extends \Doctrine\ORM\EntityRepository
{
    public function getReponse($id){
        
        $dql = 'SELECT r FROM EniBundle:ReponseProposee r WHERE r.question ='.$id;
        
        // creation de la query 
        $query = $this->getEntityManager()->createQuery($dql);
        
        //on retourne l'execution de la query
        return $query->getResult();
    }
    
}