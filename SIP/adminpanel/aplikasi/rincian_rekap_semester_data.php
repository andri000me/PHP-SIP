<?php
include "aplikasi/database/koneksi_absensi_websch.php";
// $database="aplikasi/database/siswa.php";
switch($_GET['pilih']){
default: ?>
<h3>Absensi Siswa</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="absen_siswa.php">Log Absensi</a></div>
			<div class="menuhorisontal"><a href="rincian_hari.php">Rincian Absensi Harian</a></div>
			<div class="menuhorisontal"><a href="terlambat.php">Rekap Terlambat Absen</a></div>
			<div class="menuhorisontal"><a href="pulang_cepat.php">Rekap Pulang Cepat</a></div>
			<div class="menuhorisontal"><a href="rekap_hadir.php">Rekap Hadir</a></div>
			<div class="menuhorisontal"><a href="rekap_tidak_hadir.php">Rekap Tidak Hadir</a></div>
			<div class="menuhorisontal"><a href="rekap_ijin.php">Rekap Ijin</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="rekap_semester.php">Rekap Semester</a></div>
		</div>
		<!-- Pencarian Berdasarkan Kelas & Nomor Induk Siswa -->
		<div class="atastabel" style="margin:5px">
			<!-- Tabel Pencarian -->
			<table class="isian" style="margin:5px">
			<form method="POST" action="?pilih=pencarian" name="cetak" id="cetak">
			<h3> Pencarian Data Absensi </h3>
			<tr><td class="isiankanan" width="250px">Pilih Kelas </td><td class="isian">
				<select name="kelas">
					<option value="" selected> &nbsp;&nbsp;-&nbsp;&nbsp; </option>
					<?php
					//Buka Koneksi Database Absensi
					koneksi1_buka();
					$tampilkelas=mysql_query("SELECT * FROM kelas");
					while($tk=mysql_fetch_array($tampilkelas)){
					echo "<option value='$tk[kelas_name]'>$tk[kelas_name]</option>";}
					?>
				</select>
			</tr>
			<tr><td class="isiankanan" width="250px">No Induk Siswa</td><td class="isian"><input type="text" class="pencarian" name="noinduk" id="noinduk"></td></tr>
			<tr><td class="isiankanan" width="250px"> </td><td class="isian"> <input type="submit" class="batal" value="Tampil Data"> </td></tr>
			<td class="isiankanan" width="250px"><a href='../adminpanel/aplikasi/cetak/print_rekap_semester.php' target='_blank'>Tampilan Cetak
			
			<script language="JavaScript" type="text/javascript" xml:space="preserve">
				//<![CDATA[
				var frmvalidator  = new Validator("cetak");
				frmvalidator.addValidation("awal","req","Tanggal Mulai harus diisi");
				frmvalidator.addValidation("akhir","req","Tanggal Akhir harus diisi");
				frmvalidator.addValidation("noinduk","req","Nomor Induk Siswa harus diisi");
				//]]>
			</script>
			</form>
			</table>
		</div>
		<div class="clear"></div>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel">Kelas</th>
				<th class="tabel">Nama Siswa</th>
				<th class="tabel">No Induk</th>
				<th class="tabel">NISN</th>
				<th class="tabel">Tahun Ajaran</th>
				<th class="tabel">Semester</th>
				<th class="tabel">Total Terlambat</th>
				<th class="tabel">Total Izin</th>
				<th class="tabel">Total Hadir</th>
				<th class="tabel">Total Tidak Hadir</th>
			</tr>
			
			<?php
				$no=1;
				$absen=mysql_query("SELECT DISTINCT siswa.siswa_name as nama, result_proc.n_induk , result_proc.nisn , result_proc.kelas_name , result_proc.tahun_ajaran , result_proc.semester  ,
									(SELECT COUNT(status_hadir )
									FROM result_proc
									WHERE (status_hadir ='Hadir'  AND siswa_name = nama)) AS TOTAL_HADIR ,
									
									 (SELECT COUNT(status_hadir )
									 FROM result_proc
									 WHERE (status_hadir ='Tidak Hadir'  AND siswa_name = nama)) AS TOTAL_TIDAK_HADIR,

									(SELECT COUNT(ijin_k.siswa_id)
									 FROM ijin_k,siswa
									 WHERE (siswa.siswa_id = ijin_k.siswa_id AND siswa_name = nama)) AS TOTAL_IZIN, 

									  (SELECT COUNT(status_hadir )
									 FROM result_proc
									 WHERE (terlambat<>'' AND siswa_name = nama)) AS TOTAL_TERLAMBAT

									 FROM result_proc , siswa 
									 WHERE result_proc.status_hadir = 'Tidak Hadir' 
									 AND result_proc.siswa_name = siswa.siswa_name");
				$cek_absen=mysql_num_rows($absen);
				
				if($cek_absen > 0){
				while($row=mysql_fetch_array($absen)){				
				?>
			<tr class="tabel">
				<td class="tabel"><?php echo $no;?></td>
				<td class="tabel"><?php echo $row['kelas_name'];?></td>
				<td class="tabel"><?php echo $row['nama'];?></td>
				<td class="tabel"><?php echo $row['n_induk'];?></td>
				<td class="tabel"><?php echo $row['nisn'];?></td>
				<td class="tabel"><?php echo $row['tahun_ajaran'];?></td>
				<td class="tabel"><?php echo $row['semester'];?></td>
				<td class="tabel"><?php echo $row['TOTAL_TERLAMBAT'];?></td>
				<td class="tabel"><?php echo $row['TOTAL_IZIN'];?></td>
				<td class="tabel"><?php echo $row['TOTAL_HADIR'];?></td>
				<td class="tabel"><?php echo $row['TOTAL_TIDAK_HADIR'];?></td>
			</tr>
			<?php $no++; } 
				} else { 
			?>
			<tr class="tabel"><td class="tabel" colspan="11"><font color="red"><b>DATA RINCIAN SEMESTER ABSENSI SISWA BELUM TERSEDIA</b></font></td></tr>
			<?php } koneksi1_tutup(); //Tutup Koneksi Database Absensi ?>
		</table>
		<div class="atastabel" style="margin: 5px 10px 0 10px">
				<div id="pageNavPosition"></div>
		</div>
		<div class="atastabel" style="margin: 5px 10px 0 10px">
		<?php
			//Buka Koneksi Database Websch
			koneksi2_buka();
			$jumlahtampil=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='3'");
			$jt=mysql_fetch_array($jumlahtampil);
		?>
		<script type="text/javascript"><!--
        var pager = new Pager('results', <?php echo "$jt[isi_pengaturan]"; koneksi2_tutup(); //Tutup Koneksi Database Websch ?> ); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
		</div>
	</div><!--Akhir class isi kanan-->
		<?php break;
		
		case "kelas":
			include "aplikasi/absen_export.php";
		break;
		
		case "pencarian":
			include "aplikasi/rekap_semester_pencarian.php";
		}
		?>
	