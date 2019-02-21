
<h3>Materi Pelajaran (E-learning)</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="mata_pelajaran.php">Mata Pelajaran</a></div>
			<div class="menuhorisontalaktif"><a href="materi.php">Materi Pelajaran</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php
			$datamateri=mysql_query("SELECT * FROM sh_materi");
			$jmlmateri=mysql_num_rows($datamateri);
			?>
			Jumlah data (<?php echo "$jmlmateri";?>)
			</div>
			<div class="cari">
			<form method="POST" action="?pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<form method="POST" style="float: left" action="materi.php?pilih=mapel">
				<select name="mapel"onChange="this.form.submit()">
					<option value="" selected>Mata pelajaran</option>
					<?php
					$mapel=mysql_query("SELECT * FROM sh_mapel");
					while($mpl=mysql_fetch_array($mapel)){
					?>
					<option value="<?php echo "$mpl[id_mapel]";?>"><?php echo "$mpl[nama_mapel]";?></option>
					<?php } ?>
				</select>
			</form>
			</div>
			
			<?php echo"<form method='POST' action='$database?pilih=materi&untukdi=hapusbanyak'>";?>
			<div class="cari">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?pilih=tambah';">
			<input type="submit" class="hapus" value="Hapus yang ditandai">
			</div>
		</div>
		<div class="clear"></div>
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel">Judul Materi</th>
				<th class="tabel">Guru Pengajar</th>
				<th class="tabel">Mata pelajaran</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
			$cari = trim($_POST['cari']);
			$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
			$no=1;
			$materi=mysql_query("SELECT * FROM sh_materi, sh_mapel WHERE sh_materi.id_mapel=sh_mapel.id_mapel  AND judul_materi LIKE '%$cari%'ORDER BY id_materi DESC");
			$cek_materi=mysql_num_rows($materi);
			
			if($cek_materi > 0){
			while($m=mysql_fetch_array($materi)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$m[id_materi] id=id$no>"; ?></td>
				<td class="tabel"><?php echo "<b>$m[judul_materi]</b>&nbsp;($m[download])";?><br><small><?php echo "$m[tanggal_upload]";?></small></td>
				<td class="tabel"><?php
				$namaguru=mysql_query("SELECT * FROM sh_guru_staff WHERE nip='$m[nip]'");
				$ng=mysql_fetch_array($namaguru);
				echo "<a href='guru_staff.php?pilih=edit&id=$ng[id_gurustaff]'><b>$ng[nama_gurustaff]";?>
				</b></a></td>
				<td class="tabel"><a href="<?php echo "mata_pelajaran.php?pilih=edit&id=$ng[id_mapel]";?>"><?php echo "$m[nama_mapel]";?></a></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo"$database?pilih=materi&untukdi=hapus&id=$m[id_materi]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo"?pilih=edit&id=$m[id_materi]";?>">edit</a></div>
					
				</td>
			</tr>
			<?php
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>DATA MATERI DENGAN KATA KUNCI <u><?php echo "$cari";?></u> TIDAK DITEMUKAN</b></td></tr>
			<?php }
			?>
		
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
		</form>
</div><!--Akhir class isi kanan-->