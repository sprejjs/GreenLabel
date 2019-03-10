<?php
class Competition {
    private $conn;
    private $table_name = "competitions";

    public $id;
    public $name;
    public $description;

    public $class1;
    public $class2;
    public $class3;
    public $class4;
    public $class5;
    public $class6;
    public $class7;
    public $class8;
    public $class9;
    public $class10;

    public function __construct($db){
        $this->conn = $db;
    }

    function read() {
        // select all query
        $query = "SELECT name, description FROM {$this->table_name}";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}
