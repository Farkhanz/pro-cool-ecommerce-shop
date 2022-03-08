<!-- SCRIPT PHP AREA -->
<?php 
session_start();
include 'koneksi/connect.php';

if (!isset($_SESSION["customer"]))
{
    echo "<script>alert('Silahkan Login Terlebih Dahulu');</script>";

    echo "<script>location='login/login_page.php';</script>";
}

if(empty($_SESSION["cart"]) OR !isset($_SESSION["cart"]))
{
    echo "<script>alert('Keranjang masih kosong! Cobalah membeli sesuatu.');</script>";
    echo "<script>location='home.php';</script>";
    
}

?>
<!-- SCRIPT PHP AREA -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PRO COOL | ONLINE SPAREPART SHOP</title>
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
    <div class="page-holder">

      <!-- SCRIPT PHP AREA -->
      <!-- NAVIGATION BAR-->
      <?php
      include 'navbar.php';
      ?>
      <!-- NAVIGATION BAR-->
      <!-- SCRIPT PHP AREA -->

      </header>

      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Keranjang</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <h2 class="h5 text-uppercase mb-4">Keranjang Belanja</h2>
          <!-- <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0"> -->

      <!-- REMAKE TABEL KERANJANG -->
              <div class="table-responsive mb-4">
                <table class="table">
                  <thead class="bg-light">
                <tr>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">No</strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Produk</strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Harga</strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Jumlah</strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Sub Harga</strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Aksi</strong></th>  
                </tr>
                <?php $nomor=1; ?>
                <?php foreach ($_SESSION["cart"] as $id_barang => $jumlah): ?>
                <?php
                 $culik = $conn->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
                $bagi = $culik->fetch_assoc();
                $subharga = $bagi ["harga_barang"]*$jumlah; 
              
                ?>
                  
                <tr>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase"><?php echo $nomor;?></strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase"><?php echo $bagi ["nama_barang"]; ?></strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase"><?php echo $bagi ["harga_barang"]; ?></strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase"><?php echo $jumlah; ?></strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Rp. <?php echo number_format ($subharga);?></strong></th>
                  <th class="border-0" scope="col">
                    <a href="deletecart.php?id=<?php echo $id_barang ?>" class="btn-btn primary">Hapus</a>
                  </th>  
                </tr>
                <?php $nomor++; ?>
              <?php endforeach ?>
            </thread>
            </thead>
          </table>
        </div>
      </section>
      <!-- REMAKE TABEL KERANJANG -->

      <!-- LANJUTAN PROSES KERANJANG -->
      <div class="bg-light px-4 py-3">
        <div class="row align-items-center text-center">
          <div class="col-md-12 mb-9 mb-md-0 text-md-right"><a class="btn btn-link p-0 text-dark btn-sm" href="checkout.php">Lanjutkan Proses Checkout</a></div>
        </div>
      </div>

  </body>
</html> 