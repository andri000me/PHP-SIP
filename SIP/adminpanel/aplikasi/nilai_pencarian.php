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
				 $baris = mysql_query("SELECT * FROM sh_kelas");
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
				<input type="button" class="hapus" value="<< Kembali" onclick="self.history.back()">
		       <?php } else { ?>
			  <input type="submit" name="submit" value=" Tampilkan Ledger Nilai &raquo; " class="pencet"/>
			<?php } ?>
		  </form>
		  <br/>
		  <br/>
		  <!-- Form Cetak XLS -->
		  <form method="POST" action="konten/ledger-nilai.php" name="cetak" id="cetak">
		  <input type="text" name ="kelas" value="<?php echo $_POST['kelas']; ?>" hidden="hidden"/>
		  <input type="text" name ="semester" value="<?php echo $_POST['semester']; ?>" hidden="hidden"/>
		  <input type="text" name ="tahun" value="<?php echo $_POST['tahun']; ?>" hidden="hidden"/>
		  <input type="submit" class="batal" value="Cetak XLS &raquo;">	
		  </form>
		</div>
	  </div>
	<div class="clear"></div>
	
	<table class="tabel" id="results">
			<tr>
				<th width="2%"  class="tabel">No</a></th>
				<th width="15%" class="tabel">Nama Siswa</a>	</th>
				<th width="15%" class="tabel">NIS</a></th>
				<th width="15%"  class="tabel">Kelas</a></th>
				<th width="15%" class="tabel">Mata Pelajaran</a></th>
				<th width="10%" class="tabel">Nilai Tugas</a></th>
				<th width="10%" class="tabel">Nilai UTS</a></th>
				<th width="10%" class="tabel">Nilai UAS</a></th>
				<th width="15%" class="tabel" align="center">Total Nilai Rata</a></th>
			</tr>
			<?php
				//Buka Koneksi Database Websch
			    koneksi2_buka();
				$no=1;
				// VARIABLE -> POST
				$kelas = $_POST['kelas'];
				$semester = $_POST['semester'];
				$tahun = $_POST['tahun'];
				
				$nilairata=mysql_query("SELECT * FROM sh_nilai nilai, sh_siswa siswa, sh_mapel mapel, sh_kelas kelas
								   WHERE nilai.id_siswa=siswa.id_siswa and nilai.id_kelas= '$kelas' and nilai.id_kelas = kelas.id_kelas and
								   nilai.id_mapel= mapel.id_mapel and nilai.semester = '$semester' and nilai.tahun_ajaran= '$tahun' order by siswa.nama_siswa asc");
				$cek_nilai=mysql_num_rows($nilairata);
				
				if($cek_nilai > 0){
				while($row=mysql_fetch_array($nilairata)){
				?>
			<tr class="tabel">
				<td class="tabel"><?php echo $no;?></td>
				<td class="tabel"><?php echo $row['nama_siswa'];?></td>
				<td class="tabel"><?php echo $row['nis'];?></td>
				<td class="tabel"><?php echo $row['nama_kelas'];?></td>
                <td class="tabel"><?php echo $row['nama_mapel'];?></td>
                <td class="tabel"><?php echo $row['nilai_tugas'];?></td>
				<td class="tabel"><?php echo $row['nilai_uts'];?></td>
				<td class="tabel"><?php echo $row['nilai_uas'];?></td>
				<td class="tabel"><?php echo $row['rata'];?></td>
			</tr>
			<?php
			$no++;
			} 
		  } else {  ?>
			<tr class="tabel"><td class="tabel" colspan="9"><font color="red"><b>LEDGER NILAI BELUM TERSEDIA</b></font></td></tr>
			<?php } ?>
		</table>
		<div class="atastabel" style="margin: 5px 10px 0 10px">
		<div id="pageNavPosition"></div>
		</div>
		<div class="atastabel" style="margin: 5px 10px 0 10px">
		<?php
			$jumlahtampil=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='3'");
			$jt=mysql_fetch_array($jumlahtampil);
		?>
		<script type="text/javascript"><!--
        var pager = new Pager('results', <?php echo "$jt[isi_pengaturan]"; koneksi2_tutup(); //Tutup Koneksi Database Websch ?>); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
		</div>
	
	</div><!--Akhir class isi kanan-->