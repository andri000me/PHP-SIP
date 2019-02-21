<?php
if($_SESSION['leveluser'] == 'Super Admin') {
$database="aplikasi/database/polling.php";
switch($_GET[pilih]){
default: ?>
<h3>Polling</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="tahun_ajaran.php">Tahun Ajaran</a></div>
			<div class="menuhorisontal"><a href="pengaturan.php">Website</a></div>
			<div class="menuhorisontal"><a href="tema.php">Tema</a></div>
			<div class="menuhorisontal"><a href="ym.php">Yahoo! Messenger</a></div>
			<div class="menuhorisontalaktif"><a href="polling.php">Polling</a></div>
			<div class="menuhorisontal"><a href="link.php">Link</a></div>
			<div class="menuhorisontal"><a href="statistik.php">Statistik</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=polling&untukdi=tambah'";?> name='tambahpolling' id='tambahpolling' >
			<tr><td class="isiankanan" width="100px">Isi Polling</td><td class="isian"><input type="text" name="isi_polling" class="maksimal"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan isi polling yang berupa jawaban dari pertanyaan polling
			</i><br><hr></td></tr>
			<?php
			echo "<input type='hidden' name='status' value='jawaban'>";
			?>
			
			<tr><td class="isiankanan" width="100px">Jumlah Poll</td><td class="isian"><input type="text" name="jml_poll" class="pendek"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Pengisian jumlah polling hanya untuk manipulasi data saja, di mohon digunakan dengan bijak
			</i><br><hr></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="reset" class="hapus" value="Reset">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahpolling");
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

		<?php break;
		
		case "edit":
			include "aplikasi/polling_edit.php";
		}
		}
		?>	