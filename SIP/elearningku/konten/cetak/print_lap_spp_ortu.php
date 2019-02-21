<?php 
 // Define relative path from this script to mPDF
 $nama_dokumen='LAPORAN SPP'; //Beri nama file PDF hasil.
define('_MPDF_PATH','MPDF57/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>


<html>
<head>
<title>Rekap Pembayaran SPP</title>
<link rel="stylesheet" href="MPDF57/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="MPDF57/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="MPDF57/progbar.css" type="text/css"/>
</head>
<body>
<?php
//Mengambil Koneksi
include('../../../konfigurasi/koneksi.php');
// Mengambil Method Dari $_GET
$bln_thn_temp=explode("-",$_GET['periode']);
$bln=$bln_thn_temp[0];
$thn=$bln_thn_temp[1];
//Array Nama Bulan
$bulan=array("Januari","Februari", "Maret", "April","Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
$namabulan=$bulan[$bln-1];

echo " <div class=main>
		<h2 align=center class=heading>
			Laporan Pembayaran SPP
		</h2>
		<table width=100% class=table>
		<tr bgcolor=#dedede>
		<th>No</th>
		<th>No. Induk</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Tanggal Bayar</th>
		<th>Jumlah</th>
		</tr>";
		
		// Mencari Data sesuai Tingkat dan method get diambil dari halaman sebelumnya
		$data_siswa = mysql_query("select * from sh_kelas , sh_siswa ,sh_byrspp ,sh_ortu where sh_kelas.id_kelas = sh_siswa.id_kelas AND
									sh_ortu.id_siswa = sh_siswa.id_siswa AND
									sh_ortu.id_ortu = '$_GET[orangtua]' AND
									sh_byrspp.nis = sh_siswa.nis");
		// Perulangan Dari $data_siswa										
		while ($isi_siswa=mysql_fetch_array($data_siswa)){
		$no++;

		$data_spp = mysql_fetch_array(mysql_query("select * from sh_byrspp , sh_spp
			where sh_byrspp.id_spp = sh_spp.id_spp AND
			sh_byrspp.nis='$isi_siswa[nis]'"));
			
			// Untuk Merubah Outpout Angka Int DB jadi Format Mata Uang
			$jumlah = number_format($data_spp['jumlah'],0,",", ",");
			echo "<tr class=tabel>
			<td class=tabel>$no.</td>
			<td class=tabel>$isi_siswa[nis]</td>
			<td class=tabel>$isi_siswa[nama_siswa]</td>
			<td class=tabel>$isi_siswa[nama_kelas]</td>
			<td class=tabel>$data_spp[tgl_bayar]</td>
			<td class=tabel>Rp." . $jumlah. ",-</td>
			</tr>";
			} // End Of While
			echo "</table>
			    </div>";

?>

<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
</body>
</html>