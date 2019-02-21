<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">Jadwal Mengajar</h3></div>
<div class="panel-body">
<div class="panel panel-default">
<div class="table-responsive"><!--Table responsive-->

		<table id="results" class="table" cellpadding="1" cellspacing ="1">
			<tr>
				<td class="info"><strong>Hari</strong></td>
				<td class="info"><strong>Waktu</strong></td>
				<td class="info"><strong>Pelajaran</strong></td>
				<td class="info"><strong>Nama Guru</strong></td>
				<td class="info"><strong>Nama Kelas</strong></td>
				<td class="info"><strong>Ruang Kelas</strong></td>
			</tr>
		
			<?php
				include 'koneksi.php';

				if ($_SESSION['guru']){ 
				// menenetukan login guru
				$profilsaya=mysql_query("SELECT * FROM sh_guru_staff WHERE sh_guru_staff.nip='$_SESSION[guru]'");
				$ps=mysql_fetch_array($profilsaya);
				} 

				// memanggil data semua table untuk jadwal mengajar guru
				$jadwal = mysql_query(" SELECT sh_jadwal.jadwal_hari, sh_jadwal.jadwal_waktu, sh_mapel.nama_mapel, sh_guru_staff.nama_gurustaff, sh_kelas.nama_kelas , sh_kelas.ruang_kelas
										FROM  sh_jadwal, sh_guru_staff, sh_mapel, sh_kelas
										WHERE sh_mapel.id_mapel = sh_jadwal.id_mapel
										AND   sh_kelas.id_kelas = sh_jadwal.id_kelas
                                        AND   sh_jadwal.id_gurustaff = sh_guru_staff.id_gurustaff
										AND   sh_guru_staff.id_gurustaff = '$ps[id_gurustaff]' ORDER BY FIELD( jadwal_hari,  'Senin',  'Selasa',  'Rabu',  'Kamis',  'Jumat',  'Sabtu',  'Minggu' ) ");
				
				
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
		
		
</div><!--Table responsive-->
</div>
<div id="pageNavPosition"></div><?php 
			// Pengambilan alamat link get untuk halaman cetak
				echo	"<a href='../elearning/konten/cetak/jadwal_cetak.php?sesi=guru&id=$_SESSION[guru]' target=_blank>
						 <img class='img-responsive' src='konten/cetak/ico-printer.png' width='40px' style=float:right;/></a>";
			?>
</div>
</div>
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 15); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>

		