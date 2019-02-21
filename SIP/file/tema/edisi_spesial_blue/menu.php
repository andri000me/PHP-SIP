
<nav class="navbar navbar-default navbar-fixed-top" id="menu">
<div class="container-fluid">
<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
				<?php
				$logo=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='13'");
				$l=mysql_fetch_array($logo);
			    echo "<img src='images/$l[isi_pengaturan]' width='40px' alt='Logo sekolah'>";
				?>
        <!-- <img src="images/trimitra.png" width="100"/> -->
     </a>      
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
			<li> <!--class="home"--> <a href="index.php" style="color:#000;font-family:Bree Serif;font-size:16px;">Home</a> </li>
			<li class="dropdown"><a style="color:#000;font-family:Bree Serif;font-size:16px;" class="dropdown-toggle" data-toggle="dropdown" href="#">Profil Sekolah<span class="caret"></span></a>
           		<ul class="dropdown-menu">
				<?php $profil=mysql_query("SELECT * FROM sh_info_sekolah WHERE posisi_menu='0' AND status_terbit='1' ORDER BY id_info ASC");
						while($p=mysql_fetch_array($profil)) {?>
					<li><a style="color:#000;font-family:Bree Serif;font-size:16px;" href="<?php echo "?p=info&id=$p[id_info]"?>"><?php echo "$p[nama_info]";?></a></li>
					<?php }?>
					<li><a style="color:#000;font-family:Bree Serif;font-size:16px;" href="?p=gmap">Lokasi Sekolah</a></li>
				</ul>
			</li>
			<?php
			$menuutama=mysql_query("SELECT * FROM sh_info_sekolah WHERE posisi_menu='1' AND status_terbit='1'");
			$hitung=mysql_num_rows($menuutama);
			if ($hitung != 0){
			while($m=mysql_fetch_array($menuutama)){
			?>
			<li><a style="color:#000;font-family:Bree Serif;font-size:16px;" href="<?php echo "?p=info&id=$m[id_info]"?>"><?php echo "$m[nama_info]";?></a></li>
			<?php }} ?>
			<li><a href="?p=berita#berita" style="color:#000;font-family:Bree Serif;font-size:16px;">Artikel Sekolah</a></li>
			
				<li  class="dropdown"><a style="color:#000;font-family:Bree Serif;font-size:16px;" class="dropdown-toggle" data-toggle="dropdown" href="#" href="#">Mading Siswa<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a style="color:#000;font-family:Bree Serif;font-size:16px;"  href="?p=madingKaryaTulis#mt">Karya Tulis</a></li>
						<li><a style="color:#000;font-family:Bree Serif;font-size:16px;"  href="?p=madingKaryaSeni#ms">Karya Seni</a></li>
					</ul>
				</li>

			<li  class="dropdown"><a style="color:#000;font-family:Bree Serif;font-size:16px;"  class="dropdown-toggle" data-toggle="dropdown" href="#" href="#">Informasi<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a style="color:#000;font-family:Bree Serif;font-size:16px;"  href="?p=agenda">Agenda Sekolah</a></li>
					<li><a style="color:#000;font-family:Bree Serif;font-size:16px;"  href="?p=pengumuman">Pengumuman</a></li>
				</ul>
			</li>
			<li  class="dropdown"><a style="color:#000;font-family:Bree Serif;font-size:16px;"  class="dropdown-toggle" data-toggle="dropdown" href="#" href="#">Sekolah<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a style="color:#000;font-family:Bree Serif;font-size:16px;"  href="?p=guru">Data Guru</a></li>
					<li><a style="color:#000;font-family:Bree Serif;font-size:16px;"  href="?p=staff">Data Staff</a></li>
					<li><a style="color:#000;font-family:Bree Serif;font-size:16px;"  href="?p=siswa">Data Siswa</a></li>
					<li><a style="color:#000;font-family:Bree Serif;font-size:16px;"  href="?p=alumni">Data Alumni</a></li>
				</ul>
			</li>
			<li><a style="color:#000;font-family:Bree Serif;font-size:16px;"  href="?p=galeri#gallery">Galeri</a></li>
			<li><a style="color:#000;font-family:Bree Serif;font-size:16px;"  href="?p=bukutamu#saran">Kirim Saran</a></li>
			<li><a style="color:#000;font-family:Bree Serif;font-size:16px;"  href="?p=psb">PSB</a></li>
            
				<?php if (isset($_SESSION['orangtua']) OR isset($_SESSION['siswa']) OR isset($_SESSION['guru'])){ ?>
					<li class="login-key"><a style="color:#000;font-family:Bree Serif;font-size:16px;"  href="elearningku/logout.php" onclick="return confirm('Anda Yakin Ingin Keluar ?')">Logout </a></li>
					<?php } else { ?> <li class="login-key"><a style="color:#000;font-family:Bree Serif;font-size:16px;"  href="?p=login#popup">Login</a></li> <?php } ?>
     </ul>
    </div>
    </div>
   </nav>