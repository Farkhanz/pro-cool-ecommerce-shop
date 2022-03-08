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
			<!-- NAVIGATION BAR-->
			<?php
			include 'navbar.php';
			?>
			<!-- NAVIGATION BAR-->

      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Booking jasa service</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <!--<li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>-->
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>

<section class="riwayat-customer">
    <div class="container">
      <br>
        <h3>Riwayat Pembelian <?php echo $_SESSION["customer"]["nama"]?></h3>

        <table class="table table-bordered">
        <thread>   
         <tr>
                <th>No</th>
                <th>Nama Customer</th>
                <th>Tipe Kendaraan</th>
                <th>Tanggal Booking</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Keluhan</th>
                <th>Jenis Service</th>
                <th>Montir</th>
                <th>Status Konfirmasi</th>
         </tr>    
         </thread>
         <tbody>
         	<?php
         	$nomor=1;
            $cust = $_SESSION['customer']['id_customer'];
            $culik = $conn->query("SELECT * FROM dataservice WHERE id_customer='$cust'");
            while($bagi = $culik->fetch_assoc()){
            ?>
         </tbody>
         <tr>
         	<th><?php echo $nomor; ?></th>
         	<th><?php echo $bagi["nama_customer"] ?></th>
         	<th><?php echo $bagi["type_kendaraan"] ?></th>
         	<th><?php echo $bagi["tanggal_booking"] ?></th>
         	<th><?php echo $bagi["no_telp"] ?></th>
         	<th><?php echo $bagi["alamat"] ?></th>
         	<th><?php echo $bagi["keluhan"] ?></th>
         	<th><?php echo $bagi["jenis_service"] ?></th>
         	<th><?php echo $bagi["montir"] ?></th>
         	<th><?php echo $bagi["status_booking"] ?></th>
         </tr>
       <?php $nomor++; ?>
    <?php } ?>
</table>
</div>
</section>
</div>

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