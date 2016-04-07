<?php

class Database {
    private $host = "localhost";
    private $db_name = "mjqpf_db";
    private $username = "root";
    private $password = "";
    private $table_name = "users";
    public $conn = "";

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
        } catch(PDOException $err) {
            $error = $err->getMessage();
        }
        return $this->conn;
    }

    public function runQuery($sql) {
        $conn = $this->getConnection();
        $stmt = $conn->prepare($sql);
        return $stmt;
    }
}