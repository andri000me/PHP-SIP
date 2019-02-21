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
	
	<h2> DATA SISWA </h2>
	<form method="post" action="inputsiswa.php?op=send">
	<table>
		<tr><td>NIS (Nomor Induk Siswa)</td><td>:</td><td><input type="text" name="nis"></td></tr>
		<tr><td>Nama Siswa</td><td>:</td><td><input type="text" name="nama_siswa"></td></tr>
		<tr><td>Nama Orang Tua</td><td>:</td><td><input type="text" name="nama_ortu"></td></tr>
		<tr><td>No Telepon Orang Tua</td><td>:</td><td><input type="text" name="nohp" value="+62"></td></tr>
		<tr><td>PIN</td><td>:</td><td><input type="text" name="pin"></td></tr>
		<tr><td>Dikirim via Modem</td><td>:</td><td>
		
		<select name="modem">
		<?php
			$query = "SELECT ID FROM phones ORDER BY ID";
			$hasil = mysql_query($query);
			while($data = mysql_fetch_array($hasil))
			{
				echo "<option>".$data['ID']."</option>";
			}
		?>
		</select>
		
		</td></tr>
		<tr><td></td><td></td><td><input type="submit" name="submit" value="SIMPAN"></td></tr>
	</table>
	</form>
	
	<?php
	
	if (isset($_GET['op']))
	{
		if ($_GET['op'] == 'send')
		{
			$nis = $_POST['nis'];
			$nama_siswa = $_POST['nama_siswa'];
			$nama_ortu = $_POST['nama_ortu'];
			$nohp = $_POST['nohp'];
			$pin = $_POST['pin'];
			$modem = $_POST['modem'];
			$pesan = "Kpd Yth Bpk/Ibu $nama_ortu tlh trdftr pd Sistem Auto Respon Pin:$pin,Frmt Cek Nilai:NILAI#KODEMAPEL#PIN Cth:NILAI#MP002#1234 Krm ke 0895348099571";
			//Query Input Siswa
			$querysiswa = "INSERT INTO siswa (nis, nama, nama_ortu, nohp, pin) VALUES ('$nis', '$nama_siswa', '$nama_ortu', '$nohp', '$pin')";
			$hasilsiswa = mysql_query($querysiswa);
			//Query Kirim SMS
			$query = "INSERT INTO outbox (DestinationNumber, SenderID, TextDecoded, CreatorID) VALUES ('$nohp', '$modem', '$pesan', 'Gammu 1.28.90')";
			$hasil = mysql_query($query);
			if ($hasil) echo "<p>Data Siswa Berhasil Di Simpan</p>";
			else echo "<p>Data Siswa Gagal Di Simpan</p>";
		}
	}
	
	?>
	
	<!-- Tampil Siswa -->
	
	<hr/>
	<h2>DATA SISWA</h2>
	
	<?php
	
	//Koneksi
	include 'koneksi.php';
	
	// menampilkan semua data siswa

	$queryin = "SELECT * FROM siswa ORDER BY nis DESC";
	$hasilin = mysql_query($queryin);

	echo "<table border='1'>";
	echo "<tr><th>NIS</th><th>Nama Siswa</th><th>Nama Orang Tua</th><th>No Telepon</th><th>PIN</th></tr>";		
	while ($datain = mysql_fetch_array($hasilin))
	{
		$nis = $datain['nis'];
		$nama_siswa = $datain['nama']; 
		$nama_ortu = $datain['nama_ortu'];
		$nohp = $datain['nohp'];
		$pin = $datain['pin'];
		echo "<tr><td>".$nis."</td><td>".$nama_siswa."</td><td>".$nama_ortu."</td><td>".$nohp."</td><td>".$pin."</td></tr>";
	}	
	echo "</table>";
	
	?>
	
	<!-- Tampil Siswa -->
	
		<br/>
	</body>
</html>

<?php } else header('location:index.php');?>