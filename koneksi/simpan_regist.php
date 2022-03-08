<?php 
// koneksi database
include '../koneksi/connect.php';

// menangkap data yang di kirim dari form
$nama = $_POST['name'];
$email = $_POST['email'];
$no_telepon = $_POST['telephone'];
$password = $_POST['password'];

// menginput data ke database
mysqli_query($conn,"insert into customer values('','$nama','$email','$no_telepon','$password')");

// mengalihkan halaman kembali ke index.php
echo "<script>alert('Pendaftaran Sukses! Silahkan melakukan Login.');</script>";
//header("location:../login/login_page.php");
echo "<script>location='../login/login_page.php';</script>";

?>