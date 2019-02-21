<h3>Edit Komentar</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="berita.php">Berita</a></div>
			<div class="menuhorisontal"><a href="kategori.php">Kategori</a></div>
			<div class="menuhorisontalaktif"><a href="komentar.php">Komentar</a></div>
		</div>
		<?php 	$edit=mysql_query("SELECT * FROM sh_komentar, sh_berita WHERE sh_komentar.id_berita=sh_berita.id_berita AND id_komentar='$_GET[id]'");
				$r=mysql_fetch_array($edit);
				?>
		<table class="isian">
		<form method="POST" <?php echo "action='$database?pilih=komentar&untukdi=edit'";?> name="editkomentar" id="edit komentar">
		<?php echo "<input type='hidden' name='id' value='$r[id_komentar]'";?>
			<tr><td class="isiankanan" width="100px">Nama</td><td class="isian"><input type="text" name="nama_kom" class="sedang" <?php echo "value='$r[nama_komentar]'";?>></td></tr>
			<tr><td class="isiankanan" width="100px">Email</td><td class="isian"><input type="text" name="email_kom" class="sedang" <?php echo "value='$r[email_komentar]'";?>></td></tr>
			<tr><td class="isiankanan" width="100px">Judul Berita</td>
				<td class="isian">
					<select name="judul_berita">
					<?php 	
						echo "
						<option value='$r[id_berita]' selected>$r[judul_berita]</option>";
					$judulberita=mysql_query("SELECT * FROM sh_berita WHERE status_komentar='1' AND id_berita!=$r[id_berita]");
					while ($jb=mysql_fetch_array($judulberita)){
						echo "
						<option value='$jb[id_berita]'>$jb[judul_berita]</option>"; }
					?>
					</select>
				</td>
			</tr>
			<tr><td class="isiankanan" width="100px">Isi Komentar</td><td class="isian"><textarea name="isi_kom" style="height:125px; width: 60%"><?php echo "$r[isi_komentar]";?></textarea></td></tr>
			<tr><td class="isiankanan" width="100px">Status</td>
				<td class="isian">
				<?php if ($r[status_terima]==1){
				echo "
					<input type='radio' name='status_terima' value='1' checked>Terima&nbsp;
					<input type='radio' name='status_terima' value='0'>Tolak"; }
				else {
				echo "
					<input type='radio' name='status_terima' value='1'>Terima&nbsp;
					<input type='radio' name='status_terima' value='0' checked>Tolak";
				} ?>
				</td>
			</tr>
			<tr><td class="isiankanan" width="100px">Tgl Komentar</td><td class="isian"><input type="text" name="tgl_kom" id="tanggal" class="pendek" <?php echo "value='$r[tanggal_komentar]'";?>></td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editkomentar");
				frmvalidator.addValidation("nama_kom","req","Nama komentator harus diisi");
				frmvalidator.addValidation("nama_kom","maxlen=20","Maksimal karakter untuk nama adalah 20");
				frmvalidator.addValidation("nama_kom","minlen=3","Minimal karakter untuk nama adalah 3");
				
				frmvalidator.addValidation("email_kom","maxlen=50","Email maksimal 50 karakter");
				frmvalidator.addValidation("email_kom","req","Email harus diisi");
				frmvalidator.addValidation("email_kom","email","Format email salah");
				
				frmvalidator.addValidation("judul_berita","req","Anda belum memilih judul berita");
				
				frmvalidator.addValidation("isi_kom","req","Komentar harus diisi");
				frmvalidator.addValidation("isi_kom","minlen=3","Komentar minimal 5 karakter");
	  
			//]]>
		</script>
		</table>

</div><!--Akhir class isi kanan-->