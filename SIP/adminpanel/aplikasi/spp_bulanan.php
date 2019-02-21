<h3>TRANSAKSI SPP BULANAN</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="spp.php">Master</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontal"><a href="spp_laporan.php">Laporan</a></div>
		</div>
		
<div id="kanan"><!--Awal id kanan-->
	<div class="tombol">
	<h2>&nbsp;&nbsp;&nbsp;Set Tanggal Pembayaran</h2>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk mendata pembayaran SPP. Silahkan tentukan terlebih dahulu tanggal pembayaran !</p>
	
	<form name='mastersppbulanan' id='mastersppbulanan' method="POST" action="spp_transaksi.php?pilih=spp_masterbulanan">
		<table style="margin: 3px 0 3px 0;">  
	<!--Tahun Ajaran-->
			<tr class="form"><td><b>  Tahun Ajaran </b> </td><td>
			<select name="id_spp" id="tahun">
				<option value="">- Pilih Tahun Ajaran -</option>
				<?php $sql_ta=mysql_query("select * from sh_spp order by tingkat asc"); // Error - Seharusnya Data Output dari Thn Ajaran yang sama hanya muncul satu dari tabel 'sh_spp'
					  while ($data_ta=mysql_fetch_array($sql_ta)){ echo "<option value=$data_ta[id_spp]>$data_ta[thn_ajaran] - $data_ta[tingkat] </option>"; }?>
				</select>
			</td></tr>	
			
	<?php $tgl=date("Y-m-d"); ?>
	<!-- Tanggal Bayar -->
			<tr class="form"><td> <b> Tanggal Bayar </b>  </td><td>
			<input type="text" class="pencarian" name="tgl_bayar" value="<?php echo $tgl; ?>" id="tanggal"> Format : yyyy-mm-dd.
			</td></tr>		
			<tr> <td colspan ="2" align="center"> <input type="submit" name="submit" value="  OK  " class="pencet"/> </td> </tr>
		 </table>
	   </form>	
		  <!-- Validasi Javascript -->
			<script language="JavaScript" type="text/javascript" xml:space="preserve">
				//<![CDATA[
				var frmvalidator  = new Validator("mastersppbulanan");
				frmvalidator.addValidation("id_spp","req","Tahun Ajaran harus di pilih !");
				frmvalidator.addValidation("tgl_bayar","req","Tanggal Bayar harus diisi !");
				//]]>
			</script>
	   
	</div>
</div>