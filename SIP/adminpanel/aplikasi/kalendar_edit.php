<h3>Edit Kalendar Akademik</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif"><a href="kalendar_akademik.php">Kalendar Akademik</a></div>
		</div>

		<table class="isian">
		<?php $edit=mysql_query("SELECT * FROM sh_kalendar_akademik WHERE id_kalendar = '$_GET[id]'");
				$r=mysql_fetch_array($edit);?>
				
		<form method='POST' <?php echo "action='$database?pilih=kalendar&untukdi=edit'";?>  name='editkalendar' id='editkalendar'>
			<?php echo "<input type='hidden' name='id' value='$r[id_kalendar]'>";?>
			
			<tr><td class="isiankanan" width="175px">Tanggal</td><td class="isian"><input type="text" name="tgl_kalendar" class="pendek" id="tanggal" value="<?php echo "$r[tgl_akademik]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Subjek</td><td class="isian"><input type="text" name="subjek_kalendar" class="maksimal" value="<?php echo "$r[subjek]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Keterangan</td><td class="isian"><textarea name="keterangan_kalendar" style="height: 100px"><?php echo "$r[keterangan]";?></textarea></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editkalendar");
			frmvalidator.addValidation("tgl_kalendar","req","Tanggal harus diisi !");
			frmvalidator.addValidation("subjek_kalendar","req","Subjek harus diisi !");
			frmvalidator.addValidation("keterangan_kalendar","req","Keterangan harus diisi !");
	  
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->