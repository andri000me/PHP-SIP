<h3>Edit Pendaftar</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="psb_online.php">Pendaftar</a></div>
			<div class="menuhorisontal"><a href="psb_diterima.php">Diterima</a></div>
			<div class="menuhorisontal"><a href="psb_setting.php">Pengaturan</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo"action=$database?pilih=psb&untukdi=edit";?> name='editpendaftar' id='editpendaftar' >
		<?php
		$edit=mysql_query("SELECT * FROM sh_psb WHERE id_psb='$_GET[id]'");
		$r=mysql_fetch_array($edit);
		
		echo "<input type='hidden' name='id' value='$r[id_psb]'>";
		?>
			
			<tr><td class="isiankanan" width="175px">Nama Pendaftar</td><td class="isian"><input type="text" name="nama_pendaftar" class="maksimal" value="<?php echo "$r[nama_psb]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">NEM</td><td class="isian"><input type="text" name="nem" class="pendek" style="width:10%" value="<?php echo "$r[nem]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">No. STTB</td><td class="isian"><input type="text" name="no_sttb" class="pendek" value="<?php echo "$r[no_sttb]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Tanggal STTB</td><td class="isian"><input type="text" id="tanggal1" name="tanggal_sttb" class="pendek" value="<?php echo "$r[tanggal_sttb]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Sekolah Asal</td><td class="isian"><input type="text" name="sekolah_asal" class="pendek" value="<?php echo "$r[sekolah_asal]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Jenis Kelamin</td>
			<td class="isian">
					<?php if($r[jenkel]=='L'){ ?>
					<input type="radio" name="jk" value="L" checked/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P"/>Perempuan
					<?php }
					else { ?>
					<input type="radio" name="jk" value="L"/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P" checked/>Perempuan
					<?php } ?>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Tempat, Tanggal Lahir</td><td class="isian"><input type="text" name="tempat_lahir" class="pendek" value="<?php echo "$r[tempat_lahir]";?>">, <input type="text" id="tanggal" name="tanggal_lahir" class="pendek" style="width:20%" value="<?php echo "$r[tanggal_lahir]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Tinggi Badan</td><td class="isian"><input type="text" name="tb" class="pendek" style="width:10%" value="<?php echo "$r[tb]";?>">&nbsp;cm</td></tr>
			<tr><td class="isiankanan" width="175px">Berat Badan</td><td class="isian"><input type="text" name="bb" class="pendek" style="width:10%" value="<?php echo "$r[bb]";?>">&nbsp;kg</td></tr>
			<tr><td class="isiankanan" width="175px">Alamat Pendaftar</td><td class="isian"><textarea name="alamat" style="height: 100px"><?php echo "$r[alamat_psb]";?></textarea></td></tr>
	
			<tr><td class="isiankanan" width="175px">Email</td><td class="isian"><input type="text" name="email" class="pendek" value="<?php echo "$r[email]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Telepon/ HP</td><td class="isian"><input type="text" name="telepon" class="pendek" value="<?php echo "$r[telepon]";?>"></td></tr>
	
			<tr><td class="isiankanan" width="175px">Nama Orang Tua</td><td class="isian"><input type="text" name="nama_ortu" class="maksimal" value="<?php echo "$r[nama_ortu]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Pekerjaan Orang Tua</td><td class="isian"><input type="text" name="pekerjaan_ortu" class="maksimal" value="<?php echo "$r[pekerjaan_ortu]";?>"></td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editpendaftar");
			frmvalidator.addValidation("nama_pendaftar","req","Nama pendaftar harus diisi");
			frmvalidator.addValidation("nama_pendaftar","maxlen=30","Nama pendaftar maksimal 30 karakter");
			frmvalidator.addValidation("nama_pendaftar","minlen=3","Nama pendaftar minimal 3 karakter");
	  
			frmvalidator.addValidation("nem","req","NEM harus diisi");
			frmvalidator.addValidation("nem","maxlen=5","NEM maksimal 5 karakter");
			frmvalidator.addValidation("nem","minlen=2","NEM minimal 2 karakter");
			
			frmvalidator.addValidation("no_sttb","req","Nomor STTB harus diisi");
			frmvalidator.addValidation("no_sttb","minlen=4","Nomor STTB minimal 4 karakter");
			
			frmvalidator.addValidation("tanggal_sttb","req","Tanggal STTB harus diisi");
			frmvalidator.addValidation("bb","numeric","Berat badan ditulis dengan angka");
			frmvalidator.addValidation("tb","numeric","Tinggi badan ditulis dengan angka");
			
			frmvalidator.addValidation("sekolah_asal","req","Sekolah asal harus diisi");
			frmvalidator.addValidation("sekolah_asal","minlen=6","Sekolah asal minimal 6 karakter");
			
			frmvalidator.addValidation("tempat_lahir","req","Tempat lahir harus diisi");
			frmvalidator.addValidation("tempat_lahir","minlen=3","Tempat lahir minimal 3 karakter");
			
			frmvalidator.addValidation("tanggal_lahir","req","Tanggal lahir harus diisi");
			
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->