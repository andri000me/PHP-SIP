<ul>
			<li> <!--class="home"--> <a href="index.php">Home</a> </li>
			<li><a href="">Profil Sekolah</a>
				<ul>
				<?php $profil=mysql_query("SELECT * FROM sh_info_sekolah WHERE posisi_menu='0' AND status_terbit='1' ORDER BY id_info ASC");
						while($p=mysql_fetch_array($profil)) {?>
					<li><a href="<?php echo "?p=info&id=$p[id_info]"?>"><?php echo "$p[nama_info]";?></a></li>
					<?php }?>
					<li><a href="?p=gmap">Lokasi Sekolah</a></li>
				</ul>
			</li>
			<?php
			$menuutama=mysql_query("SELECT * FROM sh_info_sekolah WHERE posisi_menu='1' AND status_terbit='1'");
			$hitung=mysql_num_rows($menuutama);
			if ($hitung != 0){
			while($m=mysql_fetch_array($menuutama)){
			?>
			<li><a href="<?php echo "?p=info&id=$m[id_info]"?>"><?php echo "$m[nama_info]";?></a></li>
			<?php }} ?>
			<li><a href="?p=berita">Artikel Sekolah</a></li>
			
				<li class="mading"><a href="#">Mading Siswa</a>
					<ul class="hidden">
						<li><a href="?p=madingKaryaTulis">Karya Tulis</a></li>
						<li><a href="?p=madingKaryaSeni">Karya Seni</a></li>
					</ul>
				</li>

			<li><a href="">Informasi</a>
				<ul>
					<li><a href="?p=agenda">Agenda Sekolah</a></li>
					<li><a href="?p=pengumuman">Pengumuman Sekolah</a></li>
				</ul>
			</li>
			<li><a href="">Sekolah</a>
				<ul>
					<li><a href="?p=guru">Data Guru</a></li>
					<li><a href="?p=staff">Data Staff</a></li>
					<li><a href="?p=siswa">Data Siswa</a></li>
					<li><a href="?p=alumni">Data Alumni</a></li>
				</ul>
			</li>
			<li><a href="?p=galeri">Galeri</a></li>
			<li><a href="?p=bukutamu">Kirim Saran</a></li>
			<li><a href="?p=psb">PSB</a></li>
            
            <div id="button">
				<?php if (isset($_SESSION['orangtua']) OR isset($_SESSION['siswa']) OR isset($_SESSION['guru'])){ ?>
					<li class="login-key"><a href="elearningku/logout.php" onclick="return confirm('Anda Yakin Ingin Keluar ?')">Logout </a></li>
					<?php } else { ?> <li class="login-key"><a href="file/tema/edisi_spesial_standart/login-sign_in.php">Login</a></li> <?php } ?>
			</div>
</ul>