<h3>REKAPITULASI PEMBAYARAN SPP</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="spp_laporan.php">Laporan</a></div>
		</div>	

		<?php
		// Ambil Data POST dari Form sppnon_laporan
			$ta_temp=explode("/",$_POST['tahun']);
			$thn=$ta_temp[0];
			$thn2=$thn+1;
			
		// Form Inputan SPP diisi dengan NIS
		echo 	"<br/><br/><br/>
				<h2>&nbsp;&nbsp;Laporan Rekapitulasi Pembayaran SPP Tahun $_POST[tahun]</h2>
				<p>&nbsp;&nbsp;&nbsp;Berikut ini laporan rekapitulasi pembayaran SPP tahun $_POST[tahun].</p>
				<p>&nbsp;&nbsp;&nbsp;[<b><a href='../adminpanel/aplikasi/cetak/print_lap_rekapspp.php?tahun=$_POST[tahun]&tingkat=$_POST[tingkat]' target=_blank>
				Tampilan Cetak</a></b>]</p><br>";
				
		// Data Pembayaran SPP
			// Table Paging Masih Bermasalah - Setiap Pindah Pages Halaman Awal Pages naik Keatas Table Header !
		echo "<table width=100% cellpading=1 cellspacing=1>
				<tr bgcolor=#dedede>
				<th rowspan=2>No</th>
				<th rowspan=2 align=center>No. Induk</th>
				<th rowspan=2 align=left>Nama</th>
				<th align=center colspan=12>Tahun Ajaran $_POST[tahun]</th></tr>
				<tr bgcolor=#dedede>";
				
			//Perulangan semester ganjil
			for ($bln=7;$bln<=12;$bln++) {
			if (strlen($bln)==1) {$bln='0'.$bln;} else {$bln=$bln;}
			echo "<th align=center>$bln</th>";
			}
			
			//Perulangan semester genap
			for ($bln2=1;$bln2<=6;$bln2++) {
			if (strlen($bln2)==1) {$bln2='0'.$bln2;} else {$bln2=$bln2;}
			echo "<th align=center>$bln2</th>";
			}
			
		echo "</tr>";
		
			// Query Menampilkan Data Siswa dengan Relasi Kelas berdasarkan "Tingkat"
			$data_siswa=mysql_query("select * from sh_kelas , sh_siswa where sh_kelas.id_kelas = sh_siswa.id_kelas AND 
									sh_kelas.tingkat='$_POST[tingkat]'");
			//Perulangan $data_siswa						
			while ($isi_siswa=mysql_fetch_array($data_siswa)){
			$no++;
			
			echo "<tr valign=top>
					<td class=tabel width=7%>$no.</td>
					<td class=tabel align=center>$isi_siswa[nis]</td>
					<td class=tabel align=left >$isi_siswa[nama_siswa]</td>";
			
			// Isi Data Perulangan semester ganjil
			for ($blnspp=7;$blnspp<=12;$blnspp++) {
				if (strlen($blnspp)==1) {$blnspp='0'.$blnspp;} else {$blnspp=$blnspp;}
				$data_spp=mysql_fetch_array(mysql_query("select * from sh_byrspp 
				where nis='$isi_siswa[nis]'
				and tgl_bayar like '$thn-$blnspp%'"));
				$tgl_temp=explode("-",$data_spp['tgl_bayar']);
				echo "<td class=tabel align=center>$tgl_temp[2]</td>";
				}

			// Isi Data Perulangan semester genap
			for ($blnspp2=1;$blnspp2<=6;$blnspp2++) {
				if (strlen($blnspp2)==1) {$blnspp2='0'.$blnspp2;} else {$blnspp2=$blnspp2;}
				$data_spp=mysql_fetch_array(mysql_query("select * from sh_byrspp 
				where nis='$isi_siswa[nis]'
				and tgl_bayar like '$thn2-$blnspp2%'"));
				$tgl_temp2=explode("-",$data_spp['tgl_bayar']);
				echo "<td class=tabel align=center>$tgl_temp2[2]</td>";
				}

				echo "</tr>";
			  
			} // End Of While
			
			echo "</table> <br>";
			echo "&nbsp;&nbsp;&nbsp;Catatan : kolom kosong berarti belum melakukan Pembayaran SPP.";
		?>
		<!-- Paging -->
		<div id="pageNavPosition"></div>
		<script type="text/javascript"><!--
		var pager = new Pager('results', 10); 
		pager.init(); 
		pager.showPageNav('pager', 'pageNavPosition'); 
		pager.showPage(1);
		//--></script>
	</div>