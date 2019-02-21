<h3>Buku Tamu</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulbox">Data Mading</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php
			$totaltamu=mysql_query("SELECT * FROM sh_mading");
			$jumlahtotal=mysql_num_rows($totaltamu);
			
			$totalterima=mysql_query("SELECT * FROM sh_mading WHERE status='1'");
			$jumlahterima=mysql_num_rows($totalterima);
			
			$totaltolak=mysql_query("SELECT * FROM sh_mading WHERE status='0'");
			$jumlahtolak=mysql_num_rows($totaltolak);
			?>
			<a href="mading.php">Jumlah data</a> (<?php echo "$jumlahtotal";?>)&nbsp;&nbsp;|
			<a href="?pilih=terima">Diterima</a> (<?php echo "$jumlahterima";?>)&nbsp;&nbsp;|
			<a href="?pilih=tolak">Ditolak</a> (<?php echo "$jumlahtolak";?>)
			</div>
			<div class="cari">
			<form method="POST" action="?pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<?php echo "<form method='POST' action='$database?pilih=tolak&untukdi=hapusbanyak'>"; ?>
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
				<th class="tabel" width="125px">Nama</th>
				<th class="tabel">Tanggal</th>
				<th class="tabel">Subjek</th>
				<th class="tabel" width="150px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$bukutamu=mysql_query("SELECT * FROM sh_mading WHERE status='0' ORDER BY id_mading DESC");
				$cek_bukutamu=mysql_num_rows($bukutamu);
				
				if($cek_bukutamu > 0){
				while($b=mysql_fetch_array($bukutamu)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$b[id_mading] id=id$no>"; ?></td>
				<td class="tabel"><a href="<?php echo "?pilih=edit&id=$b[id_mading]";?>"><b><?php echo "$b[nama_siswa]";?></b></a></td>
				<td class="tabel"><?php echo "$b[tanggal_posting]";?></td>
				<td class="tabel"><?php echo "$b[judul_mading]";?></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?pilih=tolak&untukdi=hapus&id=$b[id_mading]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$b[id_mading]";?>">edit</a></div>
					<div class="terbitdata"><a href="<?php echo "$database?pilih=tolak&untukdi=terima&id=$b[id_mading]";?>">terima</a></div>
					
				</td>
			</tr>
			<?php
			$no++;
			} }
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>DATA BUKU TAMU YANG DITOLAK BELUM TERSEDIA</b></td></tr>
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