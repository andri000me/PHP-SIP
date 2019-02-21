<?php
if($_SESSION['leveluser'] == 'Super Admin') {
$database="aplikasi/database/tema.php";
?>
<h3>Tema Website</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="tahun_ajaran.php">Tahun Ajaran</a></div>
			<div class="menuhorisontal"><a href="pengaturan.php">Website</a></div>
			<div class="menuhorisontalaktif"><a href="tema.php">Tema</a></div>
			<div class="menuhorisontal"><a href="ym.php">Yahoo! Messenger</a></div>
			<div class="menuhorisontal"><a href="polling.php">Polling</a></div>
			<div class="menuhorisontal"><a href="link.php">Link</a></div>
			<div class="menuhorisontal"><a href="statistik.php">Statistik</a></div>
		</div>

		<div class="atastabel" style="margin-bottom: 10px">
		</div>
		
		<div class="clear"></div>
		
		<div class="kotakTemaAktif">
			<?php
			$temaaktif=mysql_query("SELECT * FROM sh_tema WHERE status='1'");
			$aktif=mysql_fetch_array($temaaktif);
			?>
			<div class="isiKotakPreview">
			<img src="<?php echo"../file/tema/$aktif[nama_tema]/preview.jpg";?>" width="300px" height="200px">
			</div>
			<div class="isiKotakKeterangan">
			<h3><?php echo "$aktif[nama_tema]";?></h3>
			<table class="isian" style="padding: 0; margin: 0;">
				<tr><td class="isiankanan">Pembuat</td><td class="isian">: <a href="<?php echo "$aktif[url_pembuat]";?>"><?php echo "$aktif[pembuat]";?></a></td></tr>
				<tr><td class="isiankanan" width="150px">Tahun Pembuatan</td><td class="isian">: <?php echo "$aktif[tahun]";?></td></tr>
				<tr><td class="isiankanan">Deskripsi</td><td class="isian">: <?php echo "$aktif[deskripsi]";?></td></tr>
				<tr><td class="isiankanan">Status</td><td class="isian">: <b>AKTIF<b></td></tr>
			</table>
			</div>
		</div>
		
		<table class="isian">
		<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			PT.TRIMITRA SISTEM INFORMASI menyediakan 4 tema yang dapat anda gunakan untuk website sekolah, silahkan di kostumisasi jika tema dari kami belum sesuai dengan
			kebutuhan websita anda. Untuk fungsi penambahan tema, pengeditan dan pengahpusan belum kami sediakan dalam versi ini
			</i><br><hr></td></tr>
		</table>
		<?php
		$tema=mysql_query("SELECT * FROM sh_tema WHERE status='0'");
		while($r=mysql_fetch_array($tema)){
		?>
		<div class="kotakTema">
			<div class="previewTema">
			<img src="<?php echo"../file/tema/$r[nama_tema]/preview.jpg";?>" width="200px" height="150px">
			</div>
			<div class="keteranganTema">
			<b><?php echo"$r[nama_tema]";?></b><br><br>
			Pembuat : <a href="<?php echo"$r[url_pembuat]";?>"><?php echo"$r[pembuat]";?></a><br>
			Tahun Pembuatan: <?php echo"$r[tahun]";?><br>
			Deskripsi : <?php echo"$r[deskripsi]";?><br><br>
			<a href="<?php echo "$database?id=$r[id_tema]";?>"><b>Aktifkan</b></a>
			</div>
		</div>
		<?php
		} ?>
		
		<div class="clear"></div>
</div><!--Akhir class isi kanan-->
<?php }?>