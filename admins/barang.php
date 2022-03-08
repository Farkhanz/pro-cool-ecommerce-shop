<h4>Data Produk Penjualan</h4>
<table class="table table-bordered">
    <thread>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Berat Barang (Gr.)</th>
            <th>Jumlah Stock</th>
            <th>Deskripsi</th>
            <th>Foto Barang</th>
            
            <th>Aksi</th>
        </tr>
    </thread>
    <tbody>

        <!-- SCRIPT PHP AREA -->
        <?php $nomor=1; ?>
        <?php $culik=$conn->query("SELECT * FROM barang");?>
        <?php while ($bagi = $culik->fetch_assoc()){?>
    <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $bagi['nama_barang']; ?></td>
        <td><?php echo number_format($bagi['harga_barang'])?></td>
        <td><?php echo $bagi['berat_barang']; ?> Gr.</td>
        <td><?php echo $bagi['persediaan']; ?></td>
        <td><?php echo $bagi['deskripsi_barang']; ?></td>
        <td>
        <img src="../../procool/fotobarang/<?php echo $bagi['foto_barang']; ?>" width="100">
        </td>
        <td>
        <a href="index.php?halaman=hapusbarang&id=<?php echo $bagi['id_barang']; ?>" onclick=" return confirm(' Apa Anda Yakin Ingin Menghapus Data ?')" class="btn btn-info">Hapus</a>
        <a href="index.php?halaman=ubahbarang&id=<?php echo $bagi['id_barang']; ?>" class="btn btn-info">Ubah</a>
        </td>
    </tr>
        <?php $nomor++;?>
        <?php } ?>
        <!-- SCRIPT PHP AREA -->
        
    </tbody>

    </tbody>

<!-- SCRIPT PHP NANTI DITENGAH SINI -->

<!-- SCRIPT PHP NANTI DITENGAH SINI -->
</table>

<a href="index.php?halaman=tambahbarang" class="btn btn-primary">tambah barang</a>