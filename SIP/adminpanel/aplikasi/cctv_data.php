<?php
$database="aplikasi/database/cctv.php";
switch($_GET['pilih']){
default: ?>
<h3>CCTV</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="cctv.php">Daftar CCTV</a></div>
			<div class="menuhorisontal"><a href="monitor_cctv.php">Monitor CCTV</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php
				$hitungcctv=mysql_query("SELECT * FROM sh_cctv");
				$jumlah=mysql_num_rows($hitungcctv);
			?>
			Jumlah Kamera (<?php echo "$jumlah";?>)
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
				<th class="tabel" align="left">CCTV List Monitor</th>
				<th class="tabel" align="center">Tempat / Ruang Kelas</th>
				<th class="tabel" align="center">Status</th>
				<th class="tabel" align="center">Akses Orang Tua</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			
				<?php
					$no   =1;
					$cctv = mysql_query("SELECT *
										FROM sh_cctv , sh_kelas
										WHERE sh_cctv.id_kelas = sh_kelas.id_kelas");
					$cek_cctv=mysql_num_rows($cctv);
					if($cek_cctv > 0){
					while($c=mysql_fetch_array($cctv)){
				?>
				
			<tr class="tabel">
				<td class="tabel" align="center"><?php echo "$no";?></td>
				<td class="tabel" align="left">
				
				<!-- Pemanggilan CCTV -->
				  <div class="container">
						<div class="content">
						<a href ="monitor_cctv.php?id=<?php echo $c['id_cctv']; ?>" title="Klik Untuk Memperbesar View & Monitoring"> <img class="img-responsive" src="<?php echo "$c[alamat_cctv]";?>" width="225px"/> </a>
					    </div>
				  </div>
				<!-- Pemanggilan CCTV -->
				  
				</td>
				
				<td class="tabel" align="center"><b><?php echo "$c[nama_kelas]";?></b></td>
				<!-- Status -->
				<?php if ($c['status']==1){$status = "Kelas";} else {$status = "Ruang";} ?>
				
				<td class="tabel" align="center"><b><?php echo "$status";?></b></td>
				
				<!-- Akses Ortu -->
				<?php if ($c['aktif_ortu']==1){$ao = "Boleh";} else {$ao = "Tidak";} ?>
				
				<td class="tabel" align="center"><b><?php echo "$ao";?></b></td>
				
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?pilih=cctv&untukdi=hapus&id=$c[id_cctv]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$c[id_cctv]";?>">edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
			} }
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="5"><font color="red"><b>DATA CCTV BELUM TERSEDIA</b></font></td></tr>
			<?php }	?>
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
			include "aplikasi/cctv_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/cctv_edit.php";
		}
		?>
	