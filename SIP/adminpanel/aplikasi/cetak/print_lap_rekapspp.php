<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<html>
<head>
<title>Rekap Pembayaran SPP</title>
<link rel="stylesheet" href="css/style_print.css" type="text/css"/>
</head>
<body>
<?php
//Mengambil Koneksi
include('config/koneksi.php');
// Mengambil Method Dari $_GET
$ta_temp=explode("/",$_GET['tahun']);
$thn=$ta_temp[0];
$thn2=$thn+1;

echo "<div class=\"sd_left\">
		<div class=\"text_padding\">
		<p align=center><a href =# onclick='window.print()' title=Print style=text-decoration:none> <img src=ico-printer.png width=75 height=75> </a> </p>
		<h2 align=center>Laporan Rekapitulasi Pembayaran SPP Tahun Ajaran $_GET[tahun].</h2>
		<p align=center>Berikut ini laporan rekapitulasi pembayaran SPP tahun ajaran $_GET[tahun].</p>
		<table width=100% border=1 cellpading=0 cellspacing=0 class=table2>
		<tr bgcolor=#dedede>
		<th rowspan=2>No</th>
		<th rowspan=2>NIS</th>
		<th rowspan=2>Nama</th>
		<th rowspan=2>Kelas</th>
		<th colspan=12>Tahun Ajaran $_GET[tahun]</th>
		</tr>
		<tr bgcolor=#dedede> ";
		
		//semewster ganjil
		for ($bln=7;$bln<=12;$bln++) {
		if (strlen($bln)==1) {$bln='0'.$bln;} else {$bln=$bln;}
		//semester genap
		echo "<th align=center>$bln</th>";
		}

		for ($bln2=1;$bln2<=6;$bln2++) {
		if (strlen($bln2)==1) {$bln2='0'.$bln2;} else {$bln2=$bln2;}
		echo "<th align=center>$bln2</th>";
		}
		
		echo "</tr>";
		
	// Query Menampilkan Data
			$data_siswa=mysql_query("select * from sh_kelas , sh_siswa where sh_kelas.id_kelas = sh_siswa.id_kelas AND 
									sh_kelas.tingkat='$_GET[tingkat]'");
			//Perulangan $data_siswa						
			while ($isi_siswa=mysql_fetch_array($data_siswa)){
			$no++;
			
			echo "<tr valign=top>
					<td class=tabel width=7%>$no.</td>
					<td class=tabel align=center>$isi_siswa[nis]</td>
					<td class=tabel align=left >$isi_siswa[nama_siswa]</td>";
					
			for ($blnspp=7;$blnspp<=12;$blnspp++) {
				if (strlen($blnspp)==1) {$blnspp='0'.$blnspp;} else {$blnspp=$blnspp;}
				$data_spp=mysql_fetch_array(mysql_query("select * from sh_byrspp 
				where nis='$isi_siswa[nis]'
				and tgl_bayar like '$thn-$blnspp%'"));
				$tgl_temp=explode("-",$data_spp['tgl_bayar']);
				echo "<td class=tabel align=center>$tgl_temp[2]</td>";
				}

			for ($blnspp2=1;$blnspp2<=6;$blnspp2++) {
				if (strlen($blnspp2)==1) {$blnspp2='0'.$blnspp2;} else {$blnspp2=$blnspp2;}
				$data_spp=mysql_fetch_array(mysql_query("select * from sh_byrspp 
				where nis='$isi_siswa[nis]'
				and tgl_bayar like '$thn2-$blnspp2%'"));
				$tgl_temp2=explode("-",$data_spp['tgl_bayar']);
				echo "<td class=tabel align=center>$tgl_temp2[2]</td>";
				}

				echo "</tr>";
			  
			} // End Of While
			
			echo "</table> <br>";
			echo "&nbsp;&nbsp;&nbsp;Catatan : kolom kosong berarti belum melakukan Pembayaran SPP.
		   </div>
		</div>";
	?>
</body>
</html>