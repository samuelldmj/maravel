<?php
//Handles the logic of Your app

class Product extends Controllers
{

    public function productIndex()
    {

        $this->views('product');
    }
}
