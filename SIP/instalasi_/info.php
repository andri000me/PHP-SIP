<?php
session_start();
if (!isset($_SESSION['kedua']))
{
	echo "<script>window.alert('Anda sudah dihalaman ini sebelumnya.');window.location=('akhir.php')</script>";
	exit;
}
else{
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Langkah Kedua</title>
<link rel="stylesheet" type="text/css" href="../adminpanel/css/utama.css">
<script language="JavaScript" src="../adminpanel/js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
</head>

<body style="text-align: center">
<div id="instalkotak">
	<div class="judulbox">
	<center><font color="b4b4b4">Input data admin &raquo;</font> Input Data Sekolah &raquo; <font color="b4b4b4">Instalasi Selesai</font></center>
	</div><br>
	<center><img src="logo_atas.jpg"></center>
	
	<div class="boxInformasi">
	Pada instalasi langkah kedua, anda diminta melengkapi form dibawah ini dengan nama sekolah dan url atau nama domain sekolah
	</div>
	
	<form method="POST" action="proses_sekolah.php" name="kedua" id="kedua" style="float: left;">
	<table class="isian" style="margin-top: 10px;">
			<tr><td class="isiankanan" width="125px">Nama Sekolah *</td><td class="isian"><input type="text" name="nama" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="125px">Url website *</td><td class="isian"><input type="text" name="url" class="maksimal"><br>
			<small>Jika melakukan instalasi di server lokal, masukkan <b>localhost/nama_folder</b></small></td></tr>
			
			<tr><td class="isiankanan" width="125px"></td><td class="isian">
			<input type="reset" value="Reset" class="hapus">
			<input type="submit" value="Lanjutkan &raquo;" class="batal">
			</td></tr>
	</table>
	</form>
	<div class="clear"></div>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("kedua");
			frmvalidator.addValidation("nama","req","Nama sekolah harus diisi");
			frmvalidator.addValidation("nama","maxlen=30","Nama sekolah maksimal 30 karakter");
			frmvalidator.addValidation("nama","minlen=3","Nama sekolah minimal 3 karakter");
			
			frmvalidator.addValidation("url","req","URL harus diisi");
	  
		</script>
</div>
</body>
</html>
<?php } ?>