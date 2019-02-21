<?php
	$database="aplikasi/database/kategori.php";
	switch($_GET['pilih']){
	default: ?>
	<h3>Kategori</h3>
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
				<?php include "aplikasi/kategori_tambah.php"; ?>
				</div>
				
				<div class="kanankecil">
				<!--Menampilkan form pengumuman pada halaman dashboard, form ini digunakan sebagai shortcut atau jalan pintas
				yang tidak mengharuskan admin untuk masuk ke modul pengumuman-->
				<?php include "aplikasi/kategori_data.php"; ?>
				</div>
				<div class="clear"></div>
				</div><!--Akhir class isi kanan-->
	<?php break; 
	case "edit":
	include "aplikasi/kategori_edit.php";
	}
	?>