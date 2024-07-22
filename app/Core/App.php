<?php


// show($_SERVER['REQUEST_URI']) . PHP_EOL;
// $url = $_GET['url'] ? 'Home' : (!$_GET['url'] ? 'Home' : 'Not working');

// show($_GET);
// $url = $_GET['url'] ?? 'Home';

// $url = !empty($_GET['url']) ? $_GET['url'] : 'Home';
// $url = isset($_GET['url']) ? $_GET['url'] : 'Home';

// $url = $_GET['url'];
// var_dump($url);

// $url =  explode("/", $url);
// show($url);


class App
{

    //this will load the controllers immediately an instance of this class is created
    // public function __construct()
    // {
    //     $this->loadController();
    // }

    private $controller = 'Home';
    private $methods = 'index';

    private function splitUrl()
    {
        $url = !empty($_GET['url']) ? $_GET['url'] : 'Home';
        $url =  explode("/", $url);
        return $url;
    }
    // show(splitUrl());

    public function loadController()
    {
        $url = $this->splitUrl();
        $filename = "../app/controllers/" . ucfirst($url[0]) . ".php";
        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($url[0]);
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = '_404';
        }

        $controller = new $this->controller;
        call_user_func_array([$controller, $this->methods], []);
    }
}
