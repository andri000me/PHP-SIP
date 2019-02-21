<div class="panel panel-primary">
<div class="panel-heading"><h1 class="panel-title">Ganti Password</h1></div>
<div class="panel-body">
<?php
if ($_SESSION['guru']){
?>		<form method="POST" action="proses.php?pilih=guru&untukdi=gantipassword" name="editpassword" id="editpassword" class="form-horizontal">
		<?php
		echo "<input type='hidden' name='nip' value='$_SESSION[guru]'>";
		?>
		<div class="row">
			<div class="col-md-12 text-center"><strong><h3>Form Ganti Password</h3></strong></hr></div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left"><strong>Password</strong></div>
			<div class="col-md-6 text-left"><input type="password" class="form-control" name="password"></div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left"><strong>Ulang Password</strong></div>
			<div class="col-md-6 text-left"><input type="password" class="form-control" name="password2"></div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left"><strong></strong></div>
			<div class="col-md-3 text-left"><input type="submit" class="btn btn-primary form-control" value="Simpan"></div>
			<div class="col-md-3 text-left"><input type="button" class="btn btn-danger form-control" value="Batal" onclick="self.history.back()"></div>
		</div>
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
		
<?php } else if ($_SESSION['orangtua']){ ?>		

	<form method="POST" action="proses.php?pilih=ortu&untukdi=gantipassword" name="editpassword" id="editpassword" class="form-horizontal">
		<?php
		echo "<input type='hidden' name='idortu' value='$_SESSION[orangtua]'>";
		?>
		<div class="row">
			<div class="col-md-12 text-center"><strong><h3>Form Ganti Password</h3></strong></hr></div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left"><strong>Password</strong></div>
			<div class="col-md-6 text-left"><input type="password" class="form-control" name="password"></div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left"><strong>Ulang Password</strong></div>
			<div class="col-md-6 text-left"><input type="password" class="form-control" name="password2"></div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left"><strong></strong></div>
			<div class="col-md-3 text-left"><input type="submit" class="btn btn-primary form-control" value="Simpan"></div>
			<div class="col-md-3 text-left"><input type="button" class="btn btn-danger form-control" value="Batal" onclick="self.history.back()"></div>
		</div>
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
		
<?php } else { ?>
	
	<form method="POST" action="proses.php?pilih=siswa&untukdi=gantipassword" name="editpassword" id="editpassword">
		<?php
		echo "<input type='hidden' name='nis' value='$_SESSION[siswa]'>";
		?>
		<div class="row">
			<div class="col-md-12 text-center"><strong><h3>Form Ganti Password</h3></strong></hr></div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left"><strong>Password</strong></div>
			<div class="col-md-6 text-left"><input type="password" class="form-control" name="password"></div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left"><strong>Ulang Password</strong></div>
			<div class="col-md-6 text-left"><input type="password" class="form-control" name="password2"></div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left"><strong></strong></div>
			<div class="col-md-3 text-left"><input type="submit" class="btn btn-primary form-control" value="Simpan"></div>
			<div class="col-md-3 text-left"><input type="button" class="btn btn-danger form-control" value="Batal" onclick="self.history.back()"></div>
		</div>
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
<?php } ?>
</div>
</div>