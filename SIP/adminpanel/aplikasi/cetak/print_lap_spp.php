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
$bln_thn_temp=explode("-",$_GET['periode']);
$bln=$bln_thn_temp[0];
$thn=$bln_thn_temp[1];
//Array Nama Bulan
$bulan=array("Januari","Februari", "Maret", "April","Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
$namabulan=$bulan[$bln-1];

echo " <div class=\"sd_left\">
		<div class=\"text_padding\">
		<p align=center><a href =# onclick='window.print()' title=Print style=text-decoration:none> <img src=ico-printer.png width=75 height=75> </a> </p>
		<h2 align=center>Laporan Pembayaran SPP $namabulan $thn.</h2>
		<p align=center>Berikut ini data pembayaran spp bulan $namabulan $thn.</p>
		<table width=60% border=1 cellpading=0 cellspacing=0 class=table2 align=center>
		<tr bgcolor=#dedede>
		<th>No</th>
		<th>No. Induk</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Tanggal Bayar</th>
		<th>Jumlah</th>
		</tr>";
		
		// Mencari Data sesuai Tingkat 
		$data_siswa = mysql_query("select * from sh_kelas , sh_siswa ,sh_byrspp where sh_kelas.id_kelas = sh_siswa.id_kelas AND 
											sh_kelas.tingkat='$_GET[tingkat]' AND
											sh_byrspp.nis = sh_siswa.nis");
		// Perulangan Dari $data_siswa										
		while ($isi_siswa=mysql_fetch_array($data_siswa)){
		$no++;

		$data_spp = mysql_fetch_array(mysql_query("select * from sh_byrspp , sh_spp
					where sh_byrspp.id_spp = sh_spp.id_spp AND
					sh_byrspp.nis='$isi_siswa[nis]' AND
					sh_byrspp.tgl_bayar like '$thn-$bln%'"));
			
			// Untuk Merubah Outpout Angka Int DB jadi Format Mata Uang
			$jumlah = number_format($data_spp['jumlah'],0,",", ",");
			echo "<tr>
			<td class=tabel align=center width=5%>$no.</td>
			<td class=tabel align=center width=15%>$isi_siswa[nis]</td>
			<td class=tabel align=left width=20%>$isi_siswa[nama_siswa]</td>
			<td class=tabel align=center width=20%>$isi_siswa[nama_kelas]</td>
			<td class=tabel align=center width=20%>$data_spp[tgl_bayar]</td>
			<td class=tabel align=right width=20%>Rp." . $jumlah. ",-</td>
			</tr>";
			} // End Of While
			echo "</table>
			    </div>
			  </div>";

?>
</body>
</html>