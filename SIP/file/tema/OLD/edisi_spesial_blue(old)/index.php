<?php
session_start();
include "konfigurasi/koneksi.php";
include "file/tema/edisi_spesial_blue/atas.php";
?>
<body>
	<div id="wrapper">
		<?php include "file/tema/edisi_spesial_blue/header.php";?>
		
		<div id="menu">
			<?php include "file/tema/edisi_spesial_blue/menu.php";?>
		</div>
		
		<?php include "file/tema/edisi_spesial_blue/konten.php";?>
		
		<div id="sidebar">
			<?php include "file/tema/edisi_spesial_blue/sidebar.php";?>
		</div>
	<div class="clear"></div>
	
		<?php include "file/tema/edisi_spesial_blue/footer.php"; ?>
	
	<div class="clear"></div>
	</div>
</body>
</html>