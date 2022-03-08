<?php

$culik = $conn->query("SELECT * FROM barang WHERE id_barang='$_GET[id]'");
$bagi = $culik->fetch_assoc();
$fotobarang = $bagi['foto_barang'];
if (file_exists("../fotobarang/$fotobarang")) 
{
	unlink("../fotobarang/$fotobarang");
}

$conn->query("DELETE FROM barang WHERE id_barang='$_GET[id]'");

echo "<script>alert('Barang telah dihapus.');</script>";
echo "<script>location='index.php?halaman=barang';</script>";

?>
