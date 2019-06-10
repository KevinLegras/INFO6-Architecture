<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 11/04/19
 * Time: 12:21
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Zend\Soap\AutoDiscover;
use App\Service\SoapProduct;
use Symfony\Component\Routing\Annotation\Route;


class HelloWSGenController extends AbstractController
{

    /**
     * @Route("/ProductWSGen")
     */
    public function HelloWSGenAction()
    {
        $autodiscover = new AutoDiscover();
        $autodiscover->setClass('App\Service\SoapProduct')
            ->setUri('http://localhost:8000/ProductWS');
        header('Content-Type: application/wsdl+xml');
        $wsdl=$autodiscover->generate();
        $wsdl->dump("/home/kevin/Documents/MI6-ArchitectureWeb/structures-apip/ProductWS.wsdl");
        return new Response($wsdl->toXml());
    }

}