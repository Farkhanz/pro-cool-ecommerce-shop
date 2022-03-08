<?php

if (isset($_POST['login'])) 
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$data = mysqli_query($conn,"select * from customer where nama='$username' and password='$password'");
	$valid = $curi->num_rows;

if ($valid==0) 
{
	//login
	$acc = $curi->fetch_assoc();
	$_SESSION['customer'] = $acc;
	echo "<script>alert('Anda Sukses Login.');</script>";
}
	else 
	{
		echo"<script>location='home.php';</script>";
	}
}
else
{
	echo"<script>alert('anda gagal login, periksa kembali akun anda ');</script>";
    echo"<script>location='../login/login_page.php';</script>";
}
?>