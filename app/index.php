<?php

declare(strict_types=1);

use App\Client\ClientController;

require __DIR__ . '/functions/functions.php';
require __DIR__ . '/vendor/autoload.php';



$controller = new ClientController();

$controller->doSomething();