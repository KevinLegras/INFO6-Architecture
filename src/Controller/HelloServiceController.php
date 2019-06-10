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
    use Symfony\Component\Routing\Annotation\Route;
    use App\WS\HelloService;

class HelloServiceController extends AbstractController
{

    /**
     * @Route("/soap")
     */
    public function index()
    {
        $soapServer = new \SoapServer('../hello.wsdl');
        $soapServer->setObject(new HelloService());

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $soapServer->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }

}