<?php

namespace HMS\Tests;

use HMS\Proxy;
use Middlewares\Utils\Factory;

class ProxyTest extends \PHPUnit_Framework_TestCase
{
    public function testProxy()
    {
        $request = Factory::createServerRequest([], 'GET', 'http://example.com/middlewares/psr15-middlewares');
        $target = Factory::createUri('https://github.com');

        $proxy = new Proxy($target);
        $response = $proxy($request);

        $html = (string) $response->getBody();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotFalse(stripos($html, 'middlewares/psr15-middlewares'));
    }
}
