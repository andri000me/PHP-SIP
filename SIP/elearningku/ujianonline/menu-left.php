<?php
session_start();
// Statemen For Siswa
if ($_SESSION['posisi']=='siswa'){
?>

<!-- =========================================== For Siswa Menu ============================================================= -->

<div style="float: left" id="my_menu" class="sdmenu">
	<div style="margin-bottom:15px;" id="round1">
		<span id="round1">Dashboard</span>
		<a href="index.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Dashboard
		</a>
		
		
		<a href="logout.php" style="padding-bottom:10px;">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Logout
		</a>
	</div>

	<!-- Post Menu -->
	
	<div class="collapsed" style="margin-bottom:15px;">
		<span id="round1">Lembar Soal</span>
		<a href="soalanalisa.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Kemampuan Analisa
		</a>
		
		<a href="soalkuantitatif.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Kemampuan Kuantitatif
		</a>
		
		<a href="soalinggris.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Bahasa Inggris
		</a>
		
	</div>
</div>

<!-- =========================================== For Guru Menu ============================================================= -->

<?php
}
else if($_SESSION['posisi']=='guru'){
// Statemen For Guru
?>

<div style="float: left" id="my_menu" class="sdmenu">
	<div style="margin-bottom:15px;" id="round1">
		<span id="round1">Dashboard</span>
		<a href="index.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Dashboard
		</a>
		
		<a href="logout.php" style="padding-bottom:10px;">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Logout
		</a>
	</div>

	<!-- Post Menu -->
	
	<div class="collapsed" style="margin-bottom:15px;">
		<span id="round1">Input Soal</span>
		<a href="inputsoalanalisa.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Kemampuan Analisa
		</a>
		
		<a href="inputsoalkuantitatif.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Kemampuan Kuantitatif
		</a>
		
		<a href="inputsoalinggris.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Bahasa Inggris
		</a>
		
	</div>
	
	<div class="collapsed" style="margin-bottom:15px;">
		<span id="round1">Daftar Soal</span>
		<a href="index.php?page=listsoalanalisa">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Kemampuan Analisa
		</a>
		<a href="index.php?page=listsoalkuantitatif">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Kemampuan Kuantitatif
		</a>
		<a href="index.php?page=listsoalinggris">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Bahasa Inggris
		</a>
		
	</div>
	
	
	<div class="collapsed" style="margin-bottom:15px;">
		<span id="round1">Hasil Ujian</span>
		<a href="hasil_ujian.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Hasil ujian
		</a>
		
		
	</div>
	
	<!-- Comment Menu -->
	
	<!-- "User di Create Otomatis dari Administrator Admin Panel"
	<div class="collapsed" style="margin-bottom:15px;">
		<span id="round1">Users</span>
		<a href="index.php?page=users">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Users
		</a>
		
		<a href="inputuser.php" style="padding-bottom:10px;">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Input user baru
		</a>
	</div> -->

	<!-- Help & Learn -->

</div>
<?php 
} else {
include "error/error-access-denied-page.php";
?>
<?php
}
?>