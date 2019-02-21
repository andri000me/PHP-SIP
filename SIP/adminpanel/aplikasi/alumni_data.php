<?php
$database="aplikasi/database/alumni.php";
switch($_GET['pilih']){
default: ?>
<h3>Alumni</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="siswa.php">Siswa</a></div>
			<div class="menuhorisontalaktif"><a href="alumni.php">Alumni</a></div>
			<div class="menuhorisontal"><a href="kelas.php">Kelas</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php
			$dataalumni=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='0'");
			$jumlahalumni=mysql_num_rows($dataalumni);
			
			$alumnilaki=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='0' AND jenkel='L'");
			$jumlahlaki=mysql_num_rows($alumnilaki);
			
			$alumniperempuan=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='0' AND jenkel='P'");
			$jumlahperempuan=mysql_num_rows($alumniperempuan);
			
			?>
			<a href="alumni.php">Jumlah data</a> (<?php echo"$jumlahalumni";?>)&nbsp;&nbsp;|
			<a href="<?php echo"alumni.php?pilih=jenkel&kode=L";?>">Laki-Laki</a> (<?php echo"$jumlahlaki";?>)&nbsp;&nbsp;|
			<a href="<?php echo"alumni.php?pilih=jenkel&kode=P";?>">Perempuan</a> (<?php echo"$jumlahperempuan";?>)
			</div>
			<div class="cari">
			<form method="POST" action="?pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<form method="POST" style="float: left" action="alumni.php?pilih=tahun">
				<select name="tahun"onChange="this.form.submit()">
					<option value="" selected>Tampil Berdasarkan Tahun Lulus</option>
					<?php
					$tahun_lulus=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='0' ORDER BY tahun_lulus");
					while($tl=mysql_fetch_array($tahun_lulus)){
					?>
					<option value="<?php echo "$tl[tahun_lulus]";?>"><?php echo "$tl[tahun_lulus]";?></option>
					<?php } ?>
				</select>
			</form>
			</div>
			
		<?php echo"<form method='POST' action='$database?pilih=alumni&untukdi=hapusbanyak'>";?>
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
				<th class="tabel">Nama Alumni</th>
				<th class="tabel">Thn. Lulus</th>
				<th class="tabel">JK</th>
				<th class="tabel">Pekerjaan Sekarang</th>
				<th class="tabel">Telepon</th>
				<th class="tabel">Status</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
			$no=1;
			$alumni=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='0' ORDER BY nama_siswa");
			$cek_alumni=mysql_num_rows($alumni);
			
			if($cek_alumni > 0) {
			while($a=mysql_fetch_array($alumni)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo"$no";?></td>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$a[id_siswa] id=id$no>"; ?></td>
				<td class="tabel"><a href=""><b><?php echo"$a[nama_siswa]";?></b></a></td>
				<td class="tabel"><?php echo"$a[tahun_lulus]";?></td>
				<td class="tabel"><?php echo"$a[jenkel]";?></td>
				<td class="tabel"><?php echo"$a[pekerjaan_sekarang]";?></td>
				<td class="tabel"><?php echo"$a[telepon]";?></td>
				<td class="tabel">
				<?php 
					if ($a[status_oke]==1){
					?>
					<b style="color: #037f00">Terverifikasi</b>
					<?php }
					else { ?>
					<b style="color: #ff6600">Tunda</b>
					<?php }?>
				</td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo"$database?pilih=alumni&untukdi=hapus&id=$a[id_siswa]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo"?pilih=edit&id=$a[id_siswa]";?>">edit</a></div>
					
				</td>
			</tr>
			<?php
			$no++;
			} }
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="9"><b>DATA ALUMNI BELUM TERSEDIA</b></td></tr>
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
			include "aplikasi/alumni_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/alumni_edit.php";
		break;
		
		case "pencarian":
			include "aplikasi/alumni_pencarian.php";
		break;
		
		case "jenkel":
			include "aplikasi/alumni_jenkel.php";
		break;
		
		case "tahun":
			include "aplikasi/alumni_tahun.php";
		}
		?>
	