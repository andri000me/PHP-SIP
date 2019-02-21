<html>
<head>
<link rel="stylesheet" href="style.css">
<div class="CSSTableGenerator">
</head>
<body>

	<table>
<div class='tab'><caption><h3>Laporan absensi siswa</h3></caption></div>
	<tr>
	    <th><p style="font-size:12px">Tanggal scan</th>
        <th><p style="font-size:12px">Waktu scan</th>
        <th><p style="font-size:12px">PIN</th>
		<th><p style="font-size:12px">Nama siswa</th>
		<th><p style="font-size:12px">No induk</th>
        <th><p style="font-size:12px">NISN</th>  
		<th><p style="font-size:12px">Jenis kelamin</th>
		<th><p style="font-size:12px">Mode Scan</th>
		<th><p style="font-size:12px">Nama mesin</th>
		
    </tr>
	
	<?php
include 'koneksi.php';

// menampilakan relasi dari table

$Query = mysql_query("SELECT *
FROM siswa
INNER JOIN att_log ON att_id = att_log.att_id
INNER JOIN mesin ON mesin_id = mesin.mesin_id
WHERE att_log.pin = siswa.pin");
?>
   <?php
   while ($row=mysql_fetch_array($Query))
   {
   // Untuk menampilakan data gender yang berasal dari database 
   if($row['gender']=="0")
	{
	$jenis = "Laki - Laki";
	}
	else $jenis= "Perempuan";
	
	
	
	
	  if($row['io_mode']=="0")
	{
	$mode = "Masuk";
	}
	else $mode= "Keluar";
	
	
	// explode di gunakan untuk memisahkan data per kata
	$datetime = $row['scan_date'];
	$arr_tanggaljam = explode (" ",$datetime);
	$tanggal = $arr_tanggaljam[0];
	$jam	 = $arr_tanggaljam[1];	
	
	
	// Untuk menampilakan data dari database
		 echo "<td>".$tanggal."</td>";
		 echo "<td>".$jam."</td>";
		 echo "<td>".$row['pin']."</td>";
	     echo "<td>".$row['siswa_name']."</td>";
	     echo "<td>".$row['n_induk']."</td>";
	     echo "<td>".$row['nisn']."</td>";  
		 echo "<td>".$jenis."</td>";
		 echo "<td>".$mode."</td>";
         echo "<td>".$row['device_name']."</td>";		 
	     echo "</tr>";
   
   
   }
   
   ?>
	</table>
</body>
</html>











