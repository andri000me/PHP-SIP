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
	
	<h2> SPP </h2>
	<form method="post" action="spp.php?op=send">
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
		
		<tr><td>Rincian SPP </td><td>:</td><td><input type="text" name="rincian_spp" Value = "Sisa Tunggakan : Rp.   " size="30px"></td></tr>
		<tr><td></td><td></td><td><input type="submit" name="submit" value="SIMPAN"></td></tr>
	</table>
	</form>
	
	<?php
	
	if (isset($_GET['op']))
	{
		if ($_GET['op'] == 'send')
		{
			$nis = $_POST['nis'];
			$rincian_spp = $_POST['rincian_spp'];
			//Query Input
			$query = "INSERT INTO ambil_spp (nis, rincian_spp) VALUES ('$nis', '$rincian_spp')";
			$hasil = mysql_query($query);
			if ($hasil) echo "<p>Data SPP Sudah Tersimpan</p>";
			else echo "<p>Data SPP Tidak Tersimpan</p>";
		}
	}
	
	?>
	
	<!-- Tampil-->
	
	<hr/>
	<h2>DATA SPP</h2>
	
	<?php
	
	//Koneksi
	include 'koneksi.php';
	
	// menampilkan semua

	$queryin = "SELECT * FROM ambil_spp ORDER BY nis DESC";
	$hasilin = mysql_query($queryin);

	echo "<table border='1'>";
	echo "<tr><th>NIS</th><th>Rincian Pembayaran</th></tr>";		
	while ($datain = mysql_fetch_array($hasilin))
	{
		$nis2 = $datain['nis'];
		$rincian_spp2 = $datain['rincian_spp']; 
		echo "<tr><td>".$nis2."</td><td>".$rincian_spp2."</td></tr>";
	}	
	echo "</table>";
	
	?>
	
	<!-- Tampil -->
	
		<br/>
	</body>
</html>

<?php } else header('location:index.php');?>