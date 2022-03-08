<?php
session_start();
$conn = new mysqli ("localhost","root","","prodb");

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data dati tabel
$take = $conn->query("SELECT * FROM customer WHERE nama='$_POST[username]' AND password ='$_POST[password]'");
$click = $take->num_rows;
if ($click==1)
	{
		$_SESSION['customer']=$take->fetch_assoc();
		echo "<script>alert('Anda Sukses Login.');</script>";
     	echo "<meta http-equiv='refresh' content='1;url=../login/testyes.php'>";
	}
	else
	{
		echo"<script>alert('anda gagal login, periksa kembali akun anda ');</script>";
       	echo "<meta http-equiv='refresh' content='1;url=login_page.php'>";
	}
?>