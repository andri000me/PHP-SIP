
<h3>Guru</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="guru_staff.php">Guru</a></div>
			<div class="menuhorisontal"><a href="staff.php">Staff</a></div>
			<div class="menuhorisontal"><a href="jabatan.php">Jabatan</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php
			$dataguru=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='guru'");
			$jmlguru=mysql_num_rows($dataguru);
			
			$gurulaki=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='guru' AND jenkel='L'");
			$jmllaki=mysql_num_rows($gurulaki);
			
			$guruperempuan=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='guru' AND jenkel='P'");
			$jmlperempuan=mysql_num_rows($guruperempuan);
			?>
			<a href="guru_staff.php">Jumlah data</a> (<?php echo "$jmlguru";?>)&nbsp;&nbsp;|
			<a href="<?php echo "?pilih=jenkel&kode=L";?>">Laki-laki</a> (<?php echo "$jmllaki";?>)&nbsp;&nbsp;|
			<a href="<?php echo "?pilih=jenkel&kode=P";?>">Perempuan</a> (<?php echo "$jmlperempuan";?>)
			</div>
			<div class="cari">
			<form method="POST" action="?pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<?php echo"<form method='POST' action='$database?pilih=guru&untukdi=hapusbanyak'>";?>
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?pilih=tambah';">
			<input type="submit" class="hapus" value="Hapus yang ditandai">
			</div>
		</div>
		
		<div class="clear"></div>
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel">Nama Guru</th>
				<th class="tabel">NIP</th>
				<th class="tabel">JK</th>
				<th class="tabel">Mengajar</th>
				<th class="tabel">Telepon</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
			$cari = trim($_POST['cari']);
			$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
			$no=1;
			$guru=mysql_query("SELECT * FROM sh_guru_staff, sh_mapel WHERE sh_guru_staff.id_mapel=sh_mapel.id_mapel AND nama_gurustaff LIKE '%$cari%' AND posisi='guru' ORDER BY id_gurustaff DESC");
			$cek_guru=mysql_num_rows($guru);
			
			if($cek_guru > 0){
			while($g=mysql_fetch_array($guru)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$g[id_gurustaff] id=id$no>"; ?></td>
				<td class="tabel"><a href="<?php echo "?pilih=edit&id=$g[id_gurustaff]";?>"><b><?php echo "$g[nama_gurustaff]";?></b></a></td>
				<td class="tabel"><?php echo "$g[nip]";?></td>
				<td class="tabel"><?php echo "$g[jenkel]";?></td>
				<td class="tabel"><a href="<?php echo "mata_pelajaran.php?pilih=edit&id=$g[id_mapel]";?>"><?php echo "$g[nama_mapel]";?></a></td>
				<td class="tabel"><?php echo "$g[telepon]";?></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?pilih=guru&untukdi=hapus&id=$g[id_gurustaff]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$g[id_gurustaff]";?>">edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="8"><b>NAMA GURU DENGAN KATA KUNCI <u><?php echo "$cari";?></u> TIDAK DITEMUKAN</b></td></tr>
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