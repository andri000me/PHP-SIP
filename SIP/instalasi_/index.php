<?php
session_start();
if (!isset($_SESSION['pertama']))
{
	echo "<script>window.alert('Anda sudah dihalaman ini sebelumnya.');window.location=('info.php')</script>";
	exit;
}
else{
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Langkag Awal</title>
<link rel="stylesheet" type="text/css" href="../adminpanel/css/utama.css">
<script language="JavaScript" src="../adminpanel/js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
</head>

<body style="text-align: center">
<div id="instalkotak">
	<div class="judulbox">
	<center>Input data admin &raquo; <font color="b4b4b4">Input Data Sekolah &raquo; Instalasi Selesai</font></center>
	</div><br>
	<center><img src="logo_atas.jpg"></center>
	
	<div class="boxInformasi">
	<b>Selamat datang</b> pada tahap awal instalasi <a href="http://schoolhos.com" target="_blank" title ="Situs resmi Schoolhos CMS">Schoolhos CMS</a>.  Silahkan lengkapi form di bawah ini untuk mengawali instalasi, jika anda
	belum memahami aturan penggunaannya, direkomendasikan membaca terlebih dahulu dokumen aturan penggunaannya.
	</div>
	
	<form method="POST" action="proses_admin.php" name="pertama" id="pertama" style="float: left;">
	<table class="isian" style="margin-top: 10px;">
			<tr><td class="isiankanan" width="125px">Nama Lengkap *</td><td class="isian"><input type="text" name="nama" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="125px">Email *</td><td class="isian"><input type="text" name="email" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="125px">Username *</td><td class="isian"><input type="text" name="username" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="125px">Password *</td><td class="isian"><input type="password" name="password" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="125px">Ulang Password *</td><td class="isian"><input type="password" name="password2" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="125px" style="text-align: right"><input type="checkbox" name="setuju" value="1"></td><td class="isian">
			<p style="color:">Saya telah membaca <a href="../aturan-dan-petunjuk.html" target="_blank"><b>aturan dalam penggunaan Schoolhos CMS</b></a> dan saya setuju.
			</td></tr>
			
			<tr><td class="isiankanan" width="125px"></td><td class="isian">
			<input type="reset" value="Reset" class="hapus">
			<input type="submit" value="Lanjutkan &raquo;" class="batal">
			</td></tr>
	</table>
	</form>
	<div class="clear"></div>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("pertama");
			frmvalidator.addValidation("nama","req","Nama admin harus diisi");
			frmvalidator.addValidation("nama","maxlen=30","Nama admin maksimal 30 karakter");
			frmvalidator.addValidation("nama","minlen=3","Nama admin minimal 3 karakter");
			
			frmvalidator.addValidation("username","req","Username harus diisi");
			frmvalidator.addValidation("username","maxlen=8","Username maksimal 8 karakter");
			frmvalidator.addValidation("username","minlen=5","Username minimal 5 karakter");
	  
			frmvalidator.addValidation("password","req","Password harus diisi");
			frmvalidator.addValidation("password","maxlen=20","Password terlalu panjang, maksimal 20 karakter");
			frmvalidator.addValidation("password","minlen=6","PAssword terlalu pendek, minimal 6 karakter");
			
			
			frmvalidator.addValidation("password2","eqelmnt=password","Password tidak sama");
			frmvalidator.addValidation("password","neelmnt=username","Password tidak boleh sama dengan username");
			
			frmvalidator.addValidation("setuju","shouldselchk=1","Maaf, jika anda tidak setuju maka instalasi tidak dapat dilanjutkan");
			
			frmvalidator.addValidation("email","email","Format email salah");
			frmvalidator.addValidation("email","req","Email harus diisi");
		</script>
</div>
</body>
</html>
<?php } ?>