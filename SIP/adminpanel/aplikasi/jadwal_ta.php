<h3>Jadwal Pelajaran</h3>
<div class="isikanan"><!--Awal class isi kanan-->
							
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="jadwal_pelajaran.php">Jadwal Pelajaran</a></div>
		</div>
		<div class="atastabel" style="margin-bottom: 10px">
		<!-- Kelas -->
			<div class="tombol">
			<form method="POST" style="float: left" action="jadwal_pelajaran.php?pilih=kelas">
				<select name="kelas" onChange="this.form.submit()">
					<option value="" selected>Tampil Berdasarkan Kelas</option>
					<?php
					$tampilkelas=mysql_query("SELECT * FROM sh_kelas where tingkat <> '' ");
					while($tk=mysql_fetch_array($tampilkelas)){
					echo "<option value='$tk[id_kelas]'>$tk[nama_kelas]</option>";}
					?>
				</select>
			</form>
			</div>
			
		<!-- Tahun Ajaran -->
			<div class="tombol">
			<form method="POST" style="float: left" action="jadwal_pelajaran.php?pilih=ta">
				<select name="tahun" onChange="this.form.submit()">
					<option value="" selected>Tampil Berdasarkan Tahun Ajaran</option>
					<?php
					$tampilta=mysql_query("SELECT * FROM sh_tahun_ajaran");
					while($ta=mysql_fetch_array($tampilta)){
					echo "<option value='$ta[id_tahun_ajaran]'>$ta[tahun_ajaran]";
					if($ta['semester']==0) {
					$sms = "Genap";
					} Else {
					$sms = "Ganjil";
					}
					echo " - $sms</option>";
					}
					?>
				</select>
			</form>
			</div>	
			
			<div class="cari">
			<input type="button" class="pencet" value="Tambahkan Jadwal" onclick="window.location.href='?pilih=tambah';">
			</div>
		</div>
		<div class="clear"></div>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel">Tahun Ajaran</th>
				<th class="tabel">Kelas</th>
				<th class="tabel">Ruang Kelas</th>
				<th class="tabel">Hari</th>
				<th class="tabel">Mata Pelajaran</th>
				<th class="tabel">Waktu Belajar</th>
				<th class="tabel">Guru Pengajar</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				// Menampilkan data dari tabel sh_jadwal
				$jadwal=mysql_query("SELECT sh_tahun_ajaran.semester , sh_tahun_ajaran.tahun_ajaran , sh_jadwal.id_tahun_ajaran , sh_jadwal.id_gurustaff as idguru , sh_jadwal.id_jadwal as idjadwal , sh_jadwal.id_mapel as idmapel , sh_mapel.nama_mapel as namamapel , sh_jadwal.jadwal_hari as hari ,sh_jadwal.jadwal_waktu as waktu , sh_kelas.nama_kelas as kelas , sh_kelas.ruang_kelas as ruang , sh_jadwal.id_kelas FROM sh_jadwal , sh_tahun_ajaran, sh_mapel , sh_kelas WHERE sh_jadwal.id_mapel = sh_mapel.id_mapel AND sh_jadwal.id_kelas = sh_kelas.id_kelas AND sh_tahun_ajaran.id_tahun_ajaran = sh_jadwal.id_tahun_ajaran AND sh_tahun_ajaran.id_tahun_ajaran='$_POST[tahun]' ORDER BY FIELD( jadwal_hari,  'Senin',  'Selasa',  'Rabu',  'Kamis',  'Jumat',  'Sabtu',  'Minggu' ) ");
				$cek_jadwal=mysql_num_rows($jadwal);
				if($cek_jadwal > 0){
				while ($m=mysql_fetch_array($jadwal)){
				?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel">
				<?php echo "$m[tahun_ajaran]";
					if($m['semester']==0){
					$sms = "Genap";
					} Else {
					$sms = "Ganjil";
					}
					echo " - $sms";
					?></a></td>
				<td class="tabel"><a href=""><?php echo "$m[kelas]";?></a></td>
				<td class="tabel"><?php echo "$m[ruang]";?></td>
				<td class="tabel"><?php echo "$m[hari]";?></td>
				<td class="tabel"><a href="<?php echo "?pilih=edit&id=$m[idmapel]";?>"><?php echo "$m[namamapel]";?></a></td>
				<td class="tabel"><?php echo "$m[waktu]";?></td>
				<td class="tabel">
				<?php $pengajar=mysql_query("SELECT sh_guru_staff.nama_gurustaff as nama , sh_guru_staff.id_gurustaff as idjadwal FROM sh_guru_staff WHERE sh_guru_staff.id_gurustaff  = $m[idguru] ");
						while ($p=mysql_fetch_array($pengajar)){
						echo "<a href='guru_staff.php?pilih=edit&id=$p[idjadwal]'><b>$p[nama]</b></a><br> "; }
				?>
				</td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?pilih=jadwal&untukdi=hapus&id=$m[idjadwal];"?> " onclick="return confirm('Apakah Anda Yakin Menghapus Jadwal Ini ?')" > Hapus  </a> </div>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$m[idjadwal]";?>">Edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
				} 
			}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="7"><b>DATA JADWAL PELAJARAN BELUM TERSEDIA</b></td></tr>
			<?php } ?>
		</table>
		
		<div class="atastabel" style="margin: 5px 10px 0 10px">
		<div id="pageNavPosition"></div>
		</div>
		
		<div class="atastabel" style="margin: 5px 10px 0 10px">
		<?php
			$jumlahtampil=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='3'");
			$jt=mysql_fetch_array($jumlahtampil);
		?>
			    <script type="text/javascript"><!--
				var pager = new Pager('results', <?php echo "$jt[isi_pengaturan]"; ?>); 
				pager.init(); 
				pager.showPageNav('pager', 'pageNavPosition'); 
				pager.showPage(1);
			//--></script>
		</div>	
		
</div><!--Akhir class isi kanan-->