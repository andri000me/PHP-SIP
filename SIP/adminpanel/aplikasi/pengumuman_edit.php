<h3>Tambah Pengumuman</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="informasi_sekolah.php">Informasi Sekolah</a></div>
			<div class="menuhorisontal"><a href="gmap.php">Lokasi Gmap</a></div>
			<div class="menuhorisontal"><a href="profil.php">Profil</a></div>
			<div class="menuhorisontal"><a href="agenda.php">Agenda</a></div>
			<div class="menuhorisontalaktif"><a href="pengumuman.php">Pengumuman</a></div>
		</div>
		
		<table class="isian">
		<?php echo " <form method='POST' action='$database?pilih=pengumuman&untukdi=edit' name='pengumuman_edit' id='pengumuman_edit'>";
		$edit=mysql_query("SELECT * FROM sh_pengumuman WHERE id_pengumuman='$_GET[id]'");
		$r=mysql_fetch_array($edit);
		
		echo "<input type='hidden' name='id' value='$r[id_pengumuman]'>";
		?>
			<tr><td class="isian" colspan="2"><input type="text" class="maksimal" name="judul_pengumuman" value="<?php echo "$r[judul_pengumuman]";?>" ></td></tr>
			
			<tr><td class="isian" colspan="2"><textarea class="tini" name="isi_pengumuman"><?php echo "$r[isi_pengumuman]";?></textarea></td></tr>
			<tr>
			<td class="isiankanan" width="100px">Ditujukan Untuk</td>
			<td class="isian">
			
			<?php if ($r['ditujukan']=="all"){ ?>
			<input type="radio" name="ditujukan" id="tujukan" value="all" checked="checked">Semua
			<?php } else { ?>
			<input type="radio" name="ditujukan" id="tujukan" value="all">Semua
			<?php } ?>

			<?php if ($r['ditujukan']=="guru"){ ?>
			<input type="radio" name="ditujukan" id="tujukan" value="guru" checked="checked">Guru
			<?php } else { ?>
			<input type="radio" name="ditujukan" id="tujukan" value="guru">Guru
			<?php } ?>
			<?php if ($r['ditujukan']=="orangtua"){ ?>
			<input type="radio" name="ditujukan" id="tujukan" value="orangtua" checked="checked">Orang Tua
			<?php } else { ?>
			<input type="radio" name="ditujukan" id="tujukan" value="orangtua">Orang Tua
			<?php } ?>

			<?php if ($r['ditujukan']=="siswa"){ ?>
			<input type="radio" name="ditujukan" id="tujukan" value="siswa" checked="checked">Siswa
			<?php }else { ?>
			<input type="radio" name="ditujukan" id="tujukan" value="siswa">Siswa
			<?php } ?>
			</td>
			</tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("pengumuman_edit");
				frmvalidator.addValidation("judul_pengumuman","req","Judul Pengumuman harus diisi");
				frmvalidator.addValidation("judul_pengumuman","maxlen=30","Maksimal karakter untuk Judul Pengumuman adalah 30");
				frmvalidator.addValidation("judul_pengumuman","minlen=3","Minimal karakter untuk Judul Pengumuman adalah 3");
				
			//]]>
		</script>
		</table>

</div><!--Akhir class isi kanan-->