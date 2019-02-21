<!DOCTYPE HTML>
<?php include "../../konfigurasi/koneksi.php"; ?>
<html>
<head>
<title>Schoolhos CMS admin</title>
<link rel="stylesheet" type="text/css" href="../css/utama.css">
<script language="JavaScript" src="../js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
</head>
<h3>Ganti Password Admin</h3>
<div class="isikanan"><!--Awal class isi kanan-->
		

		<table class="isian" style="text-align: left;">
		<form method='POST' <?php echo "action='database/admin.php?pilih=admin&untukdi=gantipassword'";?> name='editpassword' id='editpassword' onSubmit="javascript:self.close();">
		<?php
		$edit=mysql_query("SELECT * FROM sh_users WHERE id_users='$_GET[id]'");
		$r=mysql_fetch_array($edit);
		
		echo "<input type='hidden' name='id' value='$r[id_users]'";
		?>	
			<tr><td class="isiankanan" width="115px">Password</td><td class="isian"><input type="password" name="password" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="115px">Ulang Password</td><td class="isian"><input type="password" name="password2" class="maksimal"></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editpassword");
			frmvalidator.addValidation("password","req","Password harus diisi");
			frmvalidator.addValidation("password","maxlen=20","Password terlalu panjang, maksimal 20 karakter");
			frmvalidator.addValidation("password","minlen=6","Password terlalu pendek, minimal 6 karakter");
			frmvalidator.addValidation("password2","eqelmnt=password","Password tidak sama");
			
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->
</div>
</body>
</html>