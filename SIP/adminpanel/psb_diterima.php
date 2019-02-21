<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['adminsh']))
{
	header('location:login.php');
	exit;
}
else{ ?>
<!--Memanggil awal halaman-->
<?php include "konten/awal.php"; ?>
<body>
<div id="wrapper"><!--Awal id wrapper-->
	<div id="atas"><!--Awal id atas-->

		<!--Memanggil bagian header-->
		<?php include "konten/header.php"; ?> 
		
	</div><!--Akhir id atas-->
	<div class="clear"></div>
	
	<div id="konten"><!--Awal id konten-->
		<div id="samping"><!--Awal id samping-->
			<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isimenuHome"><a href="index.php">Beranda</a></div></div>
			<div class="menu"><div class="isimenuBerita"><a href="berita.php">Berita</a></div></div>
			<div class="menu"><div class="isimenuInformasi"><a href="informasi_sekolah.php">Informasi Sekolah</a></div></div>
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Mading'){ ?>
			<div class="menu"><div class="isimenumading"><a href="mading.php">Admin Mading</a></div></div>
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
		    <div class="menu"><div class="isimenuMapel"><a href="mata_pelajaran.php">Mata Pelajaran</a></div></div>
			<div class="menu"><div class="isimenuGuru"><a href="guru_staff.php">Guru dan Staff</a></div></div>
			<div class="menu"><div class="isimenuSiswa"><a href="siswa.php">Siswa</a></div></div>
			<div class="menu"><div class="isimenuAbsen"><a href="absen_siswa.php">Absensi Siswa</a></div></div>
			<div class="menu"><div class="isimenuAkademik"><a href="kalendar_akademik.php">Kalendar Akademik</a></div></div>
			<div class="menu"><div class="isimenuJadwal"><a href="jadwal_pelajaran.php">Jadwal Pelajaran</a></div></div>
			<div class="menu"><div class="isimenuNilai"><a href="nilai.php">Nilai</a></div></div>
			<div class="menu"><div class="isimenuPSB aktif"><a href="psb_online.php">PSB Online</a></div></div>
			<div class="menu"><div class="isiSPP"><a href="spp.php">SPP</a></div></div>
			<div class="menu"><div class="isimenuAlbum"><a href="album_galeri.php">Album Galeri</a></div></div>
			<div class="menu"><div class="isimenuBuku"><a href="buku_tamu.php">Buku Tamu</a></div></div>
			<div class="menu"><div class="isimenuAdmin"><a href="admin.php">Manajemen Admin</a></div></div>
			<div class="menu"><div class="isimenuCCTV"><a href="cctv.php">CCTV</a></div></div>
		<?php } ?>

			<?php if($_SESSION['leveluser']=='Super Admin'){ ?>
			<div class="menu"><div class="isimenuSms"><a href="/websch-demo/gammu/index.php?module=home" target="_blank">SMS - GATEWAY</a></div></div>
			<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin'){ ?>
			<div class="menu"><div class="isimenuPengaturan"><a href="pengaturan.php">Pengaturan</a></div></div>
		<?php } ?>
		</div><!--Akhir id samping-->
		
		<div id="kanan"><!--Awal id kanan-->
				
					<?php include "aplikasi/psb_diterima_data.php"; ?>
				
		</div><!--Akhir id kanan-->
	
		<div class="clear"></div>
	</div><!--Akhir id konten-->
</div><!--Akhir id wrapper-->

	<div class="clear"></div>
	<!--Memanggil bagian footer-->
<?php include "konten/footer.php"; }?>
