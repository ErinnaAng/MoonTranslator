<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'dbconfig.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
$query = $pdo->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
$query->bindParam(':username', $username);
$query->bindParam(':password', $password);
$query->execute();

// menghitung jumlah data yang ditemukan
$cek = $query->rowCount();
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
	$data = $query->fetch(PDO::FETCH_ASSOC);
 
	// cek jika user login sebagai admin
	if($data['usertype'] == "admin"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['usertype'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:halaman_admin.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['usertype'] == "user"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['usertype'] = "user";
		// alihkan ke halaman dashboard pegawai
		header("location:homeUser.php");
 
	}else{
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
?>
