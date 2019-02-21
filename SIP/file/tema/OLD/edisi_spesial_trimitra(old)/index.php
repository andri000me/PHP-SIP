<?php
session_start();
include "konfigurasi/koneksi.php";
include "file/tema/edisi_spesial_trimitra/atas.php";
?>
<!DOCTYPE HTML>
<head>
	<title>Sekolah Trimitra Sisteminfo</title>
</head>

  
    <!--<script src='http://misbahudin.googlecode.com/files/daun%20gugur.js'></script>-->    
 
<div id="wrapper">
<div class="container-fluid">
  <div class="row"><?php include"file/tema/edisi_spesial_trimitra/menu.php"?></div>
  
  <div class="row"><?php include"file/tema/edisi_spesial_trimitra/header.php"?></div>
  <br />
  <div class="row" id="content">
      <?php include"file/tema/edisi_spesial_trimitra/konten.php"?>
      
      <?php include"file/tema/edisi_spesial_trimitra/sidebar.php"?>
  </div>
  
  <?php include"file/tema/edisi_spesial_trimitra/footeratas.php"?>
  
  <div class="row" id="footer"><?php include"file/tema/edisi_spesial_trimitra/footer.php"?></div>
</div>
</div>

<!-- PopUP Windows -->
							<div id="popupkalendar">
								<div class="windowkalendar">
									<a href="#" class="close-buttonkalendar" title="Close">X</a>
									  <h2> Detail Tanggal Akademik </h2>
										<hr/>
										  <?php
			  
											  $id = $_GET['id'];
										  
											  $sql_1 = mysql_query("SELECT * FROM sh_kalendar_akademik WHERE id_kalendar = '$id'");
											  $a     = mysql_fetch_array($sql_1);
											  
											  ?>
											  
											  <?php
											  #Ubah menjadi format tanggal Indonesia untuk tanggal acara
											  $tgl_akademik = tgl_indo($a['tgl_akademik']);
											  ?>
											  
											  <?php
											  #Merapikan format teks untuk detail acara
											  $detail = nl2br($a['keterangan']);
											  ?>
											  
											  <table id="calendar" cellspacing="0" cellpadding="0">
													  <tr>
														   <td>Tanggal</td>
														   <td align="center"> : </td>
														   <td><?php echo"$tgl_akademik"; ?></td>
													  </tr>
													  <tr>
														   <td>Subjek</td>
														   <td align="center"> : </td>
														   <td><?php echo"$a[subjek]"; ?></td>
													  </tr>
													  <tr>
														   <td>Keterangan</td>
														   <td align="center"> : </td>
														   <td><?php echo"$detail"; ?></td>
													  </tr>
											  </table>
										</div>
									</div>	