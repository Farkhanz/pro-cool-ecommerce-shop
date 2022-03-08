<?php
include '../koneksi/connect.php';

$id = $_GET['id_customer'];

$query = "DELETE FROM customer WHERE id_customer='$id'";
mysqli_query($conn, $query);

echo "<script>alert('Data telah terhapus.');</script>";
echo "<script>location='index.php?halaman=datapelanggan';</script>";

?>