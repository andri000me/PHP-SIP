<html>
<head>
<title> LAPORAN NILAI CETAK </title>
<link rel="stylesheet" href="css/style_print.css" type="text/css"/>
</head>
<body>
<?php
//Mengambil Koneksi
include('../../../konfigurasi/koneksi.php');

// VARIABLE -> POST
$mapel = $_GET['id_mapel'];
$kelas = $_GET['id_kelas'];
$idsiswa = $_GET['id_siswa'];
$kat_nilai = $_GET['kat_nilai'];
$tahun = $_GET['tahun'];

//Cek sesi = guru
if ($_GET['sesi'] == "guru") { ?>
		<div class="sd_left">
		<div class="text_padding">
		<p align="center"><a href =# onclick='window.print()' title=Print style=text-decoration:none> <img src=ico-printer.png width=75 height=75> </a> </p>
		<p align="center"> <h1 align="center"> <b> LAPORAN NILAI </b> </h1> </p>
		<table width=60% border=1 cellpading=0 cellspacing=0 class=table2 align=center>
		<tr bgcolor=#dedede>
            <th width="2%"  class="garis">No</a></th>
			<th width="25%" class="garis">Nama Siswa</a>	</th>
			<th width="10%" class="garis">NIS</a></th>
			<th width="8%"  class="garis">Kelas</a></th>
			<th width="25%" class="garis">Mata Pelajaran</a></th>
			
			   <?php
				// Mengambil Data Jenis Tagihan
				$data_kat=mysql_query("select * from sh_kategori_nilai where id_kelas = '$kelas' and id_tahun_ajaran = '$tahun' and id_mapel_guru = '$mapel' ORDER BY id_kategori_nilai ASC");
				while ($isidata_kat=mysql_fetch_array($data_kat)) {
		
				echo " <th width=10% class=garis>NILAI<br/>$isidata_kat[nama_kategori_nilai]</th>";
				
				}
				
				?>
			<th width="20%" class="garis"> Rata Nilai </a></th>
			<th width="15%" class="garis"> KKM </a></th>
			<th width="25%" class="garis"> Keterangan </a></th>
			
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
						// Ambil Nilai
						$query_nilai = mysql_query("select id_kategori_nilai , nilai from sh_nilai where id_kategori_nilai = '$kat' AND sh_nilai.id_siswa = '$row[id_siswa]' ORDER BY id_kategori_nilai ASC");
						while ($data_katnilai=mysql_fetch_array($query_nilai)) {
						echo " <td class=garis>$data_katnilai[nilai]</td>";
						   } // End While Nilai 
						  } // End While Kat
						// Ambil Rata Nilai
						$query_count = mysql_fetch_array(mysql_query("SELECT COUNT( * ) AS bagi FROM sh_kategori_nilai WHERE sh_kategori_nilai.id_mapel_guru = '$mapel' AND sh_kategori_nilai.id_kelas = '$kelas' and id_tahun_ajaran = '$tahun'"));
						$query_sum = mysql_query("select SUM(nilai) / '$query_count[bagi]' as jumlah from sh_nilai where id_kategori_nilai = '$kat' AND sh_nilai.id_siswa = '$row[id_siswa]'");
						while ($data_sum=mysql_fetch_array($query_sum)) {
						echo "<td class=garis>".round($data_sum[jumlah],0)."</td>";
						$jumlah = round($data_sum[jumlah],0);
						?>
						<?php
						// Ambil KKM
						$query_kkm = mysql_query("select sh_mapel.KKM  from sh_mapel , sh_mapel_guru where sh_mapel_guru.id_mapel = sh_mapel.id_mapel AND sh_mapel_guru.id_mapel_guru = '$mapel'");
						while ($data_kkm=mysql_fetch_array($query_kkm)) {
						echo "<td class=garis>$data_kkm[KKM]</td>";
						// Perbandingan KKM
						if($jumlah < $data_kkm['KKM']) {
							echo " <td class=garis><font color=red> TIDAK TUNTAS </font> </td>";
							} Else {
							echo " <td class=garis> TUNTAS </td>";
							}
						   } // End While KKM
						 } // End While jumlah
						?>
					</tr>
					<?php
					$i++;
				}
					$jumSis = $i-1;
			}  else { ?>
			<tr class="tabel"><td class="tabel" colspan="10"><font color="red"><b>DATA NILAI / SEMUA KATEGORI BELUM TERSEDIA</b></font></td></tr>
			<?php } ?>
		</table>
	  </div>	 
    </div>	  
<?php } // End Of Cek Guru

Else if ($_GET['sesi'] == "gurukat") { ?>

<div class="sd_left">
		<div class="text_padding">
		<p align="center"><a href =# onclick='window.print()' title=Print style=text-decoration:none> <img src=ico-printer.png width=75 height=75> </a> </p>
		<p align="center"> <h1 align="center"> <b> LAPORAN NILAI </b> </h1> </p>
		<table width=60% border=1 cellpading=0 cellspacing=0 class=table2 align=center>
		<tr bgcolor=#dedede>
            <th width="2%"  class="garis">No</a></th>
			<th width="25%" class="garis">Nama Siswa</a>	</th>
			<th width="10%" class="garis">NIS</a></th>
			<th width="8%"  class="garis">Kelas</a></th>
			<th width="25%" class="garis">Mata Pelajaran</a></th>
			
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
	  </div>	 
    </div>	 
	
<?php
//Cek sesi = orangtua || siswa
} Else if ($_GET['sesi'] == "osi") { ?>

<div class="sd_left">
		<div class="text_padding">
		<p align="center"><a href =# onclick='window.print()' title=Print style=text-decoration:none> <img src=ico-printer.png width=75 height=75> </a> </p>
		<p align="center"> <h1 align="center"> <b> LAPORAN NILAI </b> </h1> </p>
		<table width=60% border=1 cellpading=0 cellspacing=0 class=table2 align=center>
		<tr bgcolor=#dedede>
            <th width="2%"  class="garis">No</a></th>
			<th width="25%" class="garis">Nama Siswa</a>	</th>
			<th width="10%" class="garis">NIS</a></th>
			<th width="8%"  class="garis">Kelas</a></th>
			<th width="25%" class="garis">Mata Pelajaran</a></th>
			
			   <?php
				// Mengambil Data Jenis Tagihan
				$data_kat=mysql_query("select * from sh_kategori_nilai where id_kelas = '$kelas'  and id_tahun_ajaran = '$tahun' and id_mapel_guru = '$mapel' ORDER BY id_kategori_nilai  ASC");
				while ($isidata_kat=mysql_fetch_array($data_kat)) {
		
				echo " <th width=10% class=garis>NILAI<br/>$isidata_kat[nama_kategori_nilai]</th>";
				
				}
				
				?>
			<th width="20%" class="garis"> Rata Nilai </a></th>
			<th width="15%" class="garis"> KKM </a></th>
			<th width="25%" class="garis"> Keterangan </a></th>
			
			<?php
				$guru=$_SESSION['guru'];
				$view=mysql_query("SELECT DISTINCT siswa.id_siswa,siswa.nama_siswa, siswa.nis, nilai.id_siswa, kelas.nama_kelas, mapel.nama_mapel FROM sh_nilai nilai, sh_siswa siswa,  sh_mapel_guru mapel,sh_kategori_nilai kategori, sh_kelas kelas
								   WHERE nilai.id_siswa=siswa.id_siswa and nilai.id_siswa = '$idsiswa' and nilai.id_kategori_nilai = kategori.id_kategori_nilai and kategori.id_kelas = '$kelas' and kategori.id_kelas = kelas.id_kelas and
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
						// Ambil Nilai
						$query_nilai = mysql_query("select id_kategori_nilai , nilai from sh_nilai where id_kategori_nilai = '$kat' AND sh_nilai.id_siswa = '$row[id_siswa]' ORDER BY id_kategori_nilai ASC");
						while ($data_katnilai=mysql_fetch_array($query_nilai)) {
						echo " <td class=garis>$data_katnilai[nilai]</td>";
						   } // End While Nilai 
						  } // End While Kat
						// Ambil Rata Nilai
						$query_count = mysql_fetch_array(mysql_query("SELECT COUNT( * ) AS bagi FROM sh_kategori_nilai WHERE sh_kategori_nilai.id_mapel_guru = '$mapel' AND sh_kategori_nilai.id_kelas = '$kelas' AND id_tahun_ajaran = '$tahun' "));
						$query_sum = mysql_query("select SUM(nilai)/'$query_count[bagi]' as jumlah from sh_nilai where id_kategori_nilai = '$kat' and sh_nilai.id_siswa = '$row[id_siswa]'");
						while ($data_sum=mysql_fetch_array($query_sum)) {
						echo " <td class=garis>".round($data_sum[jumlah],0)."</td>";
						$jumlah = round($data_sum[jumlah],0);
						?>
						<?php
						// Ambil KKM
						$query_kkm = mysql_query("select sh_mapel.KKM  from sh_mapel , sh_mapel_guru where sh_mapel_guru.id_mapel = sh_mapel.id_mapel AND sh_mapel_guru.id_mapel_guru = '$mapel'");
						while ($data_kkm=mysql_fetch_array($query_kkm)) {
						echo "<td class=garis>$data_kkm[KKM]</td>";
						// Perbandingan KKM
						if($jumlah < $data_kkm['KKM']) {
							echo " <td class=garis><font color=red> TIDAK TUNTAS </font> </td>";
							} Else {
							echo " <td class=garis> TUNTAS </td>";
							}
						   } // End While KKM
						 } // End While jumlah
						?>
					</tr>
					<?php
					$i++;
				}
					$jumSis = $i-1;
			}  else { ?>
			<tr class="tabel"><td class="tabel" colspan="10"><font color="red"><b>DATA NILAI / SEMUA KATEGORI BELUM TERSEDIA</b></font></td></tr>
			<?php } ?>
		</table>
	  </div>	 
    </div>	  

<?php			  
} // End Of Cek orangtua || siswa
Else if ($_GET['sesi'] == "osikat") { ?>

<div class="sd_left">
		<div class="text_padding">
		<p align="center"><a href =# onclick='window.print()' title=Print style=text-decoration:none> <img src=ico-printer.png width=75 height=75> </a> </p>
		<p align="center"> <h1 align="center"> <b> LAPORAN NILAI </b> </h1> </p>
		<table width=60% border=1 cellpading=0 cellspacing=0 class=table2 align=center>
		<tr bgcolor=#dedede>
            <th width="2%"  class="garis">No</a></th>
			<th width="25%" class="garis">Nama Siswa</a>	</th>
			<th width="10%" class="garis">NIS</a></th>
			<th width="8%"  class="garis">Kelas</a></th>
			<th width="25%" class="garis">Mata Pelajaran</a></th>
			
			   <?php
				// Mengambil Data Jenis Tagihan
				$data_kat=mysql_query("select * from sh_kategori_nilai where id_kategori_nilai = '$kat_nilai' and id_mapel_guru = '$mapel'  ORDER BY id_kategori_nilai ASC ");
				while ($isidata_kat=mysql_fetch_array($data_kat)) {
		
				echo " <th width=20% class=garis>NILAI : $isidata_kat[nama_kategori_nilai]</th>";
				
				} // End Of While
				
				?>
			
			<?php
				$guru=$_SESSION['guru'];
				$view=mysql_query("SELECT * FROM sh_nilai nilai, sh_siswa siswa,  sh_mapel_guru mapel,sh_kategori_nilai kategori, sh_kelas kelas
								   WHERE nilai.id_siswa=siswa.id_siswa and nilai.id_siswa = '$idsiswa' and  nilai.id_kategori_nilai = kategori.id_kategori_nilai and kategori.id_kategori_nilai = '$kat_nilai' and kategori.id_kelas = '$kelas' and kategori.id_kelas = kelas.id_kelas and
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
	  </div>	 
    </div>	 
	
<?php
//Cek sesi = orangtua || siswa
}
?>
</body>
</html>