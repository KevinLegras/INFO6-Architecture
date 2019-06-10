<?php

namespace App\Repository;

/**
 * SecteurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OrderLineRepository extends \Doctrine\ORM\EntityRepository
{
    public function getLastArticleOnCommand(){
        /*return $this->_em->createQueryBuilder()
            ->select('a, Count(l.article)*l.quantite as nbCmd')
            ->from('mi03VitrineBundle:LigneCommande', 'l')
            ->join('mi03VitrineBundle:Article', 'a')
            ->where('a.id = l.article')
            ->groupBy('a')
            ->orderBy('nbCmd', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();*/

        $articles= $this->getDoctrine()
            ->getRepository('mi06VitrineBundle:OrdersLine')
            ->findBy(array(),array('product' => 'desc'),4);
        return $articles;
    }

}
