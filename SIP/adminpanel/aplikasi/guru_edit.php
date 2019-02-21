<h3>Edit Guru</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="guru_staff.php">Guru</a></div>
			<div class="menuhorisontal"><a href="staff.php">Staff</a></div>
			<div class="menuhorisontal"><a href="jabatan.php">Jabatan</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=guru&untukdi=edit'";?> name='editguru' id='editguru' enctype="multipart/form-data">
		<?php
		$edit=mysql_query("SELECT * FROM sh_guru_staff WHERE id_gurustaff = '$_GET[id]'");
		$r=mysql_fetch_array($edit);
		
		echo "<input type='hidden' name='id' value='$r[id_gurustaff]'";
		?>
			
			<tr><td class="isiankanan" width="175px">Nama Guru</td><td class="isian"><input type="text" name="nama_guru" class="maksimal" value="<?php echo"$r[nama_gurustaff]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">NIP</td><td class="isian"><input type="text" name="nip" class="pendek" value="<?php echo"$r[nip]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Password</td><td class="isian">
			<a href="javascript:void(0)"onclick="window.open('<?php echo "aplikasi/guru_password.php?id=$r[id_gurustaff]"; ?>','linkname','height=315, width=500,scrollbars=yes')"><b><u>Ganti Password</u></b></a></td></tr>
			<tr><td class="isiankanan" width="175px">Foto</td><td class="isian"><img src="../images/foto/guru/<?php echo "$r[foto]";?>" width="200px">
				<?php if ($r[foto] !='no_photo.jpg'){?>
				<br><br>
				<a href="<?php echo "$database?pilih=guru&untukdi=hapusgambar&id=$r[id_gurustaff]";?>"><b><u>Hapus gambar</u></b></a>
				<?php }?>
				</td></tr>
			<tr><td class="isiankanan" width="175px">Ganti Foto</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td class="isiankanan" width="175px">Jenis Kelamin</td>
			<td class="isian">
			<?php if ($r[jenkel]=='L'){ ?>
					<input type="radio" name="jk" value="L" checked/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P"/>Perempuan
			<?php }
			else { ?>
					<input type="radio" name="jk" value="L"/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P" checked/>Perempuan
			<?php } ?>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Tempat, Tanggal Lahir</td><td class="isian">
			<input type="text" name="tempat_lahir" class="pendek" value="<?php echo"$r[tempat_lahir]";?>">, 
			<input type="text" id="tanggal" name="tanggal_lahir" class="pendek" style="width:20%" value="<?php echo"$r[tanggal_lahir]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Mengajar</td>
			<td class="isian">
			<!-- Custom Mapel Guru "DI Fitur Edit Tidak Di Aktifkan"
			<input id="idf" value="1" type="hidden"/>
			<button type="button"  onclick="tambahMapel(); return false;">Tambah Mata Pelajaran</button>
			  <br/> -->
				<?php
				// MAPEL VIEW
				$mapel_guru=mysql_query("SELECT * from sh_mapel_guru where sh_mapel_guru.id_gurustaff ='$r[id_gurustaff]' ");
				$cek_mapel_guru=mysql_num_rows($mapel_guru);
				if($cek_mapel_guru > 0){
				while($mg=mysql_fetch_array($mapel_guru)){
				?>
				 <br/>
				   <input type="hidden" name="id_mapel_guru_edit[]" value="<?php echo $mg['id_mapel_guru']; ?>"/>
					<select name="mata_pelajaran_edit[]">
						<option value="<?php echo "$mg[id_mapel]";?>" selected><?php echo "$mg[nama_mapel]";?></option>
						<?php
						$mapel=mysql_query("SELECT * FROM sh_mapel ORDER BY nama_mapel ASC");
						while ($m=mysql_fetch_array($mapel)){
						echo "<option value='$m[id_mapel]'>$m[nama_mapel]</option>"; }
						?>
					</select>
				  <br/>
				<?php } } Else { ?>
				<!-- Custom Mapel Guru -->
				<input id="idf" value="1" type="hidden"/>
			   <button type="button"  onclick="tambahMapel(); return false;">Tambah Mata Pelajaran</button>
			  <div id="divMapel"></div> <!-- JS -> konten/awal.php -->
			 <?php } ?>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Alamat</td><td class="isian"><textarea name="alamat" style="height: 100px"><?php echo"$r[alamat]";?></textarea></td></tr>
			<tr><td class="isiankanan" width="175px">Pendidikan Terakhir</td>
			<td class="isian">
					<select name="pendidikan">
						<option value="<?php echo "$r[pendidikan_terakhir]";?>" selected><?php echo "$r[pendidikan_terakhir]";?></option>
						<option value="SMA sederajat">SMA sederajat</option>
						<option value="Diploma 1 (D1)">Diploma 1 (D1)</option>
						<option value="Diploma 2 (D2)">Diploma 2 (D2)</option>
						<option value="Diploma 3 (D3)">Diploma 3 (D3)</option>
						<option value="Strata 1 (S1)">Strata 1 (S1)</option>
						<option value="Magister (S2)">Magister (S2)</option>
						<option value="Doktor (S3)">Doktor (S3)</option>
					</select>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Tahun Masuk</td><td class="isian">
			<?php
				$thn_skrg=date("Y");
				echo "<select name=tahun_masuk>
				<option value='$r[tahun_masuk]' selected>$r[tahun_masuk]</option>";
				for ($thn=1990;$thn<=$thn_skrg;$thn++){
				echo "<option value=$thn>$thn</option>";
				}
				echo "</select>"; ?>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Status Perkawinan</td>
			<td class="isian">
					<select name="status_kawin">
						<option value="<?php echo "$r[status_kawin]";?>" selected><?php echo "$r[status_kawin]";?></option>
						<option value="Menikah">Menikah</option>
						<option value="Belum Menikah">Belum menikah</option>
						<option value="Duda">Duda</option>
						<option value="Janda">Janda</option>
					</select>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Email</td><td class="isian"><input type="text" name="email" class="pendek" value="<?php echo"$r[email]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Telepon/ HP</td><td class="isian"><input type="text" name="telepon" class="pendek" value="<?php echo"$r[telepon]";?>"></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editguru");
			frmvalidator.addValidation("nama_guru","req","Nama guru harus diisi");
			frmvalidator.addValidation("nama_guru","maxlen=30","Nama guru maksimal 30 karakter");
			frmvalidator.addValidation("nama_guru","minlen=3","Nama guru minimal 3 karakter");
	  
			frmvalidator.addValidation("nip","req","NIP guru harus diisi");
			frmvalidator.addValidation("nip","maxlen=18","NIP guru maksimal 18 karakter");
			frmvalidator.addValidation("nip","minlen=9","NIP guru minimal 9 karakter");
			frmvalidator.addValidation("nip","numeric","NIP ditulis dengan angka");
			
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk gambar adalah : jpg, gif, png");
			
			frmvalidator.addValidation("mata_pelajaran","req","Anda belum memilih mata pelajaran");
			frmvalidator.addValidation("pendidikan","req","Anda belum memilih pendidikan terakhir");
			frmvalidator.addValidation("status_kawin","req","Anda belum memilih status perkawinan");
			
			frmvalidator.addValidation("tahun_masuk","req","Tahun masuk harus diisi");
			
			frmvalidator.addValidation("tempat_lahir","req","Tempat lahir harus diisi");
			frmvalidator.addValidation("tanggal_lahir","req","Tanggal lahir harus diisi");
			
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->