        <div class="pengumuman" id="kiri"><!-- Awal menampilkan pengumuman paling baru-->

				<?php
				$pengumuman=mysql_query("SELECT * FROM sh_pengumuman WHERE ditujukan='all' ORDER BY id_pengumuman DESC");
				$cek_pengumuman=mysql_num_rows($pengumuman);
				
				if($cek_pengumuman > 0){
				$peng=mysql_fetch_array($pengumuman);
				echo "<div class='panel panel-default'>
                     <div class='panel-heading' style='background:#d9534f;'><img width=30 class=img-responsive src='css/img/horn.png' style='float: left;'/>&nbsp;&nbsp;PENGUMUMAN</div>
                     <div class=panel-body>
                     <p>$peng[judul_pengumuman]</p>
                     <p>$peng[isi_pengumuman]</p>
				     <p><b>Diterbitkan pada: $peng[tanggal_pengumuman]</b></p>
	                 <p><b>Oleh: $peng[nama_lengkap_users]</b></p>
                     </div>
                     </div>";
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
				echo "<div class='panel panel-default'>
                     <div class='panel-heading' style='background:#d9534f;'><img width=30 class=img-responsive src='css/img/horn2.png' style='float: left;'/>&nbsp;&nbsp;PENGUMUMAN</div>
                     <div class=panel-body>
                     <p>$peng[judul_pengumuman]</p>
                     <p>$peng[isi_pengumuman]</p>
				     <p><b>Diterbitkan pada: $peng[tanggal_pengumuman]</b></p>
	                 <p><b>Oleh: $peng[nama_lengkap_users]</b></p>
                     </div>
                     </div>";
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
				echo "<div class='panel panel-default'>
                     <div class='panel-heading' style='background:#d9534f;'><img width=30 class=img-responsive src='css/img/horn2.png' style='float: left;'/>&nbsp;&nbsp;PENGUMUMAN</div>
                     <div class=panel-body>
                     <p>$peng[judul_pengumuman]</p>
                     <p>$peng[isi_pengumuman]</p>
				     <p><b>Diterbitkan pada: $peng[tanggal_pengumuman]</b></p>
	                 <p><b>Oleh: $peng[nama_lengkap_users]</b></p>
                     </div>
                     </div>";
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
				echo "<div class='panel panel-default'>
                     <div class='panel-heading' style='background:#d9534f;'><img width=30 class=img-responsive src='css/img/horn2.png' style='float: left;'/>&nbsp;&nbsp;PENGUMUMAN</div>
                     <div class=panel-body>
                     <p>$peng[judul_pengumuman]</p>
                     <p>$peng[isi_pengumuman]</p>
				     <p><b>Diterbitkan pada: $peng[tanggal_pengumuman]</b></p>
	                 <p><b>Oleh: $peng[nama_lengkap_users]</b></p>
                     </div>
                     </div>";
				}
				else {
				?>
				<h4>PENGUMUMAN</h4>
				<p><b>Belum ada pengumuman</b></p>
				<?php } ?>
		</div>	
		<?php } ?>