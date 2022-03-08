<!-- Script Koneksi -->
<?php
session_start();
$conn = new mysqli ("localhost","root","","prodb"); 
?>
<!-- Script Koneksi -->

<!DOCTYPE html>
<html>
<head>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PRO COOL | PEMBAYARAN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Lightbox-->
    <link rel="stylesheet" href="vendor/lightbox2/css/lightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.theme.default.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>

	<body>
			<!-- NAVIGATION BAR-->
			<?php
			include 'navbar.php';
			?>
			<!-- NAVIGATION BAR-->
      
      <!-- SCRIPT PHP AREA -->
      <?php $nomor=1; ?>
      <?php
      $idpem = $_GET["id_pembelian"];
      $culik = $conn->query("SELECT * FROM pembelian_barang JOIN pembelian_customer 
      ON pembelian_customer.id_pembelian='$_GET[id_pembelian]'" );
      $info = $culik->fetch_assoc();
      ?> 
      <!-- SCRIPT PHP AREA -->

	    <div class="container">
        <h2>Konfirmasi Pembayaran</h2>
        <p>Kirim Bukti Pembayaran Anda Disini</p>
        <div class="alert alert-info">Total tagihan Anda <strong>Rp. <?php echo number_format($info['total_harga']) ?></strong></div>

     <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama Penyetor </label>
                <input type="text" class="form-control" name="nama" autocomplete="off">
            </div>

            <div class="from-group">
                <label>Bank</label><br>
                <input type="text" class="from-control" name="bank" autocomplete="off">
            </div>

            <div class="from-group">
            <label>Jumlah </label> <br>
            <input type="number" class="from-control" name="jumlah" min="1">
            </div>

            <div class="from-group">
                <label>Foto Bukti</label>
                <input type="file" class="form-control" name="bukti">
                <p class="text-danger">foto bukti harus jpg maksimal 2MB </p>
            </div>

                <button type="submit" class="btn btn-primary" id="kirim" name="kirim">Kirim</button>

                </form>
            </div>
            <br>
            <br>
            <br>
            <br>

<!-- SCRIPT PHP AREA -->
<?php
if (isset($_POST['kirim']))
{
	$nama  = $_POST['nama'];
	$bank  = $_POST['bank'];
	$jumlah  = $_POST['jumlah'];
	$tanggal = (date("Y-m-d"));
    $foto = $_FILES['bukti']['name'];
    $lokasi = $_FILES['bukti']['tmp_name'];
    move_uploaded_file($lokasi, "../procool/bukti_pembayaran/".$foto);
    $mysqli  = "INSERT INTO pembayaran (id_pembelian,nama,bank,jumlah,tanggal,buktifoto) VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$foto')";
    $result  = mysqli_query($conn, $mysqli);
    if ($result) {
    echo "<script>alert('Terima Kasih Sudah Mengirimkan bukti Pembayaran.');</script>";
    echo "<script>location='home.php';</script>";
  } else {
    echo "Input gagal";
  }
  mysqli_close($conn);
}
?>

        </section>
      </div>
    </div>
      <!-- SCRIPT PHP AREA -->
      <!-- NAVIGATION BAR-->
      <?php
      include 'footbar.php';
      ?>
      <!-- NAVIGATION BAR-->
      <!-- SCRIPT PHP AREA -->
  </body>
</html>