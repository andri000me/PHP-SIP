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
<!--style popup-->
<style type="text/css">
/* Tombol Button Pesan */
#button {margin: 5% auto; width: 100px; text-align: center;}
#button a {
	width: 100px;
	height: 30px;
	vertical-align: middle;
	background-color: #F00;
	color: #fff;
	text-decoration: none;
	padding: 10px;
	border-radius: 5px;
	border: 1px solid transparent;
}

/* Jendela Pop Up */
#popup {
	width: 100%;
	height: 100%;
	position: fixed;
	background: rgba(0,0,0,.7);
	top: 0;
	left: 0;
	z-index: 9999;
	visibility: hidden;
}
.window {
	width: 40%;
	height: auto;
	background: #fff;
	border-radius: 10px;
	position: relative;
	padding: 10px;
	text-align: center;
	margin: 15% auto;
}
.window h2 {
	margin: 30px 0 0 0;
}
/* Button Close */
.close-button {
	width: 3.5%;
	height: auto;
	line-height: 23px;
	background: #000;
	border-radius: 50%;
	border: 3px solid #fff;
	display: block;
	text-align: center;
	color: #fff;
	text-decoration: none;
	position: absolute;
	top: -10px;
	right: -10px;	
}

/* Memunculkan Jendela Pop Up*/
#popup:target {
	visibility: visible;
}

.tbl {
 border-top:solid 1px #000;
 border-bottom:solid 1px #000;
}

</style>
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
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isimenuBerita"><a href="berita.php">Berita</a></div></div>
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isimenuInformasi"><a href="informasi_sekolah.php">Informasi Sekolah</a></div></div>
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Mading'){ ?>
			<div class="menu"><div class="isimenumading"><a href="mading.php">Admin Mading</a></div></div>
		<?php } ?>
		
		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isimenuMapel"><a href="mata_pelajaran.php">Mata Pelajaran</a></div></div>
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isimenuGuru"><a href="guru_staff.php">Guru dan Staff</a></div></div>
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isimenuSiswa"><a href="siswa.php">Siswa</a></div></div>
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isimenuAbsen"><a href="absen_siswa.php">Absensi Siswa</a></div></div>
		<?php } ?>
		
		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isimenuAkademik aktif"><a href="kalendar_akademik.php">Kalendar Akademik</a></div></div>
		<?php } ?>
		
		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isimenuJadwal"><a href="jadwal_pelajaran.php">Jadwal Pelajaran</a></div></div>
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isimenuNilai"><a href="nilai.php">Nilai</a></div></div>
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isimenuPSB"><a href="psb_online.php">PSB Online</a></div></div>
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isiSPP"><a href="spp.php">SPP</a></div></div>
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isimenuAlbum"><a href="album_galeri.php">Album Galeri</a></div></div>
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isimenuBuku"><a href="buku_tamu.php">Buku Tamu</a></div></div>
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<div class="menu"><div class="isimenuAdmin"><a href="admin.php">Manajemen Admin</a></div></div>
		<?php } ?>

		<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
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
				
					<?php include "aplikasi/kalendar_data.php"; ?>
			
						<!-- PopUP Windows -->
							<div id="popup">
								<div class="window">
									<a href="#" class="close-button" title="Close">X</a>
									  <h2> Detail Tanggal Akademik </h2>
										<hr/>
										  <?php
			  
											  $id = $_GET['id'];
										  
											  $sql_1 = mysql_query("SELECT * FROM sh_kalendar_akademik WHERE id_kalendar = '$id'");
											  $a     = mysql_fetch_array($sql_1);
											  
											  ?>
											  
											  <?php
											  #Ubah menjadi format tanggal Indonesia untuk tanggal acara
											  $tgl_akademik = tgl_indo($a['tgl_akademik']);
											  ?>
											  
											  <?php
											  #Merapikan format teks untuk detail acara
											  $detail = nl2br($a['keterangan']);
											  ?>
											  
											  <table id="calendar" cellspacing="0" cellpadding="0">
													  <tr>
														   <td>Tanggal</td>
														   <td align="center"> : </td>
														   <td><?php echo"$tgl_akademik"; ?></td>
													  </tr>
													  <tr>
														   <td>Subjek</td>
														   <td align="center"> : </td>
														   <td><?php echo"$a[subjek]"; ?></td>
													  </tr>
													  <tr>
														   <td>Keterangan</td>
														   <td align="center"> : </td>
														   <td><?php echo"$detail"; ?></td>
													  </tr>
											  </table>
										</div>
									</div>
								</div><!--Akhir id kanan-->
							
								<div class="clear"></div>
							</div><!--Akhir id konten-->
						</div><!--Akhir id wrapper-->

							<div class="clear"></div>
							<!--Memanggil bagian footer-->
						<?php include "konten/footer.php"; }?>
