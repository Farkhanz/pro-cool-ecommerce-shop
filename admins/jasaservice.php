<h4>Data Jasa Service</h4>
<table class="table table-bordered">
	 <thread>
        <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Type Mobil</th>
            <th>No Telepon</th>
            <th>Waktu Booking</th>
            <th>Keluhan</th>
            <th>Opsi</th>
        </tr>
    </thread>
     <thread>
        <?php $nomor=1; ?>
        <?php $culik=$conn->query("SELECT * FROM dataservice");?>
        <?php while ($bagi = $culik->fetch_assoc()){?>
        <tr>
            <th><?php echo $nomor; ?></th>
            <th><?php echo $bagi['nama_customer']; ?></th>
            <th><?php echo $bagi['type_kendaraan']; ?></th>
            <th><?php echo $bagi['no_telp']; ?></th>
            <th><?php echo $bagi['tanggal_booking']; ?></th>
            <th><?php echo $bagi['keluhan']; ?></th>
            <th><a href="index.php?halaman=rinciandataservice&id_urut=<?php echo $bagi["id_urut"]?>" class="btn-danger btn">Tinjau</a></th>

        <?php $nomor++;?>
    <?php } ?>


