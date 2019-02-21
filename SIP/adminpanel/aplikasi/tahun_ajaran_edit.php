<?php
if($_SESSION['leveluser'] == 'Super Admin') {
?>
<h3>Edit Link</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif"><a href="tahun_ajaran.php">Tahun Ajaran</a></div>
			<div class="menuhorisontal"><a href="pengaturan.php">Website</a></div>
			<div class="menuhorisontal"><a href="tema.php">Tema</a></div>
			<div class="menuhorisontal"><a href="ym.php">Yahoo! Messenger</a></div>
			<div class="menuhorisontal"><a href="polling.php">Polling</a></div>
			<div class="menuhorisontal"><a href="link.php">Link</a></div>
			<div class="menuhorisontal"><a href="statistik.php">Statistik</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=tahun_ajaran&untukdi=edit'";?> name='editta' id='editta' >
		<?php
			$edit=mysql_query("SELECT * FROM sh_tahun_ajaran WHERE id_tahun_ajaran='$_GET[id]'");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_tahun_ajaran]'>";
		?>
			<tr><td class="isiankanan" width="100px">Tahun Ajaran</td><td class="isian"><input type="text" name="tahun_ajaran" class="kecil" Value="<?php echo"$r[tahun_ajaran]";?>" ></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan Tahun Ajaran dengan , Contoh <b> 2016-2017 </b>
			</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="175px">Semester</td>
			<td class="isian">
			<?php if($r["semester"]==1) { ?>
			<input type="radio" name="sm" value="1" Checked />Ganjil&nbsp; 
			<input type="radio" name="sm" value="0"/>Genap<?php } Else { ?>
			<input type="radio" name="sm" value="1" />Ganjil&nbsp; 
			<input type="radio" name="sm" value="0" Checked />Genap <?php } ?>
			</td></tr>
			
			<tr><td class="isiankanan" width="175px">Tanggal Mulai</td><td class="isian"> 
			<input type="text" id="tanggal" name="tanggal_mulai" class="pendek" style="width:20%" Value="<?php echo"$r[waktu_awal_semester]";?>" ></td></tr>
			
			<tr><td class="isiankanan" width="175px">Tanggal Akhir</td><td class="isian"> 
			<input type="text" id="tanggal1" name="tanggal_akhir" class="pendek" style="width:20%"Value="<?php echo"$r[waktu_akhir_semester]";?>"></td></tr>
			
			<tr><td class="isiankanan" width="175px">Status</td><td class="isian">
			<select name="status" id="status">
			<?php if($r["aktif"]==1) { ?>
			<option value="1" selected>Aktif</option> 
			<option value="0">Tidak Aktif</option><?php } Else { ?>
			<option value="1">Aktif</option> 
			<option value="0" selected>Tidak Aktif</option> <?php } ?>
			</select>			
			</td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editta");
			frmvalidator.addValidation("tahun_ajaran","req","Tahun Ajaran harus diisi");
			frmvalidator.addValidation("sm","req","Semester Harus Di Pilih");
			frmvalidator.addValidation("tanggal_mulai","req","Tanggal Mulai Harus Di Isi");
			frmvalidator.addValidation("tanggal_akhir","req","Tanggal Akhir Harus Di Isi");
			//]]>
		</script>
		
		</table>
		<hr>
		<div class="atastabel" style="margin-bottom: 10px">
		</div>
		<?php include "aplikasi/tahun_ajaran.php";?>
</div><!--Akhir class isi kanan-->
<?php } ?>