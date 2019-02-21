<div id="header">
			<div class="logo">
				<?php
				$logo=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='13'");
				$l=mysql_fetch_array($logo);
				
				echo "<img src='images/$l[isi_pengaturan]' width='130px' alt='Logo sekolah'>";
				?>
			</div>
			
			<div class="sekolah">
				<?php
				$alamatsekolah=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='12'");
				$a=mysql_fetch_array($alamatsekolah);
				
				$telp=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='9'");
				$te=mysql_fetch_array($telp);
				?>
				<h3><a href="index.php" title="Kembali ke halaman utama"><?php echo "$ns[isi_pengaturan]";?></a></h3><br>
				<p><?php echo "$a[isi_pengaturan]<br>Telp: $te[isi_pengaturan]";?></p>
			</div>
			
			<div class="cariform">
			<form method="POST" action="?p=pencarian">
			<input type="text" class="cari" name="cari"><input type="submit" class="tombol" value="Cari">
			</form>
			</div>
		</div>