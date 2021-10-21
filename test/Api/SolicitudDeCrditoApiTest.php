<?php

namespace CdcExpediente\Client;


use \GuzzleHttp\Client;
use \GuzzleHttp\HandlerStack as handlerStack;

use Signer\Manager\ApiException;
use Signer\Manager\Interceptor\MiddlewareEvents;
use Signer\Manager\Interceptor\KeyHandler;

use \CdcExpediente\Client\Configuration;
use \CdcExpediente\Client\ObjectSerializer;

use \CdcExpediente\Client\Model\RequestExportProceedings;


use \CdcExpediente\Client\Api\SolicitudDeCrditoApi as Instance;


class SolicitudDeCrditoApiTest extends \PHPUnit_Framework_TestCase
{
    

    public function setUp()
    {
        $password = getenv('KEY_PASSWORD');
        $this->signer = new KeyHandler(null, null, $password);

        $events = new MiddlewareEvents($this->signer);
        $handler = handlerStack::create();
        $handler->push($events->add_signature_header('x-signature'));   
        $handler->push($events->verify_signature_header('x-signature'));
        $client = new Client(['handler' => $handler]);

        $config = new Configuration();
        $config->setHost('the_url');
        $this->apiInstance = new Instance($client, $config);
        $this->x_api_key = "your_api_key";
        $this->usernameCDC = "your_username";
        $this->passwordCDC = "your_password";  
        
    }

    public function testGetReporte()
    {
        try {

            $body = new RequestExportProceedings();
        
            $body->setFolio(12345);

            $result = $this->apiInstance->exportarExpedienteFolioUsingPOST($this->x_api_key, $this->usernameCDC, $this->passwordCDC, $body);
            print_r($result);
        } catch (ApiException | Exception $e) {
            echo 'Exception when calling ApiTest->testGetReporte: ', $e->getMessage(), PHP_EOL;
        }        
    }
}
