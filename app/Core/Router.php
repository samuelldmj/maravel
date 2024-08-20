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

    public static function get($route, $controllerAction)
    {
        self::addRoute('GET', $route, $controllerAction);
    }

    public static function post($route, $controllerAction)
    {
        self::addRoute('POST', $route, $controllerAction);
    }

    public static function put($route, $controllerAction)
    {
        self::addRoute('PUT', $route, $controllerAction);
    }

    public static function delete($route, $controllerAction)
    {
        self::addRoute('DELETE', $route, $controllerAction);
    }

    public static function patch($route, $controllerAction)
    {
        self::addRoute('PATCH', $route, $controllerAction);
    }

    private static function addRoute($method, $route, $controllerAction)
    {
        $routePattern = "#^" . preg_replace('/\//', '\/', $route) . "$#";
        self::$routes[$method][$routePattern] = $controllerAction;
    }

    public function dispatch($url, $requestMethod)
    {
        // If the URL is empty or just '/', default to Home@index
        if ($url == '/' || $url == '') {
            $controllerAction = 'Home@index';
            $controller = 'Home';
            $method = 'index';

            $app = new App();
            $app->loadControllerWithMethod($controller, $method, []);
            return;
        }

        $routes = self::$routes[$requestMethod] ?? [];

        foreach ($routes as $route => $controllerAction) {
            if (preg_match($route, $url, $matches)) {
                array_shift($matches); // Remove the full match
                list($controller, $method) = explode('@', $controllerAction);
                $controller = ucfirst($controller);

                $app = new App();
                $app->loadControllerWithMethod($controller, $method, $matches);
                return;
            }
        }

        // If no route matched, handle 404
        $this->handle404();
    }


    private function handle404()
    {
        $app = new App();
        $app->loadControllerWithMethod('_404', 'errorMethod', []);
    }
}
