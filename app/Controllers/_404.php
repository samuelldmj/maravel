<?php



class _404

{

    use Controllers;
    public function index()
    {
        $this->views('404');
    }
}
