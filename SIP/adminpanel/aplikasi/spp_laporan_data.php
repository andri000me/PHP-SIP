<?php
$database="aplikasi/database/spp.php";
switch($_GET['pilih']){
default: ?>
<h3>LAPORAN REKAPITULASI SPP</h3>
<div class="isikanan"><!--Awal class isi kanan-->							
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="spp_laporan.php">Laporan</a></div>
		</div>
		<br/>
		<br/>
		<h2 align="left">&nbsp;&nbsp;&nbsp;MASTER LAPORAN</h2>
		<p>&nbsp;&nbsp;&nbsp;Untuk Melihat Laporan dari setiap Transaksi , silahkan pilih menu dibawah ini !
		  
	   <!--Link ke halaman berikut-->
	   <ul>
       <li><a href="?pilih=spp_laporan_bulanan" title="Rincian Laporan Periode SPP">Laporan Periode SPP</a></li>
	   <li><a href="?pilih=sppnon_laporan" title="Rincian Laporan Periode NON SPP">Laporan Periode NON SPP</a></li>
	   <li><a href="?pilih=spp_rekap" title="Rincian Laporan Rekapitulasi SPP">Laporan Rekapitulasi SPP</a></li>
	   </ul>
</div><!--Akhir class isi kanan-->
		<?php 
		 break;
		 
		// Ini Link Modul ke Menu MASTER LAPORAN
		
		case "spp_laporan_bulanan":
			include "aplikasi/spp_laporan_bulanan.php";
		break;
		
		case "sppnon_laporan":
			include "aplikasi/sppnon_laporan.php";
		break;
		
		case "spp_rekap":
			include "aplikasi/spp_rekap.php";
		break;
		
		case "laporan_bulanan_spp":
			include "aplikasi/laporan_bulanan_spp.php";
		break;
	
		case "laporan_bulanan_nonspp":
			include "aplikasi/laporan_bulanan_nonspp.php";
		break;
	
		case "laporan_rekap_spp":
			include "aplikasi/laporan_rekap_spp.php";
		break;	
			
		case "detail_laporan_nonspp":
			include "aplikasi/detail_laporan_nonspp.php";
		}
		?>
	