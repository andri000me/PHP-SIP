<!-- <label for="show-menu" class="show-menu">MENU <span id="burger">&#9776;</span></label>
<input type="checkbox" id="show-menu" role="button"></input> -->
		<ul id="GERALD">
			<li class="home"><a href="index.php">Home</a></li>
			<li class="profil"><a href="#">Profil Sekolah</a>
				<ul class="hidden">
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
			<li class="pages"><a href="?p=berita">Artikel Sekolah</a></li>
			
				<li class="mading"><a href="#">Mading Siswa</a>
					<ul class="hidden">
						<li><a href="?p=madingKaryaTulis">Karya Tulis</a></li>
						<li><a href="?p=madingKaryaSeni">Karya Seni</a></li>
					</ul>
				</li>

			<li class="informasi"><a href="#">Informasi</a>
				<ul class="hidden">
					<li><a href="?p=agenda">Agenda Sekolah</a></li>
					<li><a href="?p=pengumuman">Pengumuman Sekolah</a></li>
					<li><a href="pemendikbud.pdf" target="_blank">Perundang - undangan tentang sekolah</a></li>
				</ul>
			</li>
			<li class="school"><a href="#">Sekolah</a>
				<ul class="hidden">
					<li><a href="?p=guru">Data Guru</a></li>
					<li><a href="?p=staff">Data Staff</a></li>
					<li><a href="?p=siswa">Data Siswa</a></li>
					<li><a href="?p=alumni">Data Alumni</a></li>
				</ul>
			</li>
			<li class="galeri"><a href="?p=galeri">Galeri</a></li>
			<li class="saran"><a href="?p=bukutamu">Kirim Saran</a></li>
			<li class="absen"><a href="?p=psb">PSB</a></li>


			<div id="button">
				<?php if (isset($_SESSION['orangtua']) OR isset($_SESSION['siswa']) OR isset($_SESSION['guru'])){ ?>
					<li class="login-key"><a href="elearningku/logout.php">Logout </a></li>
					<?php } else { ?> <li class="login-key"><a href="?p=login#popup">Login</a></li> <?php } ?>
			</div>




			<li class="masuk-elearning">
				<a href="../websch/elearningku?p=index.php" title="Masuk ke menu Elearning">

		<!-- 	<a href='http://192.168.19.19/fandi/websch2/elearningku/?p=index.' style='display:scroll;position:fixed;top:0px;right:0px;' title='Keterangan Gambar'><img src='img/menufloat.png'/></a> -->
					<?php
						if ($_SESSION[siswa]){
						echo "<img style='display:scroll;position:fixed;top:190px;right:0px;' src='header.png' width='170px' height='50px'>";
						}
						elseif ($_SESSION[guru]){
						echo "<img style='display:scroll;position:fixed;top:190px;right:0px;' src='header.png' width='170px' height='50px'>";
						}
						elseif ($_SESSION[orangtua]){
						echo "<img style='display:scroll;position:fixed;top:190px;right:0px;' src='header.png' width='170px' height='50px'>";
						}
					?>
				</a>
			</li>
			
		

			<!-- POPUP LOGIN-->
			
			<div id="popup">
				<div class="window">
					<a href="#" class="close-button" title="close">X</a>

					<?php
						if (isset($_SESSION['siswa']) OR isset($_SESSION['guru'])){
					?>
					<table>
					<?php if ($_SESSION['siswa']) { 
						$data_siswa_login=mysql_query("SELECT * FROM sh_siswa WHERE nis='$_SESSION[siswa]'");
						$datasl=mysql_fetch_array($data_siswa_login);
					?>
					<tr class="form"><td><a href="elearningku/logout.php" onClick="return confirm ('Apakah anda benar-benar akan keluar dari sistem?')" title='Log out'>Logoutsssssssssss</a></td></tr>

					<?php }
					else { 
					$data_guru_login=mysql_query("SELECT * FROM sh_guru_staff WHERE nip='$_SESSION[guru]'");
					$dgl=mysql_fetch_array($data_guru_login);
					?>
					<tr class="form"><td rowspan="4"><img src="images/foto/guru/<?php echo $dgl[foto]?>" width="60px" style="padding: 3px; border: 1px solid #dcdcdc;"></td></tr>
					<tr class="form"><td><a href="elearningku/index.php?p=profil" title="Profil"><b><?php echo $dgl[nama_gurustaff]?></b></a></td></tr>
					<tr class="form"><td><b><?php echo $dgl[nip]?></b></td></tr>
					<tr class="form"><td><a href="elearningku/logout.php" onClick="return confirm ('Apakah anda benar-benar akan keluar dari sistem?')" title='Log out'>Logoutdsdadasdad</a></td></tr>

					<?php } ?>
					</table>
					<?php }
					else { ?>
					<br/><br/>
					<img src="images/logo_trimitra.png"/>
					<table  id="table-popup">
						<form class="form-popup" method="POST" action="elearningku/validasi.php" name="login" id="login">
						<tr class="form1"><td><b>Username</b></td><td><input type="text" class="panjang" style="width: 90%" name="username" title="Masukkan NIP atau NIS anda" placeholder="Username"></td></tr>
						<tr class="form1"><td><b>Password</b></td><td><input type="password" placeholder="Password" class="panjang" style="width: 90%" name="password" title="Masukkan password anda"></td></tr>
						<tr class="form1"><td><b>Status</b></td><td>
												<select name="status" style="width: 90%">
													<option value=""selected>Pilih status...</option>
													<option value="guru">Guru</option>
													<option value="siswa">Siswa</option>
													<option value="ortu">Orang Tua</option>
												</select>
						</td></tr>
						<tr class="form1"><td></td><td><input type="submit" class="tombol"value="Login"></td></tr>
						</form>
							<script language="JavaScript" type="text/javascript" xml:space="preserve">
								//<![CDATA[
								var frmvalidator  = new Validator("login");
								
								frmvalidator.addValidation("username","req","Anda belum memasukkan Username");
								frmvalidator.addValidation("password","req","Anda belum memasukkan Password");
								frmvalidator.addValidation("status","req","Anda belum memilih status");
								//]]>
							</script>
					</table>
					<?php } ?>
				</div>
			</div>
			<!-- POPUP -->
				<div class="cariform">
					<form method="POST" action="?p=pencarian">
						<input type="text" id="pencarian-cari" name="cari" size="150" placeholder="Search">
					</form>
				</div>
		</ul>

