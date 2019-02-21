<?php include "../adminpanel/aplikasi/database/koneksi_absensi_websch.php";?>
<?php 
$filter="";
$tgl_awal=$_GET['awal'];
$tgl_akhir=$_GET['akhir'];

$tgl_awal 	= isset($_POST['awal']) ? $_POST['awal'] : date('d-m-Y');
$tgl_akhir 	= isset($_POST['akhir']) ? $_POST['akhir'] : date('d-m-Y');

// Jika tombol filter tanggal (Tampilkan) diklik
if (isset($_POST['btnTampil'])) {
	// Membuat sub SQL filter data berdasarkan 2 tanggal (periode)
	$filter = "WHERE ( scan_date BETWEEN '".InggrisTgl($tgl_awal)."' AND '".InggrisTgl($tgl_akhir)."' AND n_induk ='$_POST[no_induk]')";
}
else {
	// Membaca data tanggal dari URL, saat menu Pages diklik
	
	// Membuat sub SQL filter data berdasarkan 2 tanggal (periode)
	$filter = "";
}
?>
<div class="panel panel-default">
<div class="panel-heading"  style="background: #5bc0de;"><h3 class="panel-title">Absensi Siswa Keseluruhan</h3></div>
<div class="panel-body">
<form method="POST" class="form-horizontal text-left" action="?p=absengurukelas" target="">
<h3>Pencarian Data Absensi</h3><br />
<div class="row">
    <div class="col-sm-2">Pilih Tanggal</div>
    <div class="col-sm-4"><input type="text" class="tcal form-control" name="awal" id="tanggal"/>
	<p class="text-center">s/d</p>
	<input type="text" class="tcal form-control" name="akhir" id="tanggal1"/></div>
    <div class="col-sm-2 text-center"></div>
    <div class="col-sm-4"></div>
</div>
<br />
<div class="row">
    <div class="col-sm-2">No.Induk Siswa</div>
    <div class="col-sm-4"><input type="text" class="form-control" name="noinduk" id="noinduk"/></div>
    <div class="col-sm-6"></div>        
</div>
<br />
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4"><input type="submit" class="btn btn-primary" value="Tampil Data" name="btnTampil"/></form></div>
    <div class="col-md-2 text-right"></div>
    <div class="col-md-4 text-right">
    <form method="POST" action="?p=pencariankelas">     
        <select class="form-control text-center" name="kelas" onchange="this.form.submit()">
					<option value="" selected="">-Tampil Berdasarkan Kelas-</option>
					<?php
					koneksi2_buka();
					$tampilkelas=mysql_query("SELECT * FROM sh_kelas");
					while($tk=mysql_fetch_array($tampilkelas)){
					echo "<option value='$tk[id_kelas]'>$tk[nama_kelas]</option>";}
					koneksi2_tutup();
					?>
        </select>
    </div>
</div>
</form>    
<!-- Pencarian Berdasarkan Kelas -->

	
			<!-- Tabel Pencarian -->
                        
<!-- Pencarian Berdasarkan Kelas -->
       <br/>
       <div class="table-responsive">
		<table cellspacing="1" cellpadding="1" class="table" id="results">
			<tr  style="background:#337ab7;">
				<td>No</td>
				<td>Tanggal</td>
				<td>No Induk</td>
				<td>Nama Siswa</td>
				<td>Kelas</td>
				<td>Jadwal Kelas</td>
				<td>Jam Masuk</td>
				<td>Terlambat</td>
				<td>Jadwal Pulang</td>
				<td>Jam Pulang</td>
				<td>Status Kehadiran</td>
			</tr>

		<?php
				//Buka Koneksi Database Absensi
			    koneksi1_buka();
				$no=1;
				$absen=mysql_query("SELECT * FROM result_proc $filter")or die("MYSQLERROR".mysql_error());
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
				<td class="tabel"><?php echo IndonesiaTgl($tanggal);?></td>
				<td class="tabel"><?php echo $row['n_induk'];?></td>
				<td class="tabel"><?php echo $row['siswa_name'];?></td>
				<td class="tabel"><?php echo $row['kelas_name'];?></td>
				<td class="tabel"><?php echo $row['jadwal_name'];?></td>
				<td class="tabel"><?php echo $row['jam_masuk'];?></td>
				<td class="tabel"><?php echo $row['terlambat'];?></td>
				<td class="tabel"><?php echo $row['jam_pulang'];?></td>
				<td class="tabel"><?php echo $row['scan_out'];?></td>
				
				<td class="tabel"><?php echo $row['status_hadir'];?></td>
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
	</div><!--panel-default-->
 </div><!--panel-body-->    