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
		<h2 align=center>Laporan Rekap Akhir Semester Siswa.</h2>
		<p align=center>Berikut Ini Laporan Rekap Akhir Semester Siswa.</p>
		<table width=60% border=1 cellpading=0 cellspacing=0 class=table2 align=center>
		<tr bgcolor=#dedede>
		<th>No</th>
		<th>Kelas</th>
		<th>Nama Siswa</th>
		<th>No Induk</th>
		<th>NISN</th>
		<th>Tahun Ajaran</th>
		<th>Semester</th>
		<th>Total Terlambat</th>
		<th>Total Izin</th>
		<th>Total Hadir</th>
		<th>Total Tidak Hadir</th>
		</tr>";
		
	      koneksi1_buka();
		$no=0;
		$absen = mysql_query("SELECT DISTINCT siswa.siswa_name as nama, result_proc.n_induk , result_proc.nisn , result_proc.kelas_name , result_proc.tahun_ajaran , result_proc.semester  ,
									(SELECT COUNT(status_hadir )
									FROM result_proc
									WHERE (status_hadir ='Hadir'  AND siswa_name = nama)) AS TOTAL_HADIR ,
									
									 (SELECT COUNT(status_hadir )
									 FROM result_proc
									 WHERE (status_hadir ='Tidak Hadir'  AND siswa_name = nama)) AS TOTAL_TIDAK_HADIR,

									(SELECT COUNT(ijin_k.siswa_id)
									 FROM ijin_k,siswa
									 WHERE (siswa.siswa_id = ijin_k.siswa_id AND siswa_name = nama)) AS TOTAL_IZIN, 

									  (SELECT COUNT(status_hadir )
									 FROM result_proc
									 WHERE (terlambat<>'' AND siswa_name = nama)) AS TOTAL_TERLAMBAT

									 FROM result_proc , siswa 
									 WHERE result_proc.status_hadir = 'Tidak Hadir' 
									 AND result_proc.siswa_name = siswa.siswa_name");
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
			<td class=tabel align=center width=15%>$row[kelas_name]</td>
			<td class=tabel align=center width=20%>$row[nama]</td>
			<td class=tabel align=center width=20%>$row[n_induk]</td>
			<td class=tabel align=center width=20%>$row[nisn]</td>
			<td class=tabel align=center width=20%>$row[tahun_ajaran]</td>
			<td class=tabel align=center width=20%>$row[semester]</td>
			<td class=tabel align=center width=20%>$row[TOTAL_TERLAMBAT]</td>
			<td class=tabel align=center width=20%>$row[TOTAL_IZIN]</td>
			<td class=tabel align=center width=20%>$row[TOTAL_HADIR]</td>
			<td class=tabel align=center width=20%>$row[TOTAL_TIDAK_HADIR]</td>
			</tr>";
			} // End Of While
			echo "</table>
			    </div>
			  </div>";

?>
<? koneksi1_tutup();?>

</body>
</html>