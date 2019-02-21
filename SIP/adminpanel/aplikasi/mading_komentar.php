<?php
	if($_GET['id']){
		$update=mysql_query("UPDATE sh_komentar_mading SET status_terima='1' WHERE id_komentar_mading='$_GET[id]'");
	}if($_GET['tolak']){
		$del=mysql_query("DELETE FROM sh_komentar_mading WHERE id_komentar_mading='$_GET[tolak]'");
	}
?><h3>Data Mading</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulbox">Data Komentar Mading</div>
		
		<?php echo "<form method='POST' action='$database?pilih=terima&untukdi=hapusbanyak'>"; ?>
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="submit" class="hapus" value="Hapus yang ditandai">
			</div>
		</div>
		<div class="clear"></div>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel" width="125px">Judul Mading</th>
				<th class="tabel" width="125px">Nama</th>
				<th class="tabel">Tanggal</th>
				<th class="tabel">Komentar</th>
				<th class="tabel" width="50px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$bukutamu=mysql_query("SELECT sh_komentar_mading.*,sh_mading.* FROM sh_komentar_mading
									  JOIN sh_mading ON sh_komentar_mading.id_mading=sh_mading.id_mading");
				$cek_bukutamu=mysql_num_rows($bukutamu);
				
				if($cek_bukutamu > 0){
				while($b=mysql_fetch_array($bukutamu)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$b[id_mading] id=id$no>"; ?></td>
				<td class="tabel"><?php echo "$b[judul_mading]";?></td>
				<td class="tabel"><a href="#"><b><?php echo "$b[nama_komentar]";?></b></a></td>
				<td class="tabel"><?php echo "$b[tanggal_komentar]";?></td>
				<td class="tabel"><?php echo "$b[isi_komentar]";?></td>
				<td class="tabel">
					<?php if($b['status_terima']==0){?>
						<div class="bataldata"><a href="?pilih=komentar&id=<?php echo "$b[id_komentar_mading]";?>">terima</a></div>
						<div class="hapusdata"><a href="?pilih=komentar&tolak=<?php echo "$b[id_komentar_mading]";?>" onclick="return confirm('Anda yakin ?')">tolak</a></div>
					<?php }else{?>
						<div class="hapusdata"><a href="?pilih=komentar&tolak=<?php echo "$b[id_komentar_mading]";?>" onclick="return confirm('Anda yakin ?')">Hapus</a></div>
					<?php }?>
				</td>
			</tr>
			<?php
			$no++;
			} }
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>DATA KOMENTAR YANG DITERIMA BELUM TERSEDIA</b></td></tr>
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