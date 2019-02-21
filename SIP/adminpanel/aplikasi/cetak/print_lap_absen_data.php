<html>
<head>
<title>Rekap Laporan Absensi</title>
<link rel="stylesheet" href="css/style_print.css" type="text/css"/>
</head>
<body>
<?php
//Mengambil Koneksi
include('../database/koneksi_absensi_websch.php');
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
		<h2 align=center>Laporan Seluruh Absen Siswa $namabulan $thn.</h2>
		<p align=center>Berikut Ini Laporan Absensi Siswa $namabulan $thn.</p>
		<table width=60% border=1 cellpading=0 cellspacing=0 class=table2 align=center>
		<tr bgcolor=#dedede>
		<th>No</th>
		<th>Tanggal scan absen</th>
		<th>Waktu scan</th>
		<th>No Induk</th>
		<th>NISN</th>
		<th>Nama Siswa</th>
		<th>Jenis Kelamin</th>
		<th>Keterangan</th>
		</tr>";
		
	      koneksi1_buka();
		$no=0;
		$absen = mysql_query("SELECT * FROM siswa , att_log WHERE att_log.pin = siswa.pin");
		$cek_absen=mysql_num_rows($absen);
		// Perulangan Dari $data_siswa										
		while ($row=mysql_fetch_array($absen)){
		$no++;

		   if($row['gender']=="0")
					{
					$jenis = "Laki - Laki";
					}
					else $jenis = "Perempuan";	
					
					if($row['io_mode']=="0")
					{
					$mode = "Masuk";
					}
					else $mode= "Pulang";
			
		// explode di gunakan untuk memisahkan data per kata
					$datetime = $row['scan_date'];
					$arr_tanggaljam = explode (" ",$datetime);
					$tanggal = $arr_tanggaljam[0];
					$jam	 = $arr_tanggaljam[1];
			echo "<tr>
			<td class=tabel align=center width=5%>$no.</td>
			<td class=tabel align=center width=15%>$tanggal</td>
			<td class=tabel align=left width=20%>$jam</td>
			<td class=tabel align=center width=20%>$row[n_induk]</td>
			<td class=tabel align=center width=20%>$row[nisn]</td>
			<td class=tabel align=center width=20%>$row[siswa_name]</td>
			<td class=tabel align=center width=20%>$jenis</td>
			<td class=tabel align=center width=20%>$mode</td>
			</tr>";
			} // End Of While
			echo "</table>
			    </div>
			  </div>";

?>
<? koneksi1_tutup();?>

</body>
</html>