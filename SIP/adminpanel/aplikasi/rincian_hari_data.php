<?php
include "aplikasi/database/koneksi_absensi_websch.php";
// $database="aplikasi/database/siswa.php";
switch($_GET['pilih']){
default: ?>
<h3>Absensi Siswa</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="absen_siswa.php">Log Absensi</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="rincian_hari.php">Rincian Absensi Harian</a></div>
			<div class="menuhorisontal"><a href="terlambat.php">Rekap Terlambat Absen</a></div>
			<div class="menuhorisontal"><a href="pulang_cepat.php">Rekap Pulang Cepat</a></div>
			<div class="menuhorisontal"><a href="rekap_hadir.php">Rekap Hadir</a></div>
			<div class="menuhorisontal"><a href="rekap_tidak_hadir.php">Rekap Tidak Hadir</a></div>
			<div class="menuhorisontal"><a href="rekap_ijin.php">Rekap Ijin</a></div>
			<div class="menuhorisontal"><a href="rekap_semester.php">Rekap Semester</a></div>
		</div>
		<!-- Pencarian Berdasarkan Tanggal & Nomor Induk Siswa -->
		<div class="atastabel" style="margin:5px">
			<!-- Tabel Pencarian -->
			<table class="isian" style="margin:10px">
			<form method="POST" action="?pilih=pencarian" name="cetak" id="cetak">
			<h3> Pencarian Data Absensi </h3>
			<tr><td class="isiankanan" width="250px">Pilih Tanggal</td><td class="isian"><input type="text" class="pencarian" name="awal" id="tanggal">&nbsp;s/d&nbsp;&nbsp;&nbsp;<input type="text" class="pencarian" name="akhir" id="tanggal1">
			</td></tr>
			<tr><td class="isiankanan" width="250px">No Induk Siswa</td><td class="isian"><input type="text" class="pencarian" name="noinduk" id="noinduk"></tr>
			<tr><td class="isiankanan" width="250px"> </td><td class="isian"> <input type="submit" class="batal" value="Tampil Data"> </td></tr>
			<td class="isiankanan" width="250px"><a href='../adminpanel/aplikasi/cetak/print_absen_rincian_hari.php' target='_blank'>Tampilan Cetak
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
				<th class="tabel">Hari</th>
				<th class="tabel">Tanggal</th>
				<th class="tabel">No Induk</th>
				<th class="tabel">Tahun Ajaran</th>
				<th class="tabel">Nama Siswa</th>
				<th class="tabel">Kelas</th>
				<th class="tabel">Jadwal Kelas</th>
				<th class="tabel">Jadwal Masuk</th>
				<th class="tabel">Jam Masuk</th>
				<th class="tabel">Terlambat</th>
				<th class="tabel">Jadwal Pulang</th>
				<th class="tabel">Jam Pulang</th>
				<th class="tabel">Pulang Cepat</th>
				<th class="tabel">Status Kehadiran</th>
			</tr>
			
			<?php
				//Buka Koneksi Database Absensi
			    koneksi1_buka();
				$no=1;
				$absen=mysql_query("SELECT hari,scan_date,result_proc.n_induk,tahun_ajaran,result_proc.siswa_name,kelas_name,jadwal_name,jam_masuk,scan_in,terlambat,jam_pulang,scan_out,pulang_cepat,status_hadir FROM result_proc , siswa where result_proc.siswa_name = siswa.siswa_name");
				$cek_absen=mysql_num_rows($absen);
				
				if($cek_absen > 0){
				while($row=mysql_fetch_array($absen)){				
				// explode di gunakan untuk memisahkan data per kata
				$datetime = $row['scan_date'];
				$arr_tanggaljam = explode (" ",$datetime);
				$tanggal = $arr_tanggaljam[0];
				?>
				<tr class="tabel">
				<td class="tabel"><?php echo $no;?></td>
				<td class="tabel"><?php echo $row['hari'];?></td>
				<td class="tabel"><?php echo $tanggal;?></td>
				<td class="tabel"><?php echo $row['n_induk'];?></td>
				<td class="tabel"><?php echo $row['tahun_ajaran'];?></td>
				<td class="tabel"><?php echo $row['siswa_name'];?></td>
				<td class="tabel"><?php echo $row['kelas_name'];?></td>
				<td class="tabel"><?php echo $row['jadwal_name'];?></td>
				<td class="tabel"><?php echo $row['jam_masuk'];?></td>
				<td class="tabel"><?php echo $row['scan_in'];?></td>
				<td class="tabel"><?php echo $row['terlambat'];?></td>
				<td class="tabel"><?php echo $row['jam_pulang'];?></td>
				<td class="tabel"><?php echo $row['scan_out'];?></td>
				<td class="tabel"><?php echo $row['pulang_cepat'];?></td>
				<td class="tabel"><?php echo $row['status_hadir'];?></td>
			</tr>
			<?php
			$no++;
			} 
		  } else { ?>
			<tr class="tabel"><td class="tabel" colspan="15"><font color="red"><b>DATA RINCIAN HARIAN ABSENSI SISWA BELUM TERSEDIA</b></font></td></tr>
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
        var pager = new Pager('results', <?php echo "$jt[isi_pengaturan]"; koneksi2_tutup(); //Tutup Koneksi Database Websch  ?>); 
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
			include "aplikasi/rinci_absen_pencarian.php";
		}
		?>
	