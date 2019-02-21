<?php
session_start();
error_reporting(0);
if (isset($_SESSION['siswa']) OR isset($_SESSION['guru']) OR isset($_SESSION['orangtua']))
{
include "../konfigurasi/koneksi.php";
// Link Rel Icon
echo "<link rel='shortcut icon' href='../ico.ico'/>";
?>
<body>

<?php include"atas.php";?>

  <?php include"header.php"?>
  
<div id="wrapp">
<div class="container-fluid text-left">    
  <div class="row content">
  <div class="col-sm-12" id="wrappgmbr"><img class="img-responsive" src="images/e-learning.png" id="gmbr"/></div>
    
    <div class="col-sm-3" id="menu">
    <br />
      <div class="panel panel-primary">
        <div class="panel-heading"><h4 class="panel-title text-center" style="margin-left: 20px;">Menu</h4></div>
        <div class="panel-body"><?php include"menu.php"?></div>
      </div>
      
        <?php // include"kiri.php"?>
    </div>
    
    <div class="col-sm-9 text-center" id="konten"> <!--Konten-->
     
      <br />
     <?php 
    switch($_GET['p']){
    default:
    include"konten/home.php";
    break;
        
        case "upload":
	if ($_SESSION['guru'] or $_SESSION['siswa']){
	include "konten/upload.php";}
	break;
	
        case "uploadpopup":
	if ($_SESSION['guru']){
	include "konten/upload_popup.php";}
	break;
	
        case "pesanortu":
	if ($_SESSION['orangtua']){
	include "konten/pesanortu.php";}
	break;
	
        case "pesanguru":
	if ($_SESSION['guru']){
	include "konten/pesanguru.php";}
	break;
	
	case "kirimpesan":
	include "konten/kirimpesan.php";
	break;
	
	case "balaspesan":
	include "konten/balaspesan.php";
	break;
	
	case "pesanterkirim":
	include "konten/pesan_terkirim.php";
	break;
	
	case "terkirim_detail":
	include "konten/terkirim_detail.php";
	break;
	
	case "pesanhapus":
	include "konten/pesan_hapus.php";
	break;
	
	case "inbox":
	include "konten/inbox.php";
	break;
	
	case "inbox_detail":
	include "konten/inbox_detail.php";
	break;
	
	case "profil":
	include "konten/profil.php";
	break;
	
	case "mapel":
	include "konten/mapel.php";
	break;

	case "mading":
	if ($_SESSION['siswa']){
	include "konten/mading.php";}
	break;

	case "jadwal":
	if ($_SESSION['siswa'] or $_SESSION['orangtua']){
	include "konten/jadwal.php";}
	break;
	
	case "jadwal_perhari":
	if ($_SESSION['siswa'] or $_SESSION['orangtua']){
	include "konten/jadwalperhari.php";}
	break;

	case "jadwal_guru":
	if ($_SESSION['guru']){
	include "konten/jadwal_guru.php";}
	break;

	case "absenguru":
	if ($_SESSION['guru']){
	include "konten/absenguru.php";}
	break;

	case "cctvortu":
	if ($_SESSION['orangtua']){
	include "konten/cctvortu.php";}
	break;

	case "detailcctv":
	if ($_SESSION['guru']){
	include "konten/detcctv.php";}
	break;
	
	case "cctvpublic":
	if ($_SESSION['orangtua']){
	include "konten/cctvpublic.php";}
	break;
	
	case "cctvguru":
	if ($_SESSION['guru']){
	include "konten/cctvguru.php";}
	break;
	
	case "cctvkelas":
	if ($_SESSION['guru']){
	include "konten/cctvkelas.php";}
	break;
	
	case "absengurukelas":
	if ($_SESSION['guru']){
	include "konten/absengurukelas.php";}
	break;

	case "absenortu":
	if ($_SESSION['orangtua']){
	include "konten/absenortu.php";}
	break;
	
			case "absenortu_tanggal":
	if ($_SESSION['orangtua']){
	include "konten/absenortu_tanggal.php";}
	break;
	
	
		case "absenortu_status":
	if ($_SESSION['orangtua']){
	include "konten/absenortu_status.php";}
	break;
	
	case "sppindex":
	if ($_SESSION['orangtua']){
	include "konten/spp_index.php";}
	break;
	
	case "spp":
	if ($_SESSION['orangtua']){
	include "konten/spp.php";}
	break;
	
	case "nonspp":
	if ($_SESSION['orangtua']){
	include "konten/non_spp.php";}
	break;
	
	case "sppperbulan":
	if ($_SESSION['orangtua']){
	include "konten/spp_perbulan.php";}
	break;
	
	case "guru":
	include "konten/guru.php";
	break;

	case "semua":
	include "konten/semua.php";
	break;
	
	case "pencarian":
	include "konten/pencarian.php";
	break;
	
	case "mmapel":
	include "konten/cari_mapel.php";
	break;
	
	case "pguru":
	include "konten/profil_guru.php";
	break;
	
	case "download":
	include "konten/download_materi.php";
	break;
	
	case "pencariankelas":
	include "konten/pencariankelas.php";
	break;
	
	case "nilaisiswa":
	if ($_SESSION['siswa'] or$_SESSION['orangtua']){
	include "konten/nilaisiswa.php";}
	break;

	case "nilai":
	if ($_SESSION['guru']){
	include "konten/nilai.php";}
	break;
	
	case "kategorinilai":
	if ($_SESSION['guru']){
	include "konten/kategori_nilai.php";}
	break;
	
	case "kategorinilaikelas":
	if ($_SESSION['guru']){
	include "konten/kategori_nilai_kelas.php";}
	break;
	
	case "kategorinilaita":
	if ($_SESSION['guru']){
	include "konten/kategori_nilai_ta.php";}
	break;
	
	case "tambahkategorinilai":
	if ($_SESSION['guru']){
	include "konten/tambah_kategori_nilai.php";}
	break;
	
	case "ubahkategorinilai":
	if ($_SESSION['guru']){
	include "konten/ubah_kategori_nilai.php";}
	break;
	
	case "tambahnilai":
	if ($_SESSION['guru']){
	include "konten/nilai_tambah.php";}
	break;
	
	case "input_nilai":
	if ($_SESSION['guru']){
	include "konten/input_nilai.php";}
	break;
	
	case "input_nilai_update":
	include "konten/input_nilai_update.php";
	break;
	
	case "input_nilai_selesai":
	include "konten/input_nilai_selesai.php";
	break;
	
	case "password":
	include "konten/password.php";
	break;
	}
	?>
     
    </div> <!--Konten-->
    
    
  </div>
</div>

<nav class="navbar navbar-default navbar-bottom cotainer-fluid" style="background: rgba(0,0,204, 0.8);" id="footer">
<div class="row">
    <div class="col-sm-3 text-center" id="innerfooter">
        <p>This site powered by : <a href="http://trimitra-sisteminfo.com"><img class="img-responsive" src="images/sh.png" width="100"/></a></p>
    </div>
    <div class="col-sm-9 text-center" style="margin-top: 5px;"><a href="http://trimitra-sisteminfo.com">&copy; 2016. Designed and developed by PT. Trimitra Sistem Informasi</a><br />
    Trimitra Sekolah powered by CMS FOR SCHOOLS </div>
</div>
</nav>
<?php }else{

	header('location:../index.php');
	exit;
}?>
</div>
</body>
</html>