<?php
session_start();
include "konfigurasi/koneksi.php";
include "file/tema/edisi_spesial_green/atas.php";
?>
<body>
	<div id="wrapper">
		<?php include "file/tema/edisi_spesial_green/header.php";?>
		
		<div id="menu">
			<?php include "file/tema/edisi_spesial_green/menu.php";?>
		</div>
		
		<?php include "file/tema/edisi_spesial_green/konten.php";?>
		
		<div id="sidebar">
			<?php include "file/tema/edisi_spesial_green/sidebar.php";?>
		</div>
	<div class="clear"></div>
	
		<?php include "file/tema/edisi_spesial_green/footer.php"; ?>
	
	<div class="clear"></div>
	</div>
</body>
</html>