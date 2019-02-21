<?php
$database="aplikasi/database/kelas.php";
switch($_GET['pilih']){
default: ?>
<h3>Kelas</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="siswa.php">Siswa</a></div>
			<div class="menuhorisontal"><a href="alumni.php">Alumni</a></div>
			<div class="menuhorisontalaktif"><a href="kelas.php">Kelas</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php $datakelas=mysql_query("SELECT * FROM sh_kelas");
					$jml=mysql_num_rows($datakelas); ?>
			Jumlah data (<?php echo "$jml";?>)
			</div>
			<div class="cari">
			</div>
		</div>
		<?php echo "<form method='POST' action='$database?pilih=kelas&untukdi=hapusbanyak'>"; ?>
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
				<th class="tabel">Nama Kelas</th>
				<th class="tabel">Ruang Kelas</th>
				<th class="tabel">Laki-Laki</th>
				<th class="tabel">Perempuan</th>
				<th class="tabel">Jumlah Siswa</th>
				<th class="tabel">Wali Kelas</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$kelas=mysql_query("SELECT * FROM sh_kelas ORDER BY `sh_kelas`.`id_kelas` ASC");
				while($k=mysql_fetch_array($kelas)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<?php if ($k[id_kelas]== 1) { ?>
				<td class="tabel"></td>
				<?php }
				else { ?>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$k[id_kelas] id=id$no>"; ?></td>
				<?php } ?>
				<td class="tabel"><a href="<?php echo "?pilih=edit&id=$k[id_kelas]";?>"><b><?php echo "$k[nama_kelas]";?></b></a></td>
				<td class="tabel"><b><?php echo "$k[ruang_kelas]";?></b></td>
				<td class="tabel"><a href=""><b>
					<?php
					$siswalaki=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='1' AND jenkel='L' AND id_kelas='$k[id_kelas]'");
					$jmllaki=mysql_num_rows($siswalaki);
					$jmlhlaki = $jmllaki;
					echo "$jmllaki";
					?>
				</b></a></td>
				<td class="tabel"><a href=""><b>
					<?php
					$siswaperempuan=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='1' AND jenkel='P' AND id_kelas='$k[id_kelas]'");
					$jmlperempuan=mysql_num_rows($siswaperempuan);
					$jmlhperempuan = $jmlperempuan;
					echo "$jmlperempuan";
					?>
				</b></a></td>
				
				<td class="tabel"><b><?php $jmlh = $jmlhperempuan + $jmlhlaki ; echo "$jmlh Murid";?></b></td>
				
				<td class="tabel"><b>
					<?php
					$walikelas=mysql_query("SELECT * FROM sh_guru_staff WHERE id_gurustaff = '$k[id_gurustaff]'");
					$walikelastampil=mysql_fetch_array($walikelas);
					echo $walikelastampil[nama_gurustaff];
					?>
				</b></td>
				
				<td class="tabel">
					<?php if ($k[id_kelas]== 1) { ?>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$k[id_kelas]";?>">edit</a></div>
					<?php }
					else { ?>
					<div class="hapusdata"><a href="<?php echo "$database?pilih=kelas&untukdi=hapus&id=$k[id_kelas]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$k[id_kelas]";?>">edit</a></div>
					<?php } ?>
				</td>
			</tr>
			<?php
			$no++;
			}
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
			include "aplikasi/kelas_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/kelas_edit.php";
		break;
		
		case "pencarian":
			include "aplikasi/kelas_pencarian.php";
		}
		?>
	