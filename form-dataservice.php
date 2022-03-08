<!-- SCRIPT PHP AREA -->
<?php
session_start();
include 'koneksi/connect.php';
?>
<!-- SCRIPT PHP AREA -->
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
                <h1 class="h2 text-uppercase mb-0">Form Service</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <!--<li class="breadcrumb-item"><a href="home.php">Home</a></li>-->
                    <!--<li class="breadcrumb-item active" aria-current="page">Cart</li>-->
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">

          <!-- BILLING ADDRESS-->
          <h2 class="h5 text-uppercase mb-4">Isi data form berikut!</h2>
          <div class="row">
            <div class="col-lg-12">
              <form method="post">
                <div class="row">
                  <div class="col-lg-12 form-group">
                    <label class="text-small text-uppercase" for="firstName">Nama Customer</label>
                    <?php if (isset($_SESSION["customer"])):?>
                    <input class="form-control form-control-lg" id="firstName" type="text" name='nama' value="<?php echo $_SESSION["customer"]["nama"]?>" readonly>
                    <?php else: ?>
                    <input class="form-control form-control-lg" id="firstName" type="text" name='nama' value="" autocomplete="off">
                    <?php endif ?>
                  </div>

                  <div class="col-lg-12 form-group">
                    <label class="text-small text-uppercase">Type Mobil</label>
                    <?php if (isset($_SESSION["customer"])):?>
                    <input type="text" name="type" class="form-control" autofocus="on" />
                    <?php else: ?>
                    <input type="text" name="type" class="form-control" autocomplete="off" />
                    <?php endif ?>
                  </div>

                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase">No Telepon</label>
                    <?php if (isset($_SESSION["customer"])):?>
                    <input type="number" name="telepon" class="form-control" value="<?php echo $_SESSION['customer']['no_telepon']?>" readonly placeholder="Masukan No Telepon" />
                    <?php else: ?>
                    <input type="number" name="telepon" class="form-control" value="" placeholder="Masukan No Telepon" autocomplete="off" />
                  <?php endif ?>
                  </div>

                   <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="country">Waktu Booking</label>
                    <input type="date" class="form-control" name="tanggal" value=""> 
                  </div>

                  <div class="col-lg-12 form-group">
                    <label class="text-small text-uppercase" for="address">Alamat</label>
                    <input class="form-control form-control-lg" type="text" name='alamat' placeholder="Alamat anda">
                  </div>

                  <div class="col-lg-12 form-group">
                    <label class="text-small text-uppercase" for="address">Keluhan</label>
                    <input class="form-control form-control-lg" type="text" name='keluhan' placeholder="Tulis Keluhan anda.">
                  </div>

                  <div class="col-lg-12 form-group">
                  <label>Jenis Service</label>
                       <select type="text" class="form-control" name="service">
                          <option value="">Pilih Jenis Service</option>
                          <option value="Home Service">Home Service</option>
                          <option value="Datang ke bengkel">Datang ke bengkel</option>
                      </select>
                  </div>

                  <div class="col-lg-12 form-group">
                    <?php if (isset($_SESSION["customer"])):?>
                    <button class="btn btn-dark" name="booking">Booking Sekarang</button>
                    <?php else: ?>
                    <button class="btn btn-dark" name="login">Lakukan Login</button> 
                    <?php endif ?>  
                  </div>
                </div>
              </div>
            </form>
          </div>
          </div>
        </section>

        <!-- SCRIPT PHP AREA -->
        <?php
            if (isset($_POST["booking"]))
            {
                $id_customer = $_SESSION['customer']['id_customer'];
                $nama_customer = $_POST['nama'];
                $modelkendaraan = $_POST['type'];
                $telepon=$_POST["telepon"];
                $tanggal =    $_POST['tanggal'];
                $tanggalan = date('Y-m-d', strtotime($tanggal));
                $keluhancs = $_POST['keluhan'];
                $alamat = $_POST['alamat'];
                $jenisservice = $_POST['service'];

                $conn->query("INSERT INTO dataservice (id_customer,nama_customer,type_kendaraan,no_telp,tanggal_booking,alamat,keluhan,jenis_service) VALUES ('$id_customer','$nama_customer','$modelkendaraan','$telepon','$tanggalan','$alamat','$keluhancs','$jenisservice') ");

                //Notifikasi pembelian
                echo "<script>alert('Data Telah diterima!');</script>";
                echo"<script>location='home.php';</script>";

            }
            elseif ((isset($_POST['login']))) 
            {
              echo "<script>alert('Silahkan melakukan login terlebih dahulu!');</script>";
              echo "<script>location='login/login_page.php';</script>";          
            }
            ?>
        <!-- SCRIPT PHP AREA -->

      <footer class="bg-dark text-white">
        <div class="container py-4">
          <div class="row py-5">
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Customer services</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#">Help &amp; Contact Us</a></li>
                <li><a class="footer-link" href="#">Returns &amp; Refunds</a></li>
                <li><a class="footer-link" href="#">Online Stores</a></li>
                <li><a class="footer-link" href="#">Terms &amp; Conditions</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Company</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#">What We Do</a></li>
                <li><a class="footer-link" href="#">Available Services</a></li>
                <li><a class="footer-link" href="#">Latest Posts</a></li>
                <li><a class="footer-link" href="#">FAQs</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h6 class="text-uppercase mb-3">Social media</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#">Twitter</a></li>
                <li><a class="footer-link" href="#">Instagram</a></li>
                <li><a class="footer-link" href="#">Tumblr</a></li>
                <li><a class="footer-link" href="#">Pinterest</a></li>
              </ul>
            </div>
          </div>
          <div class="border-top pt-4" style="border-color: #1d1d1d !important">
            <div class="row">
              <div class="col-lg-6">
                <p class="small text-muted mb-0">&copy; 2021 All rights reserved.</p>
              </div>
              <div class="col-lg-6 text-lg-right">
                <p class="small text-muted mb-0">Website Designed by <a class="text-white reset-anchor" href="#">PRO COOL &copy;</a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
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