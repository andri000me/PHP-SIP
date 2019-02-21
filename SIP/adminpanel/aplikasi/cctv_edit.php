<h3>Edit Kamera CCTV</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="cctv.php">Daftar CCTV</a></div>
			<div class="menuhorisontal"><a href="monitor_cctv.php">Monitor CCTV</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=cctv&untukdi=edit'";?> name='editcctv' id='editcctv' enctype="multipart/form-data">
			<?php
			$edit=mysql_query("SELECT * FROM sh_cctv , sh_kelas WHERE id_cctv='$_GET[id]' AND sh_cctv.id_kelas = sh_kelas.id_kelas");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_cctv]'>";
			?>
			
			<tr><td class="isiankanan" width="175px">Link Generate CCTV</td><td class="isian"><input type="text" name="cctv" class="maksimal" value="<?php echo $r['alamat_cctv']; ?>" ></td></tr>
			<tr><td class="isiankanan" width="175px">Ruang / Kelas di Pasang</td><td class="isian">
			<select name="kelas" id="kelas">
				<option value="<?php echo $r['id_kelas'];?>" selected> <?php echo $r['nama_kelas']; ?> </option>
				<option value="">--Pilih Kelas Kembali--</option>
					<?php
					$kelas=mysql_query("SELECT * FROM sh_kelas");
					while($k=mysql_fetch_array($kelas)){
					echo "<option value='$k[id_kelas]'>$k[nama_kelas]</option>"; }
					?>
			</select>
			</td></tr>
			
			<tr><td class="isiankanan" width="175px">Status CCTV</td><td class="isian">
			<select name="status" id="status">
			<?php if ($r['status']==1) { ?>
			<option value="1" selected>Kelas</option>
			<?php } else { ?>
			<option value="0" selected>Ruang</option>
			<?php } ?>
			<option value="" >--Pilih Status--</option>
			<option value="1">Kelas</option>
			<option value="0">Ruang</option>
			</select>			
			</td></tr>
			
			<tr><td class="isiankanan" width="175px">Dapat di Akses Orang Tua</td><td class="isian">
			<select name="aktif_ortu" id="aktif_ortu">
			<?php if ($r['aktif_ortu']==1) { ?>
			<option value="1" selected>Boleh</option>
			<?php } else { ?>
			<option value="0" selected>Tidak</option>
			<?php } ?>
			<option value="" >--Pilih Akses--</option>
			<option value="1">Boleh</option>
			<option value="0">Tidak</option>
			</select>			
			</td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		
		<!-- Validasi -->
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editcctv");
			frmvalidator.addValidation("cctv","req","Link Generate CCTV harus diisi ! ");
			frmvalidator.addValidation("kelas","req","Kelas harus dipilih ! ");
			frmvalidator.addValidation("status","req","Status harus dipilih ! ");
			frmvalidator.addValidation("aktif_ortu","req","Akses Orang Tua harus dipilih ! ");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->