<?php
$database="aplikasi/database/spp.php";
switch($_GET['pilih']){
default: ?>
<h3>MASTER DATA</h3>
<div class="isikanan"><!--Awal class isi kanan-->							
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontal"><a href="spp_laporan.php">Laporan</a></div>
		</div>
		<br/>
		<br/>
		<h2 align="left">&nbsp;&nbsp;&nbsp;MASTER DATA</h2>
		<p>&nbsp;&nbsp;&nbsp;Sebelum melakukan pendataan transaksi penerimaan pembayaran dari siswa dan pembayaran honor kepada guru dan staf,
        <br>&nbsp;&nbsp;&nbsp;terlebih dahulu silahkan input terlebih dahulu master data
		  
	   <!--Link ke halaman berikut-->
	   <ul>
       <li><a href="?pilih=mastersiswa" title="Pendataan Master Siswa">Pendataan Master Siswa</a></li>
	   <li><a href="?pilih=masterspp" title="Pendataan Master SPP">Pendataan Master SPP</a></li>
       <li><a href="?pilih=set_masteriuran" title="Pendataan Master Iuran Tahunan">Pendataan Master Iuran Tahunan</a></li>
	   </ul>
</div><!--Akhir class isi kanan-->
		<?php 
		 break;
		 
		// Ini Link Modul ke Menu MASTER SPP
		
		case "mastersiswa":
			include "aplikasi/set_mastersiswa.php";
		break;
		
		case "masterspp":
			include "aplikasi/set_masterspp.php";
		break;
		
		case "spp_master_siswa":
			include "aplikasi/spp_master_siswa.php";
		break;
		
		case "spp_form":
			include "aplikasi/spp_form.php";
		break;
		
		case "set_masteriuran":
			include "aplikasi/set_masteriuran.php";
		break;
		
		case "sppnon_form_iuran":
			include "aplikasi/sppnon_form_iuran.php";
		break;
		
		case "spp_masteriuran":
			include "aplikasi/spp_masteriuran.php";
		
		}
		?>
	