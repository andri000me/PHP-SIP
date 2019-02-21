<script type="text/javascript">
// Bagian Kategori Nilai
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=mapel>
  $("#tahun").change(function(){
    var kelas = $("#kelas").val();
	 hasilkelas = parseFloat(kelas);
	 var tahun = $("#tahun").val();
	  hasiltahun = parseFloat(tahun);
	  var mapel = $("#mapel").val();
	   hasilmapel = parseFloat(mapel);
	 //Pemisah Variabel
	    var dan = "-";
	     hasildan = String(dan);
    $.ajax({
        url: "carikat.php",
        data: "kelas="+hasilkelas+hasildan+hasiltahun+hasildan+hasilmapel,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=guru>
            $("#kat_nilai").html(msg);
        }
    });
  });
  $("#kat_nilai").change(function(){
    var kat_nilai = $("#kat_nilai").val();
    $.ajax({
        url: "",
        data: "kat_nilai="+kat_nilai,
        cache: false,
        success: function(msg){
            $("#ggg").html(msg);
        }
    });
  });
});
</script>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"> Tambah Nilai </h3></div>
<div class="panel-body"> <br/>
<a href ="index.php?p=nilai"> << Kembali ke NILAI </a> <br/>  <br/>
<!--  start step-holder 
		<div id="step-holder">
		  <div class="step-no-off">1</div>
			<div class="step-light-left"><a href="?p=tambahnilai">Pilih Mata Pelajaran</a></div>
			<div class="step-light-right">&nbsp;</div>
            <div class="step-no">2</div>
			<div class="step-dark-left">Input Nilai Siswa</div>
			<div class="step-dark-right">&nbsp;</div>
			<div class="step-no-off">3</div>
			<div class="step-light-left">Selesai</div>
			<div class="step-light-round">&nbsp;</div>
			<div class="clear"></div>
		</div>
  end step-holder -->
	
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
    
		<form id="mainform" class="form-horizontal table-responsive" method="post" name="tambahnilai" id="tambahnilai">
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
		
		<!--Tahun Ajaran-->
			
					<tr class="form"><td> Tahun Ajaran</td><td>
					<?php if (isset($_POST['tahun'])) { ?>	
						<select name="tahun" id="tahun" class="form-control" Readonly="Readonly">
							<?php
							$tampilta=mysql_query("SELECT * FROM sh_tahun_ajaran Where id_tahun_ajaran = '$_POST[tahun]'");
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
							$tampilta=mysql_query("SELECT * FROM sh_tahun_ajaran");
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
							
						<?php } ?>
						</select>
					</td></tr>
					
		<!-- Kategori Nilai -->
					
			<tr class="form"><td> Kategori Nilai </td> <td>  	
					<?php if (isset($_POST['kat_nilai'])) { ?>	
						<select name="kat_nilai" class="form-control" id="kat_nilai" Readonly="Readonly">
							<?php
							$kat=mysql_query("SELECT * FROM sh_kategori_nilai where id_kelas = '$id_kelas' AND id_kategori_nilai = '$_POST[kat_nilai]'");
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
						</select>
						<?php } ?>
					</td> </tr>
		
		<!--Submit FORM -->
		<?php if(isset($_POST['submit'])){ ?>
		<!-- <input type="button" class ="pencet" value="<< Kembali" onclick="window.location.href='?p=tambahnilai';"> -->
		<?php } Else { ?>
		<tr class="form"><td></td><td><input type="submit"  class ="btn btn-primary active" name="submit" value="Input Nilai &raquo;" style="float : right"></td></tr>
		<?php } ?>
		</table>
		</form>

       <?php if(isset($_POST['submit'])) { ?>
	
	<?php 
		$query=mysql_query("select * from sh_nilai where id_kategori_nilai ='$_POST[kat_nilai]' and id_tahun_ajaran='$_POST[tahun]'");
		$data=mysql_fetch_array($query);
		$cek=mysql_num_rows($query);
		
		if($cek <> '0'){
			//kalo belum ada mode update
			?><script language="javascript">document.location.href="?p=input_nilai_update&id_mapel=<?php echo $_POST['mapel'];?>&id_kelas=<?php echo $_POST['kelas'];?>&kat_nilai=<?php echo $_POST['kat_nilai'];?>&tahun=<?php echo $_POST['tahun'];?>";</script><?php
		} else {  ?>
	
		<form action="proses-nilai.php" method="post" name="tambahnilai" id="tambahnilai">
		<table border="1" width="48%" cellpadding="0" cellspacing="0" class="table" id="results">
        <tr>
            <th width="5%" class="garis"  align="center">No</th>
            <th width="30%" class="garis" align="center">NAMA SISWA</th>
            <th width="20%" class="garis" align="center">NIS</th>
			<?php
				// VARIABLE -> POST
				$mapel = $_POST['mapel'];
				$kelas = $_POST['kelas'];
				// VARIABLE KATEGORI & TAHUN
				$kat_nilai = $_POST['kat_nilai'];
				$tahun = $_POST['tahun'];
				// QUERY KATEGORI
				$data_kat=mysql_query("select * from sh_kategori_nilai where id_kategori_nilai = '$kat_nilai' ");
				while ($isidata_kat=mysql_fetch_array($data_kat)) {
		
				echo " <th width=20% class=garis align=center>NILAI : $isidata_kat[nama_kategori_nilai]</th>";
				
				} // End Of While
				
				echo " </tr>"; 
			?>

		<?php
		$view=mysql_query("SELECT * FROM sh_siswa where id_kelas ='$kelas' order by sh_siswa.nama_siswa asc");
		
		$i = 1;
		while($row=mysql_fetch_array($view)){
			?>
			<input type="hidden" name="namaguru" value="<?php echo $nama_guru;?>" />
			<input type="hidden" name="kategori" value="<?php echo $kat_nilai;?>" />	
			<input type="hidden" name="tahun" value="<?php echo $tahun;?>" />
			<input type="hidden" name="kelas" value="<?php echo $kelas;?>" />
			<input type="hidden" name="mapel" value="<?php echo $mapel;?>" />
			<?php echo "<input type='hidden' name='id_siswa".$i."' value='".$row['id_siswa']."' />"; ?>
			<tr>
				<td class="garis"><?php echo $i;?></td>
				<td class="garis" ><?php echo $row['nama_siswa'];?></td>
				<td class="garis" ><?php echo $row['nis'];?></td>
				<td class="garis" align="center"><?php echo "<input type='text' name='nilai".$i."' size='1'/>"; ?></td>
			</tr>
			<?php
			$i++;
		}
			$jumSis = $i-1;
		?>
        <input type="hidden" name="jumlah" value="<?php echo $jumSis ?>" />
        </table>
				
	  <!-- Validasi Form-->
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahnilai");
			frmvalidator.addValidation("kat_nilai","req","Kategori Harus di Pilih !");
			frmvalidator.addValidation("tahun","req","Tahun Ajaran Harus di Pilih !");
			//]]>
		</script>
		
	  <div class="clear"></div>
	  <div id="pageNavPosition"></div>
			    <script type="text/javascript"><!--
				var pager = new Pager('results', 10); 
				pager.init(); 
				pager.showPageNav('pager', 'pageNavPosition'); 
				pager.showPage(1);
			//--></script>
			<br/>
	<!-- Sumbit Nilai -->		
		<center>
		<input type="submit" onclick="return confirm('Apakah Anda yakin?')" value=" Proses Nilai &raquo;" name="submit"  class ="btn btn-primary active"/>
		</center>
        <!--  end product-table................................... --> 
        </form>
	<?php } ?>
 <?php } ?>
</div>
</div>