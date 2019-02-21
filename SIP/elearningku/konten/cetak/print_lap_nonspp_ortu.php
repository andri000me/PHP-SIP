<?php 
 // Define relative path from this script to mPDF
 $nama_dokumen='LAPORAN BIAYA NON-SPP'; //Beri nama file PDF hasil.
define('_MPDF_PATH','MPDF57/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>

<html>
<head>
<title>Rekap Pembayaran SPP</title>
<link rel="stylesheet" href="css/style_print.css" type="text/css"/>
<link rel="stylesheet" href="MPDF57/progbar.css" type="text/css"/>
</head>
<body>
<?php
//Mengambil Koneksi
include('../../../konfigurasi/koneksi.php');
// Mengambil Method Dari $_GET
$tahun = $_GET['tahun'];
$tingkat = $_GET['tingkat'];
//Array Nama Bulan
$bulan=array("Januari","Februari", "Maret", "April","Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
$namabulan=$bulan[$bln-1];

echo " <div class=\"sd_left\">
		<div class=\"text_padding\">
		<h2 align=center>Laporan Pembayaran IURAN.</h2>
		<p align=center>Berikut ini data pembayaran iuran.</p><hr/>

                <table class=table cellspacing=0 border=1 cellpadding=0 align=center width=100%>
				<tr bgcolor=#ddd>
					<td rowspan=2>No</td>
					<td rowspan=2 align=center>No. Induk</td>
					<td rowspan=2 align=left>Nama</td>
					<td rowspan=2 >Kelas</td>
					<td colspan=1 align=center>Jenis Iuran</td>
				</tr>
				<tr bgcolor=#dedede valign=top>";
				
		
		// Mencari Data sesuai Tingkat 
		$data_nonspp=mysql_query("select * from sh_nonspp , sh_kelas , sh_siswa , sh_ortu where 
										  sh_nonspp.tingkat = sh_kelas.tingkat AND 
										  sh_kelas.id_kelas = sh_siswa.id_kelas AND
										  sh_siswa.id_siswa = sh_ortu.id_siswa AND
										  sh_ortu.id_ortu = '$_GET[orangtua]'");
	while ($isidata_nonspp=mysql_fetch_array($data_nonspp)) {
				
				// Merubah Format Mata Uang
				$jumlah_nonspp = number_format($isidata_nonspp['jumlah'],0,",", ",");
		
		echo " <th bgcolor=#e9594a class=tabel width=20% align=center><font color=#ecf0f1>$isidata_nonspp[jenis_tagihan] <br> Rp." . $jumlah_nonspp. ",- </font></th>";
		
		} // End Of While
				
		echo " </tr>";
		
			// Query Menampilkan Data
			$data_siswa=mysql_query("select * from sh_kelas , sh_siswa , sh_ortu where 
										  sh_kelas.id_kelas = sh_siswa.id_kelas AND
										  sh_siswa.id_siswa = sh_ortu.id_siswa AND
										  sh_ortu.id_ortu = '$_GET[orangtua]'");
			 
			
			
				//Perulangan $data_siswa						
			while ($isi_siswa=mysql_fetch_array($data_siswa)){
			$noo++;
			
			echo "<tr valign=top>
					<td width=7%>$noo.</td>
					<td align=center>$isi_siswa[nis]</td>
					<td align=left >$isi_siswa[nama_siswa]</td>
					<td align=left >$isi_siswa[tingkat] - $isi_siswa[nama_kelas]</td>";
					
			//Select data sh_nonspp dengan kondisi thn_ajaran & tingkat sama dengan variable POST diatas
			$data_nonspp2=mysql_query("select * from sh_nonspp , sh_kelas , sh_siswa , sh_ortu where 
										  sh_nonspp.tingkat = sh_kelas.tingkat AND 
										  sh_kelas.id_kelas = sh_siswa.id_kelas AND
										  sh_siswa.id_siswa = sh_ortu.id_siswa AND
										  sh_ortu.id_ortu = '$_GET[orangtua]'");
			
			//Perulangan $data_nonspp2
			while ($isidata_nonspp2=mysql_fetch_array($data_nonspp2)) {
	
			//jumlah bayar
			$jmlbyr=mysql_fetch_array(mysql_query("select sum(jumlah)as jml from sh_byrnonspp where
			nis='$isi_siswa[nis]' and id_tagihan='$isidata_nonspp2[id_tagihan]' group by id_tagihan"));
			
			//besar tunggakan
			$jml_tagihan=mysql_fetch_array(mysql_query("select jumlah from sh_nonspp where id_tagihan='$isidata_nonspp2[id_tagihan]'"));
			
			//Sisa Tagihan
			$sisa=$jml_tagihan['jumlah']-$jmlbyr['jml'];
			
			// Untuk Merubah Outpout Angka Int DB jadi Format Mata Uang
			$sisa_jumlah = number_format($sisa,0,",", ",");
			$jumlah_byr = number_format($jmlbyr['jml'],0,",", ",");
			
			//jika $jmlbyr tidak sama dengan 0
			if ($jmlbyr['jml']<>0){
			echo "<td align=left> Bayar = Rp." . $jumlah_byr. ",- <br> Sisa = Rp." . $sisa_jumlah. ",- </td>";} else {
			echo "<td align=left> Blm Bayar <br> Sisa = Rp." . $sisa_jumlah. ",- </td>";
			    }
				
			  }
			  
			} // End Of While
			
			
			
			
			
			
			// End Of While
			echo "</table>
			    </div>
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