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
			
				<li><a href="">Mading Siswa</a>
					<ul>
						<li><a href="">Karya Tulis</a></li>
						<li><a href="">Karya Seni</a></li>
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
			<li><a href="?p=login-sign_in">Login</a></li>

			</ul>