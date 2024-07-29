<?php
//this brings all our web app functionalities together making it work

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
        $url = $_GET['url'] ?? 'Home';
        // $url = !empty($_GET['url']) ? $_GET['url'] : 'Home';
        $url =  explode("/", trim($url, "/"));
        return $url;
    }
    // show(splitUrl());

    //the entry point of the application
    //it is responsible for routing request to the appropriates controller and methods
    public function loadController()
    {
        $url = $this->splitUrl();
        //select controller
        $filename = "../app/controllers/" . ucfirst($url[0]) . ".php";
        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = '_404';
        }

        $control = new $this->controller;

        //select methods
        if (!empty($url[1])) {
            if (method_exists($control, $url[1])) {
                $this->methods = $url[1];
                unset($url[1]);
            }
        }
        show($url);
        call_user_func_array([$control, $this->methods], $url);
    }
}
