<?php
//files that need to be loaded when your website is triggered
//files in the core folders will need run for smooth operation of your website it is the engine.

spl_autoload_register(function ($className) {
    $fileName = "../app/models/" . ucfirst($className) . ".php";
    require $fileName;
});
require   "config.php";
require  "functions.php";
require "Database.php";
require  "Model.php";
require "Controller.php";
require  "App.php";
