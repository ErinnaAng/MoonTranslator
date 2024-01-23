<?php
$HOST = "localhost";
$DB = "moonuse";
$USER = "root";
$PASSWORD = "";

//Koneksi PDO
try {
    $pdo = new PDO("mysql:host=" . $HOST . ";dbname=" . $DB, $USER, $PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database, please try again" . $DB . ": " . $e->getMessage());
}
?>
