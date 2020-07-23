<?php
include '../config.php';
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$nip = $_POST['nip'];
$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$date1 = str_replace('/', '-', $tgl_awal );
$date2 = str_replace('/', '-', $tgl_akhir );
$datenow = date("d F Y");

$awal = date("Y-m-d", strtotime($date1));  
$akhir = date("Y-m-d", strtotime($date2));  
if($nip == "NULL"){
	$query = mysqli_query($connect,"SELECT * FROM laporan a, tb_siswa b, tb_kelas c, tb_guru d where a.nisn = b.nisn and a.nip=d.nip and c.id_kls=b.id_kls and DATE(a.tgl_lap) BETWEEN '$awal' and '$akhir' order by a.nip");
	$queryd = mysqli_query($connect,"SELECT * FROM tb_guru where nip=$nip");
}else{
$query = mysqli_query($connect,"SELECT * FROM laporan a, tb_siswa b, tb_kelas c, tb_guru d where a.nisn = b.nisn and a.nip=d.nip and c.id_kls=b.id_kls and a.nip=$nip and DATE(a.tgl_lap) BETWEEN '$awal' and '$akhir'");
$queryd = mysqli_query($connect,"SELECT * FROM tb_guru where nip=$nip");
}
$html = '<center><h3 > Cetak Laporan Konseling</h3>';
$html .= '<p> Tanggal '. $tgl_awal.' Sampai '.$tgl_akhir.'</p></center><hr/><br/>';
$html .= '<table border="1" style="border-collapse:collapse;" width="100%">
 <tr>
 <th>No</th>
  <th>NISN Siswa</th>
 <th>Nama Siswa</th>
 <th>Nama Guru</th>
 <th>Topik</th>
 <th>Uraian Masalah</th>
 <th>Alternatif</th>
 <th>Tindak Lanjut</th>
 <th>Tanggal</th>
 </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $dates = strtotime($row['tgl_lap']);
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['nisn']."</td>
 <td>".$row['nm_siswa']."</td>
 <td>".$row['nm_guru']."</td>
 <td>".$row['topik']."</td>
 <td>".$row['uraian']."</td>
 <td>".$row['alternatif_mslh']."</td>
 <td>".$row['tindak_lanjut']."</td>
 
 <td>".date('d-m-Y h:m:s',$dates)."</td>
 </tr>";
 $no++;
}


while($rowd = mysqli_fetch_array($queryd))
{
    
$html .= "<p align='right'>".$rowd['nm_guru']."</p>";
}
$html .= "<br/><br/><p align='right'></p>";

$html .= "<p align='right'>Pekalongan, ".$datenow."</p>";
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_siswa.pdf');
?>