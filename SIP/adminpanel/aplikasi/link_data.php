<?php
if($_SESSION['leveluser'] == 'Super Admin') {
$database="aplikasi/database/link.php";
switch($_GET[pilih]){
default: ?>
<h3>Link</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="tahun_ajaran.php">Tahun Ajaran</a></div>
			<div class="menuhorisontal"><a href="pengaturan.php">Website</a></div>
			<div class="menuhorisontal"><a href="tema.php">Tema</a></div>
			<div class="menuhorisontal"><a href="ym.php">Yahoo! Messenger</a></div>
			<div class="menuhorisontal"><a href="polling.php">Polling</a></div>
			<div class="menuhorisontalaktif"><a href="link.php">Link</a></div>
			<div class="menuhorisontal"><a href="statistik.php">Statistik</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=link&untukdi=tambah'";?> name='tambahlink' id='tambahlink' >
			<tr><td class="isiankanan" width="100px">Nama Link</td><td class="isian"><input type="text" name="nama_link" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan nama website atau instansi yang diinginkan
			</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">URL</td><td class="isian"><input type="text" name="url_link" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan url website tanpa di awalai dengan http:// , contoh <b>www.arirusmanto.com</b>
			</i><br><hr></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="reset" class="hapus" value="Reset">
			</td></tr>
		</form>
		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahlink");
			frmvalidator.addValidation("nama_link","req","Nama link harus diisi");
			frmvalidator.addValidation("nama_link","maxlen=20","Nama link maksimal 20 karakter");
			frmvalidator.addValidation("nama_link","minlen=3","Nama link minimal 3 karakter");
			
			frmvalidator.addValidation("url_link","req","URL harus diisi");
			frmvalidator.addValidation("url_link","maxlen=30","URL  maksimal 30 karakter");
			
			
			//]]>
		</script>
		</table>
		<hr>
		<div class="atastabel" style="margin-bottom: 10px">
		</div>
		<?php include "aplikasi/link.php";?>
	
</div><!--Akhir class isi kanan-->

		<?php break; 
		case "edit":
			include "aplikasi/link_edit.php";
		}
		}
		?>	