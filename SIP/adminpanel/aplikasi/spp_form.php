<h3>MASTER DATA SPP</h3>

<div class="isikanan"><!--Awal class isi kanan-->						
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontal"><a href="spp_laporan.php">Laporan</a></div>
		</div>
		
		<?php
		if (isset($_GET['module']))
		{ if ($_GET['module'] == 'tambah')
		 {	 ?>
			
		<div class="tombol">
		<br/>
		<center><h2><br>Form Master SPP</h2></center>
		<p>Untuk menambah atau merubah Master SPP. Silahkan masukan informasi data SPP pada form dibawah ini !</p>
		
		<form name='sppform' id='sppform' method="POST" action="spp.php?pilih=spp_form&module=tambah&op=saveform">
		<table style="margin: 3px 0 3px 0;">  
		
	<!--Tahun Ajaran-->
			<tr class="form"><td><b>  Tahun Ajaran </b> </td><td>
			<select name="tahun" id="tahun">
				<option value="">- Pilih Tahun Ajaran -</option>
				<?php for($i=2010;$i<=2020;$i++){$a = $i+1; echo "<option>$i/$a</option>";}?>
				</select>
			</td></tr>	
		
	<!-- Tingkat -->
			<tr class="form"><td> <b> Tingkat </b>  </td><td>
			<select name="tingkat" id="tingkat">
			 <option value="" selected > - Pilih Tingkat - </option>
				<?php 
				 $baris = mysql_query("SELECT Distinct tingkat FROM sh_kelas order by tingkat");
				  while ($tingkat= mysql_fetch_array($baris)){
				  echo "<option value=\"$tingkat[tingkat]\">$tingkat[tingkat]</option>";
				}
				?>
				</select>
			</td></tr>		
		
		<!-- Jumlah Tagihan -->
		<tr align=Left><th>Jumlah Tagihan / Bulan</th><td><input name="jumlah" type="text" size="10"></td></tr>
		<tr> <td colspan ="2" align="center"> <input type="submit" name="submit" value="Simpan Data" class="pencet"/> </td> </tr>
		</table>
		   </form>	
		   
		     <!-- Validasi Javascript -->
			<script language="JavaScript" type="text/javascript" xml:space="preserve">
				//<![CDATA[
				var frmvalidator  = new Validator("sppform");
				frmvalidator.addValidation("tahun","req","Tahun Ajaran harus di pilih !");
				frmvalidator.addValidation("tingkat","req","Tingkat harus di pilih !");
				frmvalidator.addValidation("jumlah","req","Jumlah Bayar harus di isi !");
				//]]>
			</script>
		   
	   </div>
	   
	   <?php } else if ($_GET['module'] == 'edit') { ?>
	   
	   <div class="tombol">
		<br/>
		<center><h2><br>Form Master SPP Edit</h2></center>
		<p>Untuk menambah atau merubah Master SPP. Silahkan masukan informasi data SPP pada form dibawah ini !</p>
		
		<?php
			$no=1;
			$sql=mysql_query("SELECT * FROM sh_spp Where id_spp = '$_GET[id]'");
			while($data=mysql_fetch_array($sql)){
			$id_spp = $_GET['id'];
			$thn_ajaran = $data['thn_ajaran'];
			$tingkat = $data['tingkat'];
			$jumlah = $data['jumlah'];
		?> 
		
		<form name='sppform' id='sppform' method="POST" action="spp.php?pilih=spp_form&module=edit&op=editform">
		<table style="margin: 3px 0 3px 0;">  
		
	<!-- ID SPP -->
	<input type="text" name="id_spp" value="<?php echo $id_spp; ?>" hidden="hidden">
	
	<!--Tahun Ajaran-->
			<tr class="form"><td><b>  Tahun Ajaran </b> </td><td>
			<select name="tahun" id="tahun">
				<option value="<?php echo $thn_ajaran;?>" selected> <?php echo $thn_ajaran;?> </option>
				<option value="">--------</option>
				<?php for($i=2010;$i<=2020;$i++){$a = $i+1; echo "<option>$i/$a</option>";}?>
				</select>
			</td></tr>	
		
	<!-- Tingkat -->
			<tr class="form"><td> <b> Tingkat </b>  </td><td>
			<select name="tingkat" id="tingkat">
			 <option value="<?php echo $tingkat;?>" selected> <?php echo $tingkat;?> </option>
				<?php 
				 $baris = mysql_query("SELECT Distinct tingkat FROM sh_kelas order by tingkat");
				  while ($tingkat= mysql_fetch_array($baris)){
				  echo "<option value=\"$tingkat[tingkat]\">$tingkat[tingkat]</option>";
				}
				?>
				</select>
			</td></tr>		
		
			<!-- Jumlah Tagihan -->
			<tr align=Left><th>Jumlah Tagihan / Bulan</th><td><input name="jumlah" type="text" size="10" value="<?php echo $jumlah; ?>" ></td></tr>
			<tr> <td colspan ="2" align="center"> <input type="submit" name="submit" value="Update Data" class="pencet"/> </td> </tr>
			</table>
			   </form>	
			   
			<!-- Validasi Javascript -->
			<script language="JavaScript" type="text/javascript" xml:space="preserve">
				//<![CDATA[
				var frmvalidator  = new Validator("sppform");
				frmvalidator.addValidation("tahun","req","Tahun Ajaran harus di pilih !");
				frmvalidator.addValidation("tingkat","req","Tingkat harus di pilih !");
				frmvalidator.addValidation("jumlah","req","Jumlah Bayar harus di isi !");
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
			//Cek sudah disetting atau belum
			$cek_setting=mysql_num_rows(mysql_query("select * from sh_spp where thn_ajaran='$_POST[tahun]' and tingkat ='$_POST[tingkat]'"));
			// Jika Tidak ada Setting Pembayaran yang sama
			if ($cek_setting==0){
					$tahun = $_POST['tahun'];	
					$tingkat = $_POST['tingkat'];
					$jumlah = $_POST['jumlah'];
					$query = "INSERT INTO sh_spp (thn_ajaran,tingkat,jumlah) VALUES ('$tahun', '$tingkat' , '$jumlah')";	
					$hasil = mysql_query($query);
					if ($hasil) echo "<script>window.alert('Master SPP Berhasil di Tambahkan !'); window.location.href='?pilih=masterspp';</script>";
						else echo "<script>window.alert('Master SPP Gagal di Tambahkan ! '); window.history.go(-1);</script>";
				}	
				// Jika ada Setting Pembayaran yang sama
				if ($cek_setting==1)
					{
						echo "<script>window.alert(' Master SPP yang di Input Sudah Ada ! '); window.history.go(-1);</script>";
					}
			
			}
			//Get 'op' untuk Edit Data 			
			if ($_GET['op'] == 'editform')
			{
			
			//Cek sudah disetting atau belum
			$cek_setting=mysql_num_rows(mysql_query("select * from sh_spp where thn_ajaran='$_POST[tahun]' and tingkat ='$_POST[tingkat]'"));
			// Jika Tidak ada Setting Pembayaran yang sama
			if ($cek_setting==0){
					$id_spp = $_POST['id_spp'];
					$tahun = $_POST['tahun'];	
					$tingkat = $_POST['tingkat'];
					$jumlah = $_POST['jumlah'];
					$queryupdate = "UPDATE sh_spp SET thn_ajaran = '$tahun' , tingkat = '$tingkat' , jumlah = '$jumlah' where id_spp = '$id_spp'";	
					$hasilupdate = mysql_query($queryupdate);
					if ($hasilupdate) echo "<script>window.alert('Master SPP Berhasil di Update !'); window.location.href='?pilih=masterspp';</script>";
						else echo "<script>window.alert('Master SPP Gagal di Update ! '); window.history.go(-1);</script>";
					}
			// Jika ada Setting Pembayaran yang sama
				if ($cek_setting==1)
					{
						echo "<script>window.alert(' Master SPP yang di Input Sudah Ada ! '); window.history.go(-1);</script>";
					}
			
				}
		}
		//Get 'op' untuk Hapus Data 
		if (isset($_GET['act'])){			
			if ($_GET['act'] == 'hapus')
			{
			$id_spp = $_GET['id'];	
			$query = "DELETE from sh_spp where id_spp = '$id_spp'";	
			$hasil = mysql_query($query);
			if ($hasil) echo "<script>window.alert('Master SPP Berhasil di Hapus !'); window.history.go(-1);</script>";
				else echo "<script>window.alert('Master SPP Gagal di Hapus ! '); window.history.go(-1);</script>";
			}
		}
		?>
	
