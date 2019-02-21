<h3>TRANSAKSI NON SPP</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="spp.php">Master</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontal"><a href="spp_laporan.php">Laporan</a></div>
		</div>
		
<div id="kanan"><!--Awal id kanan-->
	<div class="tombol">
	<h2>&nbsp;&nbsp;&nbsp;Set Tanggal Pembayaran</h2>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk mendata pembayaran NON SPP. Silahkan tentukan terlebih dahulu tanggal pembayaran !</p>
	
	<form name='masternonsppbulanan' id='masternonsppbulanan' method="POST" action="spp_transaksi.php?pilih=nonspp_masterbulanan">
		<table style="margin: 3px 0 3px 0;">  
	<!--Tahun Ajaran-->
			<tr class="form"><td><b>  Tahun Ajaran </b> </td><td>
			<select name="tahun" id="tahun">
				<option value="">- Pilih Tahun Ajaran -</option>
				<?php $sql_ta=mysql_query("select distinct thn_ajaran  from sh_nonspp order by thn_ajaran desc"); 
					  while ($data_ta=mysql_fetch_array($sql_ta)){ echo "<option value=$data_ta[thn_ajaran]>$data_ta[thn_ajaran]</option>"; }?>
				</select>
			</td></tr>	
			
	<!--Tingkat-->
			<tr class="form"><td><b>  Tingkat </b> </td><td>
			<select name="tingkat" id="tingkat" name="tingkat">
				<option value="">- Pilih Tingkat -</option>
				<?php $sql_ti=mysql_query("select distinct tingkat from sh_nonspp order by tingkat desc"); 
					  while ($data_ti=mysql_fetch_array($sql_ti)){ echo "<option value=$data_ti[tingkat]>$data_ti[tingkat]</option>"; }?>
				</select>
			</td></tr>		
			
			
	<!-- Tanggal Bayar -->		
	<?php $tgl=date("Y-m-d"); ?>
			<tr class="form"><td> <b> Tanggal Bayar </b>  </td><td>
			<input type="text" class="pencarian" name="tgl_bayar" value="<?php echo $tgl; ?>" id="tanggal"> Format : yyyy-mm-dd.
			</td></tr>		
			<tr> <td colspan ="2" align="center"> <input type="submit" name="submit" value="  OK  " class="pencet"/> </td> </tr>
		 </table>
	   </form>	
	   
	   		  <!-- Validasi Javascript -->
			<script language="JavaScript" type="text/javascript" xml:space="preserve">
				//<![CDATA[
				var frmvalidator  = new Validator("masternonsppbulanan");
				frmvalidator.addValidation("tahun","req","Tahun Ajaran harus di pilih !");
				frmvalidator.addValidation("tingkat","req","Tingkat harus di pilih !");
				frmvalidator.addValidation("tgl_bayar","req","Tanggal Bayar harus di isi !");
				//]]>
			</script>
	   
	</div>
</div>