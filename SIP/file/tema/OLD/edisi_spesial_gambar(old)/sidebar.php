<!-- <div class="kotakSidebar">

	<h1 align="center" style="color:#2ecc71;">Login</h1> -->
	<?php
	//include "file/tema/edisi_spesial_gambar/login.php";
	?>
<!-- </div> -->


<div id="kecil" style="width:88%; margin-left: 0px">
			<div class="pengumuman"><!-- Awal menampilkan pengumuman paling baru-->
				<?php
				$pengumuman=mysql_query("SELECT * FROM sh_pengumuman, sh_users WHERE sh_pengumuman.s_username=sh_users.s_username ORDER BY id_pengumuman DESC");
				$cek_pengumuman=mysql_num_rows($pengumuman);
				
				if($cek_pengumuman > 0){
				$peng=mysql_fetch_array($pengumuman);
				echo "<h4>$peng[judul_pengumuman]</h4>
				<p>$peng[isi_pengumuman]</p>
				<p><b>Diterbitkan pada: $peng[tanggal_pengumuman]</b></p>
				<p><b>Oleh: $peng[nama_lengkap_users]</b></p>";
				}
				else {
				?>
				<h4>PENGUMUMAN</h4>
				<p><b>Belum ada pengumuman</b></p>
				<?php } ?>
				</div>
			</div>

	<div class="kotakSidebar">
		<div id="polling">
			<img src="file/tema/edisi_spesial_gambar/css/img/bar.png">
			<h1>Polling</h1>
		</div>
			<?php
			$pertanyaan=mysql_query("SELECT * FROM sh_sidebar WHERE jenis='polling' AND status='1' AND isi2='pertanyaan'");
			$tanya=mysql_fetch_array($pertanyaan);
			echo "
			<table width='100%' style='padding: 0px 10px 10px 10px;margin-bottom: 20px;'><form method='POST' action='kontenweb/insert_polling.php'>
			<tr><td colspan='2'><b>$tanya[nama]</td></tr>
			";
			
			$polling=mysql_query("SELECT * FROM sh_sidebar WHERE jenis='polling' AND status='1' AND isi2!='pertanyaan'");
			while($pol=mysql_fetch_array($polling)){
			?>
			<tr><td style="padding: 5px 0 5px 0;"><input type="radio" name="poll" id="poll" <?php echo "value=$pol[id_sidebar]";?>></td><td style="padding: 5px 0 5px 0;"><?php echo "$pol[nama]";?></td></tr>
			<?php } ?>
			<tr id="poll-hasil">
				<td colspan="2">
					<input type="submit" class="tombol" value="Poll">&nbsp;
					<input type="button" class="tombol" value="Hasil" onclick="window.location.href='?p=polling';">
				</td>
			</tr>
			</form></table>		
	</div>