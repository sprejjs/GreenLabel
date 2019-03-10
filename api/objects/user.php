<?php

class User {
    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $id;
    public $name;
    public $email;
    public $password;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}
