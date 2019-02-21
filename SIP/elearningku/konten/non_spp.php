<?php
include "../adminpanel/aplikasi/database/koneksi_absensi_websch.php";
?>
<div class="panel panel-primary">
<div class="panel-heading">
	<h1  class="panel-title">Rincian Pemabyaran NON SPP</h1>
</div>
<div class="panel-body">

<?php



// Data Pembayaran SPP
			// Table Paging Masih Bermasalah - Setiap Pindah Pages Halaman Awal Pages naik Keatas Table Header !
		echo "
		<div class=table-responsive>
		<table id=results class=table>
				<tr bgcolor=#3498db  width=100%>
				<th class=tabel rowspan=2>No</th>
				<th class=tabel rowspan=2 align=center>No. Induk</th>
				<th class=tabel rowspan=2 align=left>Nama</th>
				<th class=tabel rowspan=2 >Kelas</th>
				<th class=tabel colspan=12 align=center>Jenis Iuran</th>
				</tr>
				<tr bgcolor=#dedede valign=top>";
				
				// Mengambil Data Jenis Tagihan
				$data_nonspp=mysql_query("select * from sh_nonspp , sh_kelas , sh_siswa , sh_ortu where 
										  sh_nonspp.tingkat = sh_kelas.tingkat AND 
										  sh_kelas.id_kelas = sh_siswa.id_kelas AND
										  sh_siswa.id_siswa = sh_ortu.id_siswa AND
										  sh_ortu.id_ortu = '$_SESSION[orangtua]'");
				while ($isidata_nonspp=mysql_fetch_array($data_nonspp)) {
				
				// Merubah Format Mata Uang
				$jumlah_nonspp = number_format($isidata_nonspp['jumlah'],0,",", ",");
		
		echo " <th bgcolor=#e9594a class=tabel width=20% align=center><font color=#ecf0f1>$isidata_nonspp[jenis_tagihan] <br> Rp." . $jumlah_nonspp. ",- </font></th>";
		
		} // End Of While
				
		echo " </tr>";
		
			// Query Menampilkan Data
			$data_siswa=mysql_query("select * from sh_kelas , sh_siswa , sh_ortu where 
										  sh_kelas.id_kelas = sh_siswa.id_kelas AND
										  sh_siswa.id_siswa = sh_ortu.id_siswa AND
										  sh_ortu.id_ortu = '$_SESSION[orangtua]'");
			//Perulangan $data_siswa						
			while ($isi_siswa=mysql_fetch_array($data_siswa)){
			$noo++;
			
			echo "<tr valign=top>
					<td class=tabel width=7%>$noo.</td>
					<td class=tabel align=center>$isi_siswa[nis]</td>
					<td class=tabel align=left >$isi_siswa[nama_siswa]</td>
					<td class=tabel align=left >$isi_siswa[tingkat] - $isi_siswa[nama_kelas]</td>";
					
			//Select data sh_nonspp dengan kondisi thn_ajaran & tingkat sama dengan variable POST diatas
			$data_nonspp2=mysql_query("select * from sh_nonspp , sh_kelas , sh_siswa , sh_ortu where 
										  sh_nonspp.tingkat = sh_kelas.tingkat AND 
										  sh_kelas.id_kelas = sh_siswa.id_kelas AND
										  sh_siswa.id_siswa = sh_ortu.id_siswa AND
										  sh_ortu.id_ortu = '$_SESSION[orangtua]'");
			
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
			  
			
			
			echo "</tr>";
			echo "</table></div>";
			}
			// Pengambilan alamat link get untuk halaman cetak
echo	"<a href='../elearning/konten/cetak/print_lap_nonspp_ortu.php?tahun=$_POST[bln_thn]&tingkat=$_POST[tingkat]&orangtua=$_SESSION[orangtua]' target=_blank>
		 <img class='img-responsive' src='konten/cetak/ico-printer.png' width='40px' style=float:right;/></a>";

		?>
		
</div>
</div>