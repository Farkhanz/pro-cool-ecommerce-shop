<!-- SCRIPT PHP AREA -->
<?php
session_start();
$conn = new mysqli ("localhost","root","","prodb"); 
if (!isset($_SESSION["customer"]))
{
    echo "<script>alert('Silahkan Login Terlebih Dahulu');</script>";

    echo "<script>location='login/login_page.php';</script>";
}
?>
<!-- SCRIPT PHP AREA -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PRO COOL | CHECKOUT</title>
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
                <h1 class="h2 text-uppercase mb-0">Checkout</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="cart.php">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">

          <!-- BILLING ADDRESS-->
          <h2 class="h5 text-uppercase mb-4">Detail Pembelian
          <p class="small text-muted small text-uppercase mb-1"></p>
          </h2>
          <div class="row">
            <div class="col-lg-8">
              <form method="post">
                <div class="row">
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="firstName">Nama Pembeli</label>
                    <input class="form-control form-control-lg" id="firstName" type="text" name='nama'  readonly value="<?php echo $_SESSION["customer"]["nama"]?>">
                  </div>

                  <div class="col-lg-6 form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $_SESSION["customer"]["email"]?>" readonly />
                  </div>

                  <div class="col-lg-6 form-group">
                    <label>No HP:</label>
                    <input type="number" name="telepon" class="form-control" value="<?php echo $_SESSION['customer']['no_telepon']?>" readonly placeholder="Masukan No Telepon" />
                  </div>

                   <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="country">Metode Pengiriman</label>
                    <select class="form-control" name="id_ongkir">
                      <option value="">Pilih Ongkos Kirim </option>
                      <?php
                      $culik = $conn->query("SELECT * FROM ongkos_kirim");
                      while($jasaongkir = $culik->fetch_assoc()){
                      ?>
                      <option value="<?php echo $jasaongkir["id_ongkir"] ?> ">  
                      <?php echo $jasaongkir['ekspedisi'] ?> - 
                      Rp. <?php echo number_format($jasaongkir['tarif'])?> 
                      </option>   
                    <?php } ?>
                    </select>
                  </div> 

                  <div class="col-lg-12 form-group">
                    <label class="text-small text-uppercase" for="address">Alamat Pengiriman</label>
                    <input class="form-control form-control-lg" id="address" type="text" name='address' placeholder="Nama jalan dan no. rumah.">
                  </div>

                  <div class="col-lg-6 form-group">
                    <label>Kota</label>
                    <input type="text" name="kota" class="form-control" />
                  </div>
                  
                  <div class="col-lg-6 form-group">
                    <label>Provinsi</label>
                    <input type="text" name="provinsi" class="form-control" />
                  </div>
                  
                  <div class="col-lg-6 form-group">
                    <div class="custom-control custom-checkbox">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="row d-none" id="alternateAddress">
                      <div class="col-12 mt-4">
                        <h2 class="h4 text-uppercase mb-4">Alternative billing details</h2>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 form-group">
                    <button class="btn btn-dark" name="checkout">Beli Sekarang</button> 
                  </div>
                </div>
              </div>
            <!-- ORDER SUMMARY-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Pembelian Anda</h5>
                  <!-- SCRIPT PHP AREA -->
                  <?php $totalbelanja = 0; ?>
                  <?php foreach ($_SESSION["cart"] as $id_barang => $jumlah): ?>
                  <?php
                    $culik = $conn->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
                    $bagi = $culik->fetch_assoc();
                    $subharga = $bagi ["harga_barang"]*$jumlah; 
              
                  ?>
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold"><?php echo $bagi ["nama_barang"]; ?></strong><span class="text-muted small">Rp. <?php echo number_format ($subharga);?></span></li> 
                    <li class="border-bottom my-2"></li>
                    <?php $totalbelanja+=$subharga; ?>                   
                    <?php endforeach ?>
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Total</strong><span>Rp. <?php echo number_format($totalbelanja)?></span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </form>
        <!-- SCRIPT PHP AREA -->
        <?php 
            if (isset($_POST["checkout"]))
            {
                $id_customer = $_SESSION['customer']['id_customer'];
                $id_ongkir = $_POST['id_ongkir'];
                $tanggal_pembelian = date("Y-m-d");
                $alamat_pengiriman = $_POST['address'];
                $nama_customer = $_POST['nama'];
                $email=$_POST["email"];
                $telepon=$_POST["telepon"];
                $kota=$_POST["kota"];
                $provinsi=$_POST["provinsi"];
                
                $culik = $conn->query("SELECT * FROM ongkos_kirim WHERE id_ongkir='$id_ongkir'");
                $arrayongkos = $culik->fetch_assoc();
                $tarif = $arrayongkos['tarif'];
                $ekspedisi = $arrayongkos['ekspedisi'];
                $result = $totalbelanja;
                $total_pembelian = $totalbelanja + $tarif; 

                //Menyimpan data pembelian dan form customer
                $conn->query("INSERT INTO pembelian_customer (id_customer,nama_customer,email,telepon,tanggal_pembelian,total_pembelian,ekspedisi,tarif,alamat_pengiriman,kota,provinsi,total_harga) VALUES ('$id_customer','$nama_customer','$email','$telepon','$tanggal_pembelian','$result','$ekspedisi','$tarif','$alamat_pengiriman','$kota','$provinsi','$total_pembelian') ");

                $id_pembelian_terbaru = $conn->insert_id;

                foreach ($_SESSION["cart"] as $id_barang => $jumlah)
                {
                    $culik = $conn->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
                    $bagi = $culik->fetch_assoc();

                    $nama = $bagi['nama_barang'];
                    $harga = $bagi['harga_barang'];
                    $berat = $bagi['berat_barang'];
                    $subberat = $bagi['berat_barang']*$jumlah;
                    $subharga = $bagi['harga_barang']*$jumlah;
                  $conn->query("INSERT INTO pembelian_barang (id_pembelian_barang,id_customer,id_barang,nama_barang,harga_barang,berat,subberat,subharga,jumlah) VALUES ('$id_pembelian_terbaru','$id_customer','$id_barang','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");
                }
            
                // update pengurangan produk
                $conn->query("UPDATE barang SET persediaan= persediaan -$jumlah WHERE id_barang='$id_barang'");

                //mengkosongkan keranjang 
                unset($_SESSION["cart"]);

                //Notifikasi pembelian
                echo "<script>alert('Pembelian Sukses!');</script>";
                echo"<script>location='nota-pembelian.php?id=$id_pembelian_terbaru';</script>";

            }

            ?>
        <!-- SCRIPT PHP AREA -->
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