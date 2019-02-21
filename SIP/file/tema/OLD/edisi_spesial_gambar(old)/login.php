<?php
if (isset($_SESSION['siswa']) OR isset($_SESSION['guru'])){
?>
<table>
<?php if ($_SESSION['siswa']) { 
$data_siswa_login=mysql_query("SELECT * FROM sh_siswa WHERE nis='$_SESSION[siswa]'");
$datasl=mysql_fetch_array($data_siswa_login);
?>
<tr class="form"><td rowspan="4"><img src="images/foto/guru/no_photo.jpg" width="60px" style="padding: 3px; background: #909090; border: 1px solid #5b5b5b;"></td></tr>
<tr class="form"><td><a href="elearningku/index.php?p=profil" title="Profil"><b><?php echo $datasl[nama_siswa]?></b></a></td></tr>
<tr class="form"><td><b><?php echo $datasl[nis]?></b></td></tr>
<tr class="form"><td><a href="elearningku/logout.php" onClick="return confirm ('Apakah anda benar-benar akan keluar dari sistem?')" title='Log out'>Logout</a></td></tr>

<?php }
else { 
$data_guru_login=mysql_query("SELECT * FROM sh_guru_staff WHERE nip='$_SESSION[guru]'");
$dgl=mysql_fetch_array($data_guru_login);
?>
<tr class="form"><td rowspan="4"><img src="images/foto/guru/<?php echo $dgl[foto]?>" width="60px" style="padding: 3px; border: 1px solid #dcdcdc;"></td></tr>
<tr class="form"><td><a href="elearningku/index.php?p=profil" title="Profil"><b><?php echo $dgl[nama_gurustaff]?></b></a></td></tr>
<tr class="form"><td><b><?php echo $dgl[nip]?></b></td></tr>
<tr class="form"><td><a href="elearningku/logout.php" onClick="return confirm ('Apakah anda benar-benar akan keluar dari sistem?')" title='Log out'>Logout</a></td></tr>

<?php } ?>
</table>
<?php }
else { ?>
<table>
	<form method="POST" action="elearningku/validasi.php" name="login" id="login">
	<tr class="form"><td><b>Username</b></td><td><input type="text" class="panjang" style="width: 85%" name="username" title="Masukkan NIP atau NIS anda"></td></tr>
	<tr class="form"><td><b>Password</b></td><td><input type="password" class="panjang" style="width: 85%" name="password" title="Masukkan password anda"></td></tr>
	<tr class="form"><td><b>Status</b></td><td>
							<select name="status">
								<option value=""selected>Pilih status...</option>
								<option value="guru">Guru</option>
								<option value="siswa">Siswa</option>
								<option value="ortu">Orang Tua</option>
							</select>
	</td></tr>
	<tr class="form"><td></td><td><input type="submit" class="tombol"value="Login"></td></tr>
	</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("login");
			
			frmvalidator.addValidation("username","req","Anda belum memasukkan Username");
			frmvalidator.addValidation("password","req","Anda belum memasukkan Password");
			frmvalidator.addValidation("status","req","Anda belum memilih status");
			//]]>
		</script>
</table>
<?php } ?>