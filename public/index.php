<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new App\Container(
    new App\Controller()
);

echo $app->render();
