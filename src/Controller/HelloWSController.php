<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 11/04/19
 * Time: 12:21
 */
namespace App\Controller;

use App\Service\SoapProduct;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Zend\Soap\AutoDiscover;
use Symfony\Component\Routing\Annotation\Route;

class HelloWSController extends AbstractController
{

    /**
     * @Route("/ProductWS")
     */
    public function helloWSAction()
    {
        $soapServer = new \SoapServer('../ProductWS.wsdl');
        $soapServer->setObject(new SoapProduct());

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $soapServer->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }

}