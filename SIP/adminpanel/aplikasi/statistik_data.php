<?php
if($_SESSION['leveluser'] == 'Super Admin') {
$database="aplikasi/database/statistik.php";
switch($_GET['pilih']){
default: ?>
<h3>Statistik Pengunjung</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="tahun_ajaran.php">Tahun Ajaran</a></div>
			<div class="menuhorisontal"><a href="pengaturan.php">Website</a></div>
			<div class="menuhorisontal"><a href="tema.php">Tema</a></div>
			<div class="menuhorisontal"><a href="ym.php">Yahoo! Messenger</a></div>
			<div class="menuhorisontal"><a href="polling.php">Polling</a></div>
			<div class="menuhorisontal"><a href="link.php">Link</a></div>
			<div class="menuhorisontalaktif"><a href="statistik.php">Statistik</a></div>
		</div>

		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Reset Data" onclick="window.location.href='<?php echo "$database"; ?>';">
			</div>
		</div>
		
		<table class="tabel">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel">Nama Statistik</th>
				<th class="tabel">Jumlah</th>
			</tr>
			<?php
			  $ip      = $_SERVER['REMOTE_ADDR'];
              $tanggal = date("Ymd");
              $waktu   = time();
			  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM sh_statistik WHERE tanggal='$tanggal' GROUP BY ip_addres"));
              $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(mengunjungi) FROM sh_statistik"), 0); 
              $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(mengunjungi) as kunjunganhariini FROM sh_statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
              $totalhits        = mysql_result(mysql_query("SELECT SUM(mengunjungi) FROM sh_statistik"), 0); 
              $bataswaktu       = time() - 300;
              $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM sh_statistik WHERE online > '$bataswaktu'"));
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "1";?></td>
				<td class="tabel"><a href=""><b>Total Hits Halaman</b></a></td>
				<td class="tabel"><?php echo "$totalhits";?></td>
			</tr>
			<tr class="tabel">
				<td class="tabel"><?php echo "2";?></td>
				<td class="tabel"><a href=""><b>Total Pengunjung Website</b></a></td>
				<td class="tabel"><?php echo "$totalpengunjung";?></td>
			</tr>
			<tr class="tabel">
				<td class="tabel"><?php echo "3";?></td>
				<td class="tabel"><a href=""><b>Hits Hari Ini</b></a></td>
				<td class="tabel"><?php echo "$hits[kunjunganhariini]";?></td>
			</tr>
			<tr class="tabel">
				<td class="tabel"><?php echo "4";?></td>
				<td class="tabel"><a href=""><b>Pengunjung Hari Ini</b></a></td>
				<td class="tabel"><?php echo "$pengunjung";?></td>
			</tr>
			<tr class="tabel">
				<td class="tabel"><?php echo "5";?></td>
				<td class="tabel"><a href=""><b>Pengunjung Online Saat Ini</b></a></td>
				<td class="tabel"><?php echo "$pengunjungonline";?></td>
			</tr>
		</table>
		
</div><!--Akhir class isi kanan-->

		<?php break;
		
		case "edit":
			include "aplikasi/statistik_edit.php";
		}
		}
		?>	