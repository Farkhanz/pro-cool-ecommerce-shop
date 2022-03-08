<h4>Pembayaran</h4>
<!-- SCRIPT PHP AREA -->
<?php 
$id_pembelian = $_GET['id_pembelian'];
$culik = $conn->query("SELECT*FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$rincian = $culik->fetch_assoc();

?>
<!-- SCRIPT PHP AREA -->
<div class="container">
<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <td><?php echo $rincian['nama'] ?></td>
            </tr>
            <tr>
                <th>Bank</th>
                <td><?php echo $rincian['bank'] ?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td><?php echo $rincian['jumlah'] ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?php echo $rincian['tanggal'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="../bukti_pembayaran/<?php echo $rincian['buktifoto'] ?>" alt="" class="img-responsive">
    </div>
</div>

<form method="post">
    <div class="form-group">
    <label>No Resi Pengiriman</label>
    <input type="text" class="form-control" name="resi"></input>
    </div>
    <div class="form-group">
    <label>Status</label>
         <select type="text" class="form-control" name="status">
            <option value="">Pilih Status</option>
            <option value="lunas">Lunas</option>
            <option value="barang dikirim">Barang Dikirim</option>
            <option value="batal">Batal</option>
        </select>
    </div>
    <button class="btn btn-primary" name="proses">Proses</button>
</form>
</div>
<!-- SCRIPT PHP AREA -->
<?php
if (isset($_POST["proses"]))
{
    $resi = $_POST["resi"];
    $status = $_POST["status"];
    $conn->query("UPDATE pembelian_customer SET resi_pengiriman='$resi', status_pembelian='$status'
    WHERE id_pembelian='$id_pembelian'");
    echo "<script>alert('Data Pembelian sudah diperbaharui!');</script>";
    echo"<script>location='index.php?halaman=pembelian';</script>";
}
?>
<!-- SCRIPT PHP AREA -->
