<!-- SCRIPT PHP AREA -->
<?php
$idrut = $_GET['id_urut'];
$culik = $conn->query("SELECT * FROM dataservice WHERE id_urut='$idrut'");
$rincian = $culik->fetch_assoc();
?>
<!-- SCRIPT PHP AREA -->
<div class="container">
<h4>Rincian Data Servis</h4>
<div class="row">
    <div class="col-md-9">
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <td><?php echo $rincian['nama_customer'] ?></td>
            </tr>
            <tr>
                <th>Type Kendaraan</th>
                <td><?php echo $rincian['type_kendaraan'] ?></td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td><?php echo $rincian['no_telp'] ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $rincian['alamat'] ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?php echo $rincian['tanggal_booking'] ?></td>
            </tr>
            <tr>
                <th>Keluhan</th>
                <td><?php echo $rincian['keluhan'] ?></td>
            </tr>
            <tr>
                <th>Jenis service</th>
                <td><?php echo $rincian['jenis_service'] ?></td>
            </tr>
        </table>
    </div>
</div>

<form method="post">
    <div class="form-group">
    <label>Montir</label>
         <select type="text" class="form-control" name="montir">
            <option value="">Daftar Montir</option>
            <option value="Ardo">Ardo</option>
            <option value="David">David</option>
            <option value="Datang ke bengkel">Datang ke bengkel</option>
        </select>
    </div>
    <label>Status</label>
         <select type="text" class="form-control" name="status">
            <option value="">Pilih Status</option>
            <option value="terkonfirmasi">Terkonfirmasi</option>
            <option value="batal">Batal</option>
        </select>
        <br>
        <button class="btn btn-primary" name="confirm">Konfirmasi</button>
    </div>
</form>
</div>
<!-- SCRIPT PHP AREA -->
<?php
if (isset($_POST["confirm"]))
{
    $teknisi = $_POST["montir"];
    $status = $_POST["status"];
    $conn->query("UPDATE dataservice SET montir='$teknisi', status_booking='$status'
    WHERE id_urut='$idrut'");
    echo "<script>alert('Data Sudah Dikirim!');</script>";
    echo"<script>location='index.php?halaman=dataservice';</script>";
}
?>
<!-- SCRIPT PHP AREA -->
