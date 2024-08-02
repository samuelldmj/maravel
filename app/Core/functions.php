<?php

function show($par)
{
    echo "<pre>";
    print_r($par);
    echo "<pre>";
}

function esc($str)
{
    htmlspecialchars($str);
}

function redirect($path)
{
    header("Location: " . ROOT . "/" . $path);
    die;
}
