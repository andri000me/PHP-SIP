<h3>TRANSAKSI SPP BULANAN</h3>
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
			$id_spp=$_POST['id_spp'];
			} else {
			$tanggal=$_GET['tgl_bayar']; 
			$id_spp=$_GET['id_spp'];
			}
			
		// Form Inputan SPP diisi dengan NIS
		echo 	"<br/><br/><br/>
				<h2>&nbsp;&nbsp;Pembayaran Tanggal SPP $tanggal</h2>
				<p>&nbsp;&nbsp;&nbsp;Untuk mendata transaksi pembayaran SPP. Silahkan masukan informasi no induk siswa pada form dibawah ini !</p>
				<form name=f1 method=post action=spp_transaksi.php?pilih=spp_masterbulanan&op=saveform>
				<table style='margin: 3px 0 3px 0;'>
				<tr><th>No. Induk</th>
				<td><input name=nis type=text size=12 style='margin-right :875px'>
				<input name=id_spp type=hidden size=12  value=\"$id_spp\" >
				<input name=tanggal type=hidden size=14 value=\"$tanggal\">
				</td>
				</tr>
				<tr><td align=center><input name=simpan type=submit value=Simpan class=pencet></td></tr>
				</table>
				</form>"; ?>
			
			<!-- Validasi Javascript -->
			<script language="JavaScript" type="text/javascript" xml:space="preserve">
				//<![CDATA[
				var frmvalidator  = new Validator("f1");
				frmvalidator.addValidation("nis","req","No.Induk (NIS) harus di isi !");
				//]]>
			</script>
			
	<?php	
		// Data Pembayaran SPP
		echo "
		<h2>&nbsp;&nbsp;Data Pembayaran SPP</h2>
		<p>&nbsp;&nbsp;&nbsp;Dibawah ini adalah data pembayaran SPP tanggal  $tanggal!</p>
		<table width=100% id=results class=tabel>
		<tr>
		<th class=tabel>No</th>
		<th class=tabel>No.Induk</th>
		<th class=tabel>Nama</th>
		<th class=tabel>Kelas</th>
		<th class=tabel>Jumlah</th>
		<th class=tabel>Proses</th>
		</tr>";
		
			// Query Menampilkan Data
			$data_spp=mysql_query( "SELECT * 
									FROM sh_spp, sh_byrspp, sh_siswa, sh_kelas
									WHERE sh_siswa.nis = sh_byrspp.nis
									AND sh_byrspp.id_spp = sh_spp.id_spp
									AND sh_siswa.id_kelas = sh_kelas.id_kelas
									AND sh_byrspp.tgl_bayar =  '$tanggal' ");
			
			// Perulangan untuk Query $data_spp
			while ($isi_spp=mysql_fetch_array($data_spp)){
			$no++;
			// Untuk Merubah Outpout Angka Int DB jadi Format Mata Uang
			$jumlah = number_format($isi_spp['jumlah'],0,",", ",");
			echo "<tr>
			<td class=tabel>$no.</td>
			<td class=tabel>$isi_spp[nis]</td>
			<td class=tabel>$isi_spp[nama_siswa]</td>
			<td class=tabel>$isi_spp[nama_kelas]</td>
			<td class=tabel>Rp." . $jumlah. ",-</td>
			<td class=tabel>[<a href=spp_transaksi.php?pilih=spp_masterbulanan&act=hapus&id_bayar=$isi_spp[id_bayar]> Hapus </a>]</td>
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
			//Cek sudah bayar atau belum
			$cek_bayar=mysql_num_rows(mysql_query("select * from sh_byrspp where nis='$_POST[nis]' and tgl_bayar ='$_POST[tanggal]'"));
				// Jika Tidak ada NIS dan Tanggal Pembayaran yang sama
				if ($cek_bayar==0){
					// Memasukan Hasil POST Form Ke Dalam Variable
					$id_spp = $_POST['id_spp'];	
					$tanggal = $_POST['tanggal'];
					$nis = $_POST['nis'];
					$query = "INSERT INTO sh_byrspp (tgl_bayar,nis,id_spp) VALUES ('$tanggal', '$nis' , '$id_spp')";	
					$hasil = mysql_query($query);
					if ($hasil) echo "<script>window.alert('SPP Bulanan Berhasil di Tambahkan !'); window.location.href='?pilih=spp_masterbulanan&id_spp=$id_spp&tgl_bayar=$tanggal';</script>";
						else echo "<script>window.alert('SPP Bulanan Gagal di Tambahkan ! '); window.history.go(-1);</script>";			
				}
				// Jika ada NIS dan Tanggal Pembayaran yang sama
				if ($cek_bayar==1)
					{
						echo "<script>window.alert('NIS Siswa/i yang di Input Sudah Melakukan PEMBAYARAN ! '); window.history.go(-1);</script>";
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
			$query = "DELETE from sh_byrspp where id_bayar = '$id_bayar'";	
			$hasil = mysql_query($query);
			if ($hasil) echo "<script>window.alert('SPP Bulanan Berhasil di Hapus !'); window.history.go(-1);</script>";
				else echo "<script>window.alert('SPP Bulanan Gagal di Hapus ! '); window.history.go(-1);</script>";
			}
		}

?>