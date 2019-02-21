<html>
<head>
<title>Rekap Laporan Absensi</title>
<link rel="stylesheet" href="css/style_print.css" type="text/css"/>
</head>
<body>
<?php
//Mengambil Koneksi
include('../database/koneksi_absensi_websch.php');

echo " <div class=\"sd_left\">
		<div class=\"text_padding\">
		<p align=center><a href =# onclick='window.print()' title=Print style=text-decoration:none> <img src=ico-printer.png width=75 height=75> </a> </p>
		<h2 align=center>Laporan Harian Absensi Siswa.</h2>
		<p align=center>Berikut Ini Laporan Absensi Siswa.</p>
		<table width=60% border=1 cellpading=0 cellspacing=0 class=table2 align=center>
		<tr bgcolor=#dedede>
		<th>No</th>
		<th>Hari</th>
		<th>Tanggal</th>
		<th>No Induk</th>
		<th>Tahun Ajaran</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Jadwal Kelas</th>
		<th>Jadwal Masuk</th>
		<th>Jam Masuk</th>
		<th>Terlambat</th>
		<th>Jadwal Pulang</th>
		<th>Jam Pulang</th>
		<th>Pulang Cepat</th>
		<th>Status Kehadiran</th>
		</tr>";
		
	      koneksi1_buka();
		$no=0;
		$absen = mysql_query("SELECT hari,scan_date,result_proc.n_induk,tahun_ajaran,result_proc.siswa_name,kelas_name,jadwal_name,jam_masuk,scan_in,terlambat,jam_pulang,scan_out,pulang_cepat,status_hadir FROM result_proc , siswa where result_proc.siswa_name = siswa.siswa_name");
		$cek_absen=mysql_num_rows($absen);
		// Perulangan Dari $data_siswa										
		while ($row=mysql_fetch_array($absen)){
		$no++;

		  
			
		// explode di gunakan untuk memisahkan data per kata
					$datetime = $row['scan_date'];
					$arr_tanggaljam = explode (" ",$datetime);
					$tanggal = $arr_tanggaljam[0];
					$jam	 = $arr_tanggaljam[1];
			echo "<tr>
			<td class=tabel align=center width=5%>$no.</td>
			<td class=tabel align=center width=15%>$row[hari]</td>
			<td class=tabel align=left width=20%>$tanggal</td>
			<td class=tabel align=center width=20%>$row[n_induk]</td>
			<td class=tabel align=center width=20%>$row[tahun_ajaran]</td>
			<td class=tabel align=center width=20%>$row[siswa_name]</td>
			<td class=tabel align=center width=20%>$row[kelas_name]</td>
			<td class=tabel align=center width=20%>$row[jadwal_name]</td>
			<td class=tabel align=center width=20%>$row[jam_masuk]</td>
			<td class=tabel align=center width=20%>$row[scan_in]</td>
			<td class=tabel align=center width=20%>$row[terlambat]</td>
			<td class=tabel align=center width=20%>$row[jam_pulang]</td>
			<td class=tabel align=center width=20%>$row[scan_out]</td>
			<td class=tabel align=center width=20%>$row[pulang_cepat]</td>
			<td class=tabel align=center width=20%>$row[status_hadir]</td>
			</tr>";
			} // End Of While
			echo "</table>
			    </div>
			  </div>";

?>
<? koneksi1_tutup();?>

</body>
</html>