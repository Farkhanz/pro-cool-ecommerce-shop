    <div class="page-holder">
<!-- NAVIGATION BAR -->
      <header class="header bg-white">
        <div class="container px-0 px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="home.php"><span class="font-weight-bold text-uppercase text-dark">PRO COOL</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <!-- Link--><a class="nav-link active" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="form-dataservice.php">Jasa Service</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="about.php">Tentang</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="saran-masukan.php">Saran</a>
                </li>
                <!--<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                  <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.html">Homepage</a><a class="dropdown-item border-0 transition-link" href="shop.html">Category</a><a class="dropdown-item border-0 transition-link" href="detail.html">Product detail</a><a class="dropdown-item border-0 transition-link" href="#">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="#">Checkout</a></div>
                </li>-->
              </ul>
              <ul class="navbar-nav ml-auto">
                
              <!-- Sudah login customer -->               
              <?php if (isset($_SESSION["customer"])):?>
                <li class="nav-item"><a class="nav-link" href="cart.php"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Keranjang<small class="text-gray"></small></a></li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Riwayat</a>
                  <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="riwayat-customer.php">Pembelian</a><a class="dropdown-item border-0 transition-link" href="booking-service.php">Booking Jasa Service</a></div>
                </li>

                <li class="nav-item"><a class="nav-link" href="../procool/login/logout.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>Logout</a></li>

                <!-- belum login -->
                <?php else: ?>
                <!--<li class="nav-item"><a class="nav-link" href="#"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Keranjang<small class="text-gray"></small></a></li>-->
                <!-- <li class="nav-item"><a class="nav-link" href="#"> <i class="far fa-heart mr-1"></i><small class="text-gray"> (0)</small></a></li> -->

                <li class="nav-item"><a class="nav-link" href="../procool/login/login_page.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>

              <?php endif ?>
              </ul>
            </div>
          </nav>
        </div>
      </header>
      <!-- NAVIGATION BAR-->