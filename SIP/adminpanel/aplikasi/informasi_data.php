<?php
$database="aplikasi/database/informasi_data.php";
?>
<h3>Informasi Sekolah</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="informasi_sekolah.php">Informasi Sekolah</a></div>
			<div class="menuhorisontal"><a href="gmap.php">Lokasi Gmap</a></div>
			<div class="menuhorisontal"><a href="profil.php">Profil</a></div>
			<div class="menuhorisontal"><a href="agenda.php">Agenda</a></div>
			<div class="menuhorisontal"><a href="pengumuman.php">Pengumuman</a></div>
		</div>

		<table class="isian">
		
		<form method="POST" name="editinfo" id="editinfo" <?php echo "action='$database' "; ?> enctype="multipart/form-data">
		<?php 	$namasekolah=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan=8");
				$ns=mysql_fetch_array($namasekolah);?>
			<tr><td class="isiankanan" width="100px">Nama Sekolah</td><td class="isian"><input type="text" name="nama_sekolah" class="sedang" <?php echo "value='$ns[isi_pengaturan]'";?>></td></tr>
			
		<?php 	$telepon=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan=9");
				$t=mysql_fetch_array($telepon);?>
			<tr><td class="isiankanan" width="100px">Telepon</td><td class="isian"><input type="text" name="telp_sekolah" class="sedang" <?php echo "value='$t[isi_pengaturan]'";?>></td></tr>
			
		<?php 	$email=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan=10");
				$e=mysql_fetch_array($email);?>
			<tr><td class="isiankanan" width="100px">Email</td><td class="isian"><input type="text" name="email_sekolah" class="sedang" <?php echo "value='$e[isi_pengaturan]'";?>></td></tr>
			
		<?php 	$kepsek=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan=11");
				$k=mysql_fetch_array($kepsek);?>
			<tr><td class="isiankanan" width="100px">Kepala Sekolah</td><td class="isian"><input type="text" name="kepala_sekolah" class="sedang" <?php echo "value='$k[isi_pengaturan]'";?>></td></tr>
			
		<?php 	$alamatsekolah=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan=12");
				$a=mysql_fetch_array($alamatsekolah);?>
			<tr><td class="isiankanan" width="100px">Alamat Sekolah</td><td class="isian"><textarea name="alamat_sekolah" style="height:125px; width: 60%"><?php echo "$a[isi_pengaturan]";?></textarea></td></tr>
			<tr><td class="isiankanan" width="100px">&nbsp;</td>
				<td class="isian">
				<?php
				$logo=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan=13");
				$l=mysql_fetch_array($logo);
				echo "<img src='../images/$l[isi_pengaturan]' width='128px'>"; ?>
				</td>
			</tr>
			<tr><td class="isiankanan" width="100px">Ganti Logo</td>
				<td class="isian">
					<input type="file" name="fupload">
				</td>
			</tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editinfo");
				frmvalidator.addValidation("nama_sekolah","req","Nama sekolah harus diisi");
				frmvalidator.addValidation("nama_sekolah","maxlen=30","Maksimal karakter untuk nama sekolah adalah 30");
				frmvalidator.addValidation("nama_sekolah","minlen=3","Minimal karakter untuk nama sekolah adalah 3");
				
				frmvalidator.addValidation("telp_sekolah","maxlen=20","Angka telepon maksimal 20 angka");
				
				frmvalidator.addValidation("email_sekolah","maxlen=50","Email maksimal 50 karakter");
				frmvalidator.addValidation("email_sekolah","req","Email harus diisi");
				frmvalidator.addValidation("email_sekolah","email","Format email salah");
				
				frmvalidator.addValidation("kepala_sekolah","req","Nama kepala sekolah harus diisi");
				
				frmvalidator.addValidation("alamat_sekolah","req","Alamat sekolah harus diisi");
				frmvalidator.addValidation("alamat_sekolah","minlen=3","Alamat sekolah minimal 5 karakter");
				
				frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk gambar adalah : jpg, gif, png");
			//]]>
		</script>
		</table>
		
</div><!--Akhir class isi kanan-->
		