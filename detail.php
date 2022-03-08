<!-- SCRIPT PHP AREA -->
<?php session_start();
include 'koneksi/connect.php';
?>
<!--ambil id dari url-->
<?php 
$id_barang = $_GET["id"];
// query koneksi 
$culik = $conn->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
$info = $culik->fetch_assoc();

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
    <div class="page-holder bg-light">

      <!-- SCRIPT PHP AREA -->
      <!-- NAVIGATION BAR-->
      <?php
      include 'navbar.php';
      ?>
      <!-- NAVIGATION BAR-->
      <!-- SCRIPT PHP AREA -->

      <section class="py-5">
        <div class="container">
          <div class="row mb-5">
            <div class="col-lg-6">
              <!-- PRODUCT SLIDER-->
              <div class="row m-sm-1">
                <!--<div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0">
                  <div class="owl-thumbs d-flex flex-row flex-sm-column" data-slider-id="1">
                    <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="img/product-detail-1.jpg" alt="..."></div>
                    <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="img/product-detail-2.jpg" alt="..."></div>
                    <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="img/product-detail-3.jpg" alt="..."></div>
                    <div class="owl-thumb-item flex-fill mb-2"><img class="w-100" src="img/product-detail-4.jpg" alt="..."></div>
                  </div>
                </div>-->
                <div class="col-sm-10 order-1 order-sm-2">
                  <div class="owl-carousel product-slider" data-slider-id="1"><a class="d-block" href="fotobarang/<?php echo $info['foto_barang'];?>" data-lightbox="product" title="Product item 1"><img class="img-fluid" src="fotobarang/<?php echo $info['foto_barang'];?>" alt="..."></a><!--<a class="d-block" href="img/product-detail-2.jpg" data-lightbox="product" title="Product item 2"><img class="img-fluid" src="img/product-detail-2.jpg" alt="..."></a><a class="d-block" href="img/product-detail-3.jpg" data-lightbox="product" title="Product item 3"><img class="img-fluid" src="img/product-detail-3.jpg" alt="..."></a><a class="d-block" href="img/product-detail-4.jpg" data-lightbox="product" title="Product item 4"><img class="img-fluid" src="img/product-detail-4.jpg" alt="..."></a>--></div>
                </div>
              </div>
            </div>
            <!-- PRODUCT SLIDER-->
      
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
              <ul class="list-inline mb-2">
                <!--<li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>-->
              </ul>

              <!-- SCRIPT PHP AREA -->

              <!-- SCRIPT PHP AREA -->

              <h1><?php echo $info["nama_barang"]?></h1>
              <p class="text-muted lead">Rp. <?php echo number_format($info["harga_barang"]) ?></p>
              <p class="text-small mb-4">Stock barang : <?php echo $info["persediaan"] ?></p>
              <div class="form-group">
              <form method="post">
              <div class="row align-items-stretch mb-4">
                <div class="col-sm-5 pr-sm-0">
                  <div class=""><span class=""></span>
                    <input class="form-control form-control-lg" id="firstName" type="text" placeholder="Berapa yang mau dibeli?" name="jumlah" autocomplete="off">
                    <div class="quantity">
                      <!--<button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                      <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                      <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>-->
                    </div>
                  </div>
                </div>
                <?php if (isset($_SESSION["customer"])):?>
                <button class="btn btn-dark" name="beli">Tambah Keranjang</button>
                <?php else: ?>
                <button class="btn btn-dark" name="login">Login untuk membeli</button>
                <?php endif ?>  
                 </div>
                </div><br>
              <ul class="list-unstyled small d-inline-block">
              </ul>
            </div>
          </div>
          <!-- PRODUCT DETAILS-->

                <!-- SCRIPT PHP AREA -->
                <?php 
                    if (isset($_POST["beli"]))
                    {
                        $jumlah = $_POST["jumlah"];
                        $_SESSION["cart"][$id_barang] = $jumlah;
                        
                        echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
                        echo "<script>location='cart.php';</script>";

                    }
                    elseif ((isset($_POST["login"]))) 
                    {
                      echo "<script>alert('Silahkan melakukan login terlebih dahulu!');</script>";
                      echo "<script>location='login/login_page.php';</script>";
                    }

                ?>
                <!-- SCRIPT PHP AREA -->
      
          <!-- DETAILS TABS-->
          <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Deskripsi</a></li>
          </ul>
          <!-- DETAILS TABS-->
      
          <!-- DESKRIPSI BARANG -->
          <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <div class="p-4 p-lg-5 bg-white">
                <h6 class="text-uppercase">Tentang barang</h6>
                <p class="text-muted text-small mb-0"><?php echo $info["deskripsi_barang"] ?></p>
              </div>
            </div>
          <!-- DESKRIPSI BARANG -->


      </section>
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
                <p class="small text-muted mb-0">&copy; 2020 All rights reserved.</p>
              </div>
              <div class="col-lg-6 text-lg-right">
                <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor" href="https://bootstraptemple.com/p/bootstrap-ecommerce">Bootstrap Temple</a></p>
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