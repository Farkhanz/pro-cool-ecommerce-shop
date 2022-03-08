<?php
session_start();
$conn = new mysqli ("localhost","root","","prodb"); 
require_once '../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

$tgl_satu = $_GET['tanggalfirst'];
$tgl_dua  = $_GET['tanggalsec'];
$setatus  = $_GET['statusnya'];
$semuarincian = array();
    $culik =  $conn->query("SELECT * FROM pembelian_barang pb LEFT JOIN pembelian_customer pc ON
        pb.id_customer=pc.id_customer WHERE status_pembelian='$setatus' AND tanggal_pembelian BETWEEN '$tgl_satu' AND '$tgl_dua' ");
    while($bagi = $culik->fetch_assoc())
    {
        $semuarincian[]=$bagi;
    }

    $data = "<img src ='img/prologo.jpg' width='160px' >";
    $data.= "<h3>PRO COOL Specialist AC Mobil</h3>";
    $data.= "<h4>Jl. Wisanggeni No.7, RT.6/RW.15, Pd. Benda, Kec. Pamulang, Kota Tangerang Selatan, Banten 15416, Telp. 081383409506</h4>";
    $data.= "<h4></h4>";
    $data.= "<h3>Laporan Pembelian ".$setatus."</h3>";
    $data.= "<h5>Mulai ".date("d F Y",strtotime($tgl_satu))." hingga ".date("d F Y",strtotime($tgl_dua))."</h5>";
    $data.= "<table class='table table-bordered' border='1'>";
    $data.= "<thread>";
    $data.=" <tr>
    <th>No</th>
    <th>Nama Pelanggan</th>
    <th>Tanggal Pembelian</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
            <th>Status</th>
        </tr>";
        $data.= "</thread>";
        $data.= "<tbody>";
         $total=0; 
         foreach ($semuarincian as $key => $value): 
         $total+=$value['total_pembelian'];
         $nomor = $key+1;
         $data.="<tr>";
         $data.= "<td>".$nomor." </td>";
         $data.="<td>".$value["nama_customer"]."</td>";
         $data.="<td>".date("d F Y",strtotime($value["tanggal_pembelian"]))."</td>";
         $data.="<td>".($value["jumlah"])."</td>";
         $data.="<td>Rp. ".number_format($value["harga_barang"]).",00</td>";
         $data.="<td>Rp. ".number_format($value["subharga"]).",00</td>";
         $data.="<td>".$value["status_pembelian"]."</td>";
         $data.="</tr>";
        endforeach;
        $data.= "</tbody>";
        $data.="<tfoot>";
        $data.="<tr>";
        $data.="<th colspan='5'>Total</th>";
        $data.="<th>Rp. ".number_format($total).",00</th>";
        $data.="<th></th>";    
        $data.="</tr>";
        $data.="</tfoot>";        

        $data.="</table>";

// Write some HTML code:
$mpdf->WriteHTML($data);

// Output a PDF file directly to the browser
$mpdf->Output("procool-laporan.pdf","I");