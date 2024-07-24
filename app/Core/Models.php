<?php

class Model
{
    use Database;

    protected $table = 'users';
    protected $limit = 10;
    protected $offset = 0;

    public function retrieve()
    {
        $query = "SELECT * FROM users";
        $result = $this->query($query);
        show($result);
    }

    public function update($id, $data = [], $columnId = 'id')
    {
        $query = "";
    }
    public function delete($id, $columnId = 'id')
    {
    }
    public function insert($data)
    {
    }

    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keysNot = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE  ";
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . "&&";
        }

        foreach ($keysNot as $key) {
            $query .= $key . " != : " . $key . "&&";
        }

        $query = trim($query, " && ");
        $query .= " limit $this->limit offset $this->offset";
        echo $query;
    }

    public function first()
    {
    }
}
