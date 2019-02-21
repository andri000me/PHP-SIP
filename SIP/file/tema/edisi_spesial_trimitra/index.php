<?php
session_start();
include "konfigurasi/koneksi.php";
include "file/tema/edisi_spesial_trimitra/atas.php";
include "fungsi_kalendar.php";
?>
<!DOCTYPE HTML>
<head>
	<title>Sekolah Trimitra Sisteminfo</title>
</head>

  
    <!--<script src='http://misbahudin.googlecode.com/files/daun%20gugur.js'></script>-->    
 
<div id="wrapper">
<div class="container-fluid">
<div class="row"><?php include"file/tema/edisi_spesial_trimitra/menu.php"?></div>
<div  id="header" class="row visible-xs-block" style="padding:0px 15px;">
		<form method="POST" action="?p=pencarian" class="form-horizontal" role="form">
          <div style="padding:0px 15px;" class="form-group has-default has-feedback visible-xs-block">
           <div class="input-group">
              <input type="text" name="cari" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" placeholder="Pencarian" required/>
            <span class="input-group-addon"><input type="image" src="file/tema/edisi_spesial_trimitra/styles/img/cari1.png" alt="Submit" name="btn_cari" title="Cari" width="20"/></span>
           </div>
          </div>
        </form></div>
 
  
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