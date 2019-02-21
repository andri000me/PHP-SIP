<div class="panel panel-primary">
    <div class="panel-heading"><h3 class="panel-title" align="center">Jadwal Pelajaran</h3></div>
	<br/>
	<div class='row'>
	<div class='col-md-1'></div>
	<div class='col-md-10'>
	<form class="form-horizontal" method="POST" action="?p=jadwal_perhari" >
	
        <select class="form-control text-center active" name="hari" onchange="this.form.submit()">
			<option>- Pencarian PerHari -</option>
			<?php
				$hr=array("Senin","Selasa","Rabu","Kamis","Jumat");
				foreach($hr as $hari){
					echo"<option value='$hari'>$hari</option>";
				}
			?>
		</select>
	</form>
	</div>
	<div class='col-md-1'></div>
	</div>
    <div class="table-responsive">
		<table id="results" class="table"  cellpadding="1" cellspacing ="1">
			<tr>
				<td style="color: #2980b9">Hari</td>
				<td style="color: #2980b9">Waktu</td>
				<td style="color: #2980b9">Pelajaran</td>
				<td style="color: #2980b9">Nama Guru</td>
				<td style="color: #2980b9">Nama Kelas</td>
				<td style="color: #2980b9">Ruang Kelas</td>
			</tr>
		
			<?php
				include 'koneksi.php';

				if ($_SESSION['siswa']){ 
				// menenetukan login siswa per-kelas
				$profilsaya=mysql_query("SELECT * FROM sh_siswa , sh_kelas WHERE sh_siswa.id_kelas=sh_kelas.id_kelas AND nis='$_SESSION[siswa]'");
				$ps=mysql_fetch_array($profilsaya);
				
				// Pengambilan alamat link get untuk halaman cetak
				echo	"<div class='row text-center'>
						<div class='col-md-1'></div>
						<div class='col-md-2'>
						<a href='../elearning/konten/cetak/jadwal_cetak.php?sesi=siswa&id=$_SESSION[siswa]' target=_blank style='margin-bottom:10px;'>
						<img class='img-responsive' src='konten/cetak/ico-printer.png' width='40px'/></a><br/>
						</div></div>";
						 
				} else if ($_SESSION['orangtua']){ 
				// menenetukan login siswa per-kelas
				$profilsaya=mysql_query("SELECT * FROM sh_siswa , sh_kelas ,sh_ortu WHERE sh_siswa.id_kelas=sh_kelas.id_kelas AND sh_siswa.id_siswa = sh_ortu.id_siswa AND sh_ortu.id_ortu='$_SESSION[orangtua]'");
				$ps=mysql_fetch_array($profilsaya);
				
				// Pengambilan alamat link get untuk halaman cetak
				echo	"<a href='../elearning/konten/cetak/jadwal_cetak.php?sesi=siswa&id=$_SESSION[orangtua]' target=_blank>
						 <img class='img-responsive' src='konten/cetak/ico-printer.png' width='50px'/></a>";
				}
				

				// memanggil data semua table untuk jadwal
				$jadwal = mysql_query("SELECT sh_jadwal.jadwal_hari,sh_jadwal.jadwal_waktu,sh_mapel.nama_mapel,sh_guru_staff.nama_gurustaff,sh_kelas.nama_kelas , sh_kelas.ruang_kelas
				FROM sh_jadwal,sh_guru_staff,sh_mapel,sh_kelas
				WHERE sh_guru_staff.id_gurustaff = sh_jadwal.id_gurustaff 
				AND sh_mapel.id_mapel = sh_jadwal.id_mapel
				AND sh_kelas.id_kelas = sh_jadwal.id_kelas
				AND sh_kelas.id_kelas = '$ps[id_kelas]' 
				AND sh_jadwal.jadwal_hari ='$_POST[hari]' ORDER BY FIELD( jadwal_hari,  'Senin',  'Selasa',  'Rabu',  'Kamis',  'Jumat',  'Sabtu',  'Minggu' ) ");
			
			?>
			<?php while ($row=mysql_fetch_array($jadwal)){?>
				<tr>
						<td><?php echo $row['jadwal_hari'];?></td>
						<td><?php echo $row['jadwal_waktu'];?></td>
						<td><?php echo $row['nama_mapel'];?></td>
						<td><?php echo $row['nama_gurustaff'];?></td>
						<td><?php echo $row['nama_kelas'];?></td>
						<td><?php echo $row['ruang_kelas'];?></td>
				
				</tr>
			<?php } ?>
		</table>
        <br />
		<div id="pageNavPosition"></div>
  </div>
</div>
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 10); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>

		