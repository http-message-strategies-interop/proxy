<?php

use HMS\Proxy;
use Zend\Diactoros\Uri;

require 'vendor/autoload.php';

$app = new \Slim\App;
$app->any('/{_:.*}', new Proxy(new Uri('http://httpbin.org')));
$app->run();
