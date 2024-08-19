<?php


class Router
{

    private static $routes = [
        'GET' => [],
        'POST' => [],
        'PATCH' => [],
        'PUT' => [],
        'DELETE' => [],
    ];

    public function __construct()
    {
        // Load the routes file
        require dirname(dirname(__DIR__)) . '/routes/routes.php';
    }
}
