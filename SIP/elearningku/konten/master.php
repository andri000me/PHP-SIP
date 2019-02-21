<?php
include 'koneksi.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    /*
	$kategori=$_POST['kategori']; //menampung value dari combobox kategori
	$cari=$_POST['textcari']; // menampung value dari textcari
	if (!empty($kategori) or !empty($cari)) { // jika $kategori tidak kosong or $cari tidak kosong maka akan dilakukan di redirect ke halaman ?kategori='nilai dari $kategori'&cari='nilai dari $cari'
	 header ("location: ?kategori=".$kategori."&cari=".$cari);
	}
	*/
?>

<html>
<head>
<link rel="stylesheet" href="coba.css">
<div class="CSSTableGenerator">
<style>






</style>
<table> 
	<div class='tab'><caption><h3>Laporan absensi siswa</h3></caption></div>



<?php
  
        
    $query = "select * from kelas";
    $hasil = mysqli_query($konek,$query);
    while($data=mysqli_fetch_array($hasil)){
        echo "<option value=$data[kelas_id]>$data[kelas_name]</option>";
    }
?>
</select>
<input type="submit" name="submit" value="Submit" />
</form
	
	
	<tr>
	    <th>Nama siswa</th>
        <th>Pin</th>
        <th>No induk</th>
		<th>NISN</th>
		<th>Jenis kelamin</th>
		<th>Jenis Ijin</th>
		<th>Kelas</th>
        <th>Tahun Ajaran</th>  
		<th>Semester</th>
		<th>Tanggal</th>
		<th>Jumlah</th>	
        		
    </tr>
	
	
   <?php
   

 
   
   
$kategori=$_POST['kategori']; //menampung value dari combobox kategori
$cari=$_POST['textcari']; // menampung value dari textcari
if (empty($kategori) and empty($cari)) { //jika $kategori dan $cari kosong
$sqlsiswa=mysql_query("SELECT siswa_name , pin ,n_induk , nisn , gender  , ijin_jenis , kelas_name, tahun_ajaran , semester ,ijin_date
FROM `siswa` , kelas ,history_kelas,tahun_ajaran,pembagian_ruang, jadwal , ijin , ijin_k
WHERE  siswa.siswa_id  =  ijin_k.siswa_id
AND siswa.siswa_id
AND ijin.ijin_idx = ijin_k.ijin_idx
AND history_kelas.siswa_id = siswa.siswa_id 
AND history_kelas.pembagian_id = pembagian_ruang.pembagian_id 
AND pembagian_ruang.kelas_id = kelas.kelas_id 
AND pembagian_ruang.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id 
AND pembagian_ruang.jadwal_idx = jadwal.jadwal_idx AND siswa.siswa_id = jadwal.idx_hari"); // sql untuk menampilkan seluruh data siswa
} else {
$sqlsiswa=mysql_query("SELECT siswa_name , pin ,n_induk , nisn , gender  , ijin_jenis , kelas_name, tahun_ajaran , semester ,ijin_date
FROM `siswa` , kelas ,history_kelas,tahun_ajaran,pembagian_ruang, jadwal , ijin , ijin_k
WHERE  siswa.siswa_id  =  ijin_k.siswa_id
AND siswa.siswa_id
AND ijin.ijin_idx = ijin_k.ijin_idx
AND history_kelas.siswa_id = siswa.siswa_id 
AND history_kelas.pembagian_id = pembagian_ruang.pembagian_id 
AND pembagian_ruang.kelas_id = kelas.kelas_id 
AND pembagian_ruang.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id 
AND pembagian_ruang.jadwal_idx = jadwal.jadwal_idx AND siswa.siswa_id = jadwal.idx_hari and ".$kategori." like '%".$cari."%'"); //sql untuk menampilkan hasil pencarian data siswa
 }
 
 
 
 
$sql = "SELECT count( * ) as num FROM   ijin , ijin_k where ijin_k.siswa_id = ijin.ijin_idx = ijin_k.ijin_idx";  // Untuk menghitung jumlah data ijin siswa
$result = mysql_query($sql);
$result = mysql_fetch_assoc( $result );
$jml = $result['num'];
 

 
   while ($row=mysql_fetch_array($sqlsiswa))
   {
	
	  if($row['gender']=="0")
	{
	$jenis = "Laki - Laki";
	}
	else $jenis= "Perempuan";
	
	
	
	
	
	  if($row['ijin_jenis']=="0")
	{
	$ijin = "Hadir";
	}
	else if($row['ijin_jenis']=="1"){
		$ijin= "Sakit";
	}
	else{
		$ijin ="Ijin";

		}

		
		
		
		
		
		
	// Untuk menampilakan data dari database
	
	
	  if($row['semester']=="0")
	{
	$smash = "Genap";
	}
	else $smash= "Ganjil";
	
	
	
	
	
	

	
	
		 
		 echo "<td>".$row['siswa_name']."</td>";
		 echo "<td>".$row['pin']."</td>";	    
	     echo "<td>".$row['n_induk']."</td>";
		 echo "<td>".$row['nisn']."</td>";
		 echo "<td>".$jenis."</td>";
		 echo "<td>".$ijin."</td>";
         echo "<td>".$row['kelas_name']."</td>";
         echo "<td>".$row['tahun_ajaran']."</td>";	 
         echo "<td>".$smash."</td>";	
		 echo "<td>".$row['ijin_date']."</td>";	
		 echo "<td>".$jml."</td>";		 
		 
	     echo "</tr>";  
   }
   
   ?>
   <meta charset="utf-8">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  
  $(function() {
    $( "#datepickersatu" ).datepicker();
  });
  </script>
  
  
  
  

<body>
 
<p> <input type="text" id="datepicker"></p>

<p> <input type="text" id="datepickersatu"></p>
 

</table>
</head>
</html>
