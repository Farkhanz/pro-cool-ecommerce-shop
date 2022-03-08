<h4>Input Tambah Barang</h4>
<?php
error_reporting(0);
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama barang</label>
        <input type="text" class="form-control" name="nama" autocomplete="off" autofocus="on"> 
    </div>
    <div class="form-grup">
        <label>Harga barang (Rp) </label>
        <input type="text" class="form-control" name="harga" autocomplete="off">
    </div>
    <div class="form-grup">
        <label>Berat barang (gr) </label>
        <input type="text" class="form-control" name="berat" autocomplete="off">
    </div>
    <div class="form-grup">
        <label>Jumlah Stock (Persediaan) </label>
        <input type="number" class="form-control" name="jumlah" autocomplete="off">
    </div>
    
    <div class="form-grup">
        <label>Deskripsi Produk </label>
        <textarea class="form-control" name="deskripsi" rows="10" autocomplete="off"></textarea>
    
    </div>
    <div class="form-grup">
        <label>Foto Produk  </label>
        <input type="file" class="form-control" name="foto" autocomplete="off">
    </div>

    <button class="btn btn-primary" type="submit" name="save"> Simpan</button>

</form>

<!--SCRIPT PHP AREA -->
<?php
if (isset($_POST['save'])) 
{
  $nama  = $_POST['nama'];
  $deskripsi  = $_POST['deskripsi'];
  $harga  = $_POST['harga'];
  $berat  = $_POST['berat'];
  $jumlah  = $_POST['jumlah'];
  $foto = $_FILES['foto']['name'];
  $lokasi = $_FILES['foto']['tmp_name'];
  move_uploaded_file($lokasi, "../procool/foto_barang/".$foto);
  $mysqli  = "INSERT INTO barang (nama_barang,deskripsi_barang,foto_barang,harga_barang,berat_barang,persediaan) VALUES ('$nama', '$deskripsi','$foto','$harga','$berat','$jumlah')";
  $result  = mysqli_query($conn, $mysqli);
  if ($result) {
    echo "<div class='alert alert-info'>Barang Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=barang'>";
  } else {
    echo "Input gagal";
  }
  mysqli_close($conn);
 }
?>
<!--SCRIPT PHP AREA -->