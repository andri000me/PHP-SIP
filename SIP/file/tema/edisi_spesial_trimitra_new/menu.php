<div id="menu">
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-justify">
			<li> <!--class="home"--> <a href="?p=halaman_utama">Halaman Utama</a> </li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profil Sekolah<span class="caret"></span></a>
           		<ul class="dropdown-menu">
				<?php $profil=mysql_query("SELECT * FROM sh_info_sekolah WHERE posisi_menu='0' AND status_terbit='1' AND id_info <> 15 ORDER BY id_info ASC");
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
			
				<li  class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" href="#">Mading Siswa<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li class="a"><a href="?p=katmading&id=1">Karya Seni</a></li>
						<li class="a"><a href="?p=katmading&id=2">Karya Tulis</a></li>
					</ul>
				</li>

			<li  class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" href="#">Informasi<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li class="a"><a href="?p=agenda">Agenda Sekolah</a></li>
					<li class="a"><a href="?p=kalendarAkademik">Kalendar Akademik</a></li>
				</ul>
			</li>
			<li  class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" href="#">Sekolah<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li class="a"><a href="?p=guru">Data Guru</a></li>
					<li class="a"><a href="?p=staff">Data Staff</a></li>
					<li class="a"><a href="?p=siswa">Data Siswa</a></li>
					<li class="a"><a href="?p=alumni">Data Alumni</a></li>
				</ul>
			</li>
			<li><a href="?p=galeri">Galeri</a></li>
			<li><a href="?p=bukutamu">Kirim Saran</a></li>
			<li><a href="?p=psb">PSB</a></li>
			<?php if (isset($_SESSION['orangtua']) OR isset($_SESSION['siswa']) OR isset($_SESSION['guru'])){ ?>
			<li class="login-key hidden-lg hidden-md"><a href="elearning/" >E-larning </a></li>
			<?php } else { ?> <li class="login-key  hidden-lg hidden-md"><a href="?p=login#popup">Login</a></li> <?php } ?>
     </ul>
     </div>
</div>

<div id="pengumuman">
<?php
	$info=mysql_query("SELECT * FROM `sh_info_sekolah` WHERE id_info='15' ");
	$datainfo=mysql_fetch_array($info);
?>
<div class="panel panel-primary">
	<div class="panel-heading"><?php echo $datainfo['nama_info']?></div>
	<div class="panel-body"><?php echo $datainfo['isi_info']?></div>
</div>

<div class="alert alert-success">
	<h3>Pengumuman</h3>
	
		<?php
			$pengumuman="SELECT * FROM sh_pengumuman WHERE ditujukan='all' ORDER BY tanggal_pengumuman DESC LIMIT 2";
			$qpengumuman=mysql_query($pengumuman);
			$no=1;
			while($data_pengumuman=mysql_fetch_array($qpengumuman)){
				$dtg=$data_pengumuman['tanggal_pengumuman'];
				$dtgl=date("d-m-Y",strtotime($dtg));
				echo"<ul><li><strong>$data_pengumuman[judul_pengumuman]</strong><br/><small>$dtgl</small><br/><i>$data_pengumuman[isi_pengumuman]</i></li></ul><hr/>";
			}
		?>
</div>
<div class="alert alert-success">
	<h3>Agenda Sekolah</h3>
		<?php
			$pengumuma="SELECT * FROM sh_agenda ORDER BY tanggal_agenda DESC LIMIT 2";
			$qpengumuma=mysql_query($pengumuma);
			$no=1;
			while($data_pengumuma=mysql_fetch_array($qpengumuma)){
				$tggl=$data_pengumuma['tanggal_agenda'];
				$tgl=date("d-m-Y",strtotime($tggl));
				echo"<ul><li><strong>$data_pengumuma[judul_agenda]</strong><br/><small>$tgl</small><br/><i>$data_pengumuma[isi_agenda]</i></li></ul><hr/>";
			}
		?>
</div>
</div>