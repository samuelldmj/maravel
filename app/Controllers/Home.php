<?php
//Handles the logic of Your app

class Home extends Controllers
{

    public function index()
    {

        $this->views('home');
        $model = new Model();
        // $model->retrieve();
        // $arr['id'] = 1;
        // $arr['names'] = 'Samuel';
        // $arr['age'] = 24;
        // $result = $model->where($arr);

        // $arr['names'] = 'Samuel';
        // $arr['age'] = 24;
        // $result = $model->insert($arr);

        $result = $model->delete(4, 'names');
        // $result = $model->delete(5);
        show($result);
    }
}

