<h3>MASTER DATA SISWA</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontal"><a href="spp_laporan.php">Laporan</a></div>
		</div>
		<br/>
		<br/>
		<h2 align="left">&nbsp;&nbsp;&nbsp;Set Tahun Angkatan</h2>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk menambah atau merubah Data Siswa. Silahkan tentukan terlebih dahulu tahun angkatan masuk!</p>
		<form name="f1" method="post" action="?pilih=spp_master_siswa">
		<table style="margin: 3px 0 3px 0;">
		<th>Angkatan</th><td>				
		<select name="tahun_registrasi" onChange="this.form.submit()">
		<option value="" selected>-Pilih Tahun Angkatan-</option>
			<?php
				$tampilangkatan=mysql_query("SELECT DISTINCT tahun_registrasi as tahun FROM sh_siswa ORDER BY tahun_registrasi");
				while($tk=mysql_fetch_array($tampilangkatan)){
				echo "<option value='$tk[tahun]'>$tk[tahun]</option>";}
			?>
		</select>
		</td>
		<!--<tr align=Left><td><input name=simpan class=submit  type=submit value=OK></td></tr>-->
		</table>
	  </form>
	</div><!--Akhir class isi kanan-->
	