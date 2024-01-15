<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'dbconfig.php';

// menangkap data yang dikirim dari form register
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Check if passwords match
if ($password != $confirm_password) {
    header("location:index.php?pesan=gagal");
    exit();
}

// Insert user data into the database
$query = $pdo->prepare("INSERT INTO user (username, email, password, usertype) VALUES (:username, :email, :password, 'user')");
$query->bindParam(':username', $username);
$query->bindParam(':email', $email);
$query->bindParam(':password', $password);

// Execute the query
$query->execute();

// Redirect to the login page
header("location:index.php");
exit();
?>
