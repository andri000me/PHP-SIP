<table class="garis">
				<tr><th class="garis" style="text-align: center;">Materi Terbaru</th></tr>
				<?php
				$materiterbaru=mysql_query("SELECT * FROM sh_materi, sh_mapel, sh_guru_staff WHERE sh_materi.id_mapel=sh_mapel.id_mapel AND sh_materi.nip=sh_guru_staff.nip ORDER BY id_materi DESC LIMIT 5");
				$hitungmt=mysql_num_rows($materiterbaru);
				
				if ($hitungmt > '0'){
				while ($mt=mysql_fetch_array($materiterbaru)){
				?>
				<tr><td class="garis"><a href="<?php echo "?p=download&id=$mt[id_materi]";?>"><?php echo $mt[judul_materi]?></a><br>
				Mata Pelajaran : <b><a href="<?php echo "?p=mmapel&id=$mt[id_mapel]";?>"><?php echo $mt[nama_mapel]?></a></b><br>
				Guru Pengampu : <b><a href="<?php echo "?p=pguru&nip=$mt[nip]";?>"><?php echo $mt[nama_gurustaff]?></a></b><br>
				Didownload <b><?php echo $mt[download]?></b> kali</td></tr>
				<?php }}
				else {?>
				<tr><td class="garis"><a href=""><b>Belum ada materi yang diupload</b></td></tr>
				<?php } ?>
</table>