<?php 
session_start();
$id_barang=$_GET["id"];
unset($_SESSION["cart"][$id_barang]);

echo "<script>alert('Berhasil menghapus barang dari keranjang ');</script>";
echo "<script>location='cart.php';</script>";



?>