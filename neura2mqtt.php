<?php
// php headless browser to parse NeuraWaermepumpen with WebDialog System
// this script was written by Mario Wehr and adapted by Ingmar Bihlo
// its purpose is to parse the webserver of the heatpump to send status
// data via mqtt topics to a mqtt broker
// first release February 2023

require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/config.php';
include_once __DIR__ . '/user.php';

use Gt\Dom\Facade\HTMLDocumentFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use PhpMqtt\Client\MqttClient;


$HTTPClient = new Client(['cookies' => true]); // guzzl wusl
$MQQTClient = new MqttClient($mqttIpdaddress, $mqttPort, 'neura');

// Login
$creds = [
    'form_params' => [
        'USER' => $neuraUser,
        'PASSWORD' => $neuraPass,
        'loginButton' => 'LOGIN'
    ],
    'cookies' => new CookieJar(),
    'allow_redirects' => true
];

try{
    $HTTPClient->request('GET',"http://$ipaddressNeura/neura/mobile/jsp/login.jsp",);
    $response = $HTTPClient->post("http://$ipaddressNeura/neura/mobile/jsp/mainmenu.jsp", $creds);
    $html = $response->getBody()->getContents();
    $html = str_replace('windows-1252','UTF-8',$html);
    $menuDOM = HTMLDocumentFactory::create($html);
    $sessionNodeList = $menuDOM->evaluate("//*[@name='" . 'SESSIONID' . "']");
    $MQQTClient->connect();
    if($sessionNodeList->current() == null){
        $MQQTClient->publish('Neura/loginStatus', 0, MqttClient::QOS_AT_MOST_ONCE);
        die();
    }else{
        $MQQTClient->publish('Neura/loginStatus', 1, MqttClient::QOS_AT_MOST_ONCE);
    }

    $sessionId = $sessionNodeList->current()->getAttribute('value');

    // loop over pages
    foreach ($dataPages as &$page){
        // get page session id
        
        $options = [
            'form_params' => [
                'SESSIONID' => $sessionId
                ]
            ];
        $response =  $HTTPClient->post( $page['url'], $options);
        $html =  $response->getBody()->getContents();
        

        //$html = str_replace('windows-1252','UTF-8',$html);
        $document = HTMLDocumentFactory::create($html);
        // loop over page data items
        foreach ($page['dataItems'] as &$dataItem){
            // search via xpath for tag with id
            $result = $document->evaluate("//*[@id='" . $dataItem['tagId'] . "']");
            $itemValue = $result->current()->attributes['value']->value;
            // process value attribute
            switch ($dataItem['type']){
                case 'float':
                    $value = floatval(str_replace("°C", "", $itemValue));
                    break;
                case 'bool';
                    $value = ($itemValue == 'ON')?1:0;
                    breaK;
            }
            // MQTT publish
            $MQQTClient->connect();
            $MQQTClient->publish($dataItem['mqttTopic'], $value, MqttClient::QOS_AT_MOST_ONCE);
            $MQQTClient->disconnect();
        }
    }
}catch(Exception $ex){
    $test=1;
}
