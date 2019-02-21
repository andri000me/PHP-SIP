<?php
include "../../konfigurasi/koneksi.php";
$database="aplikasi/database/siswa.php";
?>
<h3>MASTER DATA SISWA</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontal"><a href="spp_laporan.php">Laporan</a></div>
		</div>
		
		<div class="atastabel" style="margin: 10px 10px 0 10px">
			<div class="cari">
			<form method="POST" action="siswa.php?pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>		
		</div>
<?php
// Jika Tahun Registrasi dipilih
if(!empty($_POST['tahun_registrasi'])) 
{
$angkatan=$_POST['tahun_registrasi'];
} else {
$angkatan=$_GET['tahun_registrasi'];
}

// Untuk menampilkan data		
		echo " <br/>
		<br><br><h2><center>Master Siswa</center></h2>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dibawah ini adalah Data master Siswa !</	p>";
		echo "<br>
		<table id=results class=tabel>
		<tr><th class=tabel>No</th>
		<th class=tabel>NIS</th>
		<th class=tabel>Nama</th>
		<th class=tabel>Tempat, Tgl Lahir</th>
		<th class=tabel>L/P</th>
		<th class=tabel>Kelas</th>";

//Relasi database
$no = 1;
$data_siswa=mysql_query("select * from sh_siswa,sh_kelas where tahun_registrasi='$angkatan' AND sh_siswa.id_kelas = sh_kelas.id_kelas  ORDER BY nama_siswa ASC");
while ($isi_siswa=mysql_fetch_array($data_siswa)){
		echo "<tr>
		<td class=tabel>$no</td>
		<td class=tabel align=left>$isi_siswa[nis]</td>
		<td class=tabel align=left width=25%>$isi_siswa[nama_siswa]</td>
		<td class=tabel align=left>$isi_siswa[tempat_lahir], $isi_siswa[tanggal_lahir]</td>
		<td class=tabel align=left >$isi_siswa[jenkel]</td>
		<td class=tabel align=left >$isi_siswa[nama_kelas]</td>";
		$no++;
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