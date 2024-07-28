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
