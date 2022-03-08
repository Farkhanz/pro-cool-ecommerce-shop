<h4>Saran dan Masukan</h4>

<table class="table table-bordered">
    <thread>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Saran dan Masukan</th>
        </tr>
    </thread>
    <thread>
        <?php $nomor=1; ?>
        <?php $culik=$conn->query("SELECT * FROM saranmasukan");?>
        <?php while ($bagi = $culik->fetch_assoc()){?>

        <tr>
            <th><?php echo $nomor; ?></th>
            <th><?php echo $bagi['nama']; ?></th>
            <th><?php echo $bagi['saran_isi']; ?></th>
        </tr>
            <?php $nomor++;?>
    <?php } ?>
</thread>