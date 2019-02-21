<?php
$database="aplikasi/database/spp.php";
switch($_GET['pilih']){
default: ?>
<h3>TRANSAKSI</h3>
<div class="isikanan"><!--Awal class isi kanan-->							
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="spp.php">Master</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontal"><a href="spp_laporan.php">Laporan</a></div>
		</div>
		<br/>
		<br/>
		<h2 align="left">&nbsp;&nbsp;&nbsp;MASTER TRANSAKSI</h2>
		<p>&nbsp;&nbsp;&nbsp;Untuk melakukan transaksi penerimaan kas atau pengeluaran kas silahkan pilih menu dibawah ini !
		  
	   <!--Link ke halaman berikut-->
	   <ul>
       <li><a href="?pilih=spp_bulanan" title="Pembayaran SPP Bulanan">Pembayaran SPP Bulanan</a></li>
	   <li><a href="?pilih=non_spp" title="Pembayaran Keuangan non SPP">Pembayaran Keuangan non SPP</a></li>
	   </ul>
</div><!--Akhir class isi kanan-->
		<?php 
		 break;
		 
		// Ini Link Modul ke Menu MASTER SPP
		
		case "spp_bulanan":
			include "aplikasi/spp_bulanan.php";
		break;
		
		case "spp_masterbulanan":
			include "aplikasi/spp_masterbulanan.php";
		break;
		
		case "nonspp_masterbulanan":
			include "aplikasi/nonspp_masterbulanan.php";
		break;
		
		case "non_spp":
			include "aplikasi/spp_non.php";
		
		}
		?>
	