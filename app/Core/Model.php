<?php

trait Model
{
    use Database;

    protected $limit = 10;
    protected $offset = 0;
    protected $order_type = "desc";
    protected $order_column = 'id';
    public $errors = [];


    public function retrieve()
    {
        $query = "SELECT * FROM $this->table";
        $result = $this->query($query);
        show($result);
    }

    public function update($id, $data = [], $columnName = 'id')
    {

        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $query = "UPDATE $this->table  SET  ";
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . " , ";
        }

        $query = trim($query, " , ");
        $query .= " WHERE $columnName = :$columnName ";
        // echo $query;
        $data[$columnName] = $id;
        $this->query($query, $data);
        return false;
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

        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
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
        $query .= " order by $this->order_type $this->order_column limit $this->limit offset $this->offset";
        // echo $query;
        $data = array_merge($data, $data_not);
        return $this->query($query, $data);
    }


    public function findAll()
    {

        $query = " SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type LIMIT $this->limit  offset $this->offset";
        // echo $query;
        return $this->query($query);
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
