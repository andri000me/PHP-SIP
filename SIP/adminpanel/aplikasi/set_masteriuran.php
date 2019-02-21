<h3>MASTER DATA NON SPP</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontal"><a href="spp_laporan.php">Laporan</a></div>
		</div>
		
<div id="kanan"><!--Awal id kanan-->
	<div class="tombol">
	<h2>&nbsp;&nbsp;&nbsp;Set Tahun Ajaran</h2>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk menambah atau merubah Data Iuran Tahunan. Silahkan tentukan terlebih dahulu tahun pelajaran !</p>
	
	<form name='masteriuran' id='masteriuran' method="POST" action="spp.php?pilih=spp_masteriuran">
		<table style="margin: 3px 0 3px 0;">  
	<!--Tahun Ajaran-->
			<tr class="form"><td><b>  Tahun Ajaran </b> </td><td>
			<select name="thn_ajaran" id="tahun">
				<option value="">- Pilih Tahun Ajaran -</option>
				<?php $sql_ta=mysql_query("select distinct thn_ajaran  from sh_spp order by thn_ajaran desc");
					  while ($data_ta=mysql_fetch_array($sql_ta)){ echo "<option value=$data_ta[thn_ajaran]>$data_ta[thn_ajaran]</option>"; }?>
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
				var frmvalidator  = new Validator("masteriuran");
				frmvalidator.addValidation("thn_ajaran","req","Tahun Ajaran harus di pilih !");
				frmvalidator.addValidation("tingkat","req","Tingkat harus di pilih !");
				//]]>
			</script>
		   
	</div>
</div>