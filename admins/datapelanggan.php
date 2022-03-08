<h4>Data Customer</h4>

<table class="table table-bordered">
    <thread>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telephone</th>
            
            <th>Aksi</th>
        </tr>
    </thread>
    <thread>
        <?php $nomor=1; ?>
        <?php $culik=$conn->query("SELECT * FROM customer");?>
        <?php while ($bagi = $culik->fetch_assoc()){?>
        <tr>
            <th><?php echo $nomor; ?></th>
            <th><?php echo $bagi['nama']; ?></th>
            <th><?php echo $bagi['email']; ?></th>
            <th><?php echo $bagi['no_telepon']; ?></th>
            
            <th><a href="hapus_customer.php?id_customer=<?php echo $bagi["id_customer"]?>" onclick=" return confirm(' Apa Anda Yakin Ingin Menghapus Data ?')" class="btn-danger btn">Hapus</a></th>
        </tr>
        <?php $nomor++;?>
    <?php } ?>
    </thread>