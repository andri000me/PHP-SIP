<style>
	/* style untuk link popup11 */
a.popup1-link {
padding:17px 0;
text-align: center;
margin:10% auto;
position: relative;
width: 300px;
color: black;
text-decoration: none;
background-color: #FFBA00;
border-radius: 3px;
box-shadow: 0 5px 0px 0px #eea900;
display: block;
}
a.popup1-link:hover {
background-color: #ff9900;
box-shadow: 0 3px 0px 0px #eea900;
-webkit-transition:all 1s;
transition:all 1s;
}
/* end link popup1*/
/* animasi popup1 */@-webkit-keyframes autopopup1 {
from {opacity: 0;margin-top:-200px;}
to {opacity: 1;}
}
@-moz-keyframes autopopup1 {
from {opacity: 0;margin-top:-200px;}
to {opacity: 1;}
}
@keyframes autopopup1 {
from {opacity: 0;margin-top:-200px;}
to {opacity: 1;}
}
/* end animasi popup1 */
/*style untuk popup1 */
#popup1 {
background:rgba(7,111,192, .5);
position: fixed;
top:10;
left:0;
right:0;
bottom:0;
margin:0;
-webkit-animation:autopopup1 2s;
-moz-animation:autopopup1 2s;
animation:autopopup1 2s;
}
#popup1:target {
-webkit-transition:all 1s;
-moz-transition:all 1s;
transition:all 1s;
opacity: 0;
visibility: hidden;
}
@media (min-width: 768px){
.popup1-containerr {
width:400px;
}
}
@media (max-width: 670px){
.popup1-containerr {
width:280px;
margin-left: 0px;
padding: 50px;
top: 60px;
}
.popup1-containerr p{
    font-size: 10px;
    margin: 5px;
    text-align: left;
}
.popup1-containerr h3{
    font-size: 13px;
    margin: 5px;
}
}
.popup1-containerr {
position: relative;
margin:10% auto;
padding:40px 50px;
background-color: #fff;
color:#333;
border-radius: 10px;
}a.popup1-close {
position: absolute;
top:3px;
right:3px;
padding:7px 10px;
font-size: 20px;
text-decoration: none;
line-height: 1;
color:blue;
}
.popup1-containerr h3{
    font-size: 18px;
}
/* end style popup1 *//* style untuk isi popup1 */
.popup1-form {
margin:10px auto;
}
.popup1-form h2 {
margin-bottom: 5px;
font-size: 37px;
text-transform: uppercase;
}
.popup1-form .input-group {
margin:10px auto;
}
.popup1-form .input-group input {
padding:17px;
text-align: center;
margin-bottom: 10px;
border-radius:3px;
font-size: 16px;
display: block;
width: 100%;
}
.popup1-form .input-group input:focus {
outline-color:#FB8833;
}
.popup1-form .input-group input[type=”email”] {
border:0px;
position: relative;
}
.popup1-form .input-group input[type=”submit”] {
background-color: #FB8833;
color: #fff;
border: 0;
cursor: pointer;
}
.popup1-form .input-group input[type=”submit”]:focus {
box-shadow: inset 0 3px 7px 3px #ea7722;
}
/* end style isi popup1 */
</style>

		<?php 	if ($_SESSION['guru']) {	// Hanya Untuk Login Guru
		
				$pengumuman=mysql_query("SELECT * FROM sh_pengumuman, sh_users WHERE sh_pengumuman.s_username=sh_users.s_username AND ditujukan='guru' ORDER BY tanggal_pengumuman DESC");
				$cek_pengumuman=mysql_num_rows($pengumuman);
  		
				if($cek_pengumuman > 0){
				$peng=mysql_fetch_array($pengumuman);
				echo "<div class='panel panel-primary popup1-wrapper' id=popup1>
                     <div class=' popup1-containerr' style='border:1px solid red;'>
					 <h3>PENGUMUMAN</h3>
                     <p><B>$peng[judul_pengumuman]</b></p>
                     <p><b>$peng[isi_pengumuman]</b></p>
				     <p><b>Ditulis pada: ".Indonesia2Tgl($peng[tanggal_pengumuman])."</b></p>
					 <a class=popup1-close href=#popup1>Close</a>
                     </div>
                     </div>";
				}
				else {
				?>
				<div class="panel panel-primary">
                  <div class="panel-heading"><h4 class="panel-title">PENGUMUMAN</h4></div>
				  <div class="panel-body">
				<p><b>Belum ada pengumuman</b></p>
				</div>
				</div>
				<?php }
			?>
		
			<div class="panel panel-primary">
			<div class="panel-heading"><h3 class="panel-title">Jadwal Mengajar Hari Ini</h3></div>
			<div class="panel-body">
			

<!-- CORETAN -->
<?php 
$tanggal = Indonesia2Tgl(date("Y-m-d"));
$day = date('D', strtotime($tanggal));
$dayList = array(
	'Sun' => 'Minggu',
	'Mon' => 'Senin',
	'Tue' => 'Selasa',
	'Wed' => 'Rabu',
	'Thu' => 'Kamis',
	'Fri' => 'Jumat',
	'Sat' => 'Sabtu'
);
$harisaatini = $dayList[$day];
?>
		
		<p class="text-left"><b><?php echo $harisaatini;?>, <?php echo $tanggal; ?></b></p>
		
		<div class="table-responsive"><!--Table responsive-->
		<div class="panel panel-default">
		<table id="results" class="table" cellpadding="1" cellspacing ="1">
			<tr>
				<td class="info"><strong>Hari</strong></td>
				<td class="info"><strong>Waktu</strong></td>
				<td class="info"><strong>Pelajaran</strong></td>
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
										FROM sh_jadwal, sh_guru_staff, sh_mapel, sh_kelas
										WHERE sh_mapel.id_mapel = sh_jadwal.id_mapel
										AND sh_jadwal.jadwal_hari = '$harisaatini'
										AND sh_kelas.id_kelas = sh_jadwal.id_kelas
										AND sh_jadwal.id_gurustaff = sh_guru_staff.id_gurustaff
										AND sh_guru_staff.id_gurustaff = '$ps[id_gurustaff]' ORDER BY FIELD( jadwal_hari,  'Senin',  'Selasa',  'Rabu',  'Kamis',  'Jumat',  'Sabtu',  'Minggu' ) ");
				$y=mysql_num_rows($jadwal);
				if($y>0){
				while ($row=mysql_fetch_array($jadwal)){?>
				<tr>
						<td><?php echo $row['jadwal_hari'];?></td>
						<td><?php echo $row['jadwal_waktu'];?></td>
						<td><?php echo $row['nama_mapel'];?></td>
						<td><?php echo $row['nama_kelas'];?></td>
						<td><?php echo $row['ruang_kelas'];?></td>
				
				</tr>
				<?php }} else { echo"<tr><td colspan='5'><p class='text-left'>Tidak ada jadwal mengajar hari ini</p></td></tr>";} ?>
		</table>
				<div id="pageNavPosition"></div>
		</div>
		
</div><!--Table responsive-->
</div>
</div>
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 10); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>

		
		
		<?php } // End Of Materi

				if ($_SESSION['siswa']) {	// Hanya Untuk Login Siswa & Orang Tua 
		
				$pengumuman=mysql_query("SELECT * FROM sh_pengumuman, sh_users WHERE sh_pengumuman.s_username=sh_users.s_username AND ditujukan='siswa' ORDER BY tanggal_pengumuman DESC");
				$cek_pengumuman=mysql_num_rows($pengumuman);
				
				if($cek_pengumuman > 0){
				$peng=mysql_fetch_array($pengumuman);
				echo "<div class='panel panel-primary popup1-wrapper' id=popup1>
                     <div class=' popup1-containerr' style='border:1px solid red;'>
					 PENGUMUMAN<hr/>
                     <p><B>$peng[judul_pengumuman]</b></p>
                     <p><b>$peng[isi_pengumuman]</b></p>
				     <p><b>Ditulis pada: $peng[tanggal_pengumuman]</b></p>
	                 <p><b>Oleh: $peng[nama_lengkap_users]</b></p>
					 <a class=popup1-close href=#popup1>Close</a>
                     </div>
                     </div>";
				}
				else {
				?>
				<div class="panel panel-primary">
                  <div class="panel-heading"><h4 class="panel-title">PENGUMUMAN</h4></div>
				  <div class="panel-body">
				<p><b>Belum ada pengumuman</b></p>
				</div>
				</div>
				<?php } ?>
		
				<div class="panel panel-primary">
                  <div class="panel-heading">
					<h1 class="panel-title" id="mading-terbaru-index">Mading Siswa Terbaru</h1>
                  </div>
					<?php
						$mading=mysql_query("SELECT * 
										FROM sh_mading, sh_mading_kategori, sh_siswa
										WHERE sh_mading.id_kategori = sh_mading_kategori.id_mading_kategori
										AND sh_mading.nama_siswa = sh_siswa.nama_siswa
										AND status_terbit =  '1'
										ORDER BY id_mading DESC 
										LIMIT 2"
									   );
						$hitungmading=mysql_num_rows($mading);
						
						if($hitungmading > 0){
						while($b=mysql_fetch_array($mading)){
					?>
						<p style="margin-top: -65px" id="tab-judul-mading"><a href="<?php echo "../index.php?p=detmading&id=$b[id_mading]";?>" target="_blank">
									<br/><br/><br/><br/> <?php  echo "<b>$b[judul_mading]</b>";?></p>
							</a>

							<br><p style="margin: -20px 0 0 0px"><small>Kategori: <a href="?p=katmading&id=<?php echo $b[id_mading_kategori]?>">
						<!-- Komentar -->
						<?php echo $b[nama_mading_kategori]?></a>
						&nbsp;Komentar : 
						<?php
						$hitungkomentar=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$b[id_mading]'");
						$jumlahkomentar=mysql_num_rows($hitungkomentar);
						echo $jumlahkomentar?></small></p>
							<?php
							$isi_mading = strip_tags($b[isi_mading]); 
							$isi = substr($isi_mading,0,200);
							if ($b[gambar_mading] != 'no_image.jpg'){
								echo "<p>
									<img src='../images/$b[gambar_mading]' 
									width='100px' 
									height='100px' 
									style='float:left; 
									margin: -2px 10px 0 0; 
									padding: 3px; 
									background: #fff; 
									border: 1px solid #dcdcdc'>
									<br/>$isi...
									<a href='../index.php?p=detmading&id=$b[id_mading]'>
									<br/>Baca selengkapnya...</a></p><br>";}
							else {
							echo "<p>$isi...<a href='../index.php?p=detmading&id=$b[id_mading]'>Baca selengkapnya...</a></p>";
							}
							?>
					<?php }}

					else {?>
					<a href=""><b>Data mading belum ada</b></a>
					<?php } ?>

				</div>
				<!-- akhir mading -->

<?php } // End Of Mading Siswa 

				if ($_SESSION['orangtua']) {	// Hanya Untuk Login Orang Tua 

				$pengumuman=mysql_query("SELECT * FROM sh_pengumuman, sh_users WHERE sh_pengumuman.s_username=sh_users.s_username AND ditujukan='orangtua' ORDER BY tanggal_pengumuman DESC");
				$cek_pengumuman=mysql_num_rows($pengumuman);
				
				if($cek_pengumuman > 0){
				$peng=mysql_fetch_array($pengumuman);
				echo "<div class='panel panel-primary popup1-wrapper' id=popup1>
                     <div class=' popup1-containerr' style='border:1px solid red;'>
					 PENGUMUMAN<hr/>
                     <p><B>$peng[judul_pengumuman]</b></p>
                     <p><b>$peng[isi_pengumuman]</b></p>
				     <p><b>Ditulis pada: $peng[tanggal_pengumuman]</b></p>
	                 <p><b>Oleh: $peng[nama_lengkap_users]</b></p>
					 <a class=popup1-close href=#popup1>Close</a>
                     </div>
                     </div>";
				}
				else {
				?>
				<div class="panel panel-primary">
                  <div class="panel-heading"><h4 class="panel-title">PENGUMUMAN</h4></div>
				  <div class="panel-body">
				<p><b>Belum ada pengumuman</b></p>
				</div>
				</div>
				<?php } ?>
		
				<div class="panel panel-primary">
                  <div class="panel-heading">
					<h1 class="panel-title" id="mading-terbaru-index">Mading Siswa Terbaru</h1>
                  </div>
					<?php
						$mading=mysql_query("SELECT * 
										FROM sh_mading, sh_mading_kategori, sh_siswa
										WHERE sh_mading.id_kategori = sh_mading_kategori.id_mading_kategori
										AND sh_mading.nama_siswa = sh_siswa.nama_siswa
										AND status_terbit =  '1'
										ORDER BY id_mading DESC 
										LIMIT 2"
									   );
						$hitungmading=mysql_num_rows($mading);
						
						if($hitungmading > 0){
						while($b=mysql_fetch_array($mading)){
					?>
						<p style="margin-top: -65px" id="tab-judul-mading"><a href="<?php echo "../index.php?p=detmading&id=$b[id_mading]";?>" target="_blank">
									<br/><br/><br/><br/> <?php  echo "<b>$b[judul_mading]</b>";?></p>
							</a>

							<br><p style="margin: -20px 0 0 0px"><small>Kategori: <a href="?p=katmading&id=<?php echo $b[id_mading_kategori]?>">
						<!-- Komentar -->
						<?php echo $b[nama_mading_kategori]?></a>
						&nbsp;Komentar : 
						<?php
						$hitungkomentar=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$b[id_mading]'");
						$jumlahkomentar=mysql_num_rows($hitungkomentar);
						echo $jumlahkomentar?></small></p>
							<?php
							$isi_mading = strip_tags($b[isi_mading]); 
							$isi = substr($isi_mading,0,200);
							if ($b[gambar_mading] != 'no_image.jpg'){
								echo "<p style='text-align:justify; margin:0 30px 0 0;'>
									<img src='../images/$b[gambar_mading]' 
									width='100px' 
									height='100px' 
									style='float:left; 
									margin: -2px 0 0 10px; 
									padding: 3px; 
									background: #fff; 
									border: 1px solid #dcdcdc'>
									<br/>$isi...
									<a href='../index.php?p=detmading&id=$b[id_mading]'>
									<br/>Baca selengkapnya...</a></p><br>";}
							else {
							echo "<p>$isi...<a href='../index.php?p=detmading&id=$b[id_mading]'>Baca selengkapnya...</a></p>";
							}
							?>
					<?php }}

					else {?>
					<a href=""><b>Data mading belum ada</b></a>
					<?php } ?>

				</div>
				<!-- akhir mading -->

<?php } // End Of Mading Siswa 
?>			
	