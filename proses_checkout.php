<?php
session_start();
$conn = new mysqli ("localhost","root","","prodb"); 
?>

        <!-- SCRIPT PHP AREA -->
        <?php
        if (isset($_POST["checkout"]))
        {
          //Menyimpan data customer
          $id_customer = $_SESSION['customer']['id_customer'];
          $id_ongkir = $_POST['id_ongkir'];
          $tanggal_pembelian = date("Y-m-d");

          $culik = $conn->query("SELECT * FROM ongkos_kirim WHERE id_ongkir='$id_ongkir'");
          $arrayongkos = $culik->fetch_assoc();
          $tarif = $arrayongkos['tarif'];

          $total_pembelian = $totalbelanja + $tarif; 

          //Menyimpan data pembelian
          $conn->query("INSERT INTO pembelian_barang (id_customer,id_ongkir,tanggal_pembelian,total_pembelian) VALUES ('$id_customer','$id_ongkir','$tanggal_pembelian','$total_pembelian') ");
        }
        ?>
        <!-- SCRIPT PHP AREA -->

        <?php
        if (isset($_POST["checkout"]))
        {
          //Mengambil data dari form
          $id_customer = $_SESSION['customer']['id_customer'];
          $id_ongkir = $_POST['id_ongkir'];
          $tanggal_pembelian = date("Y-m-d");
          $alamat_pengiriman = $_POST['address'];
          $nama_customer = $_POST['nama'];

          //lanjutan
          //$nama_pembeli = $_POST['nama'];
          //$alamat_email = $_POST['email'];
          //$kontak = $_POST['telepon'];
          //$kota = $_POST['kota'];
          //$provinsi = $_POST['provinsi'];

          $culik = $conn->query("SELECT * FROM ongkos_kirim WHERE id_ongkir='$id_ongkir'");
          $arrayongkos = $culik->fetch_assoc();
          $tarif = $arrayongkos['tarif'];
          $ekspedisi = $arrayongkos['ekspedisi'];
          $result = $totalbelanja;
          $total_pembelian = $totalbelanja + $tarif; 

          //Menyimpan data pembelian
          $conn->query("INSERT INTO pembelian_customer (id_customer,nama_customer,id_ongkir,tanggal_pembelian,total_pembelian,ekspedisi,tarif,alamat_pengiriman) VALUES ('$id_customer','$nama_customer','$id_ongkir','$tanggal_pembelian','$result','$ekspedisi','$tarif','$alamat_pengiriman') ");
        }
        ?>