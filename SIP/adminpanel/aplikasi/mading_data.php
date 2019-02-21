<?php
$database="aplikasi/database/madingg.php";
switch($_GET['pilih']){
default: ?>
<h3>Mading</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulbox">Data Mading</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php
			$totalmading=mysql_query("SELECT * FROM sh_mading");
			$jumlahtotal=mysql_num_rows($totalmading);
			
			$totalterima=mysql_query("SELECT * FROM sh_mading WHERE status_terbit='1'");
			$jumlahterima=mysql_num_rows($totalterima);
			
			$totaltolak=mysql_query("SELECT * FROM sh_mading WHERE status_terbit='0'");
			$jumlahtolak=mysql_num_rows($totaltolak);
			
			$totalkom=mysql_query("SELECT * FROM sh_komentar_mading WHERE status_terima='0'");
			$jumlahkom=mysql_num_rows($totalkom);
			?>
			<a href="mading.php">Jumlah data</a> (<?php echo "$jumlahtotal";?>)&nbsp;&nbsp;|
			<a href="?pilih=terima">Diterima</a> (<?php echo "$jumlahterima";?>)&nbsp;&nbsp;|
			<a href="?pilih=tolak">Ditolak</a> (<?php echo "$jumlahtolak";?>)&nbsp;&nbsp;|
			<a href="?pilih=komentar">Komentar Mading</a> (<?php echo "$jumlahkom";?>)
			</div>
			<div class="cari">
			<form method="POST" action="?pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<?php echo "<form method='POST' action='$database?pilih=mading&untukdi=hapusbanyak'>"; ?>
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
				<th class="tabel" width="125px">Nama</th>
				<th class="tabel">Tanggal</th>
				<th class="tabel">Judul</th>
				<th class="tabel">Kategori</th>
				<th class="tabel" width="150px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$mading=mysql_query("SELECT * FROM sh_mading, sh_mading_kategori
									WHERE sh_mading.id_kategori = sh_mading_kategori.id_mading_kategori
									ORDER BY id_mading DESC");
				$cek_mading=mysql_num_rows($mading);
				
				if($cek_mading > 0){
				while($b=mysql_fetch_array($mading)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$b[id_mading] id=id$no>"; ?></td>
				<td class="tabel"><a href="<?php echo "?pilih=edit&id=$b[id_mading]";?>"><b><?php echo "$b[nama_siswa]";?></b></a></td>
				<td class="tabel"><?php echo "$b[tanggal_posting]";?></td>
				<td class="tabel"><?php echo "$b[judul_mading]";?></td>
				<td class="tabel"><?php echo "$b[nama_mading_kategori]";?></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?pilih=mading&untukdi=hapus&id=$b[id_mading]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$b[id_mading]";?>">edit</a></div>
					<?php if($b[status_terbit]=='1'){ ?>
					<div class="batal123"><a href="<?php echo "$database?pilih=mading&untukdi=tolak&id=$b[id_mading]";?>">tolak</a></div>
					<?php }
					else { ?>
					<div class="terima123"><a href="<?php echo "$database?pilih=mading&untukdi=terima&id=$b[id_mading]";?>">terima</a></div>
					<?php } ?>
				</td>
			</tr>
			<?php
			$no++;
			} }
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>DATA MADING BELUM TERSEDIA</b></td></tr>
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
		<?php break;
		
		
		case "edit":
			include "aplikasi/mading_edit.php";
		break;
				
		case "terima":
			include "aplikasi/mading_terima.php";
		break;
		
		case "tolak":
			include "aplikasi/mading_tolak.php";
		break;
		
		case "komentar":
			include "aplikasi/mading_komentar.php";
		break;
		}
		?>
	