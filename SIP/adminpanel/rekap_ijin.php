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
			<div class="menu"><div class="isimenuAbsen aktif"><a href="absen_siswa.php">Absensi Siswa</a></div></div>
			<div class="menu"><div class="isimenuAkademik"><a href="kalendar_akademik.php">Kalendar Akademik</a></div></div>
			<div class="menu"><div class="isimenuJadwal"><a href="jadwal_pelajaran.php">Jadwal Pelajaran</a></div></div>
			<div class="menu"><div class="isimenuNilai"><a href="nilai.php">Nilai</a></div></div>
			<div class="menu"><div class="isimenuPSB"><a href="psb_online.php">PSB Online</a></div></div>
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
				
					<?php include "aplikasi/rincian_rekap_ijin_data.php"; ?>
												
							<!-- PopUP Windows -->
							<div id="popup">
								<div class="window">
									<a href="#" class="close-button" title="Close">X</a>
									  <h2> Detail Rekapitulasi Ijin</h2>
										<hr/>
										  <table width="212" border="0" class="tbl">
											<tr bgcolor="#CCCCCC">
											  <td width="32">No</td>
											  <td width="170">Tanggal</td>
											   <td width="170">Keterangan</td>
											  </tr>
												<?php
												$no = 1;
												$nid = $_GET['nid'];
												include "../aplikasi/database/koneksi_absensi_websch-demo.php";
												koneksi1_buka();
												/*Pengaturan Paging */
												  $per_page=5; /* Jumlah Data yang ditampilkan Setiap Page*/
												  $page_query=mysql_query(" select count(ijin_date) from ijin , ijin_k , siswa where ijin.ijin_idx = ijin_k.ijin_idx AND ijin_k.siswa_id = siswa.siswa_id AND siswa.siswa_id = $nid ");
												  $pages = ceil(mysql_result($page_query, 0) / $per_page);
												  $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
												  $start = ($page - 1) * $per_page;
												 /*------------------*/
												$detail = mysql_query(" select ijin_date , ijin_jenis from ijin , ijin_k , siswa where ijin.ijin_idx = ijin_k.ijin_idx AND ijin_k.siswa_id = siswa.siswa_id AND siswa.siswa_id = $nid Limit $start, $per_page "); 
												while($detailtgl = mysql_fetch_array($detail)) {
													$tanggal = $detailtgl['ijin_date'];
													if($detailtgl['ijin_jenis'] == 1){
													$jenis = "SAKIT";
													} else if($detailtgl['ijin_jenis'] == 2){
													$jenis = "IJIN TIDAK HADIR";
													} else if($detailtgl['ijin_jenis'] == 3){
													$jenis = "IJIN PULANG CEPAT";
													} else if($detailtgl['ijin_jenis'] == 4){
													$jenis = "LIBUR";
													} else $jenis = "HADIR";
												echo "<tr><td>$no</td><td>$tanggal</td><td>$jenis</td></tr>"; 
												$no++; } ?>
												</table>
												<?php
												 /* Link Paging */
												 if($pages >= 1 && $page <= $pages){
													echo "Halaman Ke : &nbsp;";
													 for($x=1; $x<=$pages; $x++){
														echo ($x == $page) ?  
													'<a href="?nid='.$nid.'&page='.$x.'&#popup"><b>&nbsp; - '.$x.' - &nbsp;</b></a>' : '<a  href="?nid='.$nid.'&page='.$x.'&#popup">'.$x.'</a>' ; 
													 }
													}
												  koneksi1_tutup();
												?>    
										</div>
									</div>
							      </div><!--Akhir id kanan-->
								<div class="clear"></div>
							  </div><!--Akhir id konten-->
						    </div><!--Akhir id wrapper-->
								<div class="clear"></div>
							<!--Memanggil bagian footer-->
						<?php include "konten/footer.php"; }?>
