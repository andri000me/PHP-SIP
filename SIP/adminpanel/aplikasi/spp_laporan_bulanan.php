<h3>LAPORAN SPP</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="spp_laporan.php">Laporan</a></div>
		</div>
		
<div id="kanan"><!--Awal id kanan-->
	<div class="tombol">
	  <h2>&nbsp;&nbsp;&nbsp;Set Periode SPP</h2>
		 <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk untuk menampilkan laporan bulanan SPP. Silahkan tentukan terlebih dahulu bulan dan Tahun penagihan !</p>
	
	<?php $bln=date('m-Y'); $thn=date('Y'); ?>
	<form name='lapsppbulanan' id='lapsppbulanan' method="POST" action="spp_laporan.php?pilih=laporan_bulanan_spp">
		<table style="margin: 3px 0 3px 0;">  
		
	<!--Bulan Tahun Report-->
			<tr class="form"><td><b>  Bulan - Tahun </b> </td><td>
			<input  class="pencarian" name="bln_thn" value="<?php echo $bln; ?>" size="12"> format : mm-yyyy.
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
		    <tr> <td colspan ="2" align="center"> <input type="submit" name="submit" value="  OK  " class="pencet"/> </td> </tr>
		  </table>
	    </form>	
	   
		  <!-- Validasi Javascript -->
			<script language="JavaScript" type="text/javascript" xml:space="preserve">
				//<![CDATA[
				var frmvalidator  = new Validator("lapsppbulanan");
				frmvalidator.addValidation("bln_thn","req","Bulan - Tahun Periode Laporan harus di isi !");
				frmvalidator.addValidation("tingkat","req","Tingkat harus di pilih !");
				//]]>
			</script>
	   
	</div>
</div>