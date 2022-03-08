<h4>Detail Pembelian Barang</h4>

<?php
$culik=$conn->query("SELECT * FROM pembelian_barang JOIN pembelian_customer ON pembelian_customer.id_pembelian=pembelian_barang.id_pembelian_barang");
$info = $culik->fetch_assoc();
?>

<div class="row">
    <div class="col-md-4">
        <h3>Pembelian</h3>
        <p>
        Tanggal :  <br>
        Total   :  <br>
        Status  : -
    </p>
    </div>

    <div class="col-md-4">
        <h3>Pelanggan</h3>
        Nama Pelanggan : <strong></strong> <br>
        <p>
  
        Nomor Telp :  <br>
        Email      :  <br>

        </p>

    </div>

    <div class="col-md-4">
        <h3>Pengiriman</h3>
    
        Kurir : <strong></strong><br>
    <p>
        Tarif   : Rp. <br>
        Alamat  : 
    </p>
    </div>