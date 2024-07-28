<?php
session_start();
require __DIR__ . "/" .   "../app/core/init.php";
// echo __DIR__ . '/' . "../app/Core/";


$app = new App();
$app->loadController();

// show(var_dump($_SERVER));





