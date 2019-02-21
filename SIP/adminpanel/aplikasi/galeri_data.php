<?php
$database="aplikasi/database/galeri.php";
switch($_GET['pilih']){
default: ?>
<h3>Galeri Foto</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="album_galeri.php">Album Galeri</a></div>
			<div class="menuhorisontalaktif"><a href="galeri_foto.php">Galeri Foto</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php
			$hitungfoto=mysql_query("SELECT * FROM sh_galeri");
			$jumlahfoto=mysql_num_rows($hitungfoto);
			?>
			Jumlah data (<?php echo "$jumlahfoto";?>)
			</div>
			<div class="cari">
			<form method="POST" action="?pilih=pencarian">
			<input type="text" class="pencarian" name="cari">
			<input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<form method="POST" style="float: left" action="galeri_foto.php?pilih=album">
				<select name="album"onChange="this.form.submit()">
					<option value="" selected>Tampil Berdasarkan Album</option>
					<?php
					$tampilalbum=mysql_query("SELECT * FROM sh_album ORDER BY id_album DESC");
					while ($ta=mysql_fetch_array($tampilalbum)){
					echo "<option value='$ta[id_album]'>$ta[nama_album]</option>";}
					?>
				</select>
			</form>
			</div>
			
			<?php echo "<form method='POST' action='$database?pilih=galeri&untukdi=hapusbanyak'>"; ?>
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
				<th class="tabel">&nbsp;</th>
				<th class="tabel">Tgl. Upload</th>
				<th class="tabel">Album</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$galeri=mysql_query("SELECT * FROM sh_galeri, sh_album WHERE sh_galeri.id_album=sh_album.id_album ORDER BY id_galeri DESC");
				$cek_galeri=mysql_num_rows($galeri);
				
				if($cek_galeri > 0){
				while($g=mysql_fetch_array($galeri)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$g[id_galeri] id=id$no>"; ?></td>
				<td class="tabel"><center>
				<a href="../images/foto/galeri/<?php echo "$g[nama_galeri]";?>" class="highslide" onclick="return hs.expand(this)">
				<img src="../images/foto/galeri/<?php echo "$g[nama_galeri]";?>" width="100px" ><br><?php echo "$g[nama_galeri]";?></a>
				</center></td>
				<td class="tabel"><?php echo "$g[tanggal_galeri]";?></td>
				<td class="tabel"><a href="<?php echo "album_galeri.php?pilih=edit&id=$g[id_album]";?>"><b><?php echo "$g[nama_album]";?></b></a></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?pilih=galeri&untukdi=hapus&id=$g[id_galeri]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$g[id_galeri]";?>">edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
			} }
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>DATA GALERI BELUM TERSEDIA</b></td></tr>
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
			include "aplikasi/galeri_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/galeri_edit.php";
		break;
		
		case "pencarian":
			include "aplikasi/galeri_pencarian.php";
		break;
		
		case "album":
			include "aplikasi/galeri_album.php";
		}
		?>
	