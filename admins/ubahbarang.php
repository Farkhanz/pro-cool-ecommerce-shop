<h4>Ubah Data Barang</h4>

<?php

$culik=$conn->query("SELECT * FROM barang WHERE id_barang='$_GET[id]'");
$bagi= $culik->fetch_assoc();

?>

<form method="post" enctype="multipart/form-data">
	<div class="form-grup">
      <label>Nama Barang</label>
      <input type="text" class="form-control" name="nama" value="<?php echo $bagi['nama_barang'];?>">
  	</div>

    <div class="form-grup">
      <label>Harga Barang</label>
      <input type="number" class="form-control" name="harga" value="<?php echo number_format($bagi['harga_barang'])?>">
  </div>

    <div class="form-grup">
      <label>Berat Barang (Gr.)</label>
      <input type="number" class="form-control" name="berat" value="<?php echo $bagi['berat_barang'];?>">
  </div>

    <div class="form-grup">
      <label>Persediaan Barang</label>
      <input type="number" class="form-control" name="jumlah" value="<?php echo $bagi['persediaan'];?>">
  </div>

<br>
    <div class="form-grup">
      <label>Foto Barang</label>
      <img src="../fotobarang/<?php echo $bagi['foto_barang']?>" width="200">
  </div>
<br>
    <div class="form-grup">
  <label>Ganti foto</label>
  <input type="file" name="foto" class="form-control">
  
  </div>

    <div class="form-grup">
      <label>Deskripsi Barang</label>
      <textarea class="form-control" name="deskripsi" rows="10">
      <?php echo $bagi['deskripsi_barang']?>
      </textarea>
  </div>

    <button class="btn btn-primary" name="ubah">Ubah </button>

</form>

<?php
if (isset($_POST['ubah']))
{
    $namafoto=$_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    // jika foto di ubah
    if (!empty($lolkasifoto)) 
    {
        move_uploaded_file($lokasi, "../fotobarang/$namafoto");

        $conn->query("UPDATE produk SET 
        nama_barang='$_POST[nama]',
        
        harga_barang='$_POST[harga]',
        berat_barang='$_POST[berat]',
        persediaan='$_POST[jumlah]',
        foto_barang='$namafoto',
        deskripsi_barang='$_POST[deskripsi]'
        WHERE id_barang='$_GET[id]'");
    }
    else
    {
        $conn->query("UPDATE barang SET nama_barang='$_POST[nama]',
        harga_barang='$_POST[harga]',berat_barang='$_POST[berat]',
        persediaan='$_POST[jumlah]',
        deskripsi_barang='$_POST[deskripsi]'
        WHERE id_barang='$_GET[id]'");
    }
    echo "<script>alert('data produk telah di ubah');</script>";
    echo "<script>location='index.php?halaman=barang';</script>";
}
?>
