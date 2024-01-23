<?php

class Database {
    public $pdo;

    public function __construct($host, $dbname, $user, $password) {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Could not connect to the database: " . $e->getMessage());
        }
    }

    public function query($sql) {
        return $this->pdo->query($sql);
    }

    public function fetchAssoc($result) {
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function close() {
        $this->pdo = null;
    }
}

// Create an instance of the Database class with your database configuration
$database = new Database("localhost", "moonuse", "root", "");
?>
