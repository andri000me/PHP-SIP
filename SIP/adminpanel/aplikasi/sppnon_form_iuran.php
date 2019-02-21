<h3>MASTER DATA NON SPP</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontal"><a href="spp_laporan.php">Laporan</a></div>
		</div>

		<?php
		if (isset($_GET['module']))
		{ if ($_GET['module'] == 'tambah')
		 {	
			$tahun=$_GET['thn_ajaran'];
			$tingkat=$_GET['tingkat'];
		
		?>
			
	<div class="tombol">
	<br/>
	<center><h2><br>Form Master Iuran Non SPP</h2></center>
	<p>Untuk menambah atau merubah Master Iuran <u><?php echo "Tahun Ajaran $tahun Tingkat $tingkat"; ?></u>. Silahkan masukan informasi data tagihan iuran  pada form dibawah ini !</p>

	<form name="f1" method="post" action="spp.php?pilih=sppnon_form_iuran&module=tambah&op=saveform">
	<table style="margin: 3px 0 3px 0;" >
	<tr align="Left"><th>Jenis Tagihan</th><td>
	<input name="jenis_tagihan" type="text" size="24"  value="">
	<input name="thn_ajaran" 	type="hidden" size="4" value="<?php echo $tahun; ?>">
	<input name="tingkat" 		type="hidden" size="4" value="<?php echo $tingkat; ?>">
	<input name="id_tagihan" 	type="hidden" size="4" value="<?php echo $_GET['id']; ?>">
	</td></tr>
	<tr align="Left"><th>Jumlah Tagihan</th><td><input name="jumlah" type="text" size="6" value=""></td></tr>
	<tr align="right" colspan="2"><td><input name="simpan" type="submit" value="Simpan Data"></td></tr>
	</table>
	</form>
	
			<!-- Validasi Javascript -->
			<script language="JavaScript" type="text/javascript" xml:space="preserve">
				//<![CDATA[
				var frmvalidator  = new Validator("f1");
				frmvalidator.addValidation("jenis_tagihan","req","Jenis Tagihan harus di isi !");
				frmvalidator.addValidation("jumlah","req","Jumlah Tagihan harus di isi !");
				//]]>
			</script>
	
	</div>
	
	 <?php } else if ($_GET['module'] == 'edit') { ?>
	 
	<div class="tombol">
	<br/>
	<center><h2><br>Form Master Iuran Non SPP</h2></center>
	<p>Untuk menambah atau merubah Master Iuran <u><?php echo "Tahun Ajaran $tahun Tingkat $tingkat"; ?></u>. Silahkan masukan informasi data tagihan iuran  pada form dibawah ini !</p>

	<?php
			$no=1;
			$sql=mysql_query("SELECT * FROM sh_nonspp Where id_tagihan = '$_GET[id]'");
			while($data=mysql_fetch_array($sql)){
			$id_nonspp = $_GET['id'];
			$thn_ajaran = $data['thn_ajaran'];
			$tingkat = $data['tingkat'];
			$jenis_tagihan = $data['jenis_tagihan'];
			$jumlah = $data['jumlah'];
	?> 
	<form name="f1" method="post" action="spp.php?pilih=sppnon_form_iuran&module=edit&op=editform">
	<table style="margin: 3px 0 3px 0;" >
	<!-- ID Tagihan -->
	<input type="text" name="id_nonspp" value="<?php echo $id_nonspp; ?>" hidden="hidden">
	<tr align="Left"><th>Jenis Tagihan</th><td>
	<input name="jenis_tagihan" type="text" size="24"  value="<?php echo $jenis_tagihan; ?>">
	<input name="thn_ajaran" 	type="hidden" size="4" value="<?php echo $thn_ajaran; ?>">
	<input name="tingkat" 		type="hidden" size="4" value="<?php echo $tingkat; ?>">
	</td></tr>
	<tr align="Left"><th>Jumlah Tagihan</th><td><input name="jumlah" type="text" size="6" value="<?php echo $jumlah; ?>"></td></tr>
	<tr align="right" colspan="2"><td><input name="simpan" type="submit" value="Update Data"></td></tr>
	</table>
	</form>
	
			<!-- Validasi Javascript -->
			<script language="JavaScript" type="text/javascript" xml:space="preserve">
				//<![CDATA[
				var frmvalidator  = new Validator("f1");
				frmvalidator.addValidation("jenis_tagihan","req","Jenis Tagihan harus di isi !");
				frmvalidator.addValidation("jumlah","req","Jumlah Tagihan harus di isi !");
				//]]>
			</script>
	
	</div>
	 <?php } ?>	
    <?php } ?>
   <?php } ?>	   
</div> <!-- End Div Kanan -->

	<?php
		if (isset($_GET['op']))
		{
			//Get 'op' untuk Insert Data 
			if ($_GET['op'] == 'saveform')
			{
			$tahun = $_POST['thn_ajaran'];	
			$tingkat = $_POST['tingkat'];
			$jenis_tagihan = $_POST['jenis_tagihan'];
			$jumlah = $_POST['jumlah'];
			$query = "INSERT INTO sh_nonspp (thn_ajaran,tingkat,jenis_tagihan,jumlah) VALUES ('$tahun', '$tingkat' ,'$jenis_tagihan','$jumlah')";	
			$hasil = mysql_query($query);
			if ($hasil) echo "<script>window.alert('Master NON SPP Berhasil di Tambahkan !'); window.location.href='?pilih=spp_masteriuran&thn_ajaran=$tahun&tingkat=$tingkat';</script>";
				else echo "<script>window.alert('Master NON SPP Gagal di Tambahkan ! '); window.history.go(-1);</script>";
			}
			//Get 'op' untuk Edit Data 			
			if ($_GET['op'] == 'editform')
			{
			$id_nonspp = $_POST['id_nonspp'];
			$tahun = $_POST['thn_ajaran'];	
			$tingkat = $_POST['tingkat'];
			$jenis_tagihan = $_POST['jenis_tagihan'];
			$jumlah = $_POST['jumlah'];
			$queryupdate = "UPDATE sh_nonspp SET thn_ajaran = '$tahun' , tingkat = '$tingkat' ,jenis_tagihan = '$jenis_tagihan' , jumlah = '$jumlah' where id_tagihan = '$id_nonspp'";	
			$hasilupdate = mysql_query($queryupdate);
			if ($hasilupdate) echo "<script>window.alert('Master NON SPP Berhasil di Update !'); window.location.href='?pilih=spp_masteriuran&thn_ajaran=$tahun&tingkat=$tingkat';</script>";
				else echo "<script>window.alert('Master NON SPP Gagal di Update ! '); window.history.go(-1);</script>";
			}
			
		}
		//Get 'op' untuk Hapus Data 
		if (isset($_GET['act'])){			
			if ($_GET['act'] == 'hapus')
			{
			$id_nonspp = $_GET['id'];	
			$query = "DELETE from sh_nonspp where id_tagihan = '$id_nonspp'";	
			$hasil = mysql_query($query);
			if ($hasil) echo "<script>window.alert('Master NON SPP Berhasil di Hapus !'); window.history.go(-1);</script>";
				else echo "<script>window.alert('Master NON SPP Gagal di Hapus ! '); window.history.go(-1);</script>";
			}
		}
		?>
