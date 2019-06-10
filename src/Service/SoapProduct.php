<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 10/06/19
 * Time: 23:32
 */

namespace App\Service;


class SoapProduct
{

    private $entityManagerFactory;

    public function __construct(EntityManager $entityManagerFactory){
        $this->entityManagerFactory = $entityManagerFactory;
    }

    public function LastProduct(){
        $articlesList = array();
        $indice = 0;
        foreach ($this->entityManagerFactory
                     ->getRepository('mi03VitrineBundle:OrderLineRepository')
                     ->getLastArticleOnCommand()
                 as $product) {
            $articlesList[$indice]['id'] = $product[0]->getId();
            $indice++;
        }
        return $articlesList;
    }

}