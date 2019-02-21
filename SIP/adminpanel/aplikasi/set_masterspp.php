<h3>MASTER DATA SPP</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontal"><a href="spp_laporan.php">Laporan</a></div>
		</div>
<?php
 // Untuk menampilkan data
	echo "<br/><br/><br/>
		<center><h2>Master SPP</h2></center>
		<p>&nbsp;&nbsp;&nbsp;Dibawah ini adalah data master tagihan SPP !</p>
		
		<p>&nbsp;&nbsp;&nbsp;<b>[<a href=?pilih=spp_form&module=tambah>Tambah</a>]</b></p><br>
		<table id=results class=tabel>
		<tr><th class=tabel>No</th>
		<th class=tabel>Tahun Ajaran</th>
		<th class=tabel>Tingkat</th>
		<th class=tabel>Jumlah</th>
		<th class=tabel>Proses</th></tr>";
		$data_spp=mysql_query("select * from sh_spp order by thn_ajaran desc");

while ($isi_spp=mysql_fetch_array($data_spp)){
$no++;
//Untuk Merubah Outpout Angka Int DB jadi Format Mata Uang
$jumlah = number_format($isi_spp['jumlah'],0,",", ",");
		echo "<tr>
		<td class=tabel>$no.</td>
		<td class=tabel>$isi_spp[thn_ajaran]</td>
		<td class=tabel>$isi_spp[tingkat]</td>
		<td class=tabel>Rp." . $jumlah. ",-</td>
		<td class=tabel>[<a href=?pilih=spp_form&module=edit&id=$isi_spp[id_spp]> Edit </a>] | [<a href=?pilih=spp_form&act=hapus&id=$isi_spp[id_spp]> Hapus </a>] </td></tr>";
}
echo "</table>";

?>
<div id="pageNavPosition"></div>
<script type="text/javascript"><!--
var pager = new Pager('results', 10); 
pager.init(); 
pager.showPageNav('pager', 'pageNavPosition'); 
pager.showPage(1);
//--></script>

</div><!--Akhir class isi kanan-->
	
	
		