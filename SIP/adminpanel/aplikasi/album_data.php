<?php
$database="aplikasi/database/album.php";
switch($_GET['pilih']){
default: ?>
<h3>Album Galeri</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="album_galeri.php">Album Galeri</a></div>
			<div class="menuhorisontal"><a href="galeri_foto.php">Galeri Foto</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php
				$hitungalbum=mysql_query("SELECT * FROM sh_album");
				$jumlah=mysql_num_rows($hitungalbum);
			?>
			Jumlah data (<?php echo "$jumlah";?>)
			</div>
			
		</div>
		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?pilih=tambah';">
			</div>
		</div>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel">&nbsp;</th>
				<th class="tabel">Nama Album</th>
				<th class="tabel">Tgl. Upload</th>
				<th class="tabel">Jml. Foto</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$album=mysql_query("SELECT * FROM sh_album ORDER BY id_album DESC");
				$cek_album=mysql_num_rows($album);
				
				if($cek_album > 0){
				while($a=mysql_fetch_array($album)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><img src="../images/foto/galeri/album/<?php echo "$a[foto_album]";?>" width="75px"></td>
				<td class="tabel"><a href=""><b><?php echo "$a[nama_album]";?></b></a></td>
				<td class="tabel"><?php echo "$a[tanggal_album]";?></td>
				<td class="tabel">
				<?php $foto=mysql_query("SELECT * FROM sh_galeri WHERE id_album=$a[id_album]");
						$jmlfoto=mysql_num_rows($foto);
						echo "$jmlfoto";
						?>
				</td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?pilih=album&untukdi=hapus&id=$a[id_album]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$a[id_album]";?>">edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
			} }
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>DATA ALBUM BELUM TERSEDIA</b></td></tr>
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
</div><!--Akhir class isi kanan-->
		<?php break;
		
		case "tambah":
			include "aplikasi/album_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/album_edit.php";
		}
		?>
	