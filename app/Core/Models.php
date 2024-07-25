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
    public function delete($id, $columnName = 'id')
    {
        $data[$columnName] = $id;
        $query = "DELETE FROM $this->table WHERE $columnName = :$columnName ";
        $this->query($query, $data);
        // echo $query;
        return false;
    }
    public function insert($data)
    {
        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (" . implode(',', $keys) . ") VALUES (:" . implode(',:', $keys) . ") ";
        $this->query($query, $data);
        return false;
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
        // echo $query;
        $data = array_merge($data, $data_not);
        return $this->query($query, $data);
    }

    public function first($data, $data_not = [])
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
        // echo $query;
        $data = array_merge($data, $data_not);
        $result = $this->query($query, $data);
        if ($result) {
            return $result[0];
        }
        return false;
    }
}
