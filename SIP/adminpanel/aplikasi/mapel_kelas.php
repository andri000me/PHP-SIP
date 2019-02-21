<h3>Mata Pelajaran</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="mata_pelajaran.php">Mata Pelajaran</a></div>
			<div class="menuhorisontal"><a href="materi.php">Materi Pelajaran</a></div>
		</div>

		
		<div class="atastabel" style="margin-bottom: 10px">
		  <div class="tombol">
			<form method="POST" style="float: left" action="mata_pelajaran.php?pilih=kelas">
				<select name="tingkat" onChange="this.form.submit()">
					<option value="" selected>Filter Berdasarkan Tingkat</option>
					<?php
					$kls=mysql_query("SELECT DISTINCT tingkat FROM sh_kelas");
					while($kl=mysql_fetch_array($kls)){
					?>
					<option value="<?php echo "$kl[tingkat]";?>"><?php echo "$kl[tingkat]";?></option>
					<?php } ?>
				</select>
			  </form>
			</div>
			<div class="cari">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?pilih=tambah';">
			</div>
		</div>
		
		<table class="tabel">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel">Tingkat</th>
				<th class="tabel">Mata Pelajaran</th>
				<th class="tabel">KKM</th>
				<th class="tabel">Guru Pengajar</th>
				<th class="tabel">Jml Materi Upload</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$mapel=mysql_query("SELECT * FROM sh_mapel WHERE tingkat = '$_POST[tingkat]' ORDER BY id_mapel ASC");
				while ($m=mysql_fetch_array($mapel)){
				?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel">
				<?php $kelas=mysql_query("SELECT DISTINCT tingkat FROM sh_kelas where tingkat = '$m[tingkat]'");
						while ($k=mysql_fetch_array($kelas)){
						echo "<b>$k[tingkat]</b>"; }
				?>
				</td>
				<td class="tabel"><a href="<?php echo "?pilih=edit&id=$m[id_mapel]";?>"><?php echo "$m[nama_mapel]";?></a></td>
				<td class="tabel"><a href="<?php echo "?pilih=edit&id=$m[id_mapel]";?>"><?php echo "$m[KKM]";?></a></td>
				<td class="tabel">
				<?php $pengajar=mysql_query("SELECT * FROM sh_guru_staff , sh_mapel_guru WHERE sh_guru_staff.id_gurustaff = sh_mapel_guru.id_gurustaff AND id_mapel='$m[id_mapel]'");
						while ($p=mysql_fetch_array($pengajar)){
						echo "<a href='guru_staff.php?pilih=edit&id=$p[id_gurustaff]'><b>$p[nama_gurustaff]</b>,</a><br> "; }
				?>
				</td>
				<?php $materi=mysql_query("SELECT * FROM sh_materi WHERE id_mapel='$m[id_mapel]'");
						$jmlmateri=mysql_num_rows($materi); ?>
				<td class="tabel"><?php echo "<a href=''>$jmlmateri</a>"; ?></td>
				<td class="tabel">
				<?php
				if ($m[id_mapel]== 1) {
				?>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$m[id_mapel]";?>">edit</a></div>
				<?php }
				else {
				?>
					<div class="hapusdata"><a href="<?php echo "$database?pilih=mapel&untukdi=hapus&id=$m[id_mapel]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$m[id_mapel]";?>">edit</a></div>
				<?php } ?>	
				</td>
			</tr>
			<?php
			$no++;
			}
			?>
			
		</table>
		
</div><!--Akhir class isi kanan-->