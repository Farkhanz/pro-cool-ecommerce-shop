<!-- SCRIPT PHP AREA -->
<?php 
session_start();
include 'koneksi/connect.php';
?>
<!-- SCRIPT PHP AREA -->

<!doctype html>
<html lang="en">

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PRO COOL | RINCIAN PEMBELIAN</title>
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
              <h1 class="h2 text-uppercase mb-0">Rincian Pembelian</h1>
            </div>
            <div class="col-lg-6 text-lg-right">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                  <!-- <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Checkout</li>-->
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="py-5">
      <!-- SCRIPT PHP AREA -->
      <?php $nomor=1; ?>
      <?php
      $culik = $conn->query("SELECT * FROM pembelian_customer JOIN pembelian_barang 
      ON pembelian_customer.id_pembelian='$_GET[id]'" );
      $info = $culik->fetch_assoc();
      ?> 
      <!-- SCRIPT PHP AREA -->

<div class="row">
    <div class="col-md-4">
    <h3 class="h5 text-uppercase mb-4">Pembelian</h3>
    <h5 class="small text-muted small text-uppercase mb-1">No. Pembelian  : <?php echo $info["id_pembelian"]?> </h5>
    <h5 class="small text-muted small text-uppercase mb-1">tanggal pembelian : <?php echo $info["tanggal_pembelian"]?> </h5>
    <h5 class="small text-muted small text-uppercase mb-1">total pembelian : <?php echo number_format($info["total_pembelian"])?></h5>
    </div>

    <div class="col-md-4">
    <h2 class="h5 text-uppercase mb-4">Customer</h2>
    <h5 class="small text-muted small text-uppercase mb-1">Nama pembeli  : <?php echo $info["nama_customer"]?> </h5>
    <h5 class="small text-muted small text-uppercase mb-1">Nomer Telepon : <?php echo $info["telepon"]?> </h5>
    <h5 class="small text-muted small text-uppercase mb-1">email : <?php echo $info["email"]?> </h5>
  </div>

    <div class="col-md-4">
    <h2 class="h5 text-uppercase mb-4">Pengiriman</h2>
    <h5 class="small text-muted small text-uppercase mb-1">Kurir  : <?php echo $info["ekspedisi"]?> </h5>
    <h5 class="small text-muted small text-uppercase mb-1">Tarif : <?php echo number_format($info["tarif"])?> </h5>
    <h5 class="small text-muted small text-uppercase mb-1">Kota : <?php echo $info["kota"]?> </h5>
    <h5 class="small text-muted small text-uppercase mb-1">Alamat : <?php echo $info["alamat_pengiriman"]?> </h5>
  </div>
</div>

<table class="table table-bordered">
    <thread>
        <tr>
            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">No</th>
            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Nama Barang</th>
            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Harga</th>
            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Berat</th>
            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Jumlah</th>
            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Sub Berat</th>
            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Sub Total</th>
        </tr>
    </thread>
    <tbody>
        <?php $nomor=1; ?>
        <?php $culik=$conn->query("SELECT * FROM pembelian_barang WHERE id_urut_pembelian='$_GET[id]'"); ?>
        <?php while ($bagi = $culik->fetch_assoc()) { ?> 
    <tr>
            <td class="border-0" scope="col"> <strong class="text-small text-uppercase"><?php echo $nomor; ?></td>
            <td class="border-0" scope="col"> <strong class="text-small text-uppercase"><?php echo $bagi["nama_barang"]; ?></td>
            <td class="border-0" scope="col"> <strong class="text-small text-uppercase">Rp. <?php echo number_format($bagi["harga_barang"]) ?></td>
            <td class="border-0" scope="col"> <strong class="text-small text-uppercase"><?php echo $bagi["berat"]; ?> Gr.</td>
            <td class="border-0" scope="col"> <strong class="text-small text-uppercase"><?php echo $bagi["jumlah"]; ?></td>
            <td class="border-0" scope="col"> <strong class="text-small text-uppercase"><?php echo $bagi["subberat"]; ?></strong></td>  
            <td class="border-0" scope="col"> <strong class="text-small text-uppercase"><?php echo number_format($bagi["subharga"]) ?></strong></td> 
            
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
    </div>
  </div>
</div>
</section>

      <!-- JavaScript files-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/lightbox2/js/lightbox.min.js"></script>
      <script src="vendor/nouislider/nouislider.min.js"></script>
      <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
      <script src="vendor/owl.carousel2/owl.carousel.min.js"></script>
      <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
      <script src="js/front.js"></script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
  </body>
</html>