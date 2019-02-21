<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"> Tambah Nilai </h3></div>
<div class="panel-body table-responsive"> <br/>
 <a href ="index.php?p=nilai"> << Kembali ke NILAI </a> <br/> <br/>
  
    	<?php
		
		//VARIABLE DARI $_GET
		$id_kelas=$_GET['id_kelas'];
		$id_mapel=$_GET['id_mapel'];
		//QUERY PEMANGGILAN DATA
		$guru=mysql_fetch_array(mysql_query("select * from sh_guru_staff where id_gurustaff = '$_SESSION[idguru]'")); //berdasarkan session idguru
		$kelas=mysql_fetch_array(mysql_query("select * from sh_kelas where id_kelas='$id_kelas'"));
		$pelajaran=mysql_fetch_array(mysql_query("select * from sh_mapel where id_mapel='$id_mapel'"));
		//HASIL QUERY KE DALAM DATABASE
		$nama_guru=$guru['nama_gurustaff'];
		$nama_kelas=$kelas['nama_kelas'];
		$nama_mapel=$pelajaran['nama_mapel'];
		
		?>
    
       
       <table class="table" border="0" cellpadding="0" cellspacing="0" >
        
		 <!-- Mata Pelajaran -->
					
				<tr class="form"><td> Mata Pelajaran </td> <td>  
						<select name="mapel" class="form-control" id="mapel" Readonly="Readonly">
							<?php
							$mpl=mysql_query("SELECT * FROM sh_mapel_guru where id_mapel_guru = '$id_mapel'");
							while($mp=mysql_fetch_array($mpl)){
							?>
							<option value="<?php echo "$mp[id_mapel_guru]";?>" selected><?php echo "$mp[nama_mapel]";?></option>
							<?php } ?>
						</select>
					</td> </tr>
				
				
		<!-- Kelas -->
		
				<tr><td class="isiankanan">Kelas</td><td class="isian"> 
					<select name="kelas" id="kelas" class="form-control" Readonly="Readonly">
							<?php
							$kls=mysql_query("SELECT * FROM sh_kelas where id_kelas = '$id_kelas'");
							while($kl=mysql_fetch_array($kls)){
							?>
							<option value="<?php echo "$kl[id_kelas]";?>" selected><?php echo "$kl[nama_kelas]";?></option>
							<?php } ?>
					</select>
					</td></tr>

		<!-- Kategori Nilai -->
					
				<tr class="form"><td> Kategori Nilai </td> <td>  
						<select name="kat_nilai" class="form-control" id="kat_nilai" Readonly="Readonly">
							<?php
							$kat=mysql_query("SELECT * FROM sh_kategori_nilai where id_kelas = '$id_kelas' AND id_kategori_nilai = '$_GET[kat_nilai]'");
							while($kt=mysql_fetch_array($kat)){
							?>
							<option value="<?php echo "$kt[id_kategori_nilai]";?>" selected><?php echo "$kt[nama_kategori_nilai]";?></option>
							<?php } ?>
						</select>
					</td> </tr>
					
					
		<!--Tahun Ajaran-->
			
					<tr class="form"><td> Tahun Ajaran</td><td>
						<select name="tahun" id="tahun" class="form-control" Readonly="Readonly">
							<?php
							$tampilta=mysql_query("SELECT * FROM sh_tahun_ajaran Where id_tahun_ajaran = '$_GET[tahun]'");
							while($ta=mysql_fetch_array($tampilta)){
							echo "<option value='$ta[id_tahun_ajaran]' selected>$ta[tahun_ajaran]";
							if($ta['semester']==0) {
							$sms = "Genap";
							} Else {
							$sms = "Ganjil";
							}
							echo " - $sms(Aktif)</option>";
							}
							?>
						</select>
					</td></tr>
				</table>
			<br />

        <form class="table-responsive" id="mainform" action="?page=tambahnilai" method="post">
		
       <table class="table"  id="results">
			<tr>
            <th width="2%"  class="garis" align="center">No</a></th>
			<th width="15%" class="garis" align="center">NAMA SISWA</a>	</th>
			<th width="10%" class="garis" align="center">NIS</a></th>
			<?php // QUERY KATEGORI
				$data_kat=mysql_query("select * from sh_kategori_nilai where id_kategori_nilai = '$_GET[kat_nilai]' ");
				while ($isidata_kat=mysql_fetch_array($data_kat)) {
		
				echo " <th width=20% class=garis align=center>NILAI : $isidata_kat[nama_kategori_nilai]</th>";
				
				} // End Of While
				
				echo " </tr>"; 
			?>
        
        
        <?php
		$guru=$_SESSION['guru'];
		$view=mysql_query("SELECT * FROM sh_nilai nilai, sh_siswa siswa,  sh_mapel_guru mapel,sh_kategori_nilai kategori, sh_kelas kelas
								   WHERE nilai.id_siswa=siswa.id_siswa and nilai.id_kategori_nilai = kategori.id_kategori_nilai and kategori.id_kategori_nilai = '$_GET[kat_nilai]' and kategori.id_kelas = '$id_kelas' and kategori.id_kelas = kelas.id_kelas and
								   kategori.id_mapel_guru ='$id_mapel' and kategori.id_mapel_guru = mapel.id_mapel_guru and kategori.id_tahun_ajaran= '$_GET[tahun]' order by siswa.nama_siswa asc");
		$i = 1;
		while($row=mysql_fetch_array($view)){
			?>
			<tr>
                <td class="garis"><?php echo $i;?></td>
				<td class="garis"><?php echo $row['nama_siswa'];?></td>
				<td class="garis"><?php echo $row['nis'];?></td>
                <td class="garis"><?php echo $row['nilai'];?></td>
			</tr>
			<?php
			$i++;
		}
			$jumSis = $i-1;
		?>
        <input type="hidden" name="jumlah" value="<?php echo $jumSis ?>" />
        </table>
        <!--  end product-table................................... --> 
        </form>
	  <div class="clear"></div>
	  <div id="pageNavPosition"></div>
			    <script type="text/javascript"><!--
				var pager = new Pager('results', 10); 
				pager.init(); 
				pager.showPageNav('pager', 'pageNavPosition'); 
				pager.showPage(1);
			//--></script> <br>
		<!-- Sumbit Nilai -->		
		<center>
		<input type="submit" onclick="window.location.href='?p=tambahnilai';" value="Selesai" name="submit"  class ="btn btn-primary active"/>
		</center>
     </div>
	 </div>