<?php
//Handles the logic of Your app

class Product extends Controllers
{

    public function index()
    {
        echo "<h1>Hello from Product Controller</h1>";

        $this->views('product');
    }
}
