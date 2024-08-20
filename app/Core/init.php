<?php
//files that need to be loaded when your website is triggered
//files in the core folders will need run for smooth operation of your website it is the engine.

spl_autoload_register(function ($className) {
    $directories = [
        '../app/models/',
        '../app/controllers/',
        '../app/core/',
    ];

    foreach ($directories as $directory) {
        $fileName = $directory . ucfirst($className) . '.php';
        if (file_exists($fileName)) {
            require $fileName;
            return;
        }
    }
});

// Include other necessary files
require "config.php";
require "functions.php";
