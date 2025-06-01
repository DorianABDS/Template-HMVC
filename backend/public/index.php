<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();

global $router;

if (preg_match('/^\/api\//', $_SERVER['REQUEST_URI'])) {
    require_once __DIR__ . '/../routes/api.php';
} else {
    require_once __DIR__ . '/../routes/web.php';
}

$router->dispatch();
