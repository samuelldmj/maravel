<?php

// $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;

// $conn = new PDO($string, DBUSER, DBPASS);

class Database

{
    private function connect()
    {
        $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
        $conn = new PDO($string, DBUSER, DBPASS);
        return $conn;
    }

    public function query($query, $data = [])
    {
        $conn = $this->connect();
        $stm = $conn->prepare($query);
        $check = $stm->execute($data);
        if ($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }

        return false;
    }
}
