<?php
include "../adminpanel/aplikasi/database/koneksi_absensi_websch.php";
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">Absensi Siswa Keseluruhan</h3></div>
<div class="panel-body">
<form method="POST" class="form-horizontal text-left" action="?p=absengurukelas">
<h3>Pencarian Data Absensi</h3><br />
<div class="row">
    <div class="col-sm-2">No.Induk Siswa</div>
    <div class="col-sm-3"><input class="form-control" type="text" name="noinduk" id="noinduk"/></div>
    <div class="col-sm-6"></div>        
</div>
<br />
<div class="row">
    <div class="col-sm-2">Pilih Tanggal</div>
    <div class="col-sm-3"><input type="text" class="form-control tcal" name="awal" id="tanggal"/></div>
	<div class="col-sm-1 text-center">s/d</div>
	<div class="col-sm-3"><input type="text" class="form-control tcal" name="akhir" id="tanggal1"/></div>
</div>
<br />
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-3"><input type="submit" class="btn btn-primary" value="Tampil Data"/></form></div>
</div>
<hr/>
<br/>
<br/>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-3 text-left">
	<form method="POST" class="form-horizontal" action="?p=absenguru"><input type="submit" class="btn btn-primary form-control" value="Tampilkan Semua Data"/></form>  
	</div>
    <div class="col-md-1"></div>
    <div class="col-md-3">
		<form method="POST" action="?p=pencariankelas" class="form-horizontal">     
        <select class="form-control text-center" name="kelas" onchange="this.form.submit()">
					<option value="" selected="">-Tampil Berdasarkan Kelas-</option>
					<?php
					koneksi2_buka();
					$tampilkelas=mysql_query("SELECT DISTINCT sh_kelas.nama_kelas , sh_kelas.id_kelas FROM  sh_guru_jadwal , sh_kelas  where  sh_guru_jadwal.id_kelas = sh_kelas.id_kelas");
					while($tk=mysql_fetch_array($tampilkelas)){
					echo "<option value='$tk[id_kelas]'>$tk[nama_kelas]</option>";}
					koneksi2_tutup();
					?>
        </select>
		</form>	
    </div>
</div>  
<div class="table-responsive">
		<table cellspacing="1" cellpadding="1" class="table" id="results" style="font-size: 12px;">
			<tr  style="background:#337ab7;">
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
				//Buka Koneksi Database Absensi
			    koneksi1_buka();
				$no=1;
				$absen=mysql_query("SELECT hari,scan_date,result_proc.n_induk,tahun_ajaran,result_proc.siswa_name,kelas_name,jadwal_name,jam_masuk,scan_in,terlambat,jam_pulang,scan_out,pulang_cepat,status_hadir 
									FROM result_proc , siswa where result_proc.siswa_name = siswa.siswa_name AND result_proc.kelas_id = '$_POST[kelas]' ORDER BY `result_proc`.`scan_date` DESC");
				$cek_absen=mysql_num_rows($absen);
				
				if($cek_absen > 0){
				while($row=mysql_fetch_array($absen)){				
				// explode di gunakan untuk memisahkan data per kata
				$datetime = $row['scan_date'];
				$arr_tanggaljam = explode (" ",$datetime);
				$tanggal = $arr_tanggaljam[0];
			?>
			<tr class="tabel">
				<td><?php echo $no;?></td>
				<td><?php echo $tanggal;?></td>
				<td><?php echo $row['n_induk'];?></td>
				<td><?php echo $row['siswa_name'];?></td>
				<td><?php echo $row['kelas_name'];?></td>
				<td><?php echo $row['jadwal_name'];?></td>
				<td><?php echo $row['jam_masuk'];?></td>
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
			<tr><td class="tabel" colspan="15"><font color="red"><b>DATA RINCIAN HARIAN ABSENSI SISWA BELUM TERSEDIA / KELAS BELUM DIPILIH</b></font></td></tr>
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
        var pager = new Pager('results', <?php echo "100"; koneksi2_tutup(); //Tutup Koneksi Database Websch  ?>); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
		</div>
	</div><!--Akhir class isi kanan-->
	</div>
	</div>
</div>