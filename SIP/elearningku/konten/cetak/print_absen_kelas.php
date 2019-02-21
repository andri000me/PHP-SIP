<?php 
	include "../../../adminpanel/aplikasi/database/koneksi_absensi_websch.php";
	include "../../inc.library.php";
	
 // Define relative path from this script to mPDF
 $nama_dokumen='Jadwal Mengajar'; //Beri nama file PDF hasil.
define('_MPDF_PATH','MPDF57/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>
<!-- Pencarian Berdasarkan Kelas -->
       <br/>
       <div class="table-responsive">
	   <h2 align="center">Laporan Absensi Siswa</h2>
	   <?php
				//Buka Koneksi Database Absensi
			    koneksi1_buka();
				$noinduk = $_GET['nis'];
				$tanggal_awal = $_GET['tglAwal'];
				$tanggal_akhir = $_GET['tglAkhir'];
				$no=1;
				echo"Tanggal : $tanggal_awal s/d $tanggal_akhir";?>
				<hr/>
		<table border="1" cellspacing="1" cellpadding="1" class="table" id="results" style="font-size: 12px;">
			<tr  style="background:#337ab7;">
				<td> <font color="white"> NO </font> </td>
				<td> <font color="white">TANGGAL </font></td>
				<td> <font color="white">NO INDUK </font></td>
				<td> <font color="white">NAMA SISWA </font></td>
				<td> <font color="white">KELAS </font></td>
				<td> <font color="white">JADWAL KELAS </font></td>
				<td> <font color="white">JAM MASUK </font></td>
				<td> <font color="white">SCAN MASUK </font></td>
				<td> <font color="white">TERLAMBAT </font></td>
				<td> <font color="white">JAM PULANG </font></td>
				<td> <font color="white">SCAN PULANG </font></td>
				<td> <font color="white">STATUS KEHADIRAN </font></td>
			</tr>
			
		<?php
				$absen=mysql_query("SELECT hari,scan_date,result_proc.n_induk,tahun_ajaran,result_proc.siswa_name,kelas_name,jadwal_name,jam_masuk,scan_in,terlambat,jam_pulang,scan_out,pulang_cepat,status_hadir FROM result_proc , siswa where result_proc.n_induk ='$noinduk' and result_proc.scan_date between '".InggrisTgl($tanggal_awal)."' and '".InggrisTgl($tanggal_akhir)."' AND result_proc.siswa_name = siswa.siswa_name order by result_proc.scan_date desc")or die("ERRORDBSQL".mysql_error());
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
				<td class="tabel"><?php echo $tanggal;?></td>

				<td class="tabel"><?php echo $row['n_induk'];?></td>
				<td class="tabel"><?php echo $row['siswa_name'];?></td>
				<td class="tabel"><?php echo $row['kelas_name'];?></td>
				<td class="tabel"><?php echo $row['jadwal_name'];?></td>
				<td class="tabel"><?php echo $row['jam_masuk'];?></td>
				<td class="tabel"><?php echo $row['scan_in'];?></td>
				<?php if($row['terlambat']=="" AND $row['status_hadir']=="Hadir") { ?>
				<td class="tabel">0 MENIT</td>
				<?php } else { ?>
				<td class="tabel"><font color="red"><b><?php echo $row['terlambat'];?></b></font></td> <?php } ?>
				<td class="tabel"><?php echo $row['jam_pulang'];?></td>
				<td class="tabel"><?php echo $row['scan_out'];?></td>
				<?php if($row['status_hadir']=="Tidak Hadir") { ?>
				<td class="tabel"><font color="red"><b><?php echo $row['status_hadir'];?></b></font></td>
				<?php } else { ?>
				<td class="tabel"><?php echo $row['status_hadir'];?></td> <?php } ?>
			</tr>
			<?php
			$no++;
			} 
		  } else { ?>
			<tr class="tabel"><td class="tabel" colspan="15"><font color="red"><b>DATA RINCIAN HARIAN ABSENSI SISWA BELUM TERSEDIA</b></font></td></tr>
			<?php } koneksi1_tutup(); //Tutup Koneksi Database Absensi ?>
		</table>
        </div>
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
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>