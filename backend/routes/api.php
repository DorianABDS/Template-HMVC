<?php

global $router;

$router->get('/api/hello', function () {
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Hello from backend']);
});
