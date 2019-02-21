<h3>LAPORAN SPP</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="spp_laporan.php">Laporan</a></div>
		</div>	

		<?php
		// Ambil Data POST dari Form spp_laporan_bulanan
			$bln_thn_temp=explode("-",$_POST['bln_thn']);
			$bln=$bln_thn_temp[0];
			$thn=$bln_thn_temp[1];
		//Array Nama Bulan
			$bulan=array("Januari","Februari", "Maret", "April","Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
			$namabulan=$bulan[$bln-1];
			
		// Form Inputan SPP diisi dengan NIS
		echo 	"<br/><br/><br/>
				<h2>&nbsp;&nbsp;Laporan Pembayaran SPP $namabulan $thn.</h2>
				<p>&nbsp;&nbsp;&nbsp;Berikut ini data pembayaran spp bulan $namabulan $thn.</p>
				<p>&nbsp;&nbsp;&nbsp;[<b><a href='../adminpanel/aplikasi/cetak/print_lap_spp.php?periode=$_POST[bln_thn]&tingkat=$_POST[tingkat]' target=_blank>
				Tampilan Cetak</a></b>]</p><br>";
				
		// Data Pembayaran SPP
		echo "
		<table width=100% id=results class=tabel>
		<tr>
		<th class=tabel>No</th>
		<th class=tabel>No.Induk</th>
		<th class=tabel>Nama</th>
		<th class=tabel>Kelas</th>
		<th class=tabel>Tanggal Bayar</th>
		<th class=tabel>Jumlah</th>
		</tr>";
		
			// Query Menampilkan Data
			$data_siswa=mysql_query("select * from sh_kelas , sh_siswa ,sh_byrspp where sh_kelas.id_kelas = sh_siswa.id_kelas AND 
									sh_kelas.tingkat='$_POST[tingkat]' AND
									sh_byrspp.nis = sh_siswa.nis");
			while ($isi_siswa=mysql_fetch_array($data_siswa)){
			$no++;
			
			// Perulangan untuk Query $data_spp
			$data_spp=mysql_fetch_array(mysql_query("select * from sh_byrspp , sh_spp
			where sh_byrspp.id_spp = sh_spp.id_spp AND
			sh_byrspp.nis='$isi_siswa[nis]' AND
			sh_byrspp.tgl_bayar like '$thn-$bln%'"));
			
			// Untuk Merubah Outpout Angka Int DB jadi Format Mata Uang
			$jumlah = number_format($data_spp['jumlah'],0,",", ",");
			echo "<tr>
			<td class=tabel>$no.</td>
			<td class=tabel>$isi_siswa[nis]</td>
			<td class=tabel>$isi_siswa[nama_siswa]</td>
			<td class=tabel>$isi_siswa[nama_kelas]</td>
			<td class=tabel>$data_spp[tgl_bayar]</td>
			<td class=tabel>Rp." . $jumlah. ",-</td>
			</tr>";
			} // End Of While
			echo "</table>";
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