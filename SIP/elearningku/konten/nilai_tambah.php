<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"> Tambah Nilai </h3></div>
<div class="panel-body"> <br/>
 <a href ="index.php?p=nilai"> << Kembali ke NILAI </a> <br/> <br/>
 <!--  start step-holder
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left">Pilih Mata Pelajaran</div>
			<div class="step-dark-right">&nbsp;</div>
			<div class="step-no-off">2</div>
			<div class="step-light-left">Input Nilai Siswa</div>
			<div class="step-light-right">&nbsp;</div>
			<div class="step-no-off">3</div>
			<div class="step-light-left">Selesai</div>
			<div class="step-light-round">&nbsp;</div>
			<div class="clear"></div>
		</div>
  end step-holder -->
		
	<!-- untuk table -->
		<form id="mainform" action="" class="table-responsive">
			<table border="0" width="48%" cellpadding="0" cellspacing="0" class="table">
			<tr>
				<th width="10%" class="garis">No</th>
				<th width="40%" class="garis">Mata Pelajaran</th>
				<th width="30%" class="garis">Kelas</th>
				<th width="20%" class="garis"> - </th>
			</tr>
			<?php
			$nip=$_SESSION['guru'];
			//$viewkelas=mysql_fetch_array(mysql_query("SELECT distinct sh_jadwal.id_kelas FROM  sh_jadwal , sh_guru_staff where sh_guru_staff.id_gurustaff = sh_jadwal.id_gurustaff AND sh_guru_staff.nip = '$nip'"));
			//$viewmapel=mysql_fetch_array(mysql_query("SELECT distinct sh_jadwal.id_mapel FROM  sh_jadwal , sh_guru_staff where sh_guru_staff.id_gurustaff = sh_jadwal.id_gurustaff AND sh_guru_staff.nip = '$nip'"));
			$view=mysql_query("SELECT DISTINCT nama_mapel , nama_kelas , sh_kelas.id_kelas  , sh_mapel.id_mapel FROM sh_mapel,sh_kelas,`sh_jadwal` WHERE sh_jadwal.id_gurustaff = '$_SESSION[idguru]' AND sh_mapel.id_mapel = sh_jadwal.id_mapel AND sh_kelas.id_kelas = sh_jadwal.id_kelas");
			$no=0;
			while($row=mysql_fetch_array($view)){
			//QUERY PEMANGGILAN DATA DENGAN SELECT BERDASARKAN SESI ID GURU STAFF 
			$mapel_guru = mysql_fetch_array(mysql_query("select DISTINCT id_mapel_guru from sh_mapel_guru where id_mapel = '$row[id_mapel]' AND id_gurustaff = '$_SESSION[idguru]' ")); //berdasarkan session idguru
			?>	
			<tr>
				<td class="garis"><?php echo $no=$no+1;?></td>
				<td class="garis"><?php echo $row['nama_mapel'];?></a></td>
				<td class="garis"><?php echo $row['nama_kelas'];?></td>
				<td><a href="?p=input_nilai&id_mapel=<?php echo $mapel_guru['id_mapel_guru'];?>&id_kelas=<?php echo $row['id_kelas'];?>" style="text-decoration:underline" title="Pilih Mata Pelajaran"> <img title="Tambah Nilai" width="30" src="css/img/tambah.png" /> </a></td>
			</tr>
			<?php
			}
			?>
			</table>
			<!--  end product-table................................... --> 
			</form>
		<div class="clear"></div> 
		</div>
	</div>
	</div>