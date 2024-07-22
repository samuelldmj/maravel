<?php
//Handles the logic of Your app

class Home extends Controllers
{

    public function index()
    {
        echo "<h1>Hello from Home Controller</h1>";

        $this->views('home');
    }
}

