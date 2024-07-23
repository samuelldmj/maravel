<?php
//Handles the logic of Your app

class Home extends Controllers
{

    public function index()
    {

        $this->views('home');
        $model = new Model();
        $model->test();
    }
}

