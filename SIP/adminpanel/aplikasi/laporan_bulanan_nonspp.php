<h3>LAPORAN NON SPP</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="spp_laporan.php">Laporan</a></div>
		</div>	

		<?php
		// Ambil Data POST dari Form sppnon_laporan
			$tahun = $_POST['tahun'];
			$tingkat = $_POST['tingkat'];
			
		// Form Inputan SPP diisi dengan NIS
		echo 	"<br/><br/><br/>
				<h2>&nbsp;&nbsp;Laporan Rekapitulasi Pembayaran Non SPP Tahun $tahun.</h2>
				<p>&nbsp;&nbsp;&nbsp;Berikut ini laporan rekapitulasi pembayaran Non SPP tahun $tahun tingkat $tingkat.</p>
				<p>&nbsp;&nbsp;&nbsp;[<b><a href='../adminpanel/aplikasi/cetak/print_lap_nonspp.php?tahun=$tahun&tingkat=$tingkat' target=_blank>
				Tampilan Cetak</a></b>]</p><br>";
				
		// Data Pembayaran SPP
			// Table Paging Masih Bermasalah - Setiap Pindah Pages Halaman Awal Pages naik Keatas Table Header !
		echo "<table width=100% class=tabel>
				<tr>
				<th class=tabel rowspan=2>No</th>
				<th class=tabel rowspan=2 align=center>No. Induk</th>
				<th class=tabel rowspan=2 align=left>Nama</th>
				<th class=tabel rowspan=2 >Kelas</th>
				<th class=tabel rowspan=2 >Detail Pembayaran</th>
				<th class=tabel colspan=12 align=center>Jenis Iuran</th>
				</tr>
				<tr bgcolor=#dedede valign=top>";
				
				// Mengambil Data Jenis Tagihan
				$data_nonspp=mysql_query("select * from sh_nonspp where thn_ajaran='$tahun' and tingkat='$tingkat'");
				while ($isidata_nonspp=mysql_fetch_array($data_nonspp)) {
				
				// Merubah Format Mata Uang
				$jumlah_nonspp = number_format($isidata_nonspp['jumlah'],0,",", ",");
		
		echo " <th class=tabel width=20%>$isidata_nonspp[jenis_tagihan] <br> Rp." . $jumlah_nonspp. ",-</th>";
		
		} // End Of While
				
		echo " </tr>";
		
			// Query Menampilkan Data
			$data_siswa=mysql_query("select * from sh_kelas , sh_siswa where sh_kelas.id_kelas = sh_siswa.id_kelas AND 
									sh_kelas.tingkat='$tingkat'");
			//Perulangan $data_siswa						
			while ($isi_siswa=mysql_fetch_array($data_siswa)){
			$no++;
			
			echo "<tr valign=top>
					<td class=tabel width=7%>$no.</td>
					<td class=tabel align=center>$isi_siswa[nis]</td>
					<td class=tabel align=left >$isi_siswa[nama_siswa]</td>
					<td class=tabel align=left >$isi_siswa[tingkat] - $isi_siswa[nama_kelas]</td>
					<td class=tabel align=left><a href='?pilih=detail_laporan_nonspp&nid=$isi_siswa[nis]'>Detail Pembayaran </a></td>";
					
			//Select data sh_nonspp dengan kondisi thn_ajaran & tingkat sama dengan variable POST diatas
			$data_nonspp2=mysql_query("select * from sh_nonspp where thn_ajaran='$tahun' and tingkat='$tingkat'");
			
			//Perulangan $data_nonspp2
			while ($isidata_nonspp2=mysql_fetch_array($data_nonspp2)) {
	
			//jumlah bayar
			$jmlbyr=mysql_fetch_array(mysql_query("select sum(jumlah)as jml from sh_byrnonspp where
			nis='$isi_siswa[nis]' and id_tagihan='$isidata_nonspp2[id_tagihan]' group by id_tagihan"));
			
			//besar tunggakan
			$jml_tagihan=mysql_fetch_array(mysql_query("select jumlah from sh_nonspp where id_tagihan='$isidata_nonspp2[id_tagihan]'"));
			
			//Sisa Tagihan
			$sisa=$jml_tagihan['jumlah']-$jmlbyr['jml'];
			
			// Untuk Merubah Outpout Angka Int DB jadi Format Mata Uang
			$sisa_jumlah = number_format($sisa,0,",", ",");
			$jumlah_byr = number_format($jmlbyr['jml'],0,",", ",");
			
			//jika $jmlbyr tidak sama dengan 0
			if ($jmlbyr['jml']<>0){
			echo "<td class=tabel align=left> Bayar = Rp." . $jumlah_byr. ",- <br> Sisa = Rp." . $sisa_jumlah. ",- </td>";} else {
			echo "<td class=tabel align=left> Blm Bayar <br> Sisa = Rp." . $sisa_jumlah. ",- </td>";
			    }
				
			  }
			  
			} // End Of While
			
			echo "</tr>";
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