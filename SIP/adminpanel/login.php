<?php
session_start();
error_reporting(0);
if (isset($_SESSION['adminsh']))
{
	header('location:index.php');
	exit;
}
else{ 
    if (file_exists("../instalasi/index.php")) {
	session_start();
	$_SESSION['pertama'] == 'pertama';
	header ('location:../instalasi/index.php');
	}
	else {
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Login Admin Trimitra Sistem Informasi</title>
<link rel="stylesheet" type="text/css" href="css/utama.css">
<script language="JavaScript" src="js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
<meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>

<!-- <body style="text-align: center; background: #ffffff" id="login" OnLoad="document.login.username.focus();"> -->
<!-- KOTAK USERNAME, PASSWORD, SUBMIT -->
<div id="kotakLoginsatu">
	<img id="logo" src="images/tri.png" width="70%" height="15%">
	<h1>SIGN IN</h1>
	<form method="POST" action="valid.php" name="login" id="login">
		<table>
			<!-- USERNAME -->
			<input class="gambar-username" id="username1" type="text" name="username" placeholder="Username"><br/>
			<!-- PASSWORD -->
			<input id="password1" type="password" name="password" placeholder="Password"><br />
			<!-- SUBMIT -->
			<input id="logss" type="submit" name="submit" value="Login">
		</table>
		<footer id="footer-login"><h1>&copy; 2016 Trimitra Sekolah. Powered by <a href="http://trimitra-sisteminfo.com/">Trimitra Sistem Informasi</h1></a></footer>
	</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("login");
			frmvalidator.addValidation("username","req","Anda belum memasukkan username");
			frmvalidator.addValidation("password","req","Anda belum memasukkan password");
			//]]>
		</script>
</div>
<!-- END KOTAK USERNAME, PASSWORD, SUBMIT -->
<br>
<?php
date_default_timezone_set('Asia/Jakarta');
$tahun=date("Y");
?>
</body>
</html>
<?php } } ?>