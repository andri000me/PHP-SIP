<?php
if($_SESSION['leveluser'] == 'Super Admin') {
?>
<h3>Edit Polling</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="pengaturan.php">Website</a></div>
			<div class="menuhorisontal"><a href="tema.php">Tema</a></div>
			<div class="menuhorisontal"><a href="ym.php">Yahoo! Messenger</a></div>
			<div class="menuhorisontalaktif"><a href="polling.php">Polling</a></div>
			<div class="menuhorisontal"><a href="link.php">Link</a></div>
			<div class="menuhorisontal"><a href="statistik.php">Statistik</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=polling&untukdi=edit'";?> name='editpolling' id='editpolling' >
		<?php
			$edit=mysql_query("SELECT * FROM sh_sidebar WHERE id_sidebar='$_GET[id]'");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_sidebar]'>
				  <input type='hidden' name='status' value='$r[isi2]'>
			";
		?>
			<tr><td class="isiankanan" width="100px">Isi Polling</td><td class="isian"><input type="text" name="isi_polling" class="maksimal" value="<?php echo "$r[nama]";?>"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			<?php
			if ($r[isi2]=='jawaban'){ ?>
			Masukkan isi polling yang berupa jawaban dari pertanyaan polling
			<?php }
			else { ?>
			Masukkan pertanyaan sesuai dengan keinginan anda
			<?php } ?>
			</i><br><hr></td></tr>
			<?php
			if ($r[isi2]== 'jawaban'){
			?>
			<tr><td class="isiankanan" width="100px">Jumlah Poll</td><td class="isian"><input type="text" name="jml_poll" class="pendek" value="<?php echo "$r[isi1]";?>"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Pengisian jumlah polling hanya untuk manipulasi data saja, di mohon digunakan dengan bijak
			</i><br><hr></td></tr>
			<?php } ?>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editpolling");
			frmvalidator.addValidation("isi_polling","req","Isi polling harus diisi");
			frmvalidator.addValidation("isi_polling","maxlen=50","Isi Polling maksimal 50 karakter");
			frmvalidator.addValidation("isi_polling","minlen=2","Isi Polling minimal 2 karakter");
			
			//]]>
		</script>
		
		</table>
		<hr>
		<div class="atastabel" style="margin-bottom: 10px">
		</div>
		<?php include "aplikasi/polling.php";?>
		
</div><!--Akhir class isi kanan-->
<?php } ?>