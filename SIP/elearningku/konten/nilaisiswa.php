<div class="panel panel-primary">
<div class="panel-heading"><h1 class="panel-title">Laporan Nilai Siswa</h1></div>
<?php if(isset($_POST['mapel'])){ ?>
<br/>
<a href ="index.php?p=nilaisiswa"> << Kembali ke NILAI </a> <br/>
<?php } ?>
<div class="panel-body">
    <div class="table-responsive">
		<table id="results" class="table" id="results" cellpadding="1" cellspacing="1">
		<!-- Mata Pelajaran -->
		<?php 
		if($_SESSION['orangtua']){
			// menenetukan login siswa per-kelas
				$profilsaya=mysql_query("SELECT * FROM sh_siswa , sh_kelas ,sh_ortu WHERE sh_siswa.id_kelas=sh_kelas.id_kelas AND sh_siswa.id_siswa = sh_ortu.id_siswa AND sh_ortu.id_ortu='$_SESSION[orangtua]'");
				$ps=mysql_fetch_array($profilsaya);
			} Else if($_SESSION['siswa'])  {
				$profilsaya=mysql_query("SELECT * FROM sh_siswa, sh_kelas WHERE sh_siswa.id_kelas=sh_kelas.id_kelas AND sh_siswa.nis ='$_SESSION[siswa]'");
				$ps=mysql_fetch_array($profilsaya);
			}
		?>
		<tr class="form"><td> Mata Pelajaran </td> <td>  
				<form method="POST" action="?p=nilaisiswa&id_kelas=<?php echo "$ps[id_kelas]";?>" >
						<select name="mapel" class="form-control" id="mapel" onChange="this.form.submit()">
						 <?php if(isset($_POST['mapel'])){
						 $mpl2=mysql_query("SELECT  * FROM sh_mapel_guru	WHERE sh_mapel_guru.id_mapel_guru ='$_POST[mapel]'");
							while($mp2=mysql_fetch_array($mpl2)){
							?>
						 <option value="<?php echo "$_POST[mapel]";?>" selected><?php echo "$mp2[nama_mapel]";?></option> 
						 <?php } // End Of While
						    }  Else { ?>
							<option value="" selected> - Pilih Mata Pelajaran - </option> 
							<?php
							$mpl=mysql_query("SELECT  DISTINCT sh_mapel_guru.nama_mapel, sh_mapel_guru.id_mapel_guru FROM sh_jadwal,sh_mapel_guru,sh_kelas ,sh_siswa
											WHERE sh_mapel_guru.id_mapel = sh_jadwal.id_mapel
											AND sh_kelas.id_kelas = sh_jadwal.id_kelas
											AND sh_siswa.id_kelas = sh_kelas.id_kelas
											AND sh_siswa.id_siswa = '$ps[id_siswa]'
											AND sh_kelas.id_kelas = '$ps[id_kelas]' ORDER BY sh_mapel_guru.nama_mapel ASC");
							while($mp=mysql_fetch_array($mpl)){
							?>
							<option value="<?php echo "$mp[id_mapel_guru]";?>"><?php echo "$mp[nama_mapel]";?></option>
						<?php } // End Of While Mapel Guru
						     } // End  Of IF ?>
						</select>
				</form>
			</td> </tr>
		
	<form method="POST" action="index.php?p=nilaisiswa" enctype="multipart/form-data" name="tambahnilai" id="tambahnilai">	
<!-- Mapel Hide -->
	<input type="hidden" name="mapel" value ="<?php echo "$_POST[mapel]";?>" />
<!-- Kelas -->
		<tr><td class="isiankanan">Kelas</td><td class="isian"> 
			<select name="kelas" id="kelas" class="form-control">
			<?php if(isset($_POST['mapel'])){ ?>
				<option value="<?php echo "$ps[id_kelas]";?>" selected> <?php echo "$ps[nama_kelas]";?> </option>
			<?php } else { ?>
				<option value="" selected> - Pilih Kelas - </option>
			<?php } ?>
		    </select>
			</td></tr>
			
<!--Tahun Ajaran-->
	
			<tr class="form"><td> Tahun Ajaran</td><td>
				<select name="tahun" id="tahun" class="form-control" onChange="this.form.submit()">
				<?php if(isset($_POST['tahun'])){ ?>
					<?php
					$tampilta=mysql_query("SELECT * FROM sh_tahun_ajaran where id_tahun_ajaran = '$_POST[tahun]' ");
					while($ta=mysql_fetch_array($tampilta)){
					echo "<option value='$ta[id_tahun_ajaran]' selected>$ta[tahun_ajaran]";
					if($ta['semester']==0) {
					$sms = "Genap";
					} Else {
					$sms = "Ganjil";
					}
					echo " - $sms</option>";
					}
					?>
					<?php } else { ?>
					<option value="" selected>Tampil Berdasarkan Tahun Ajaran</option>
					<?php
						$tampilta2=mysql_query("SELECT * FROM sh_tahun_ajaran");
						while($ta2=mysql_fetch_array($tampilta2)){
						echo "<option value='$ta2[id_tahun_ajaran]'>$ta2[tahun_ajaran]";
						if($ta2['semester']==0) {
						$sms2 = "Genap";
						} Else {
						$sms2 = "Ganjil";
						}
						echo " - $sms2</option>";
						}
					   } 
					?>
				</select>
			</td></tr>
		</form>
<!-- Kategori Nilai -->
		<form method="POST" action="?p=nilaisiswa" >	
	<!-- Mapel Hide -->
	<input type="hidden" name="mapel" value ="<?php echo "$_POST[mapel]";?>" />
	<!-- Tahun Hide -->
	<input type="hidden" name="tahun" value ="<?php echo "$_POST[tahun]";?>" />
	<!-- Kelas Hide -->
	<input type="hidden" name="kelas" value ="<?php echo "$_POST[kelas]";?>" />
	
		<tr class="form"><td> Kategori Nilai </td> <td>  
				<select name="kat_nilai" class="form-control" id="kat_nilai">
					<?php if(isset($_POST['kat_nilai'])){ ?>
							<?php
							$kate=mysql_query("SELECT  * FROM sh_kategori_nilai where id_kategori_nilai = '$_POST[kat_nilai]' AND id_kelas = '$ps[id_kelas]' AND id_tahun_ajaran ='$_POST[tahun]' AND id_mapel_guru = '$_POST[mapel]' ");
							while($kt=mysql_fetch_array($kate)){
							?>
							<option value="<?php echo "$kt[id_kategori_nilai]";?>" selected> <?php echo "$kt[nama_kategori_nilai]";?> </option>
							<?php } ?>
					<?php } else { ?>
						<option value="" selected> - Pilih Kategori Nilai - </option>
					<?php 
							$kate=mysql_query("SELECT  * FROM sh_kategori_nilai where id_kelas = '$ps[id_kelas]' AND id_tahun_ajaran ='$_POST[tahun]' AND id_mapel_guru = '$_POST[mapel]' ");
							while($kt=mysql_fetch_array($kate)){
							?>
							<option value="<?php echo "$kt[id_kategori_nilai]";?>"> <?php echo "$kt[nama_kategori_nilai]";?> </option>
							<?php } 
					} ?>
				</select>
			</td> </tr>	
			
	<!--Submit FORM -->
		<tr class="form"><td></td><td><input type="submit"  class ="btn btn-primary active" name="submit" value="Lihat Nilai &raquo;"></td></tr>
		</table>
		</form>
		

	<!-- Validasi Form-->
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahnilai");
			frmvalidator.addValidation("mapel","req","Mata Pelajaran Harus di Pilih !");
			frmvalidator.addValidation("kelas","req","Kelas Harus di Pilih !");
			frmvalidator.addValidation("kat_nilai","req","Kategori Nilai Harus di Pilih !");
			frmvalidator.addValidation("tahun","req","Tahun Ajaran Harus di Pilih !");
			//]]>
		</script>
		
		<?php
				//Buka Koneksi Database Websch
				$no=1;
			if (isset($_POST['submit'])) {
				// VARIABLE -> POST
				$mapel = $_POST['mapel'];
				$kelas = $_POST['kelas'];
				$kat_nilai = $_POST['kat_nilai'];
				$tahun = $_POST['tahun'];
			
			if($_POST['kat_nilai']=="semua") {
			
			// Pengambilan alamat link get untuk halaman cetak
				echo	"<p align=right>&nbsp;&nbsp;&nbsp;[<b><a href='../elearningku/konten/cetak/nilai_cetak.php?sesi=osi&id_siswa=$ps[id_siswa]&id_mapel=$_POST[mapel]&id_kelas=$_POST[kelas]&kat_nilai=$_POST[kat_nilai]&tahun=$_POST[tahun]' target=_blank>
						 Tampilan Cetak</a></b>]</p>"; ?>
			<table id="results" class="table">
			<tr>
            <th width="2%"  class="garis">No</a></th>
			<th width="15%" class="garis">Nama Siswa</a>	</th>
			<th width="10%" class="garis">NIS</a></th>
			<th width="8%"  class="garis">Kelas</a></th>
			<th width="20%" class="garis">Mata Pelajaran</a></th>
			
			   <?php
				// Mengambil Data Jenis Tagihan
				$data_kat=mysql_query("select * from sh_kategori_nilai where id_kelas = '$kelas' and id_mapel_guru = '$_POST[mapel]' ORDER BY id_kategori_nilai ASC");
				while ($isidata_kat=mysql_fetch_array($data_kat)) {
		
				echo " <th width=20% class=garis>NILAI<br/>$isidata_kat[nama_kategori_nilai]</th>";
				
				}
				
				?>
				<?php		 

				$view=mysql_query("SELECT DISTINCT siswa.id_siswa,siswa.nama_siswa, siswa.nis, nilai.id_siswa, kelas.nama_kelas, mapel.nama_mapel FROM sh_nilai nilai, sh_siswa siswa,  sh_mapel_guru mapel,sh_kategori_nilai kategori, sh_kelas kelas
								   WHERE nilai.id_siswa=siswa.id_siswa  and nilai.id_siswa = '$ps[id_siswa]' and nilai.id_kategori_nilai = kategori.id_kategori_nilai and kategori.id_kelas = '$kelas' and kategori.id_kelas = kelas.id_kelas and
								   kategori.id_mapel_guru ='$mapel' and kategori.id_mapel_guru = mapel.id_mapel_guru and kategori.id_tahun_ajaran= '$tahun' order by siswa.nama_siswa asc");
				$i = 1;
				$cek =mysql_num_rows($view);
				if($cek > 0){
				while($row=mysql_fetch_array($view)){
					?>
					<tr>
                        <td class="garis"><?php echo $i;?></td>
						<td class="garis"><?php echo $row['nama_siswa'];?></td>
						<td class="garis"><?php echo $row['nis'];?></td>
						<td class="garis"><?php echo $row['nama_kelas'];?></td>
                        <td class="garis"><?php echo $row['nama_mapel'];?></td>
						<?php
						// Ambil Data kategori
						$data_kat2=mysql_query("select * from sh_kategori_nilai where sh_kategori_nilai.id_kelas = '$kelas'  ORDER BY id_kategori_nilai ASC");
						while ($isidata_kat2=mysql_fetch_array($data_kat2)) {
						$kat = $isidata_kat2['id_kategori_nilai'];						
						// Ambil Nilai
						$query_nilai = mysql_query("select id_kategori_nilai , nilai from sh_nilai where id_kategori_nilai = '$kat' AND sh_nilai.id_siswa = '$row[id_siswa]' ORDER BY id_kategori_nilai ASC");
						while ($data_katnilai=mysql_fetch_array($query_nilai)) {
						echo " <td class=garis>$data_katnilai[nilai]</td>";
						   } // End While Nilai 
						  } // End While Kat
						?>
					</tr>
					<?php
					$i++;
				}
					$jumSis = $i-1;
			}  else { ?>
			<tr class="tabel"><td class="tabel" colspan="9"><font color="red"><b>DATA NILAI / SEMUA KATEGORI BELUM TERSEDIA</b></font></td></tr>
			<?php } ?>
		</table>
		
	<?php
		} Else { 
		
		// Pengambilan alamat link get untuk halaman cetak
				echo	"<p align=right>&nbsp;&nbsp;&nbsp;[<b><a href='../elearningku/konten/cetak/nilai_cetak.php?sesi=osikat&id_siswa=$ps[id_siswa]&id_mapel=$_POST[mapel]&id_kelas=$_POST[kelas]&kat_nilai=$_POST[kat_nilai]&tahun=$_POST[tahun]' target=_blank>
						 Tampilan Cetak</a></b>]</p>";  ?>
		<table class="table" id="results">
			<tr>
            <th width="2%"  class="garis">No</a></th>
			<th width="15%" class="garis">Nama Siswa</a>	</th>
			<th width="10%" class="garis">NIS</a></th>
			<th width="8%"  class="garis">Kelas</a></th>
			<th width="20%" class="garis">Mata Pelajaran</a></th>
			
			<?php
				// Mengambil Data Jenis Tagihan
				$data_kat=mysql_query("select * from sh_kategori_nilai where id_kategori_nilai = '$kat_nilai' and id_mapel_guru = '$_POST[mapel]' ORDER BY id_kategori_nilai ASC");
				while ($isidata_kat=mysql_fetch_array($data_kat)) {
		
				echo " <th width=20% class=garis>NILAI : $isidata_kat[nama_kategori_nilai]</th>";
				
				} // End Of While
			?>
			
			<?php
				$view=mysql_query("SELECT * FROM sh_nilai nilai, sh_siswa siswa,  sh_mapel_guru mapel,sh_kategori_nilai kategori, sh_kelas kelas
								   WHERE nilai.id_siswa=siswa.id_siswa and nilai.id_siswa = '$ps[id_siswa]' and nilai.id_kategori_nilai = kategori.id_kategori_nilai and kategori.id_kategori_nilai = '$kat_nilai' and kategori.id_kelas = '$kelas' and kategori.id_kelas = kelas.id_kelas and
								   kategori.id_mapel_guru ='$mapel' and kategori.id_mapel_guru = mapel.id_mapel_guru and kategori.id_tahun_ajaran= '$tahun' order by siswa.nama_siswa asc");
				$i = 1;
				$cek =mysql_num_rows($view);
				if($cek > 0){
				while($row=mysql_fetch_array($view)){
					?>
					<tr>
                        <td class="garis"><?php echo $i;?></td>
						<td class="garis"><?php echo $row['nama_siswa'];?></td>
						<td class="garis"><?php echo $row['nis'];?></td>
						<td class="garis"><?php echo $row['nama_kelas'];?></td>
                        <td class="garis"><?php echo $row['nama_mapel'];?></td>
                        <td class="garis"><?php echo $row['nilai'];?></td>
					</tr>
					<?php
					$i++;
				}
					$jumSis = $i-1;
			}  else { ?>
			<tr class="tabel"><td class="tabel" colspan="9"><font color="red"><b>DATA NILAI BELUM TERSEDIA</b></font></td></tr>
			<?php } ?>
		</table>
 <?php } // End IF $_POST ?>	
<?php }else{?>
		<table class="table">
			<tr>
				<th>No</th>
				<th>Nama Siswa</th>
				<th>NIS</th>
				<th>Kelas</th>
				<th>Mata Pelajaran</th>
				<th>Nilai</th>
			</tr>
			<?php
				$sh_nilai="SELECT * FROM sh_nilai,sh_siswa,sh_kelas,sh_mapel_guru,sh_kategori_nilai
						  WHERE sh_nilai.id_siswa=sh_siswa.id_siswa 
						  AND sh_kelas.id_kelas=sh_siswa.id_kelas
						  AND sh_nilai.id_kategori_nilai=sh_kategori_nilai.id_kategori_nilai
						  LIMIT 10";
				$q_nilai=mysql_query($sh_nilai);
				$no=1;
				while($d_nilai=mysql_fetch_array($q_nilai)){?>
					<tr>
						<td><?php echo $no++?></td>
						<td><?php echo $d_nilai['nama_siswa']?></td>
						<td><?php echo $d_nilai['nis']?></td>
						<td><?php echo $d_nilai['nama_kelas']?></td>
						<td><?php echo $d_nilai['nama_mapel']?></td>
						<td><?php echo $d_nilai['nama_kategori_nilai']."-".$d_nilai['nilai']?></td>
					</tr>
			<?php }?>
		</table>
<?php } // End Submit ?>

		<div id="pageNavPosition"></div>
		<script type="text/javascript"><!--
        var pager = new Pager('results', 5); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
	  <br/>
    </div>
   </div>
  </div>
	