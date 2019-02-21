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
	
	<h2> INPUT NILAI </h2>
	<form method="post" action="nilai.php?op=send">
	<table>

		<tr><td>NIS</td><td>:</td><td>
				<select name="nis">
		<?php
			$query = "SELECT nis FROM siswa ORDER BY nis";
			$hasil = mysql_query($query);
			while($data = mysql_fetch_array($hasil))
			{
				echo "<option>".$data['nis']."</option>";
			}
		?>
		</select>
		</td></tr>
		
		<tr><td>Kode Mapel</td><td>:</td><td>
				<select name="id_mapel">
		<?php
			$query = "SELECT id_mapel FROM mapel ORDER BY id_mapel";
			$hasil = mysql_query($query);
			while($data = mysql_fetch_array($hasil))
			{
				echo "<option>".$data['id_mapel']."</option>";
			}
		?>
		</select>
		</td></tr>
		
		<tr><td> Nilai </td><td>:</td><td><input type="text" name="nilai"></td></tr>
		<tr><td></td><td></td><td><input type="submit" name="submit" value="SIMPAN"></td></tr>
	</table>
	</form>
	
	<?php
	
	if (isset($_GET['op']))
	{
		if ($_GET['op'] == 'send')
		{
			$nis = $_POST['nis'];
			$id_mapel = $_POST['id_mapel'];
			$nilai = $_POST['nilai'];
			//Query Input
			$query = "INSERT INTO ambil_mapel (nis,id_mapel,nilai) VALUES ('$nis', '$id_mapel', '$nilai')";
			$hasil = mysql_query($query);
			if ($hasil) echo "<p>Data Nilai Sudah Tersimpan</p>";
			else echo "<p>Data Nilai Tidak Tersimpan</p>";
		}
	}
	
	?>
	
	<!-- Tampil-->
	
	<hr/>
	<h2>DATA NILAI</h2>
	
	<?php
	
	//Koneksi
	include 'koneksi.php';
	
	// menampilkan semua

	$queryin = "SELECT * FROM ambil_mapel ORDER BY nis DESC";
	$hasilin = mysql_query($queryin);

	echo "<table border='1'>";
	echo "<tr><th>NIS</th><th>Kode Mapel</th><th>Nilai</th></tr>";		
	while ($datain = mysql_fetch_array($hasilin))
	{
		$nis2 = $datain['nis'];
		$id_mapel2 = $datain['id_mapel'];
		$nilai2 = $datain['nilai']; 
		echo "<tr><td>".$nis2."</td><td>".$id_mapel2."</td><td>".$nilai2."</td></tr>";
	}	
	echo "</table>";
	
	?>
	
	<!-- Tampil -->
	
		<br/>
	</body>
</html>

<?php } else header('location:index.php');?>