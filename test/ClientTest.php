<?php

namespace Khannedy\BelajarPhpPsr;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testClient()
    {
        $url = 'https://en9gffz0ngqjd.x.pipedream.net';

        $stream = Utils::streamFor(json_encode([
            'username' => 'admin',
            'password' => 'admin'
        ]));

        $request = new Request(
            method: 'POST',
            uri: $url,
            headers: [
                'Content-Type' => 'application/json'
            ],
            body: $stream
        );

        $client = new Client();
        $response = $client->sendRequest($request);

        self::assertNotNull($response);
        self::assertEquals(200, $response->getStatusCode());
    }

}
