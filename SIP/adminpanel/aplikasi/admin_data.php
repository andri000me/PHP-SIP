<?php
$database="aplikasi/database/admin.php";
switch($_GET['pilih']){
default: ?>
<h3>Manajemen Administrator</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulbox">Data Administrator</div>
		<?php
		if($_SESSION['leveluser'] != 'Super Admin') {
		?>
		
		
		<table class="isian">
		<form method='POST' action="<?php echo "$database?pilih=admin&untukdi=editadmin";?>" name='tambahadmin' id='tambahadmin' >
		<?php
			$edit=mysql_query("SELECT * FROM sh_users WHERE s_username='$_SESSION[adminsh]'");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_users]'>";
		?>
			<tr><td class="isiankanan" width="100px">Nama Lengkap</td><td class="isian"><input type="text" name="nama_admin" class="sedang" value="<?php echo "$r[nama_lengkap_users]";?>"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan lengkap admin sesuai dengan nama sebenarnya, minimal 5 karakter maksimal 30 karakter
			</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Username</td><td class="isian"><input type="text" name="username" class="sedang" value="<?php echo "$r[namausers]";?>"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Username harus unik, minimal 5 karakter dan maksimal 8 karakter
			</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Email</td><td class="isian"><input type="text" name="email" class="sedang" value="<?php echo "$r[email_users]";?>"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Email yang dimasukkan harus valid
			</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Password</td><td class="isian">
			<a href="javascript:void(0)"onclick="window.open('<?php echo "aplikasi/admin_password.php?id=$r[id_users]"; ?>','linkname','height=315, width=500,scrollbars=yes')"><b><u>Ganti Password</u></b></a></td></tr>
		
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			</td></tr>
		</form>
		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahadmin");
			frmvalidator.addValidation("nama_admin","req","Nama admin harus diisi");
			frmvalidator.addValidation("nama_admin","maxlen=30","Nama admin maksimal 30 karakter");
			frmvalidator.addValidation("nama_admin","minlen=5","Nama admin minimal 5 karakter");
	  
			frmvalidator.addValidation("username","req","Username harus diisi");
			frmvalidator.addValidation("username","maxlen=8","Username maksimal 8 karakter");
			frmvalidator.addValidation("username","minlen=5","Username minimal 5 karakter");
			
			frmvalidator.addValidation("email","email","Format email salah");
			frmvalidator.addValidation("email","req","Email harus diisi");
			frmvalidator.addValidation("email","mixlen=30","Email maksimal 30 karakter");
			
			//]]>
		</script>
		</table>
		
		<?php } 
		else {
		
		$pengaturanadmin=mysql_query("SELECT * FROm sh_pengaturan WHERE id_pengaturan='2'");
		$pa=mysql_fetch_array($pengaturanadmin);
		if ($pa[isi_pengaturan]=='1'){
		?>
		<table class="isian">
		<form method='POST' action="<?php echo "$database?pilih=admin&untukdi=tambah";?>" name='tambahadmin' id='tambahadmin' >
			<tr><td class="isiankanan" width="100px">Nama Lengkap</td><td class="isian"><input type="text" name="nama_admin" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan lengkap admin sesuai dengan nama sebenarnya, minimal 5 karakter maksimal 30 karakter
			</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Username</td><td class="isian"><input type="text" name="username" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Username harus unik, minimal 5 karakter dan maksimal 8 karakter
			</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Email</td><td class="isian"><input type="text" name="email" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Email yang dimasukkan harus valid
			</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Password</td><td class="isian"><input type="password" name="password" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan password dengan kombinasi 0-9 dan karakter a-z atau A-Z, minimal 6 karakter
			</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Password Lagi</td><td class="isian"><input type="password" name="password_lagi" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Harus sama dengan password yang diatas
			</i><br><hr></td></tr>
		
			<tr>
			<td class="isiankanan" width="100px">Level</td>
			<td class="isian">
			<input type="radio" name="adminpanel" id="adminx" value="Admin Mading">Admin mading
			<input type="radio" name="adminpanel" id="adminx" value="Admin Panel">Admin panel
			</td>
			</tr>	
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="reset" class="hapus" value="Reset">
			</td></tr>
		</form>
		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahadmin");
			frmvalidator.addValidation("nama_admin","req","Nama admin harus diisi");
			frmvalidator.addValidation("nama_admin","maxlen=30","Nama admin maksimal 30 karakter");
			frmvalidator.addValidation("nama_admin","minlen=5","Nama admin minimal 5 karakter");
	  
			frmvalidator.addValidation("username","req","Username harus diisi");
			frmvalidator.addValidation("username","maxlen=8","Username maksimal 8 karakter");
			frmvalidator.addValidation("username","minlen=5","Username minimal 5 karakter");
			
			frmvalidator.addValidation("password_lagi","eqelmnt=password","Password tidak sama");
			
			frmvalidator.addValidation("password","neelmnt=username","Password tidak boleh sama dengan username");
			frmvalidator.addValidation("password","req","Password harus diisi");
			frmvalidator.addValidation("password","minlen=6","Password minimal 6 karakter");
			
			frmvalidator.addValidation("email","email","Format email salah");
			frmvalidator.addValidation("email","req","Email harus diisi");
			frmvalidator.addValidation("email","mixlen=30","Email maksimal 30 karakter");
			
			//]]>
		</script>
		</table>
		
		<hr>
		<div class="atastabel" style="margin-bottom: 10px">
		</div>
		<?php } ?>
		
		<table class="tabel">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="125px">Nama Lengkap</th>
				<th class="tabel">Username</th>
				<th class="tabel">Level</th>
				<th class="tabel">Login Terakhir</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php 	$no=1;
					$admin=mysql_query("SELECT * FROM sh_users");
					while($ad=mysql_fetch_array($admin)){?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><a href=""><b><?php echo "$ad[nama_lengkap_users]";?></b></a></td>
				<td class="tabel"><?php echo "$ad[namausers]";?></td>
				<td class="tabel"><?php echo "$ad[level_users]";?></td>
				<td class="tabel"><?php echo "$ad[login_terakhir]";?></td>
				<td class="tabel">
					<?php if ($ad[level_users] !='Super Admin'){ ?>
					<div class="hapusdata">
					<a href="<?php echo"$database?pilih=admin&untukdi=hapus&id=$ad[id_users] ";?>" onClick="return confirm ('Apakah anda benar-benar akan menghapus <?php echo $ad[nama_lengkap_users]?>?')">hapus</a>
					</div>
					<div class="editdata"><a href="<?php echo"?pilih=edit&id=$ad[id_users]";?>">edit</a></div>
					<?php }
					else { ?>
					<div class="editdata"><a href="<?php echo"?pilih=edit&id=$ad[id_users]";?>">edit</a></div>
					<?php } ?>
				</td>
			</tr>
			<?php
			$no++; }
			?>
		</table>
		<?php } ?>
</div><!--Akhir class isi kanan-->
		<?php break;
		
		case "edit":
			include "aplikasi/admin_edit.php";
		}
		?>
	