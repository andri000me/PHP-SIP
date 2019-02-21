<?php
$database="aplikasi/database/gmap.php";
?>
<h3>Lokasi Sekolah</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="informasi_sekolah.php">Informasi Sekolah</a></div>
			<div class="menuhorisontalaktif"><a href="gmap.php">Lokasi Gmap</a></div>
			<div class="menuhorisontal"><a href="profil.php">Profil</a></div>
			<div class="menuhorisontal"><a href="agenda.php">Agenda</a></div>
			<div class="menuhorisontal"><a href="pengumuman.php">Pengumuman</a></div>
		</div>

		<table class="isian">
		<form method='POST' name="editmap" id="editmap" <?php echo "action='$database' "; ?>  enctype="multipart/form-data">
			<tr><td class="isiankanan" width="160px">Preview Map</td><td class="isian">
			<?php
			$lokasi=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='14'");
			$l=mysql_fetch_array($lokasi);
			
			if (!empty($l[isi_pengaturan])){
			echo "$l[isi_pengaturan]";}
			else {
				echo "<img src='../images/$l[isi_pengaturan2]' width='350px'>";
			}
			?>
			</td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Preview lokasi diatas akan menampilkan hasil input dari embed code Google Map atau dari gambar peta lokasi yang telah anda upload
			</i><br><hr></td></tr>
			<tr><td class="isiankanan" width="160px">Embed Code Google Map</td><td class="isian"><textarea name="embed_code" style="height:200px; width: 60%"><?php echo "$l[isi_pengaturan]";?></textarea></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Copy dan Paste kan embed code dari Google Map sesuai dengan posisi sekolah anda, dengan cara membuka <a href="http://maps.google.com/" target="_blank">situs ini</a>, kemudian masukkan alamat sekolah anda. Di bagian pojok kanan atas ada gambar
			yang menunjukkan link, klik tombol tersebut maka secara otomatis keluar embed code yang dibutuhkan.
			</i><br><hr></td></tr>
			<tr><td class="isiankanan" width="160px">Upload gambar Map</td>
				<td class="isian">
					<input type="file" name="fupload">
				</td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Jika anda merasa kesulitan atau mungkin terlalu ribet dengan cara diatas, anda dapat upload gambar peta lokasi sekolah. Anda hanya boleh menggunakan salah satu dari kedua opsi ini.</i><br><hr></td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editmap");
	  
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk gambar adalah : jpg, gif, png");
	  
			//]]>
		</script>
		</table>
		
</div><!--Akhir class isi kanan-->
		