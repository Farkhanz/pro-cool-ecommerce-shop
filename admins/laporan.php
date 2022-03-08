<!-- SCRIPT PHP AREA -->
<?php
$semuarincian=array();
$tgl_satu="-";
$tgl_dua="-";
$setatus = "";
if (isset($_POST["check"])) 
{
    $tgl_satu = $_POST['tanggalfirst'];
    $tgl_dua  = $_POST['tanggalsec'];
    $setatus = $_POST['statusnya'];
    $culik =  $conn->query("SELECT * FROM pembelian_barang pb LEFT JOIN pembelian_customer pc ON
        pb.id_customer=pc.id_customer WHERE status_pembelian='$setatus' AND tanggal_pembelian BETWEEN '$tgl_satu' AND '$tgl_dua' ");
    while($bagi = $culik->fetch_assoc())
    {
        $semuarincian[]=$bagi;
    }

    // echo "<pre>";
    // print_r($semuarincian);
    // echo "</pre>";
}
?>
<!-- SCRIPT PHP AREA -->

<h4>Laporan Transaksi per <?php echo $tgl_dua ?></h4>

<form method="post">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" class="form-control" name="tanggalfirst" value="<?php echo $tgl_satu ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" class="form-control" name="tanggalsec" value="<?php echo $tgl_dua ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="statusnya">
                    <option value="">Pilih Statusnya</option>
                    <option value="sedang diproses" <?php echo $setatus=="sedang diproses"?"selected":""; ?> >sedang diproses</option>
                    <option value="barang dikirim" <?php echo $setatus=="barang dikirim"?"selected":""; ?>>barang dikirim</option>
                    <option value="barang dikirim" <?php echo $setatus=="barang dikirim"?"selected":""; ?>>lunas</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <label>&nbsp;</label><br>
            <button class="btn btn-danger" name="check">TINJAU</button>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $total=0; ?>
        <?php foreach ($semuarincian as $key => $value): ?>
        <?php $total+=$value['total_pembelian'] ?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value["nama_customer"] ?></td>
            <td><?php echo date("d F Y", strtotime($value["tanggal_pembelian"])) ?></td>
            <td><?php echo $value["jumlah"] ?></td>
            <td>Rp. <?php echo number_format($value["total_pembelian"]) ?></td>
            <td><?php echo $value["status_pembelian"] ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">Total</th>
            <th>Rp. <?php echo number_format($total) ?></th>
        </tr>
    </tfoot>
</table>
<a href="download_laporan.php?tanggalfirst=<?php echo $tgl_satu ?>&tanggalsec=<?php echo $tgl_dua?>&statusnya=<?php echo $setatus?>">Download PDF </a>