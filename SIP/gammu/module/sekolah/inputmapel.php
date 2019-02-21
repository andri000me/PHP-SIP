<?php
session_start();
if(!empty($_SESSION['nama'])){
$uidi=$_SESSION['idu'];	
$usre=$_SESSION['nama'];
$level=$_SESSION['level'];
$klss=$_SESSION['idk'];
$ortu=$_SESSION['ortu'];
$idd=$_SESSION['id'];


include "koneksi.php";

?>


<html>
	<head>
	<style type="text/css"> 
	
	h1 {
		font-family: Verdana;
	}
	
	body {
		font-family: Verdana;
		font-size: 12px;
	}	
	
	td {
		font-size: 12px;
	}
	
	</style> 
	
	<script type="text/javascript">
		function ajaxrunning()
		{
			if (window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				xmlhttp =new ActiveXObject("Microsoft.XMLHTTP");
			}
	
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				}
			}
	
			xmlhttp.open("GET","runsis.php");
			xmlhttp.send();
			setTimeout("ajaxrunning()", 5000);
		}
	</script>
	
	</head>
	<body onload="ajaxrunning()">
	<?php
		include 'header.php';
		include 'koneksi.php';
	?>
	
	<h2> MATA PELAJARAN </h2>
	<form method="post" action="inputmapel.php?op=send">
	<table>
		<tr><td>Kode Mata Pelajaran</td><td>:</td><td><input type="text" name="id_mapel"></td></tr>
		<tr><td>Nama Mata Pelajaran</td><td>:</td><td><input type="text" name="nama_mapel"></td></tr>
		<tr><td></td><td></td><td><input type="submit" name="submit" value="SIMPAN"></td></tr>
	</table>
	</form>
	
	<?php
	
	if (isset($_GET['op']))
	{
		if ($_GET['op'] == 'send')
		{
			$id_mapel = $_POST['id_mapel'];
			$nama_mapel = $_POST['nama_mapel'];
			//Query Input Mapel
			$query = "INSERT INTO mapel (id_mapel, nama_mapel) VALUES ('$id_mapel', '$nama_mapel')";
			$hasil = mysql_query($query);
			if ($hasil) echo "<p>Data Mata Pelajaran Sudah Tersimpan</p>";
			else echo "<p>Data Mata Pelajaran Tidak Tersimpan</p>";
		}
	}
	
	?>
	
	<!-- Tampil Siswa -->
	
	<hr/>
	<h2>DATA MATA PELAJARAN</h2>
	
	<?php
	
	//Koneksi
	include 'koneksi.php';
	
	// menampilkan semua data mapel

	$queryin = "SELECT * FROM mapel ORDER BY id_mapel DESC";
	$hasilin = mysql_query($queryin);

	echo "<table border='1'>";
	echo "<tr><th>Kode MAPEL</th><th>Nama Mata Pelajaran</th></tr>";		
	while ($datain = mysql_fetch_array($hasilin))
	{
		$id_mapel = $datain['id_mapel'];
		$nama_mapel = $datain['nama_mapel']; 
		echo "<tr><td>".$id_mapel."</td><td>".$nama_mapel."</td></tr>";
	}	
	echo "</table>";
	
	?>
	
	<!-- Tampil Siswa -->
	
		<br/>
	</body>
</html>

<?php } else header('location:index.php');?>