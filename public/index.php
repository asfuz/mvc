<?php

use Asfuz\Mvc\App;

require __DIR__ . '/../vendor/autoload.php';

$app = new App();

//include_once __DIR__ . '/routes.php';


$app->router->get('/', 'home');

$app->run();