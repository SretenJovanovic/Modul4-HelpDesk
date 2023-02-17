<?php

class SingletonDB
{

    private static $instance = null;
    private $conn;
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "maintenancedb";

    private function __construct()
    {

        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_errno) {
            die("Connection failed: " . $this->conn->connect_errno);
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            return self::$instance = new SingletonDB();
        }
        return self::$instance;
    }
    public function getConnection()
    {
        return $this->conn;
    }
    public function dbInfo()
    {
        return "Host: $this->host<br>Username: $this->username<br>Password: $this->password<br>Database: $this->database";
    }
}


$instance = SingletonDB::getInstance();
$conn = $instance->getConnection();
