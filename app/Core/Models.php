<?php

class Model extends Database
{

    public function test()
    {
        $query = "SELECT * FROM users";
        $result = $this->query($query);
        show($result);
    }
}
