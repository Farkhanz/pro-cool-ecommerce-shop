<h4>Data Pembelian</h4>
<table class="table table-bordered">
    <thread>
        <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Ekspedisi</th>
            <th>Tarif</th>
            <th>Total Pembelian</th>
            <th>Alamat Pembelian</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thread>
    <tbody>
        <?php $nomor=1; ?>
        <?php $culik=$conn->query("SELECT * FROM pembelian_customer join pembelian_barang on pembelian_customer.
         id_customer=pembelian_barang.id_customer"); ?>
        <?php while ($bagi = $culik->fetch_assoc()){?>
    <tr>
            <th><?php echo $nomor; ?></th>
            <th><?php echo $bagi['nama_customer']; ?></th>
            <th><?php echo $bagi['nama_barang']; ?></th>
            <th><?php echo $bagi['jumlah']; ?></th>
            <th><?php echo $bagi['subharga']; ?></th>
            <th><?php echo $bagi['ekspedisi']; ?></th>
            <th><?php echo $bagi['tarif']; ?></th>
            <th><?php echo $bagi['total_harga']; ?></th>
            <th><?php echo $bagi['alamat_pengiriman']; ?></th>
            <th><?php echo $bagi['status_pembelian']; ?></th>    
            <td>              
            <th><a href="index.php?halaman=pembayaran&id_pembelian=<?php echo $bagi["id_pembelian"]?>" class="btn-danger btn">Rincian</a></th>
        </tr>
        <?php $nomor++;?>
        <?php } ?>
    </thread>
