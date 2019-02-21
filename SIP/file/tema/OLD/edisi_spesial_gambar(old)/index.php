<?php
session_start();
include "konfigurasi/koneksi.php";
include "file/tema/edisi_spesial_gambar/atas.php";
?>
<body>
	<div id="wrapper">
		<?php include "file/tema/edisi_spesial_gambar/header.php";?>
			<div id="menu">
				<?php include "file/tema/edisi_spesial_gambar/menu.php";?>
			</div>
		
		
		<?php include "file/tema/edisi_spesial_gambar/konten.php";?>
		
		<div id="sidebar">
			<?php include "file/tema/edisi_spesial_gambar/sidebar.php";?>
		</div>
		<div class="clear"></div>
	
		<?php include "file/tema/edisi_spesial_gambar/footer.php"; ?>
	
		<div class="clear"></div>
		<!-- POP UP RELOAD WEBSITE -->
		
	</div>

	
	<!-- NEW LOAD WEBSITE -->
	<?php $url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
		if ($url == "http://192.168.19.19/websch/index.php" || $url == "http://36.66.78.186/websch/index.php"  AND $url !== "http://192.168.19.19/websch/index.php?p=login#popup" || $url !== "http://36.66.78.186/websch/index.php?p=login#popup" ) {
	?>
	<div id="satu">
		<div class="jendela">
			<a href="#satu" class="tutup" title="Close">X</a>
				<!-- Awal menampilkan pengumuman paling baru-->
				<div class="pengumuman">
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
				<!-- Awal menampilkan pengumuman paling baru-->
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- NEW LOAD WEBSITE -->


</body>
</html>