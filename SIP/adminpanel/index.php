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
<?php include "konten/awal.php"; 
 // Link Rel Icon
		  echo "<link rel='shortcut icon' href='../ico.ico'/>";  ?>
		  
<body>
<div id="wrapper"><!--Awal id wrapper-->
	<div id="atas"><!--Awal id atas-->
	
	<!--Memanggil bagian header-->
	<?php include "konten/header.php";?> 

	</div><!--Akhir id atas-->
	<div class="clear"></div>
	
	<div id="konten"><!--Awal id konten-->
		<div id="samping"><!--Awal id samping-->
		
			<!--Menu yang ditampilkan sesuai dengan halaman yang tampil pada browser (kelas aktif)-->
			
			<div class="menu"><div class="isimenuHome aktif"><a href="index.php">Beranda</a></div></div>
			
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
			<div class="menu"><div class="isimenuAkademik"><a href="kalendar_akademik.php">Kalendar Akademik</a></div></div>
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
			<div class="menu"><div class="isimenuSms"><a href="/trimitra/SIP/gammu/index.php?module=home" target="_blank">SMS - GATEWAY</a></div></div>
			<?php } ?>

			<?php if($_SESSION['leveluser']=='Super Admin'){ ?>
			<div class="menu"><div class="isimenuPengaturan"><a href="pengaturan.php">Pengaturan</a></div></div>
			<?php } ?>
		</div><!--Akhir id samping-->
	
		<div id="kanan"><!--Awal id kanan-->
			<?php if($_SESSION['leveluser']=='Super Admin' or $_SESSION['leveluser']=='Admin Panel'){ ?>
			<h3>Dashboard</h3>
			
				<div class="kanankecil">
				<!--menampilkan informasi website-->
				<?php include "konten/informasi_website.php"; ?>
				</div>
				
				<div class="kanankecil">
				<!--Menampilkan form pengumuman pada halaman dashboard, form ini digunakan sebagai shortcut atau jalan pintas
				yang tidak mengharuskan admin untuk masuk ke modul pengumuman-->
				<?php include "konten/form_pengumuman.php"; ?>
				</div>
				<div class="clear"></div>
				
				<div class="kanankecil">
				<!--Menampilkan 5 komentar berita terbaru-->
				<?php include "konten/komentar_terbaru.php"; ?>	
				</div>
				
				<div class="kanankecil">
				<?php include "konten/info_psb.php"; ?>
				</div>
				
				<div class="kanankecil" style="float: right; margin-right: 2.5%;">
				<?php include "konten/banner.php"; ?>
				</div>
			<?php } ?>
<?php if($_SESSION['leveluser']=='Admin Mading'){ ?>
			<div id="mading" class="tab_content">
			<h3 id="mading-terbaru">Mading</h3>
					<ul>
					<?php
						$mading=mysql_query("SELECT * 
										FROM sh_mading, sh_mading_kategori, sh_siswa
										WHERE sh_mading.id_kategori = sh_mading_kategori.id_mading_kategori
										AND sh_mading.nama_siswa = sh_siswa.nama_siswa
										AND status_terbit =  '1'
										ORDER BY id_mading DESC 
										LIMIT 4"
									   );
						$hitungmading=mysql_num_rows($mading);
						
						if($hitungmading > 0){
						while($b=mysql_fetch_array($mading)){
					?>
						<li>
						<!-- Judul Mading  -->
							<p style="margin-top: 10px"><a href="<?php echo "../index.php?p=detmading&id=$b[id_mading]";?>">
									<?php echo "<b>$b[judul_mading]</b>";?>
							</a></p>
						
						<!-- Nama Kategori -->
						<br><p style="margin: -20px 0 0 0px"><small>Kategori: <a href="../index.php?p=katmading&id=<?php echo $b[id_mading_kategori]?>">
						<!-- Komentar -->
						<?php echo $b[nama_mading_kategori]?></a>
						&nbsp;Komentar : 
						<?php
						$hitungkomentar=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$b[id_mading]'");
						$jumlahkomentar=mysql_num_rows($hitungkomentar);
						echo $jumlahkomentar?></small></p>

						<!-- Isi Mading -->
						<?php
						$isi_mading = strip_tags($b[isi_mading]); 
						$isi = substr($isi_mading,0,500);

						// Gambar
						if ($b[gambar_mading] != 'no_image.jpg'){
						echo "<p><img src='../images/$b[gambar_mading]' width='100px'  height ='100px' style='float:left; 
							margin: -10px 10px 0 0;	 
							padding: 3px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='../index.php?p=detmading&id=$b[id_mading]'>Baca selengkapnya...</a></p><br><br><br><br><br>";}
						else {
						echo "<p>$isi...<a href='../index.php?p=detmading&id=$b[id_mading]'>Baca selengkapnya...</a></p>";
						}
						?>
						</li>
					<?php }}

					else {?>
					<li><a href=""><b>Data mading belum ada</b></a></li>
					<?php } ?>
					</ul>
				</div>
				<!-- akhir mading -->
				<?php } ?>
		</div><!--Akhir id kanan-->
	
	</div><!--Akhir id konten-->
	<div class="clear"></div>
	
</div><!--Akhir id wrapper-->

	<div class="clear"></div>
	<!--Memanggil bagian footer-->
<?php include "konten/footer.php"; }?>
