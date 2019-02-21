<?php
$database="aplikasi/database/pengumuman.php";
switch($_GET['pilih']){
default: ?>
<h3>Pengumuman</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="informasi_sekolah.php">Informasi Sekolah</a></div>
			<div class="menuhorisontal"><a href="gmap.php">Lokasi Gmap</a></div>
			<div class="menuhorisontal"><a href="profil.php">Profil</a></div>
			<div class="menuhorisontal"><a href="agenda.php">Agenda</a></div>
			<div class="menuhorisontalaktif"><a href="pengumuman.php">Pengumuman</a></div>
		</div>
		
		
		<?php echo"<form method='POST' action='$database?pilih=pengumuman&untukdi=hapusbanyak'>";?>
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
				<th class="tabel">&nbsp;</th>
				<th class="tabel">Judul Pengumuman</th>
				<th class="tabel">Tanggal Posting</th>
				<th class="tabel">Ditujukan</th>
				<th class="tabel">Penulis</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
			$no=1;
			if($_SESSION['leveluser']=='Super Admin'){
			$pengumuman=mysql_query("SELECT * FROM sh_pengumuman ORDER BY id_pengumuman DESC");}
			else {
			$pengumuman=mysql_query("SELECT * FROM sh_pengumuman WHERE s_username='$_SESSION[adminsh]' ORDER BY id_pengumuman DESC");
			}
			$cek_pengumuman=mysql_num_rows($pengumuman);
			
			if($cek_pengumuman > 0){
			while($p=mysql_fetch_array($pengumuman)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$p[id_pengumuman] id=id$no>"; ?></td>
				<td class="tabel"><a href="<?php echo "?pilih=edit&id=$p[id_pengumuman]";?>"><b><?php echo "$p[judul_pengumuman]";?></b></a></td>
				<td class="tabel"><?php echo "$p[tanggal_pengumuman]";?></td>
				<td class="tabel"><?php echo "$p[ditujukan]";?></td>
				<td class="tabel"><?php
				$penulis=mysql_query("SELECT * FROM sh_users WHERE s_username='$p[s_username]'");
				$pen=mysql_fetch_array($penulis);
				echo "$pen[nama_lengkap_users]";?></td>
				<td class="tabel">
				<?php 
				echo "
					<div class='hapusdata'><a href='$database?pilih=pengumuman&untukdi=hapus&id=$p[id_pengumuman]'>hapus</a></div>
					<div class='editdata'><a href='?pilih=edit&id=$p[id_pengumuman]'>edit</a></div>";
				?>
				</td>
			</tr>
			
			<?php
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>DATA PENGUMUMAN BELUM TERSEDIA</b></td></tr>
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
		
		case "tambah":
			include "aplikasi/pengumuman_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/pengumuman_edit.php";
		}
		?>
	