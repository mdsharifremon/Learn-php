<?php

class Database{
    private string $dbName = "cms_form";
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    public $conn = null;

    function __construct()
    {
        if($this->conn == null){
            $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbName);
            return true;
        }
        if($this->conn->connect_error){
            echo $this->conn->connect_error;
        }
    }

    function fetch($table = null, $condition = null){
        $sql = "SELECT * FROM `{$table}`";
        if($condition != null){
            $sql .= " WHERE {$condition}";
        }
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_all(MYSQLI_ASSOC);
            return $row;
        } else {
            return false;
        }
    }
    function __destruct(){
        if($this->conn != null){
            $this->conn = null;
        }
    }
}

$db = new Database();

