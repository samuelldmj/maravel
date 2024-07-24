<?php
//Handles the logic of Your app

class Home extends Controllers
{

    public function index()
    {

        $this->views('home');
        $model = new Model();
        // $model->retrieve();
        $arr['id'] = 1;
        $result = $model->where($arr);
        show($result);
    }
}

