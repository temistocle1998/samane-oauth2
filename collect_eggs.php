<?php
// collect_eggs.php
include __DIR__.'/vendor/autoload.php';
use GuzzleHttp\Client;

// create our http client (Guzzle)
$http = new Client('http://localhost:8000', array(
    'request.options' => array(
        'exceptions' => false,
    )
));

$request = $http->post('/token');
$response = $request->send();
echo $response->getBody();

echo "\n\n";
