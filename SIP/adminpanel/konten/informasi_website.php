		<div class="judulbox">Informasi Website</div>
		<table class="isian" style="margin:10px; font-weight: bold;";>
		<?php
			//Menghitung jumlah data berita di database//
			$berita=mysql_query("SELECT * FROM sh_berita");
			$jmlberita=mysql_num_rows($berita);
		
			//Menghitung jumlah data komentar di database//
			$komentar=mysql_query("SELECT * FROM sh_komentar");
			$jmlkomentar=mysql_num_rows($komentar);
			
			//Menghitung jumlah data kategori di database//
			$kategori=mysql_query("SELECT * FROM sh_kategori");
			$jmlkategori=mysql_num_rows($kategori);
			
			//Menghitung jumlah data buku tamu di database//
			$bukutamu=mysql_query("SELECT * FROM sh_buku_tamu");
			$jmltamu=mysql_num_rows($bukutamu);
			
			//Menghitung jumlah data agenda di database//
			$agenda=mysql_query("SELECT * FROM sh_agenda");
			$jmlagenda=mysql_num_rows($agenda);
			
			//Menghitung jumlah file materi di database//
			$materi=mysql_query("SELECT * FROM sh_materi");
			$jmlfile=mysql_num_rows($materi);
			
			//Menghitung jumlah data pengumuman di database//
			$pengumuman=mysql_query("SELECT * FROM sh_pengumuman");
			$jmlpengumuman=mysql_num_rows($pengumuman);
			
			//Menghitung jumlah data pendaftar PSB di database//
			$psb=mysql_query("SELECT * FROM sh_psb");
			$jmlpsb=mysql_num_rows($psb);
			
			//Menghitung jumlah data kelas di database//
			$kelas=mysql_query("SELECT * FROM sh_kelas");
			$jmlkelas=mysql_num_rows($kelas);
			
			//Menghitung jumlah data siswa di database//
			$siswa=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='1'");
			$jmlsiswa=mysql_num_rows($siswa);
			
			//Menghitung jumlah data alumni di database//
			$alumni=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='0'");
			$jmlalumni=mysql_num_rows($alumni);
			
			//Menghitung jumlah data guru di database//
			$guru=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='guru'");
			$jmlguru=mysql_num_rows($guru);
			
			//Menghitung jumlah file foto di database//
			$foto=mysql_query("SELECT * FROM sh_galeri");
			$jmlfoto=mysql_num_rows($foto);
			
			//Menghitung jumlah data staff di database//
			$staff=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='staff'");
			$jmlstaff=mysql_num_rows($staff);
			
			//Menghitung jumlah data administrator di database//
			$users=mysql_query("SELECT * FROM sh_users");
			$jmlusers=mysql_num_rows($users);
			
			
			  $ip      = $_SERVER['REMOTE_ADDR'];
              $tanggal = date("Ymd");
              $waktu   = time();
			
			//Menghitung jumlah pengunjung online di database//
			  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM sh_statistik WHERE tanggal='$tanggal' GROUP BY ip_addres"));
			
			//Menghitung jumlah total pengunjung di database//
              $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(mengunjungi) FROM sh_statistik"), 0);  
			
			//Menghitung jumlah pengunjung hari ini di database//
              $bataswaktu       = time() - 300;
              $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM sh_statistik WHERE online > '$bataswaktu'"));
		?>
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmlberita"; ?></td><td class="isian"><a href="berita.php">Berita</td>
			<td class="isiankanan" style="width: 10px;"><?php echo "$jmlkomentar"; ?></td><td class="isian" ><a href="komentar.php" style="color: #ff6600;">Komentar</a></td></tr>
			
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmlkategori"; ?></td><td class="isian"><a href="kategori.php">Kategori</a></td>
			<td class="isiankanan" style="width: 10px;"><?php echo "$jmltamu"; ?></td><td class="isian"><a href="buku_tamu.php" style="color: #ff6600;">Buku Tamu</a></td></tr>
			
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmlagenda"; ?></td><td class="isian"><a href="agenda.php">Agenda</a></td>
			<td class="isiankanan" style="width: 10px;"><?php echo "$jmlfile"; ?></td><td class="isian"><a href="materi.php" style="color: #ff6600;">File Materi</a></td></tr>
			
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmlpengumuman"; ?></td><td class="isian"><a href="pengumuman.php">Pengumuman</a></td>
			<td class="isiankanan" style="width: 10px;"><?php echo "$jmlpsb"; ?></td><td class="isian"><a href="psb_online.php" style="color: #ff6600;">Pendaftar</a></td></tr>
			
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmlkelas"; ?></td><td class="isian"><a href="kelas.php">Kelas</a></td>
			<td class="isiankanan" style="width: 10px;"><?php echo "$totalpengunjung"; ?></td><td class="isian"><a href="statistik.php" style="color: #ff6600;">Total Pengunjung</a></td></tr>
			
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmlsiswa"; ?></td><td class="isian"><a href="siswa.php">Siswa</a></td>
			<td class="isiankanan" style="width: 10px;"><?php echo "$pengunjung"; ?></td><td class="isian"><a href="statistik.php" style="color: #ff6600;">Pengunjung Hari ini</a></td></tr>
			
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmlalumni"; ?></td><td class="isian"><a href="alumni.php">Alumni</a></td>
			<td class="isiankanan" style="width: 10px;"><?php echo "$pengunjungonline"; ?></td><td class="isian"><a href="statistik.php" style="color: #ff6600;">Online</a></td></tr>
			
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmlguru"; ?></td><td class="isian"><a href="guru_staff.php">Guru</a></td>
			<td class="isiankanan" style="width: 10px;"><?php echo "$jmlfoto"; ?></td><td class="isian"><a href="galeri_foto.php" style="color: #ff6600;">Foto</a></td></tr>
			
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmlstaff"; ?></td><td class="isian"><a href="staff.php">Staff</a></td>
			<td class="isiankanan" style="width: 10px;"><?php echo "$jmlusers"; ?></td><td class="isian"><a href="admin.php" style="color: #ff6600;">Administrator</a></td></tr>
		</table>