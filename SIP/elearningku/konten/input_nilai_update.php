<?php

if(isset($_POST['submit'])){
	
	$jumSis = $_POST['jumlah'];
	
	
	for ($i=1; $i<=$jumSis; $i++)
	{
	    //Mengambil data dari Method POST Form
	   $id_siswa = $_POST['id_siswa'.$i];
	   $nilai  = $_POST['nilai'.$i];
	   $kategori = $_POST['kategori'];
	   $tahun = $_POST['tahun'];
	   $mapel = $_POST['mapel'];
	   $kelas = $_POST['kelas'];
	   $namaguru= $_POST['namaguru'];
	   //Query Update 
	   $query = "update sh_nilai set nilai ='$nilai' where id_siswa ='$id_siswa' and id_kategori_nilai='$kategori' and id_tahun_ajaran='$tahun'";
	   $hasil=mysql_query($query);
	}
	
	if($hasil){
		?><script language="javascript">document.location.href="index.php?p=input_nilai_selesai&id_kelas=<?php echo $kelas;?>&id_mapel=<?php echo $mapel;?>&kat_nilai=<?php echo $kategori;?>&tahun=<?php echo $tahun;?>";</script><?php
	}else{
		?><script language="javascript">document.location.href="?p=tambahnilai";</script><?php
	}
	
	
} else {
	unset($_POST['submit']);
}


?>
<div class="panel panel-primary">
    <div class="panel-heading"><h3 class="panel-title" align="center"> Tambah Nilai </h3></div>
<div class="panel-body ">
<div class="table-responsive"> <br/>
	 <a href ="index.php?p=nilai"> << Kembali ke NILAI </a> <br/> <br/>
    	<?php
		
		// GET DARI URL
		$id_kelas=$_GET['id_kelas'];
		$id_mapel=$_GET['id_mapel'];
		$kat_nilai = $_GET['kat_nilai'];
		$tahun = $_GET['tahun'];
		//QUERY
		$guru=mysql_fetch_array(mysql_query("select * from sh_guru_staff where nip='$nip'"));
		$kelas=mysql_fetch_array(mysql_query("select * from sh_kelas where id_kelas='$id_kelas'"));
		$pelajaran=mysql_fetch_array(mysql_query("select * from sh_mapel where id_mapel='$id_mapel'"));
		//VARIABLE DARI QUERY
		$id_guru=$guru['id_gurustaff'];
		$nama_guru=$guru['nama_gurustaff'];
		$nama_kelas=$kelas['nama_kelas'];
		$nama_mapel=$pelajaran['nama_mapel'];
		
		?>
    
		<form id="mainform" action="" method="post" name="tambahnilai" id="tambahnilai" class="form-horizontal">
        <table border="0" cellpadding="0" cellspacing="0" class="table">
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
						
					<?php if (isset($_GET['kat_nilai'])) { ?>	
					<select name="kat_nilai" class="form-control" id="kat_nilai" Readonly="Readonly">
							<?php
							$kat=mysql_query("SELECT * FROM sh_kategori_nilai where id_kelas = '$id_kelas' AND id_kategori_nilai = '$_GET[kat_nilai]'");
							while($kt=mysql_fetch_array($kat)){
							?>
							<option value="<?php echo "$kt[id_kategori_nilai]";?>" selected><?php echo "$kt[nama_kategori_nilai]";?></option>
							<?php } ?>
					</select>							
						<?php } else { ?>
					<select name="kat_nilai" class="form-control" id="kat_nilai">	
						<option value="" selected>-Pilih Kategori Nilai-</option> 
							<?php
							$kat=mysql_query("SELECT * FROM sh_kategori_nilai where id_kelas = '$id_kelas'");
							while($kt=mysql_fetch_array($kat)){
							?>
							<option value="<?php echo "$kt[id_kategori_nilai]";?>"><?php echo "$kt[nama_kategori_nilai]";?></option>
							<?php } ?>
						
						<?php } ?>
					</select>
					
				</td> </tr>
					
					
		<!--Tahun Ajaran-->
			
					<tr class="form"><td> Tahun Ajaran</td><td>
						
					<?php if (isset($_GET['tahun'])) { ?>	
						<select name="tahun" id="tahun" class="form-control" Readonly="Readonly">
							<?php
							$tampilta=mysql_query("SELECT * FROM sh_tahun_ajaran Where id_tahun_ajaran = '$_GET[tahun]'");
							while($ta=mysql_fetch_array($tampilta)){
							echo "<option value='$ta[id_tahun_ajaran]'>$ta[tahun_ajaran]";
							if($ta['semester']==0) {
							$sms = "Genap";
							} Else {
							$sms = "Ganjil";
							}
							echo " - $sms(Aktif)</option>";
							}
							?>
						</select>	
						  <?php } else { ?>
						<select name="tahun" id="tahun" class="form-control">  
						  <option value="" selected>Tampil Berdasarkan Tahun Ajaran</option>
							<?php
							$tampilta=mysql_query("SELECT * FROM sh_tahun_ajaran Where aktif = 1");
							while($ta=mysql_fetch_array($tampilta)){
							echo "<option value='$ta[id_tahun_ajaran]'>$ta[tahun_ajaran]";
							if($ta['semester']==0) {
							$sms = "Genap";
							} Else {
							$sms = "Ganjil";
							}
							echo " - $sms(Aktif)</option>";
							}
							?>
						</select>	
						<?php } ?>
						</select>
					</td></tr>
			  </table>

        <table border="0" width="48%" cellpadding="0" cellspacing="0" class="table" id="results">
       <tr>
           <th width="5%" class="garis"  align="center">No</th>
            <th width="30%" class="garis" align="center">NAMA SISWA</th>
            <th width="20%" class="garis" align="center">NIS</th>
			<?php
				// QUERY KATEGORI
				$data_kat=mysql_query("select * from sh_kategori_nilai where id_kategori_nilai = '$kat_nilai' ");
				while ($isidata_kat=mysql_fetch_array($data_kat)) {
		
				echo " <th width=20% class=garis align=center>NILAI : $isidata_kat[nama_kategori_nilai]</th>";
				
				} // End Of While
				
				echo " </tr>"; 
			?>
        
        <?php
		$guru=$_SESSION['guru'];
		$view=mysql_query("SELECT * FROM sh_nilai nilai, sh_siswa siswa,  sh_mapel_guru mapel,sh_kategori_nilai kategori, sh_kelas kelas
								   WHERE nilai.id_siswa=siswa.id_siswa and nilai.id_kategori_nilai = kategori.id_kategori_nilai and kategori.id_kategori_nilai = '$kat_nilai' and kategori.id_kelas = '$id_kelas' and kategori.id_kelas = kelas.id_kelas and
								   kategori.id_mapel_guru ='$id_mapel' and kategori.id_mapel_guru = mapel.id_mapel_guru and kategori.id_tahun_ajaran= '$tahun' order by siswa.nama_siswa asc");
		$i = 1;
		while($row=mysql_fetch_array($view)){
			?>
            <input type="hidden" name="namaguru" value="<?php echo $nama_guru;?>" />
			<input type="hidden" name="kategori" value="<?php echo $kat_nilai;?>" />	
			<input type="hidden" name="tahun" value="<?php echo $tahun;?>" />
			<input type="hidden" name="kelas" value="<?php echo $id_kelas;?>" />
			<input type="hidden" name="mapel" value="<?php echo $id_mapel;?>" />
            <?php echo "<input type='hidden' name='id_siswa".$i."' value='".$row['id_siswa']."' />"; ?>
			<tr>
				<td class="garis"><?php echo $i;?></td>
				<td class="garis"><?php echo $row['nama_siswa'];?></td>
				<td class="garis"><?php echo $row['nis'];?></td>
				<td class="garis" align="center"><?php echo "<input type='text' name='nilai".$i."' size='1' value='".$row['nilai']."'/>"; ?></td>
			</tr>
			<?php
			$i++;
		}
			$jumSis = $i-1;
		?>
        <input type="hidden" name="jumlah" value="<?php echo $jumSis ?>" />

        </table>
		
		<div class="clear"></div>
		  <div id="pageNavPosition"></div>
					<script type="text/javascript"><!--
					var pager = new Pager('results', 10); 
					pager.init(); 
					pager.showPageNav('pager', 'pageNavPosition'); 
					pager.showPage(1);
				//--></script>
		<!-- SUBMIT FORM -->
		<br/>
		<center>		
		<input type="submit" onclick="return confirm('Apakah Anda yakin?')" value=" Update Nilai " name="submit"  class ="btn btn-primary active"/>
		</center>
        <!--  end product-table................................... --> 
        </form>
     </div>
   </div>
  </div>