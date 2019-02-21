
<h3>Staff</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="guru_staff.php">Guru</a></div>
			<div class="menuhorisontalaktif"><a href="staff.php">Staff</a></div>
			<div class="menuhorisontal"><a href="jabatan.php">Jabatan</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php
			$datastaff=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='staff'");
			$jmlstaff=mysql_num_rows($datastaff);
			
			$stafflaki=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='staff' AND jenkel='L'");
			$jmllaki=mysql_num_rows($stafflaki);
			
			$staffperempuan=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='staff' AND jenkel='P'");
			$jmlperempuan=mysql_num_rows($staffperempuan);
			?>
			<a href="staff.php">Jumlah data</a> (<?php echo "$jmlstaff";?>)&nbsp;&nbsp;|
			<a href="<?php echo "?pilih=jenkel&kode=L";?>">Laki-laki</a> (<?php echo "$jmllaki";?>)&nbsp;&nbsp;|
			<a href="<?php echo "?pilih=jenkel&kode=P";?>">Perempuan</a> (<?php echo "$jmlperempuan";?>)
			</div>
			<div class="cari">
			<form method="POST" action="?pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<?php echo"<form method='POST' action='$database?pilih=staff&untukdi=hapusbanyak'>";?>
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
				<th class="tabel">Nama Staff</th>
				<th class="tabel">NIP</th>
				<th class="tabel">JK</th>
				<th class="tabel">Jabatan</th>
				<th class="tabel">Telepon</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
			$cari = trim($_POST['cari']);
			$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
			$no=1;
			$staff=mysql_query("SELECT * FROM sh_guru_staff, sh_jabatan WHERE sh_guru_staff.id_jabatan=sh_jabatan.id_jabatan AND nama_gurustaff LIKE '%$cari%' AND posisi='staff' ORDER BY id_gurustaff DESC");
			$cek_staff=mysql_num_rows($staff);
			
			if($cek_staff > 0){
			while($s=mysql_fetch_array($staff)){
			?>
			
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$s[id_gurustaff] id=id$no>"; ?></td>
				<td class="tabel"><a href=""><b><?php echo "$s[nama_gurustaff]";?></b></a></td>
				<td class="tabel"><?php echo "$s[nip]";?></td>
				<td class="tabel"><?php echo "$s[jenkel]";?></td>
				<td class="tabel"><a href=""><?php echo "$s[nama_jabatan]";?></a></td>
				<td class="tabel"><?php echo "$s[telepon]";?></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?pilih=staff&untukdi=hapus&id=$s[id_gurustaff]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$s[id_gurustaff]";?>">edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="8"><b>NAMA STAFF DENGAN KATA KUNCI <u><?php echo "$cari";?></u> TIDAK DITEMUKAN</b></td></tr>
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