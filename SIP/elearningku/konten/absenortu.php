<?php 
include "../adminpanel/aplikasi/database/koneksi_absensi_websch.php";

# Deklarasi variabel
$filterSQL = ""; 
$tglAwal	= ""; 
$tglAkhir	= "";

# Membaca tanggal dari form, jika belum di-POST formnya, maka diisi dengan tanggal sekarang
$tglAwal 	= isset($_POST['cmbTglAwal']) ? $_POST['cmbTglAwal'] : "01-".date('m-Y');
$tglAkhir 	= isset($_POST['cmbTglAkhir']) ? $_POST['cmbTglAkhir'] : date('d-m-Y');?>

<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">Absensi Siswa Keseluruhan</h3></div>
<div class="panel-body">
<form method="POST" class="form-horizontal text-left" action="?p=absenortu_tanggal">
<h3>Pencarian Data Absensi Anak Per Tanggal</h3>
<br />
<div class="row">
    <div class="col-sm-2">Pilih Tanggal</div>
    <div class="col-sm-3"><input value="<?php echo $tglAwal?>" type="text" class="tcal form-control" name="awal" id="tanggal"/></div>
	<div class="col-md-1">s/d</div>
	<div class="col-md-3"><input value="<?php echo $tglAkhir?>" type="text" class="tcal form-control" name="akhir" id="tanggal1"/></div>
</div>
<br />
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-3"><input type="submit" class="btn btn-primary" value="Tampil Data"/></form></div>
</div>
<br />
<br />
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-3 text-left">
	<form method="POST" action="?p=absenortu"><input type="submit" class="btn btn-primary" value="Tampilkan Semua Data"/></form>
	</div>
    <div class="col-md-1"></div>
    <div class="col-md-3 text-right">
    <form method="POST" action="?p=absenortu_status" class="form-horizontal">     
        <select class="form-control text-center" name="hadir" onchange="this.form.submit()">
					<option value="" selected>-Pilih Status Kehadiran-</option>
					<option value ="Hadir">Hadir</option>
					<option value ="Tidak Hadir">Tidak Hadir</option>
        </select>
    </div>
</div>
</form>    
<!-- Pencarian Berdasarkan Kelas -->

	
			<!-- Tabel Pencarian -->
                        
<!-- Pencarian Berdasarkan Kelas -->
       <br/>
       <div class="table-responsive">
		<table cellspacing="1" cellpadding="1" class="table" id="results" style="font-size: 12px;">
			<tr  bgcolor="#3498db"  width="80%">
				<th class="tabel" width="25px"> <font color="white">NO</font></th>
				<th class="tabel"><font color="white">TANGGAL</font></th>
				<th class="tabel" width="5px"><font color="white">NO INDUK</font></th>
				<th class="tabel"><font color="white">NAMA SISWA </font></th>
				<th class="tabel"><font color="white">KELAS</font></th>
				<th class="tabel"><font color="white">JADWAL KELAS</font></th>
				<th class="tabel"><font color="white">JAM MASUK</font></th>
				<th class="tabel"><font color="white">SCAN MASUK</font></th>
				<th class="tabel"><font color="white">TERLAMBAT</font></th>
				<th class="tabel"><font color="white">JAM PULANG</font></th>
				<th class="tabel"><font color="white">SCAN PULANG</font></th>
				<th class="tabel"><font color="white">STATUS KEHADIRAN</font></th>
			</tr>

		<?php
				//Buka Koneksi Websch
				koneksi2_buka();
				if ($_SESSION['orangtua']){ 
				// Menenetukan Login Orangtua
				$orangtua=mysql_query("SELECT sh_siswa.id_siswa FROM sh_ortu , sh_siswa where sh_ortu.id_siswa = sh_siswa.id_siswa and sh_ortu.id_ortu = '$_SESSION[orangtua]'");
				$ot=mysql_fetch_array($orangtua);
				} 
				koneksi2_tutup();
				
				//Buka Koneksi Database Absensi
			    koneksi1_buka();
				$no=1;
				$absen=mysql_query("SELECT hari,scan_date,result_proc.n_induk,tahun_ajaran,result_proc.siswa_name,kelas_name,jadwal_name,jam_masuk,scan_in,terlambat,jam_pulang,scan_out,pulang_cepat,status_hadir 
									FROM result_proc , siswa where result_proc.siswa_name = siswa.siswa_name AND result_proc.siswa_id = '$ot[id_siswa]' ORDER BY `result_proc`.`scan_date` DESC");
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
	</div><!--panel-default-->
 </div><!--panel-body-->    