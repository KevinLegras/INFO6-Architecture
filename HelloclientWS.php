<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 29/04/19
 * Time: 16:08
 */

/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 29/04/19
 * Time: 15:56
 */

$soapclient = new \SoapClient('http://localhost:8000/ProductWS?wsdl');

$result = $soapclient->__soapCall('LastProduct',$_POST['id']);

?>