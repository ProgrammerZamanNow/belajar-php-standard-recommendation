<?php

require_once __DIR__ . '/../vendor/autoload.php';

$factory = new \Nyholm\Psr7\Factory\Psr17Factory();
$creator = new \Nyholm\Psr7Server\ServerRequestCreator($factory, $factory, $factory, $factory);

$request = $creator->fromGlobals();
$query = $request->getQueryParams();

$name = $query['name'];

$response = new \Nyholm\Psr7\Response(
    status: 200,
    headers: [
        'Content-Type' => 'application/json'
    ],
    body: $factory->createStream(json_encode([
        'data' => 'Hello ' . $name
    ]))
);

$emitter = new \Laminas\HttpHandlerRunner\Emitter\SapiEmitter();
$emitter->emit($response);
