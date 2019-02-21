<table class="garis">
				<tr><th class="garis" style="text-align: center;">Materi Terpopuler</th></tr>
				<?php
				$materiterpopuler=mysql_query("SELECT * FROM sh_materi, sh_mapel, sh_guru_staff WHERE sh_materi.id_mapel=sh_mapel.id_mapel AND sh_materi.nip=sh_guru_staff.nip ORDER BY download DESC LIMIT 5");
				$hitungmtp=mysql_num_rows($materiterpopuler);
				
				if ($hitungmtp > '0'){
				while ($mtp=mysql_fetch_array($materiterpopuler)){
				?>
				<tr><td class="garis"><a href="<?php echo "?p=download&id=$mtp[id_materi]";?>"><?php echo $mtp[judul_materi]?></a><br>
				Mata Pelajaran : <b><a href="<?php echo "?p=mmapel&id=$mtp[id_mapel]";?>"><?php echo $mtp[nama_mapel]?></a></b><br>
				Guru Pengampu : <b><a href="<?php echo "?p=pguru&nip=$mtp[nip]";?>"><?php echo $mtp[nama_gurustaff]?></a></b><br>
				Didownload <b><?php echo $mtp[download]?></b> kali</td></tr>
				<?php }}
				else {?>
				<tr><td class="garis"><a href=""><b>Belum ada materi yang diupload</b></td></tr>
				<?php } ?>
			</table>