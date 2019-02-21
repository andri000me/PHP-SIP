<h3>MASTER DATA NON SPP</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontal"><a href="spp_laporan.php">Laporan</a></div>
		</div>	

		<?php

			if (!empty($_POST['thn_ajaran'])) 
			{
			$thn_ajaran=$_POST['thn_ajaran'];
			$tingkat=$_POST['tingkat'];
			} else {
			$thn_ajaran=$_GET['thn_ajaran'];
			$tingkat=$_GET['tingkat'];
			}
			
		// untuk menampilkan data
		echo 
				"<br/><br/><br/>
				<center><h2>Master NON SPP</h2></center>
				<p>&nbsp;&nbsp;&nbsp;Dibawah ini adalah data master tagihan SPP <u>Tahun Ajaran $thn_ajaran Tingkat $tingkat</u> !</p>
				<p>&nbsp;&nbsp;&nbsp;[<b><a href=?pilih=sppnon_form_iuran&module=tambah&thn_ajaran=$thn_ajaran&tingkat=$tingkat>Tambah</a></b>]</p><br>
				<table id=results class=tabel>
				<tr>
				<th class=tabel>No</th>
				<th class=tabel>Jenis tagihan</th>
				<th class=tabel align=right>Jumlah</th>
				<th class=tabel align=center>Proses</th>
				</tr>";
				
		$data_tagihan=mysql_query("select * from sh_nonspp where thn_ajaran = '$thn_ajaran' and tingkat = '$tingkat' ");
		while ($isi_tagihan=mysql_fetch_array($data_tagihan)){
		$no++;
		//Untuk Merubah Outpout Angka Int DB jadi Format Mata Uang
		$jumlah_tagihan = number_format($isi_tagihan['jumlah'],0,",", ",");
		echo   "<tr>
				<td class=tabel>$no.</td>
				<td class=tabel align=left>$isi_tagihan[jenis_tagihan]</td>
				<td class=tabel align=right>Rp." . $jumlah_tagihan. ",-</td>
				<td class=tabel align=center>
				[<a href=?pilih=sppnon_form_iuran&module=edit&id=$isi_tagihan[id_tagihan]> Edit </a>] | 
				[<a href=?pilih=sppnon_form_iuran&act=hapus&id=$isi_tagihan[id_tagihan]> Hapus </a>] </td></tr>";
				
		$total=$total+$isi_tagihan['jumlah'];
		//Untuk Merubah Outpout Angka Int DB jadi Format Mata Uang
		$total_tagihan = number_format($total,0,",", ",");
		}
		echo "<tr><th class=tabel align=center colspan=2>Total tagihan</th>
				  <th class=tabel align=right>Rp." . $total_tagihan. ",-</th>
				  <th class=tabel >&nbsp;</th></tr>
			</table>";

		?>
<div id="pageNavPosition"></div>
<script type="text/javascript"><!--
var pager = new Pager('results', 10); 
pager.init(); 
pager.showPageNav('pager', 'pageNavPosition'); 
pager.showPage(1);
//--></script>
	
</div>