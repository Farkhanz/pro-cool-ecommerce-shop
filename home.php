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

			<!-- HERO SECTION-->
			<div class="container">
				<section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(img/ac-mobil-banner.jpg)">
					<div class="container py-5">
						<div class="row px-4 px-lg-5">
							<div class="col-lg-6">
								<p style="color:#ffffff";>SELAMAT DATANG DI ONLINE SPAREPART SHOP</p>
								<h1 style="color:#ffffff";>PRO COOL SPESIALIST AC MOBIL</h1>
							</div>
						</div>
					</div>
				</section>
				<!-- HERO SECTION-->
				
				<!-- ETALASE BARANG -->
				<section class="py-5">
					<header>
						<p class="small text-muted small text-uppercase mb-1">Pro Cool</p>
						<h2 class="h5 text-uppercase mb-4">Etalase barang</h2>
					</header>
					<div class="row">

					<!-- SCRIPT PHP AREA -->
						    <?php $culik = $conn->query("SELECT * FROM barang"); ?>
    						<?php while($perbarang = $culik->fetch_assoc()){?>
    				<!-- SCRIPT PHP AREA -->

						<!-- DATA BARANG -->
						<div class="col-xl-3 col-lg-4 col-sm-6">
			              <div class="product text-center">
			                <div class="position-relative mb-3">
								<div class="badge text-white badge-"></div><a class="d-block" href="detail.php?id=<?php echo $perbarang["id_barang"];?>"><img class="img-fluid w-100" src="fotobarang/<?php echo $perbarang['foto_barang'];?>" alt="..."></a>
					                  <div class="product-overlay">
					                    <ul class="mb-0 list-inline">
											<li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="detail.php?id=<?php echo $perbarang["id_barang"];?>">Lihat Selengkapnya</a></li> 
										</ul>
									</div>
								</div>
								<h6> <a href="detail.php?id=<?php echo $perbarang["id_barang"];?>"><?php echo $perbarang['nama_barang'];?></a></h6>
								<p class="small text-muted">Rp. <?php echo number_format($perbarang['harga_barang']);?></p>
							</div>
						</div>
						<?php } ?>
						<!-- PRODUCT-->
              			</div>
            		</div>
          		</div>
        	</section>

					<!-- PAGINATION 
					<nav aria-label="Page navigation example">
							<ul class="pagination justify-content-center">
							<li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
						</ul>
					</nav>
				</section>
			</div> -->

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