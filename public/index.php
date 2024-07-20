<?php


function show($par)
{
    echo "<pre>";
    print_r($par);
    echo "<pre>";
}


echo "Hello world" . "<br>";
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

function splitUrl()
{
    $url = !empty($_GET['url']) ? $_GET['url'] : 'Home';
    $url =  explode("/", $url);
    return $url;
}
// show(splitUrl());

function loadController()
{
    $url = splitUrl();
    $filename = __DIR__ . '/' . "../app/Controllers/" . ucfirst($url[0]) . '.php';
    if (file_exists($filename)) {
        require $filename;
    } else {
        $filename = __DIR__ . '/' . "../app/Controllers/_404.php";
        require $filename;
    }
}

loadController();

