<?php
$database="aplikasi/database/psb_setting.php";
?>
<h3>Setting PSB Online</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="psb_online.php">Pendaftar</a></div>
			<div class="menuhorisontal"><a href="psb_diterima.php">Diterima</a></div>
			<div class="menuhorisontalaktif"><a href="psb_setting.php">Pengaturan</a></div>
		</div>
		
		<table class="isian">
		<?php echo " <form method='POST' action='$database' >"; ?>
		
			<tr><td class="isiankanan" width="100px">Pendaftaran</td>
				<td class="isian">
				<?php 	$settingpsb=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='15'");
						$r=mysql_fetch_array($settingpsb);
					if ($r[nama_pengaturan]==1){?>
					<input type="radio" name="status_psb" value="1" checked/>Dibuka&nbsp;
					<input type="radio" name="status_psb" value="0"/>Ditutup
					<?php }
					else { ?>
					<input type="radio" name="status_psb" value="1"/>Dibuka&nbsp;
					<input type="radio" name="status_psb" value="0" checked/>Ditutup
					<?php } ?>
				</td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Pilih opsi diatas sesuai dengan keadaan sekolah. Apabila pendaftaran masih <b>Ditutup</b> silahkan input pengumuman berupa tanggal pelaksanaan pendaftaran online maupun offline pada
			textarea pertama. Apabila pendaftaran <b>Dibuka</b> silahkan input pengumuman berupa urutan atau tata cara pendaftaran online pada textarea pertama.</i><br><hr></td></tr>
			
			<tr><td class="isian" colspan="2"><textarea class="tini" name="tatacara1"><?php echo "$r[isi_pengaturan]";?></textarea></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Silahkan menginputkan pengumuman pada textarea diatas sesuai dengan aturan yang sudah ada.
			</i><br><hr></td></tr>
			
			<tr><td class="isian" colspan="2"><textarea class="tini" name="tatacara2"><?php echo "$r[isi_pengaturan2]";?></textarea></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Textarea di atas (kedua) diisi apabila status pendaftaran telah <b>Dibuka</b>, anda dapat mengisi pengumuman berupa langkah-langkah berikutnya setelah melakukan pendaftaran online.
			Data dari textarea kedua ini akan ditampilkan setelah pendaftar melakukan input data pada form pendaftaran.
			</i><br><hr></td></tr>
			
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		</table>

</div><!--Akhir class isi kanan-->