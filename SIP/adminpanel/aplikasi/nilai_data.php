<?php
include "aplikasi/database/koneksi_absensi_websch.php";
//$database="aplikasi/database/siswa.php";
switch($_GET['pilih']){
default: ?>	  
<h3>LAPORAN NILAI</h3>
<div class="isikanan"> <!--Awal class isi kanan-->
								
		<div class="judulisikanan"> <!-- Judul isi Kanan -->
			<div class="menuhorisontalaktif-ujung"><a href="nilai.php">Ledger Nilai</a></div>
		</div>
		
		<div class="atastabel" style="margin-bottom: 10px">
		<div class="tombol">
			  <form name='nilai' id='nilai' method="POST" action="?pilih=pencarian">
			  <table style="margin: 3px 0 3px 0;">  
<!-- Kelas -->
		<?php
		if (isset($_POST['kelas'])) { ?>
		<tr class="form"><td> <b>  Pilih Kelas </b>  </td><td>
			<select name="kelas" id="kelas">
				<?php 
				 $baris = mysql_query("SELECT * FROM sh_kelas where id_kelas = '$_POST[kelas]'");
				  while ($kelas = mysql_fetch_array($baris)){
				  echo "<option value=\"$kelas[id_kelas]\" selected>$kelas[nama_kelas]</option>";
				}
				?>
				</select>
			</td></tr>
		<?php } else { ?>
			<tr class="form"><td> <b>  Pilih Kelas </b>   </td><td>
			 <select name="kelas" id="kelas">
				<option value="">- Pilih Kelas -</option>
				<?php 
				 $baris = mysql_query("SELECT * FROM sh_kelas where tingkat <> ''");
				  while ($kelas = mysql_fetch_array($baris)){
				  echo "<option value=\"$kelas[id_kelas]\">$kelas[nama_kelas]</option>";
				}
				?>
				</select>
			</td></tr>
		<?php } ?>
		
<!-- Semester --> 
			<?php
			if (isset($_POST['semester'])) { ?>
			<tr class="form"><td> <b> Semester </b>  </td><td>
			 <select name="semester" id="semester">
					<option> <?php echo $_POST['semester']; ?> </option>
				  </select> 
			</td></tr>
		    <?php } else { ?>
			<tr class="form"><td> <b>  Semester </b> </td><td>
			 <select name="semester" id="semester">
					<option value="">- Pilih Semester -</option>
					<option>Ganjil</option>
					<option>Genap</option>
				  </select> 
			</td></tr>
			<?php } ?>
			
<!--Tahun Ajaran-->
			<?php
			if (isset($_POST['tahun'])) { ?>
			<tr class="form"><td><b>  Tahun Ajaran </b> </td><td>
			<select name="tahun" id="tahun">
				<option> <?php echo $_POST['tahun']; ?> </option>
				</select>
			</td></tr>
			<?php } else { ?>
			<tr class="form"><td><b>  Tahun Ajaran </b> </td><td>
			<select name="tahun" id="tahun">
				<option value="">- Pilih Tahun Ajaran -</option>
				<?php for($i=2016;$i<=2020;$i++){$a = $i+1; echo "<option>$i/$a</option>";}?>
				</select>
			</td></tr>
			<?php } ?>
			   </table>
			  <br/>
			  <?php
				if (isset($_POST['submit'])) { ?>
				<input type="button" class="hapus" value="<< Kembali" onclick="self.history.back()"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<input type="button" class="batal" value="Cetak xls &raquo;" onclick="window.location.href='konten/ledger-nilai.php';">	
		       <?php } else { ?>
			  <input type="submit" name="submit" value=" Tampilkan Ledger Nilai &raquo; " class="pencet"/>
			<?php } ?>
		   </form>
		   
		   		<!-- Validasi Form-->
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("nilai");
			frmvalidator.addValidation("kelas","req","Kelas Harus di Pilih !");
			frmvalidator.addValidation("semester","req","Semester Harus di Pilih !");
			frmvalidator.addValidation("tahun","req","Tahun Ajaran Harus di Pilih !");
			//]]>
		</script>
		   
		 </div>
	   </div>
	 <div class="clear"></div>	
	</div><!--Akhir class isi kanan-->

		<?php break;
		
		case "pencarian":
			include "aplikasi/nilai_pencarian.php";
		}
		
		?>
	