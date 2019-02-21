		
	<h3>Edit Kategori</h3>
	<div class="isikanan"><!--Awal class isi kanan-->
	<div class="judulisikanan">
			<div class="menuhorisontal"><a href="berita.php">Berita</a></div>
			<div class="menuhorisontalaktif"><a href="kategori.php">Kategori</a></div>
			<div class="menuhorisontal"><a href="komentar.php">Komentar</a></div>
		</div>
		
		<div class="atastabel" style="margin: 30px 10px 0 10px">
		
		</div>
		
				<div class="kanankecil">
				<!--menampilkan informasi website-->
				<div class="judulbox">Edit Kategori</div>
				<?php 	$edit=mysql_query("SELECT * FROM sh_kategori WHERE id_kategori='$_GET[id]'");
						$r=mysql_fetch_array($edit); ?>
						<table class="isian" style="margin-top: 10px;">
						<form method="POST" name="editkategori" id="editkategori" <?php echo "action='$database?pilih=kategori&untukdi=edit' "; ?>>
						<?php echo"<input type='hidden' name='id' value='$r[id_kategori]'>"; ?>
							<tr><td class="isiankanan" style="width: 40px;">Nama</td><td class="isian"><input type="text" class="maksimal" name="nama_kat" value="<?php echo "$r[nama_kategori]"; ?>"></td></tr>
							<tr><td class="isiankanan" style="width: 40px;">Deskripsi</td><td class="isian"><textarea style="height: 165px;" name="deskripsi_kat"><?php echo "$r[deskripsi_kategori]"; ?></textarea></td></tr>
							<tr><td class="isiankanan" style="width: 40px;"></td><td class="isian">
							<input type="submit" class="pencet" value="Update">
							</td></tr>
						</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editkategori");
			frmvalidator.addValidation("nama_kat","req","Nama kategori harus diisi");
	  
			//]]>
		</script>
						</table>
				</div>
				
				<div class="kanankecil">
				<!--Menampilkan form pengumuman pada halaman dashboard, form ini digunakan sebagai shortcut atau jalan pintas
				yang tidak mengharuskan admin untuk masuk ke modul pengumuman-->
				<?php include "aplikasi/kategori_data.php"; ?>
				</div>
				<div class="clear"></div>
	</div><!--Akhir class isi kanan-->