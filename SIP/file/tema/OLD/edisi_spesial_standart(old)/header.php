<div id="header">
			<div class="logo">
				<?php
				$logo=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='13'");
				$l=mysql_fetch_array($logo);
				// echo "<img src='images/$l[isi_pengaturan]' width='130px' alt='Logo sekolah'>";
				?>
			</div>
			
			<div class="sekolah">
				<?php
				/*
				$alamatsekolah=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='12'");
				$a=mysql_fetch_array($alamatsekolah);
				
				$telp=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='9'");
				$te=mysql_fetch_array($telp);
				*/
				?>
				<h3><a href="index.php" title="Kembali ke halaman utama"><?php // echo "$ns[isi_pengaturan]"; ?></a></h3><br>
				<p><?php // echo "$a[isi_pengaturan]<br>Telp: $te[isi_pengaturan]"; ?></p>
			</div>
			
			<div class="cariform">
			<form method="POST" action="?p=pencarian">
			<input type="text" class="cari" name="cari"><input type="submit" class="tombol" value="Cari">
			</form>
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
</div>