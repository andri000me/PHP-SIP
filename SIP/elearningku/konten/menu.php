		<div class="menuBack"><a href="../index.php" target="_blank">Halaman Depan</a></div>
				<div class="pengumuman"><!-- Awal menampilkan pengumuman paling baru-->

				<?php
				$pengumuman=mysql_query("SELECT * FROM sh_pengumuman WHERE ditujukan='all' ORDER BY id_pengumuman DESC");
				$cek_pengumuman=mysql_num_rows($pengumuman);
				
				if($cek_pengumuman > 0){
				$peng=mysql_fetch_array($pengumuman);
				echo "<blink><h4>$peng[judul_pengumuman]</h4></blink>
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
		<?php if($_SESSION['siswa']){ ?>
		<div class="pengumumans"><!-- Awal menampilkan pengumuman paling baru-->

				<?php
				$pengumuman=mysql_query("SELECT * FROM sh_pengumuman, sh_users WHERE sh_pengumuman.s_username=sh_users.s_username and sh_pengumuman.ditujukan='siswa'  ORDER BY id_pengumuman DESC");
				$cek_pengumuman=mysql_num_rows($pengumuman);
				
				if($cek_pengumuman > 0){
				$peng=mysql_fetch_array($pengumuman);
				echo "<blink><h4>$peng[judul_pengumuman]</h4></blink>
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
		<?php } ?>

		<?php if($_SESSION['orangtua']){ ?>
		<div class="pengumuman"><!-- Awal menampilkan pengumuman paling baru-->

				<?php
				$pengumuman=mysql_query("SELECT * FROM sh_pengumuman, sh_users WHERE sh_pengumuman.s_username=sh_users.s_username and sh_pengumuman.ditujukan='orangtua'  ORDER BY id_pengumuman DESC");
				$cek_pengumuman=mysql_num_rows($pengumuman);
				
				if($cek_pengumuman > 0){
				$peng=mysql_fetch_array($pengumuman);
				echo "<blink><h4>$peng[judul_pengumuman]</h4></blink>
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
		<?php } ?>

		<?php if($_SESSION['guru']){ ?>
		<div class="pengumuman"><!-- Awal menampilkan pengumuman paling baru-->

				<?php
				$pengumuman=mysql_query("SELECT * FROM sh_pengumuman, sh_users WHERE sh_pengumuman.s_username=sh_users.s_username and sh_pengumuman.ditujukan='guru'  ORDER BY id_pengumuman DESC");
				$cek_pengumuman=mysql_num_rows($pengumuman);
				
				if($cek_pengumuman > 0){
				$peng=mysql_fetch_array($pengumuman);
				echo "<blink><h4>$peng[judul_pengumuman]</h4></blink>
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
		<?php } ?>
		<div class="menuHome"><a href="index.php">Home</a></div>
		
		<!-- Upload Materi Session Guru-->
		<?php
		if ($_SESSION['guru']){
		?>
		<div class="menuUpload"><a href="?p=upload">Upload Materi</a></div>
		<?php } ?>
		
		<!-- Mata Pelajaran Session Guru OR Siswa-->
		<?php
		if ($_SESSION['guru'] OR $_SESSION['siswa']){
		?>
		<div class="menuMapel"><a href="?p=mapel">Mata Pelajaran</a></div>
		<?php } ?>
	
		<!-- Jadwal Mengajar Session Guru -->
		<?php if($_SESSION['guru']) { ?>
		<div class="menuJadwal"><a href="?p=jadwal_guru">Jadwal Mengajar</a></div>
		<?php } ?>
		
		<!-- Absensi Siswa Session Guru -->
		<?php if ($_SESSION['guru']){ ?>
		<div class="menuAbsenortu"><a href="?p=absenguru"> Absensi Siswa</a></div>
		<?php } ?>

		<!-- Nilai Session Guru -->
		<?php if ($_SESSION['guru']){ ?>
		<div class="menuNilai"><a href="?p=nilai"> Nilai </a></div>
		<?php } ?>
		
		<!-- Jadwal Pelajaran Session Siswa OR  Orangtua -->
		<?php if ($_SESSION['siswa'] or $_SESSION['orangtua']){ ?>
		<div class="menuJadwal"><a href="?p=jadwal">Jadwal Pelajaran</a></div>
		<?php } ?>		
		
		<!-- Absensi Siswa Session Orangtua -->
		<?php if ($_SESSION['orangtua']){ ?>
		<div class="menuAbsenortu"><a href="?p=absenortu"> Absensi Siswa </a></div>
		<?php } ?>

		<!-- Nilai Siswa Session Siswa OR Orangtua -->		
		<?php if ($_SESSION['siswa'] or $_SESSION['orangtua']){ ?>
		<div class="menuNilai"><a href="?p=nilaisiswa"> Nilai </a></div>
		<?php } ?>
		
		<!-- Mading Siswa Session siswa -->
		<?php if ($_SESSION['siswa']){ ?>
		<div class="menuMading"><a href="?p=mading"> Mading </a></div>
		<?php } ?>
		
		<!-- SPP Siswa Session Orangtua-->
		<?php if ($_SESSION['orangtua']){ ?>
		<div class="menuSPP"><a href="?p=spp">SPP</a></div>
		<?php } ?>
	
		<!-- Daftar Guru ALL Session -->
		<div class="menuGuru"><a href="?p=guru">Daftar Guru</a></div>
		
		<!-- CCTV session Orangtua -->
		<?php if ($_SESSION['orangtua']){ ?>
		<div class="menuCctv"><a href="?p=cctvortu">CCTV</a></div>
		<?php } ?>	


		
		<!-- CCTV session Guru -->
		<?php if ($_SESSION['guru']){ ?>
		<div class="menuCctv"><a href="?p=cctvguru">CCTV</a></div>
		<?php } ?>				
		
		<!-- Pencarian Materi session Guru OR Siswa -->		
		<?php
		if ($_SESSION['guru'] OR $_SESSION['siswa']){
		?>
		<div class="menuPencarian"><a href="?p=semua">Pencarian</a></div>
		<?php } ?>


		
		<!-- Statistik  Materi -->
		<div class="statistikMenu">
		<b>Informasi E-learning</b>
		<?php
		$siswa=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='1'");
		$jmlsiswa=mysql_num_rows($siswa);
		$guru=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='guru'");
		$jmlguru=mysql_num_rows($guru);
		$mapelm=mysql_query("SELECT * FROM sh_mapel");
		$jmlmapel=mysql_num_rows($mapelm);
		$materim=mysql_query("SELECT * FROM sh_materi");
		$jmlmateri=mysql_num_rows($materim);
		?>
		<ul>
		<li><b><?php echo $jmlsiswa?></b> Jumlah Siswa</li>
		<li><b><?php echo $jmlguru?></b> Jumlah Guru</li>
		<li><b><?php echo $jmlmapel?></b> Jumlah Mata Pelajaran</li>
		<li><b><?php echo $jmlmateri?></b> Jumlah Materi</li>
		</ul>
		</div>
		
		<div class="menuLink">
		This site supported by:
		<a href="http://trimitra-sisteminfo.com" target="_blank"><img src="images/sh.png"></a>
		</div>