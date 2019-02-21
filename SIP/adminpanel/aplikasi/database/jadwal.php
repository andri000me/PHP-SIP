<?php
include "../../../konfigurasi/koneksi.php";

//pilihan untuk method GET
$pilih=$_GET['pilih'];
$untukdi=$_GET['untukdi'];
//Jam Mulai Belajar
$jammulai = $_POST['jammulai'];
//Jam Akhir Belajar
$jamakhir = $_POST['jamakhir'];
// Input Keseluruhan Jam
$jam = "$_POST[jammulai]:$_POST[menitmulai] - $_POST[jamakhir]:$_POST[menitakhir] ";

//mengambil id kelas
$kls = mysql_fetch_array(mysql_query("SELECT id_kelas FROM sh_kelas WHERE id_kelas = '$_POST[kelas]'"));

//mengambil id mata pelajaran
$plj = mysql_fetch_array(mysql_query("SELECT id_mapel FROM sh_mapel WHERE id_mapel = '$_POST[mapel]'"));

//mengambil id Guru
$gr = mysql_fetch_array(mysql_query("SELECT id_gurustaff FROM sh_guru_staff WHERE id_gurustaff = '$_POST[guru]'"));

// Jika method pilih = jadwal & untukdi = tambah
if ($pilih=='jadwal' AND $untukdi=='tambah'){
   // Jika Jam Mulai lebih kecil dari Jam Akhir
	if ($jammulai < $jamakhir )
	{
	$hajar = mysql_query("INSERT INTO sh_jadwal VALUES('','$gr[id_gurustaff]','$plj[id_mapel]','$kls[id_kelas]', '$_POST[ta]' , '$_POST[hari]','$jam')");
	$bos = mysql_query("INSERT INTO sh_guru_jadwal VALUES ('','$gr[id_gurustaff]','$plj[id_mapel]','$kls[id_kelas]' , '$_POST[ta]')");
		if(!$hajar || !$bos){
		?>
		<script>
		alert('Terjadi kesalahan sistem saat input data jadwal!');
		javascript: history.go(-1);
		</script> <?php
		} else {
		header('location:../../jadwal_pelajaran.php');
		}
		
	 } else {
 ?>
		<script>
		alert('Kesalahan : Input Jam Awal Belajar Lebih Besar Dari Jam Akhir Belajar !');
		javascript: history.go(-1);
		</script>
		
	<?php } ?>
	
<?php
// Jika method pilih = jadwal & untukdi = edit
	}
	elseif ($pilih=='jadwal' AND $untukdi=='edit'){
	$idjadwal = $_POST['id'];
	$kelas =$_POST['kelas'];
	$mapel = $_POST['mapel'];
	$hari = $_POST['hari'];
	//Jam Mulai Belajar
	$jammulai = $_POST['jammulai'];
	//Jam Akhir Belajar
	$jamakhir = $_POST['jamakhir'];
	$jam = "$_POST[jammulai]:$_POST[menitmulai] - $_POST[jamakhir]:$_POST[menitakhir]";
	$guru = $_POST['guru'];
	// Jika Jam Mulai lebih kecil dari Jam Akhir
	if ($jammulai < $jamakhir )
	{
	$hajar = mysql_query("UPDATE sh_jadwal SET id_tahun_ajaran = '$_POST[ta]' , id_gurustaff = '$guru' , id_mapel= '$mapel', id_kelas = '$kelas', jadwal_hari = '$hari', jadwal_waktu = '$jam' WHERE id_jadwal = '$idjadwal' ");
	$bos   = mysql_query("UPDATE sh_guru_jadwal SET id_tahun_ajaran = '$_POST[ta]' , id_gurustaff = '$guru', id_mapel = '$mapel', id_kelas = '$kelas' WHERE id_jadwal_guru = '$idjadwal' ");
	if(!$hajar || !$bos){
?>
	<script>
	alert('Terjadi kesalahan sistem saat input data! <?php mysql_error(); ?>');
	document.location.href="edit_jadwal.php?mapel=<?php echo $idmapel; ?>";
	</script><?php
	} else	{	
		header('location:../../jadwal_pelajaran.php');
	}
	
	} else {
?>

		<script>
		alert('Kesalahan : Input Jam Awal Belajar Lebih Besar Dari Jam Akhir Belajar !');
		javascript: history.go(-1);
		</script>
		
	<?php } ?>

<?php
// Jika method pilih = jadwal & untukdi = hapus
	}	
	elseif ($pilih=='jadwal' AND $untukdi=='hapus'){
	if ($_GET[id]== 0){					
	header('location:../../jadwal_pelajaran.php');
	}
	else {
	$idjadwal = $_GET['id'];
	$hajar = mysql_query("DELETE FROM sh_jadwal WHERE id_jadwal ='$idjadwal'");
	$bos = mysql_query("DELETE FROM  sh_guru_jadwal WHERE id_jadwal_guru ='$idjadwal'");				
	header('location:../../jadwal_pelajaran.php');
	}
}
?>