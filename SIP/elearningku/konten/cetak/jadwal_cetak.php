<?php 
 // Define relative path from this script to mPDF
 $nama_dokumen='Jadwal Mengajar'; //Beri nama file PDF hasil.
define('_MPDF_PATH','MPDF57/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>

<html>
<head>
<title> Jadwal Mengajar </title>
<link rel="stylesheet" href="css/style_print.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="mpdf57/progbar.css" />
</head>
<body>
<?php
//Mengambil Koneksi
include('../../../konfigurasi/koneksi.php');
// Mengambil Method Dari $_GET
$sesi=$_GET['sesi'];
$id=$_GET['id'];

//Cek sesi = guru
if ($sesi == "guru") {

// menenetukan login guru
	$profilguru=mysql_query("SELECT * FROM sh_guru_staff WHERE sh_guru_staff.nip='$id'");
	$pg=mysql_fetch_array($profilguru);

//Menampilkan data awal tabel (judul tabel)
echo " 
		<h2 align=center>Jadwal Mengajar <br/> Bpk/Ibu. $pg[nama_gurustaff]</h2><hr/>
		<table width='100%' class='table'>
		<tr bgcolor=#dedede>
		<th>No</th>
		<th>Hari</th>
		<th>Waktu</th>
		<th>Pelajaran</th>
		<th>Nama Kelas</th>
		<th>Ruang Kelas</th>
		</tr>";
		
		// memanggil data semua table untuk jadwal mengajar guru
				$jadwal = mysql_query(" SELECT sh_jadwal.jadwal_hari, sh_jadwal.jadwal_waktu, sh_mapel.nama_mapel, sh_guru_staff.nama_gurustaff, sh_kelas.nama_kelas , sh_kelas.ruang_kelas
										FROM sh_jadwal, sh_guru_staff, sh_mapel, sh_kelas, sh_guru_jadwal
										WHERE sh_mapel.id_mapel = sh_jadwal.id_mapel
										AND sh_mapel.id_mapel = sh_guru_jadwal.id_mapel
										AND sh_kelas.id_kelas = sh_guru_jadwal.id_kelas
										AND sh_kelas.id_kelas = sh_jadwal.id_kelas
										AND sh_guru_jadwal.id_gurustaff = sh_guru_staff.id_gurustaff
										AND sh_guru_staff.id_gurustaff = '$pg[id_gurustaff]' ORDER BY FIELD( jadwal_hari,  'Senin',  'Selasa',  'Rabu',  'Kamis',  'Jumat',  'Sabtu',  'Minggu' ) ");
		// Perulangan Dari $jadwal										
		while ($isi_jadwal=mysql_fetch_array($jadwal)){
		$no++;
		
		//Menampilkan data isi tabel
			echo "<tr>
			<td>$no.</td>
			<td>$isi_jadwal[jadwal_hari]</td>
			<td>$isi_jadwal[jadwal_waktu]</td>
			<td>$isi_jadwal[nama_mapel]</td>
			<td>$isi_jadwal[nama_kelas]</td>
			<td>$isi_jadwal[ruang_kelas]</td>
			</tr>";
			} // End Of While
			echo "</table>
			    </div>
			  </div>";
			  
} // End Of Cek Guru

//Cek sesi = orangtua || siswa
Else if($sesi == "orangtua" || $sesi == "siswa") {

	if ($sesi == "siswa"){ 
		// menenetukan login siswa per-kelas
		$profilsaya=mysql_query("SELECT * FROM sh_siswa , sh_kelas WHERE sh_siswa.id_kelas=sh_kelas.id_kelas AND nis='$id'");
		$ps=mysql_fetch_array($profilsaya);
						 
	} else if ($sesi == "orangtua"){ 
		// menenetukan login siswa per-kelas
		$profilsaya=mysql_query("SELECT * FROM sh_siswa , sh_kelas ,sh_ortu WHERE sh_siswa.id_kelas=sh_kelas.id_kelas AND sh_siswa.id_siswa = sh_ortu.id_siswa AND sh_ortu.id_ortu='$id'");
		$ps=mysql_fetch_array($profilsaya);
	}

//Menampilkan data awal tabel (judul tabel)
echo " 	<h2 style='text-align:center;'>Jadwal Mata Pelajaran</h2><hr/>
		<h3>Kelas : $ps[nama_kelas]</h3>
		<p align=center>Berikut ini Data Jadwal Pelajaran.</p>
		<table width=100% class=table>
		<tr bgcolor=#dedede>
		<th>No</th>
		<th>Hari</th>
		<th>Waktu</th>
		<th>Pelajaran</th>
		<th>Nama Guru</th>
		<th>Nama Kelas</th>
		<th>Ruang Kelas</th>
		</tr>";
		
		// memanggil data semua table untuk jadwal mengajar guru
				$jadwal = mysql_query(" SELECT sh_jadwal.jadwal_hari,sh_jadwal.jadwal_waktu,sh_mapel.nama_mapel,sh_guru_staff.nama_gurustaff,sh_kelas.nama_kelas , sh_kelas.ruang_kelas
										FROM sh_jadwal,sh_guru_staff,sh_mapel,sh_kelas
										WHERE sh_guru_staff.id_gurustaff = sh_jadwal.id_gurustaff 
										AND sh_mapel.id_mapel = sh_jadwal.id_mapel
										AND sh_kelas.id_kelas = sh_jadwal.id_kelas
										AND sh_kelas.id_kelas = '$ps[id_kelas]' ORDER BY FIELD( jadwal_hari,  'Senin',  'Selasa',  'Rabu',  'Kamis',  'Jumat',  'Sabtu',  'Minggu' ) ");
		// Perulangan Dari $jadwal										
		while ($isi_jadwal=mysql_fetch_array($jadwal)){
		$no++;
		
		//Menampilkan data isi tabel
			echo "<tr>
			<td>$no.</td>
			<td>$isi_jadwal[jadwal_hari]</td>
			<td>$isi_jadwal[jadwal_waktu]</td>
			<td>$isi_jadwal[nama_mapel]</td>
			<td>$isi_jadwal[nama_gurustaff]</td>
			<td>$isi_jadwal[nama_kelas]</td>
			<td>$isi_jadwal[ruang_kelas]</td>
			</tr>";
			} // End Of While
			echo "</table>
			    </div>
			  </div>";
			  
} // End Of Cek orangtua || siswa

?>

<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
</body>
</html>
