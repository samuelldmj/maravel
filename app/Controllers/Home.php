<?php
//Handles the logic of Your app

class Home extends Controllers
{

    public function index($a = '', $b = '', $c = '')
    {
        show("From the Home function");
        show($a);
        show($b);
        show($c);
        $this->views('home');
        // $user = new User();
        // $model->retrieve();
        // $arr['id'] = 1;
        // $arr['names'] = 'Samuel';
        // $arr['age'] = 24;
        // $result = $model->where($arr);

        // $arr['names'] = 'Samuel';
        // $arr['age'] = 24;
        // $result = $model->insert($arr);

        // $result = $model->delete(4, 'names');
        // $result = $model->delete(5);

        // $arr['names'] = 'Sammy';
        // $arr['age'] = 27;

        // $result = $user->update(4, $arr);

        // $result = $user->findAll();
        // show($result);
    }

    public function edit($a = 1, $b = 2)
    {

        show("From the edit fucntion");
        $this->views("Home");
    }
}

