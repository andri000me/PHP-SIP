<!-- Combo Cari Guru -->
<script type="text/javascript" src="js/jquery-combo.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=mapel>
  $("#mapel").change(function(){
    var mapel = $("#mapel").val();
    $.ajax({
        url: "carikelas.php",
        data: "mapel="+mapel,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=guru>
            $("#kelas").html(msg);
        }
    });
  });
  $("#kelas").change(function(){
    var guru = $("#kelas").val();
    $.ajax({
        url: "",
        data: "kelas="+guru,
        cache: false,
        success: function(msg){
            $("#ggg").html(msg);
        }
    });
  });
});
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
<div class="panel-heading"><h3 class="panel-title">Laporan Nilai Siswa</h3></div>
<div class="panel-body">
		<div class="row">
		  <div class="col-sm-12">
			<input type="button" class ="btn btn-primary active" value="Kategori Nilai" onclick="window.location.href='?p=kategorinilai';">  &nbsp;|&nbsp;
			<input type="button" class ="btn btn-primary active" value="Tambahkan Nilai" onclick="window.location.href='?p=tambahnilai';">		
		  </div>
        </div><br />
        <form class="form-horizontal" method="POST" action="index.php?p=nilai&inputnilai=ok" enctype="multipart/form-data" name="tambahnilai" id="tambahnilai">
		<table class="table" cellpadding="1" cellspacing="1">	
<!-- Mata Pelajaran -->
			
		<tr class="form"><td> Mata Pelajaran </td> <td>  
				<select name="mapel" class="form-control" id="mapel">
					<option value="" selected>Pilih Mata Pelajaran</option> 
					<?php
					$mpl=mysql_query("SELECT * FROM sh_mapel_guru where id_gurustaff = '$_SESSION[idguru]'");
					while($mp=mysql_fetch_array($mpl)){
					?>
					<option value="<?php echo "$mp[id_mapel_guru]";?>"><?php echo "$mp[nama_mapel]";?></option>
					<?php } ?>
				</select>
			</td> </tr>
		
		
<!-- Kelas -->
		<tr><td class="isiankanan">Kelas</td><td class="isian"> 
			<select name="kelas" id="kelas" class="form-control">
				<option value="" selected>-- Pilih Kelas --</option>
		    </select>
			</td></tr>

<!--Tahun Ajaran-->
	
			<tr class="form"><td> Tahun Ajaran</td><td>
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
					echo " - $sms</option>";
					}
					?>
				</select>
			</td></tr>

<!-- Kategori Nilai -->
			
		<tr class="form"><td> Kategori Nilai </td> <td>  
				<select name="kat_nilai" class="form-control" id="kat_nilai">
					<option value="" selected>-Pilih Kategori Nilai-</option> 
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
		
		<?php /*     END OF HTML ON NILAI        */ ?>
		
		<?php
		// POST DARI FORM 
		$p = $_GET['p'];
		$oke = $_GET['inputnilai'];
		if (isset($_POST['submit'])) {
			// VARIABLE -> POST
			$mapel = $_POST['mapel'];
			$kelas = $_POST['kelas'];
			$kat_nilai = $_POST['kat_nilai'];
			$tahun = $_POST['tahun'];
		
		if($_POST['kat_nilai']=="semua") {

			// Pengambilan alamat link get untuk halaman cetak
				echo	"<p align=right>&nbsp;&nbsp;&nbsp;[<b><a href='../elearningku/konten/cetak/nilai_cetak.php?sesi=guru&id_mapel=$_POST[mapel]&id_kelas=$_POST[kelas]&kat_nilai=$_POST[kat_nilai]&tahun=$_POST[tahun]' target=_blank>
						 Tampilan Cetak</a></b>]</p>"; ?>
		
		<table class="table"  id="results">
			<tr>
            <th width="2%"  class="garis">No</a></th>
			<th width="15%" class="garis">Nama Siswa</a>	</th>
			<th width="10%" class="garis">NIS</a></th>
			<th width="8%"  class="garis">Kelas</a></th>
			<th width="20%" class="garis">Mata Pelajaran</a></th>
			
			   <?php
				// Mengambil Data Jenis Tagihan
				$data_kat=mysql_query("select * from sh_kategori_nilai where id_kelas = '$kelas' and id_tahun_ajaran = '$tahun' and id_mapel_guru = '$mapel' ORDER BY id_kategori_nilai ASC");
				while ($isidata_kat=mysql_fetch_array($data_kat)) {
		
				echo " <th width=20% class=garis>NILAI<br/>$isidata_kat[nama_kategori_nilai]</th>";
				
				}
				
				?>
			
			
			<?php
				$guru=$_SESSION['guru'];
				$view=mysql_query("SELECT DISTINCT siswa.id_siswa,siswa.nama_siswa, siswa.nis, nilai.id_siswa, kelas.nama_kelas, mapel.nama_mapel FROM sh_nilai nilai, sh_siswa siswa,  sh_mapel_guru mapel,sh_kategori_nilai kategori, sh_kelas kelas
								   WHERE nilai.id_siswa=siswa.id_siswa and nilai.id_kategori_nilai = kategori.id_kategori_nilai and kategori.id_kelas = '$kelas' and kategori.id_kelas = kelas.id_kelas and
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
						$data_kat2=mysql_query("select * from sh_kategori_nilai where sh_kategori_nilai.id_kelas = '$kelas' and id_tahun_ajaran = '$tahun' and id_mapel_guru = '$mapel' ORDER BY id_kategori_nilai ASC");
						while ($isidata_kat2=mysql_fetch_array($data_kat2)) {
						$kat = $isidata_kat2['id_kategori_nilai'];
						$thn = $isidata_kat2['id_tahun_ajaran'];							
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
				<div class="clear"></div>
				<div id="pageNavPosition"></div>
			    <script type="text/javascript"><!--
				var pager = new Pager('results', 10); 
				pager.init(); 
				pager.showPageNav('pager', 'pageNavPosition'); 
				pager.showPage(1);
			//--></script>
		
		<?php
		}  Else  { 
		
		// Pengambilan alamat link get untuk halaman cetak
				echo	"<p align=right>&nbsp;&nbsp;&nbsp;[<b><a href='../elearningku/konten/cetak/nilai_cetak.php?sesi=gurukat&id_mapel=$_POST[mapel]&id_kelas=$_POST[kelas]&kat_nilai=$_POST[kat_nilai]&tahun=$_POST[tahun]' target=_blank>
						 Tampilan Cetak</a></b>]</p>";  ?>
		<table class="table"  id="results">
			<tr>
            <th width="2%"  class="garis">No</a></th>
			<th width="15%" class="garis">Nama Siswa</a>	</th>
			<th width="10%" class="garis">NIS</a></th>
			<th width="8%"  class="garis">Kelas</a></th>
			<th width="20%" class="garis">Mata Pelajaran</a></th>
			
			<?php
				// Mengambil Data Jenis Tagihan
				$data_kat=mysql_query("select * from sh_kategori_nilai where id_kategori_nilai = '$kat_nilai' ");
				while ($isidata_kat=mysql_fetch_array($data_kat)) {
		
				echo " <th width=20% class=garis>NILAI : $isidata_kat[nama_kategori_nilai]</th>";
				
				} // End Of While
			?>
			
			<?php
				$guru=$_SESSION['guru'];
				$view=mysql_query("SELECT * FROM sh_nilai nilai, sh_siswa siswa,  sh_mapel_guru mapel,sh_kategori_nilai kategori, sh_kelas kelas
								   WHERE nilai.id_siswa=siswa.id_siswa and nilai.id_kategori_nilai = kategori.id_kategori_nilai and kategori.id_kategori_nilai = '$kat_nilai' and kategori.id_kelas = '$kelas' and kategori.id_kelas = kelas.id_kelas and
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
			<div class="clear"></div>
			<div id="pageNavPosition"></div>
				<script type="text/javascript"><!--
				var pager = new Pager('results', 10); 
				pager.init(); 
				pager.showPageNav('pager', 'pageNavPosition'); 
				pager.showPage(1);
			//--></script>
			<br/>
		
		<!-- Button Ubah Data-->
		<?php if($cek <> 0){ ?>
		<center>
			<input type="button" class ="btn btn-primary active" value="Ubah Nilai" onclick="window.location.href='?p=input_nilai_update&id_mapel=<?php echo $_POST['mapel'];?>&id_kelas=<?php echo $_POST['kelas'];?>&kat_nilai=<?php echo $_POST['kat_nilai'];?>&tahun=<?php echo $_POST['tahun'];?>';">	
		</center>
		<?php } ?>
	  <?php } ?>
	<?php  } // Else of GET ?>		
   </div>
  </div>
 </div>
			   