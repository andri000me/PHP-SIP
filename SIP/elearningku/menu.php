<div id='prof'>
<ul class="nav nav-pills nav-stacked">
	  <?php	
			
			if ($_SESSION[siswa]){
				$profilsaya=mysql_query("SELECT * FROM sh_siswa, sh_kelas WHERE sh_siswa.id_kelas=sh_kelas.id_kelas AND nis='$_SESSION[siswa]'");
				$ps=mysql_fetch_array($profilsaya);?>
				<img src="<?php $path = $ps[foto]; $ambilpath = substr($path,27); echo "..".$ambilpath; ?>" class="img-rounded img-responsive" width='40%'/>
				<?php echo"<a href='?p=profil'' title='Klik untuk sunting profil anda'>Profil $_SESSION[namasiswa]</a></li>";
			}
			elseif ($_SESSION[guru]){
				$profilsaya=mysql_query("SELECT * FROM sh_guru_staff WHERE nip='$_SESSION[guru]'");
				$ps=mysql_fetch_array($profilsaya);
				if($ps['jenkel']=="L"){
				echo "<li><img src='../images/foto/guru/$ps[foto]' width='40%' class='img-rounded img-responsive'/><a href='?p=profil'' title='Klik untuk sunting profil anda'> Profil Bapak. $_SESSION[namaguru]</a></li>";
				}else{
				echo "<li><img src='../images/foto/guru/$ps[foto]' width='40%' class='img-rounded img-responsive'/><a href='?p=profil'' title='Klik untuk sunting profil anda'> Profil Ibu. $_SESSION[namaguru]</a></li>";
				}
			}
			elseif ($_SESSION[orangtua]){
				$profilsaya=mysql_query("SELECT * FROM sh_ortu WHERE id_ortu='$_SESSION[orangtua]'");
				$ps=mysql_fetch_array($profilsaya);
				if($ps['jk']=="0"){
				echo "<li><img src='../images/foto/ortu/$ps[foto_ortu]' width='40%' class='img-rounded img-responsive'/><a href='?p=profil'' title='Klik untuk sunting profil anda'> Profil Bapak. $_SESSION[namaortu]</a></li>";
				}elseif($ps['jk']=="1"){
				echo "<li><img src='../images/foto/ortu/$ps[foto_ortu]' width='40%' class='img-rounded img-responsive'/><a href='?p=profil'' title='Klik untuk sunting profil anda'> Profil Ibu. $_SESSION[namaortu]</a></li>";
				}else{
					echo "<li><img src='../images/foto/ortu/$ps[foto_ortu]' width='40%' class='img-rounded img-responsive'/><a href='?p=profil'' title='Klik untuk sunting profil anda'> Profil Wali. $_SESSION[namaortu]</a></li>";
				}
			}
		?>
</ul>
</div>
<div class="collapse navbar-collapse" id="myNavbar">
	  
      <ul class="nav nav-pills nav-stacked">
		
        <li class="active"><a href="?p=home" title="Halaman Utama"><img width="30" class="img-responsive" src="css/img/home.png" style="float: left;"/>&nbsp;&nbsp;Home</a></li>
        
		<!-- Ujian Online Session Guru & Siswa -->
		<?php
		//if ($_SESSION['guru'] OR $_SESSION['siswa']){
		?>
		<!--<li class="active"><a href="ujianonline/" target="_blank"><img width="30" class="img-responsive" src="css/img/uol.png" style="float: left;"/>&nbsp;&nbsp;Ujian Online</a></li>-->
		<?php //} ?>
		
        <!-- Upload Materi Session Guru-->
		<?php
		if ($_SESSION['guru']){
		?>
		<li class="active"><a href="?p=upload"><img width="30" class="img-responsive" src="css/img/upload.png" style="float: left;"/>&nbsp;&nbsp;Share Materi</a></li>
		<?php } ?>
		
		<!-- Mata Pelajaran Session Guru OR Siswa-->
		<?php
		if ($_SESSION['guru'] OR $_SESSION['siswa']){
		?>
		<li class="active"><a href="?p=mapel"><img width="30" class="img-responsive" src="css/img/mapel.png" style="float: left;"/>&nbsp;&nbsp;Materi Pelajaran</a></li>
		<?php } ?>
	
		<!-- Jadwal Mengajar Session Guru -->
		<?php if($_SESSION['guru']) { ?>
		<li class="active"><a href="?p=jadwal_guru"><img width="30" class="img-responsive" src="css/img/jadwal.png" style="float: left;"/>&nbsp;&nbsp;Jadwal Mengajar</a></li>
		<?php } ?>
		
		<!-- Absensi Siswa Session Guru -->
		<?php if ($_SESSION['guru']){ ?>
		<li class="active"><a href="?p=absenguru"><img width="30" class="img-responsive" src="css/img/finger.png" style="float: left;"/>&nbsp;&nbsp;Absensi Siswa</a></li>
		<?php } ?>

		<!-- Nilai Session Guru -->
		<?php if ($_SESSION['guru']){ ?>
		<li class="active"><a href="?p=nilai"><img width="30" class="img-responsive" src="css/img/nilai.png" style="float: left;"/>&nbsp;&nbsp;Nilai </a></li>
		<?php } ?>
		
		<!-- Jadwal Pelajaran Session Siswa OR  Orangtua -->
		<?php if ($_SESSION['siswa'] or $_SESSION['orangtua']){ ?>
		<li class="active"><a href="?p=jadwal"><img width="30" class="img-responsive" src="css/img/jadwal.png" style="float: left;"/>&nbsp;&nbsp;Jadwal Pelajaran</a></li>
		<?php } ?>		
		
		<!-- Absensi Siswa Session Orangtua -->
		<?php if ($_SESSION['orangtua']){ ?>
		<li class="active"><a href="?p=absenortu"><img width="30" class="img-responsive" src="css/img/finger.png" style="float: left;"/>&nbsp;&nbsp;Absensi Siswa </a></li>
		<?php } ?>

		<!-- Nilai Siswa Session Siswa OR Orangtua -->		
		<?php if ($_SESSION['siswa'] or $_SESSION['orangtua']){ ?>
		<li class="active"><a href="?p=nilaisiswa"><img width="30" class="img-responsive" src="css/img/nilai2.png" style="float: left;"/>&nbsp; &nbsp;Nilai </a></li>
		<?php } ?>
		
		<!-- Mading Siswa Session siswa -->
		<?php if ($_SESSION['siswa']){ ?>
		<li class="active"><a href="?p=mading"><img width="30" class="img-responsive" src="css/img/paper.png" style="float: left;"/>&nbsp;&nbsp;Mading </a></li>
		<?php } ?>
		
		<!-- SPP Siswa Session Orangtua-->
		<?php if ($_SESSION['orangtua']){ ?>
		<li class="active"><a href="?p=sppindex"><img width="30" class="img-responsive" src="css/img/spp.png" style="float: left;"/>&nbsp;&nbsp;SPP</a></li>
		<?php } ?>
	
		<!-- Daftar Guru ALL Session -->
		<li class="active"><a href="?p=guru"><img width="30" class="img-responsive" src="css/img/guru.png" style="float: left;"/>&nbsp;&nbsp;Daftar Guru</a></li>
		
		<!-- CCTV session Orangtua -->
		<?php if ($_SESSION['orangtua']){ ?>
		<li class="active"><a href="?p=cctvortu"><img width="30" class="img-responsive" src="css/img/cctv.png" style="float: left;"/>&nbsp;&nbsp;CCTV</a></li>
		<?php 
        $sInbox=mysql_query("SELECT sh_pesan.*, sh_guru_staff.* FROM sh_pesan JOIN sh_guru_staff ON sh_pesan.pengirim=sh_guru_staff.nip WHERE penerima='$_SESSION[orangtua]' AND status_pesan ='0' ORDER BY id_pesan DESC LIMIT 10")or die("ERROR".mysql_error());
        $rInbox=mysql_num_rows($sInbox);
        ?>
        <li class="active"><a href="?p=inbox"><img width="30" class="img-responsive" src="css/img/pesan.png" style="float: left;"/>
			&nbsp;&nbsp;Pesan<?php if($rInbox>0){echo "<span class='badge' style='background:red; color:#fff;'>$rInbox</span>";}else{}?></a></li>
        <?php } ?>	

		<!-- CCTV session Guru -->
		<?php if ($_SESSION['guru']){ ?>
		<li class="active"><a href="?p=cctvguru"><img width="30" class="img-responsive" src="css/img/cctv.png" style="float: left;"/>&nbsp;&nbsp;CCTV</a></li>
        <?php 
        $sInbox=mysql_query("SELECT sh_pesan.*, sh_ortu.* FROM sh_pesan JOIN sh_ortu ON sh_pesan.pengirim=sh_ortu.id_ortu WHERE penerima='$_SESSION[guru]' AND status_pesan ='0'")or die("ERROR".mysql_error());
        $rInbox=mysql_num_rows($sInbox);
        ?>
		<li class="active">
			<a href="?p=inbox"><img width="30" class="img-responsive" src="css/img/pesan.png" style="float: left;"/>
			&nbsp;&nbsp;Pesan<?php if($rInbox>0){echo "<span class='badge' style='background:red; color:#fff;'>$rInbox</span>";}else{}?></a></li>
		<?php } ?>				
        
        <li class='active'><a href="logout.php" onClick="return confirm('Anda Ingin Keluar ?')"><img width="30" class="img-responsive" src="css/img/logout.png" style="float: left;"/>&nbsp;&nbsp;Logout</a></li>
		
	  </ul>
</div>

   <a href="../index.php"><img style='display:scroll;position:fixed;top:190px;right:0px; z-index:999;' src='../header1.png' width='50px' height='50px'></a>