<!-- SCRIPT PHP AREA -->
    <?php 
    session_start();
    $conn = new mysqli ("localhost","root","","prodb"); 
 
// amankan login 
if (!isset($_SESSION['admin']))
{
    echo"<script>alert('anda harus login ');</script>";
    echo"<script>location='login.php';</script>";
    header('location:login_admin.php');
    exit();


}

    ?>
<!-- SCRIPT PHP AREA -->

<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    PRO COOL | BINARY ADMIN
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
        </a>
        <a href="template.html" class="simple-text logo-normal">
          ADMIN PRO COOL
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="index.php">
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="index.php?halaman=barang">
              <p>Barang</p>
            </a>
          </li>
          <li>
            <a href="index.php?halaman=pembelian">
              <p>Pembelian</p>
            </a>
          </li>
          <li>
            <a href="index.php?halaman=dataservice">
              <p>Jasa Service</p>
            </a>
          </li>
		  <li>
            <a href="index.php?halaman=datapelanggan">
              <p>Data Customer</p>
            </a>
          </li>
          <li>
            <a href="index.php?halaman=laporan">
              <p>Laporan Transaksi</p>
            </a>
          </li>
          <li>
            <a href="index.php?halaman=saranmasukan">
              <p>Saran dan Masukan</p>
            </a>
          </li>
		  <li>
            <a href="index.php?halaman=logout">
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" style="height: 100vh;">
		
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=="barang")
                    {
                        include'barang.php';
                    }

                    elseif ($_GET['halaman']=="pembelian")
                    {
                        include'pembelian.php';
                    }

                    elseif ($_GET['halaman']=="datapelanggan")
                    {
                        include'datapelanggan.php';
                    }

                    elseif ($_GET['halaman']=="detail")
                    {
                        include'detail.php';
                    }

                    elseif ($_GET['halaman']=="tambahbarang")
                    {
                        include'tambahbarang.php';
                    }

                    elseif ($_GET['halaman']=="hapusbarang")
                    {
                        include'hapusbarang.php';
                    }

                    elseif ($_GET['halaman']=="ubahbarang")
                    {
                        include'ubahbarang.php';
                    }

                    elseif ($_GET['halaman']=="logout")
                    {
                        include'logout.php';
                    }
                    elseif ($_GET['halaman']=="pembayaran")
                    {
                        include'pembayaran.php';
                    }
                    elseif ($_GET['halaman']=="rinciandataservice")
                    {
                        include'rincian-dataservice.php';
                    }
                    elseif ($_GET['halaman']=="laporan")
                    {
                        include'laporan.php';
                    }
                    elseif ($_GET['halaman']=="dataservice")
                    {
                        include'jasaservice.php';
                    }
                    elseif ($_GET['halaman']=="download_laporan")
                    {
                        include'download_laporan.php';
                    }
                    elseif ($_GET['halaman']=="saranmasukan")
                    {
                        include'saranmasukan.php';
                    }
                  }
                else
                {
                        include'home.php';
                    
                }
                ?>
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
    <!-- Body HTML -->
   
</body>

</html>
