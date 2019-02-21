<html>
<head>
<title>Rekap Tunggakan Non SPP</title>
<link rel="stylesheet" href="css/style_print.css" type="text/css"/>
</head>
<body>
<?php
//Mengambil Koneksi
include('config/koneksi.php');
// Mengambil Method Dari $_GET
$tahun = $_GET['tahun'];
$tingkat = $_GET['tingkat'];
//banyaknya jenis tagihan
$jml_data_nonspp=mysql_num_rows(mysql_query("select * from sh_nonspp where thn_ajaran='$tahun' and tingkat='$tingkat'"));
$total_tagihan=mysql_fetch_array(mysql_query("select sum(jumlah) as jml from sh_nonspp where thn_ajaran='$tahun' and tingkat='$tingkat' "));

echo "<div class=\"sd_left\">
		<div class=\"text_padding\">
		<p align=center><a href =# onclick='window.print()' title=Print style=text-decoration:none> <img src=ico-printer.png width=75 height=75> </a> </p>
		<h2 align=center>Laporan Rekapitulasi Pembayaran Non SPP Tahun $tahun Tingkat $tingkat.</h2>
		<p align=center>Berikut ini laporan rekapitulasi pembayaran Non SPP tahun $tahun Tingkat $tingkat.</p>
		<table width=100% border=1 cellpading=0 cellspacing=0 class=table2>
		<tr bgcolor=#dedede >
		<th rowspan=2>No</th>
		<th rowspan=2>No.Induk</th>
		<th rowspan=2>Nama</th>
		<th rowspan=2>Kelas</th> ";
		
	// Merubah Format Mata Uang
	$total_tagih = number_format($total_tagihan['jml'],0,",", ",");	
	
echo  "<th colspan=$jml_data_nonspp>Tagihan Keuangan Non SPP = Rp." . $total_tagih. ",- </th>
		<th rowspan=2 >Total Bayar</th>
		<th rowspan=2 >Total Tunggakan</th>
		</tr>
		<tr bgcolor=#dedede valign=top>";
		
	// Mengambil Data Jenis Tagihan	
	$data_nonspp=mysql_query("select * from sh_nonspp where thn_ajaran='$tahun' and tingkat='$tingkat'");
	
	while ($isidata_nonspp=mysql_fetch_array($data_nonspp)) { 
	// Merubah Format Mata Uang
	$tagihan_jumlah = number_format($isidata_nonspp['jumlah'],0,",", ",");	
	echo "<th width=10%>$isidata_nonspp[jenis_tagihan] <br> Rp." . $tagihan_jumlah. ",- "; }
	echo "</tr>";
		
		// Mencari Data sesuai Tingkat 
		$data_siswa = mysql_query("select * from sh_kelas , sh_siswa where sh_kelas.id_kelas = sh_siswa.id_kelas AND 
											sh_kelas.tingkat='$tingkat'");
		// Perulangan Dari $data_siswa										
		while ($isi_siswa=mysql_fetch_array($data_siswa)){
		$no++;

		echo " <tr valign=center>
				<td align=center width=7%>$no.</td>
				<td align=center width=10%>$isi_siswa[nis]</td>
				<td align=left width=20%>$isi_siswa[nama_siswa]</td>
				<td align=center>$isi_siswa[tingkat] - $isi_siswa[nama_kelas]</td> ";
			
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
			echo "<td align=left> Bayar = Rp." . $jumlah_byr. ",- <br> Sisa = Rp." . $sisa_jumlah. ",- </td>";} else {
			echo "<td align=left> Blm Bayar <br> Sisa = Rp." . $sisa_jumlah. ",- </td>";
			   
			   } // End Else			
				
			} // End Of While
			
		// Total Bayar
		$total_bayar=mysql_fetch_array(mysql_query("SELECT sh_byrnonspp.nis , SUM( sh_byrnonspp.jumlah ) AS jml , sh_nonspp.thn_ajaran
													FROM sh_byrnonspp , sh_nonspp
													WHERE nis ='$isi_siswa[nis]' AND
													sh_byrnonspp.id_tagihan = sh_nonspp.id_tagihan AND
													thn_ajaran = '$tahun'
													GROUP BY sh_byrnonspp.nis"));

		$totalsisa=$total_tagihan[jml]-$total_bayar[jml];
		
		if (empty($total_bayar[jml])) {$totalbayar='0';} else {$totalbayar=$total_bayar[jml];} 
		echo "<td align=right>Rp .".number_format($totalbayar,0,",", ",")."</td>";
		echo "<td align=right>Rp .".number_format($totalsisa,0,",", ",")."</td>";
		echo "</tr>";
		
		$totalkolombayar=$totalkolombayar+$total_bayar['jml'];
		$totalkolomsisa=$totalkolomsisa+$totalsisa;
		
	} // End Of While
	
		$jml_kol_dinamis=$jml_data_nonspp;
		$mergekolom=$jml_kol_dinamis+4;
		echo "<tr><td colspan=$mergekolom align=right><b>JUMLAH</b></td>
				  <td align=right><b>Rp. ".number_format($totalkolombayar,0,",", ",")."</b></td>
				  <td align=right><b>Rp. ".number_format($totalkolomsisa,0,",", ",")."</b></td>
			  </tr>";			
		echo "</table>
		   </div>
		</div>";
	?>
</body>
</html>