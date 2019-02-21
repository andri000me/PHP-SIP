<h3>Absensi Siswa</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="absen_siswa.php">Log Absensi</a></div>
			<div class="menuhorisontal"><a href="rincian_hari.php">Rincian Absensi Harian</a></div>
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
			<tr><td class="isiankanan" width="250px">Pilih Tanggal</td><td class="isian"><input type="text" class="pencarian" name="awal" id="tanggal" value = "<?php echo $_POST['awal'];  ?>" >&nbsp;s/d&nbsp;&nbsp;&nbsp;<input type="text" class="pencarian" name="akhir" id="tanggal1" value = "<?php echo $_POST['akhir'];  ?>" >
			</td></tr>
			<tr><td class="isiankanan" width="250px">No Induk Siswa</td><td class="isian"><input type="text" class="pencarian" name="noinduk" id="noinduk" value = "<?php echo $_POST['noinduk'];  ?>" ></tr>
			<tr><td class="isiankanan" width="250px"> </td><td class="isian"> <input type="submit" class="batal" value="Tampil Data"> </td></tr>
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
				<th class="tabel">Tanggal Scan Absen</th>
				<th class="tabel">Waktu Scan Absen</th>
				<th class="tabel">No Induk</th>
				<th class="tabel">NISN</th>
				<th class="tabel">Nama Siswa</th>
				<th class="tabel">Jenis Kelamin</th>
				<th class="tabel" width="100px">Keterangan</th>
			</tr>
			
			<?php
				//Buka Koneksi Database Absensi
			    koneksi1_buka();
				$noinduk = $_POST['noinduk'];
				$tanggal_awal = $_POST['awal'];
				$tanggal_akhir = $_POST['akhir'];
				$no=1;
				$absen=mysql_query("SELECT * FROM siswa , att_log WHERE att_log.pin = siswa.pin and siswa.n_induk ='$noinduk' and att_log.scan_date between '$tanggal_awal' and '$tanggal_akhir' order by att_log.scan_date desc");
				$cek_absen=mysql_num_rows($absen);
				
				if($cek_absen > 0){
				while($row=mysql_fetch_array($absen)){
				
				 // Untuk menampilakan data gender yang berasal dari database 
				   if($row['gender']=="0")
					{
					$jenis = "Laki - Laki";
					}
					else $jenis = "Perempuan";	
					
					if($row['io_mode']=="0")
					{
					$mode = "Masuk";
					}
					else $mode= "Pulang";
					
					
					// explode di gunakan untuk memisahkan data per kata
					$datetime = $row['scan_date'];
					$arr_tanggaljam = explode (" ",$datetime);
					$tanggal = $arr_tanggaljam[0];
					$jam	 = $arr_tanggaljam[1];
				?>
				<tr class="tabel">
				<td class="tabel"><?php echo $no;?></td>
				<td class="tabel"><?php echo $tanggal;?></td>
				<td class="tabel"><?php echo $jam;?></td>
				<td class="tabel"><?php echo $row['n_induk'];?></td>
				<td class="tabel"><?php echo $row['nisn'];?></td>
				<td class="tabel"><?php echo $row['siswa_name'];?></td>
				<td class="tabel"><?php echo $jenis;?></td>
				<td class="tabel"><?php echo $mode;?></td>
			</tr>
			<?php
			$no++;
			} 
		  } else { ?>
			<tr class="tabel"><td class="tabel" colspan="8"><font color="red"><b>DATA ABSENSI SISWA BELUM TERSEDIA</b></font></td></tr>
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
        var pager = new Pager('results', <?php echo "$jt[isi_pengaturan]"; koneksi2_tutup(); //Tutup Koneksi Database Websch ?>); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
		</div>
		
</div><!--Akhir class isi kanan-->