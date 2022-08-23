<?php

use Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Support/helpers.php';
require_once __DIR__ . '/routes/web.php';


dd('here');

$env = Dotenv::createImmutable(__DIR__);

app()->run();

