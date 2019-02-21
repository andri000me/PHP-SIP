<h3>LAPORAN REKAPITULASI SPP</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="spp_laporan.php">Laporan</a></div>
		</div>
		
<div id="kanan"><!--Awal id kanan-->
	<div class="tombol">
	  <h2>&nbsp;&nbsp;&nbsp;Rekapitulasi SPP</h2>
		 <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk menampilkan laporan Rekapitulasi SPP. Silahkan tentukan terlebih dahulu Tahun Laporan yang akan ditampilkan !</p>
	
	<form name='laprekapsppbulanan' id='laprekapsppbulanan' method="POST" action="spp_laporan.php?pilih=laporan_rekap_spp">
		<table style="margin: 3px 0 3px 0;">  
		
	<!--Bulan Tahun Report-->
			<tr class="form"><td><b> Tahun Ajaran </b> </td><td>
			<select name="tahun">
			<?php $sql_ta=mysql_query("select distinct thn_ajaran from sh_spp order by thn_ajaran desc");
				  while ($data_ta=mysql_fetch_array($sql_ta)){ echo "<option value=$data_ta[thn_ajaran]>$data_ta[thn_ajaran]</option>"; } ?>
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
		    <tr> <td colspan ="2" align="center"> <input type="submit" name="submit" value="  OK  " class="pencet"/> </td> </tr>
		  </table>
	    </form>	
	   
		  <!-- Validasi Javascript -->
			<script language="JavaScript" type="text/javascript" xml:space="preserve">
				//<![CDATA[
				var frmvalidator  = new Validator("laprekapsppbulanan");
				frmvalidator.addValidation("tahun","req","Tahun Ajaran harus di pilih !");
				frmvalidator.addValidation("tingkat","req","Tingkat harus di pilih !");
				//]]>
			</script>
		</div>
	</div>