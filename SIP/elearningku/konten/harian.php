<html>
<head>
<link rel="stylesheet" href="coba.css">
<div class="CSSTableGenerator" >
<style>
.tab{margin:0 auto;width:80%;border-collapse:collapse;background:#ecf3eb;}
caption h3{}
th, td{border:1px solid #999;}
th{padding:6px 0;background: #0cf;}
td{padding:4px 8px;}

</style>
</head>
<body>
<?php
include 'koneksi.php';

// menampilakan relasi dari table

$Query = mysql_query("SELECT siswa_name , siswa.pin ,n_induk , nisn , gender ,tahun_ajaran , semester , kelas_name, jadwal_name , libur ,
hari , jam_masuk , jam_pulang , scan_date
FROM `siswa` , kelas ,history_kelas,tahun_ajaran,pembagian_ruang,jadwal ,att_log 
WHERE history_kelas.siswa_id = siswa.siswa_id 
AND history_kelas.pembagian_id = pembagian_ruang.pembagian_id
AND pembagian_ruang.kelas_id = kelas.kelas_id 
AND pembagian_ruang.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id 
AND pembagian_ruang.jadwal_idx = jadwal.jadwal_idx 
AND att_log.pin = siswa.pin
AND siswa.siswa_id = jadwal.idx_hari");
?>
	<table>
	<div class='tab'><caption><h3>Laporan absensi siswa</h3></caption></div>
	
	<tr>
	    <th><p style="font-size:12px">Nama Siswa</th>
        <th><p style="font-size:12px">PIN</th>
        <th><p style="font-size:12px">No Induk</th>
		<th><p style="font-size:12px">NISN</th>
		<th><p style="font-size:12px">Jenis Kelamin</th>
        <th><p style="font-size:12px">Tahun Ajaran</th>  
		<th><p style="font-size:12px">Semester</th>
		<th><p style="font-size:12px">Kelas</th>
		<th><p style="font-size:12px">Nama Jadwal</th>
		<th><p style="font-size:12px">Libur</th>
		<th><p style="font-size:12px">Hari</th>
		<th><p style="font-size:12px">Jam Masuk</th>
		<th><p style="font-size:12px">Tahun Ajaran</th>
		<th><p style="font-size:12px">Jam Scan IN</th>
    </tr>
   <?php
   while ($row=mysql_fetch_array($Query))
   {
   // Untuk menampilakan data gender yang berasal dari database 
   if($row['gender']=="0")
	{
	$jenis = "Laki - Laki";
	}
	else $jenis= "Perempuan";
	
	
	// explode di gunakan untuk memisahkan data per kata
	$datetime = $row['scan_date'];
	$arr_tanggaljam = explode (" ",$datetime);
	$tanggal = $arr_tanggaljam[0];
	$jam	 = $arr_tanggaljam[1];	
	
	
	
	
	
	// Untuk menampilakan data dari database
	     echo "<td>".$row['siswa_name']."</td>";
		 echo "<td>".$row['pin']."</td>";
	     echo "<td>".$row['n_induk']."</td>";
	     echo "<td>".$row['nisn']."</td>";  
		 echo "<td>".$jenis."</td>";
         echo "<td>".$row['tahun_ajaran']."</td>";	
         echo "<td>".$row['semester']."</td>";
         echo "<td>".$row['kelas_name']."</td>";
         echo "<td>".$row['jadwal_name']."</td>"; 	
         echo "<td>".$row['libur']."</td>";	
         echo "<td>".$row['hari']."</td>";
         echo "<td>".$row['jam_masuk']."</td>";	
         echo "<td>".$row['tahun_ajaran']."</td>";	
         echo "<td>".$jam."</td>";
		 
	     echo "</tr>";
   
   
   }
   
   ?>
	</table>
</body>
</html>











