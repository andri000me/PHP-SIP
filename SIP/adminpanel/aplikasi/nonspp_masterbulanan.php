<h3>TRANSAKSI NON SPP</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="spp.php">Master</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontal"><a href="spp_laporan.php">Laporan</a></div>
		</div>	

		<?php
		// Ambil Data POST dari Form spp_bulanan
			if (!empty($_POST['tgl_bayar'])) {
			$tanggal=$_POST['tgl_bayar']; 
			$tahun=$_POST['tahun'];
			$tingkat=$_POST['tingkat'];
			} else {
			$tanggal=$_GET['tgl_bayar']; 
			$tahun=$_GET['tahun'];
			$tingkat = $_GET['tingkat'];
			}
			
		// Form Inputan NON SPP diisi dengan nis - jenis - jumlah
		echo 	"<br/><br/><br/>
				<h2>&nbsp;&nbsp;Pembayaran Tanggal NON SPP Tanggal : $tanggal</h2>
				<p>&nbsp;&nbsp;&nbsp;Untuk mendata transaksi pembayaran non SPP. Silahkan masukan no induk siswa dan pilih jenis tagihan!</p>
				<form name=f1 method=post action=spp_transaksi.php?pilih=nonspp_masterbulanan&op=saveform>
				<table style='margin: 3px 0 3px 0;'>
				<tr><th>No. Induk</th>
				<td><input name=nis type=text size=12 style='margin-right :875px'>
					<input name=tingkat type=hidden size=14 value=\"$tingkat\">
					<input name=tahun type=hidden size=14 value=\"$tahun\">
					<input name=tanggal type=hidden size=14 value=\"$tanggal\">
				</td>
				</tr>
				<tr><th> Bayar Untuk . </th>
				<td>
				<select name=jenis>";
				$data_nonspp=mysql_query("select * from sh_nonspp where thn_ajaran='$tahun' and tingkat='$tingkat'");
				while ($isidata_nonspp=mysql_fetch_array($data_nonspp)) {
				//Untuk Merubah Outpout Angka Int DB jadi Format Mata Uang
				$jumlah_tagihan = number_format($isidata_nonspp['jumlah'],0,",", ",");
				echo "<option value=$isidata_nonspp[id_tagihan]>$isidata_nonspp[jenis_tagihan] -- Rp." . $jumlah_tagihan. ",-</option>";
				}
				echo "</select>
				</td>
				</tr>
				<tr><th>Jumlah</th>
				<td><input name=jumlah type=text size=12 class=search></td>
				</tr>
				<tr><td align=center><input name=simpan type=submit value=Simpan class=pencet></td></tr>
				</table>
				</form>"; ?>
			
			  <!-- Validasi Javascript -->
			<script language="JavaScript" type="text/javascript" xml:space="preserve">
				//<![CDATA[
				var frmvalidator  = new Validator("f1");
				frmvalidator.addValidation("nis","req","No. Induk (NIS) harus di isi !");
				frmvalidator.addValidation("jenis","req","Jenis Tagihan harus di pilih !");
				frmvalidator.addValidation("jumlah","req","Jumlah Bayar harus di isi !");
				//]]>
			</script>
				
	<?php	
		// Data Pembayaran NON SPP
		echo "
		<h2>&nbsp;&nbsp;Data Pembayaran NON SPP</h2>
		<p>&nbsp;&nbsp;&nbsp;Dibawah ini adalah data Pembayaran NON SPP tanggal  $tanggal!</p>
		<table width=100% id=results class=tabel>
		<tr>
		<th class=tabel>No</th>
		<th class=tabel>No.Induk</th>
		<th class=tabel>Nama</th>
		<th class=tabel>Kelas</th>
		<th class=tabel>Tagihan</th>
		<th class=tabel>Jumlah</th>
		<th class=tabel>Proses</th>
		</tr>";
		
			// Query Menampilkan Data
			$data_nonspp=mysql_query( "SELECT * 
									FROM sh_nonspp, sh_byrnonspp, sh_siswa, sh_kelas
									WHERE sh_siswa.nis = sh_byrnonspp.nis
									AND sh_byrnonspp.id_tagihan = sh_nonspp.id_tagihan
									AND sh_siswa.id_kelas = sh_kelas.id_kelas
									AND sh_byrnonspp.tgl_bayar =  '$tanggal' ");
			
			// Perulangan untuk Query $data_spp
			while ($isi_nonspp=mysql_fetch_array($data_nonspp)){
			$no++;
			// Untuk Merubah Outpout Angka Int DB jadi Format Mata Uang
			$jumlah = number_format($isi_nonspp['jumlah'],0,",", ",");
			echo "<tr>
			<td class=tabel>$no.</td>
			<td class=tabel>$isi_nonspp[nis]</td>
			<td class=tabel>$isi_nonspp[nama_siswa]</td>
			<td class=tabel>$isi_nonspp[nama_kelas]</td>
			<td class=tabel>$isi_nonspp[jenis_tagihan]</td>
			<td class=tabel>Rp." . $jumlah. ",-</td>
			<td class=tabel>[<a href=spp_transaksi.php?pilih=nonspp_masterbulanan&act=hapus&id_bayar=$isi_nonspp[id_bayar]> Hapus </a>]</td>
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

<?php // --------------------------- Bagian  Setelah Proses Form Action ------------------------------------------ // 
			
if (isset($_GET['op']))
	{
		//Get 'op' untuk Insert Data 
		if ($_GET['op'] == 'saveform')
		{
			//Cek Nis Siswa
			$cek_siswa=mysql_num_rows(mysql_query("select * from sh_siswa where nis='$_POST[nis]'"));
				if ($cek_siswa<>0) {
			//Besar Tagihan / Jenis
			$besar_tagihan_per_jenis=mysql_fetch_array(mysql_query("select * from sh_nonspp where id_tagihan='$_POST[jenis]'"));
			//hitung jumlah yang telah dibayar
			$jumlah_telah_dibayar_per_jenis=mysql_fetch_array(mysql_query("SELECT sum(jumlah)as jumlah FROM `sh_byrnonspp`
			where nis ='$_POST[nis]' and id_tagihan='$_POST[jenis]'"));
				// jumlah_telah_dibayar_per_jenis < Jika besar_tagihan_per_jenis
				if ($jumlah_telah_dibayar_per_jenis['jumlah']<$besar_tagihan_per_jenis['jumlah']){
					// Memasukan Hasil POST Form Ke Dalam Variable
					$tahun = $_POST['tahun'];	
					$tanggal = $_POST['tanggal'];
					$tingkat = $_POST['tingkat'];
					$jenis = $_POST['jenis'];
					$jumlah = $_POST['jumlah'];
					$nis = $_POST['nis'];
					$query = "INSERT INTO sh_byrnonspp (tgl_bayar,nis,id_tagihan,jumlah) VALUES ('$tanggal', '$nis' , '$jenis' , '$jumlah')";	
					$hasil = mysql_query($query);
					if ($hasil) echo "<script>window.alert('Data NON SPP Berhasil di Tambahkan !'); window.location.href='?pilih=nonspp_masterbulanan&tahun=$tahun&tgl_bayar=$tanggal&tingkat=$tingkat';</script>";
						else echo "<script>window.alert('Data NON SPP Gagal di Tambahkan ! '); window.history.go(-1);</script>";			
				}
				// Jika ada NIS dan Tanggal Pembayaran yang sama
				else
					{
						echo "<script>window.alert('Siswa dengan No Induk : $_POST[nis] Sudah Lunas ! '); window.history.go(-1);</script>";
					}
				} else { 
						echo "<script>window.alert('Tidak ada Siswa/i dengan NIS = $_POST[nis] ! '); window.history.go(-1);</script>"; 
			}		
		}
	}

		
		//Get 'op' untuk Hapus Data 
		if (isset($_GET['act'])){			
			if ($_GET['act'] == 'hapus')
			{
			$id_bayar = $_GET['id_bayar'];	
			$query = "DELETE from sh_byrnonspp where id_bayar = '$id_bayar'";	
			$hasil = mysql_query($query);
			if ($hasil) echo "<script>window.alert('Data NON SPP Berhasil di Hapus !'); window.history.go(-1);</script>";
				else echo "<script>window.alert('Data NON SPP Bulanan Gagal di Hapus ! '); window.history.go(-1);</script>";
			}
		}

?>