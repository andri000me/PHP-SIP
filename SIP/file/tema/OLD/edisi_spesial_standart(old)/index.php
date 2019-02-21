<?php
session_start();
include "konfigurasi/koneksi.php";
include "file/tema/edisi_spesial_standart/atas.php";
?>
<body>
	<div id="wrapper">
		<?php include "file/tema/edisi_spesial_standart/header.php";?>
		
		<div id="menu">
			<?php include "file/tema/edisi_spesial_standart/menu.php";?>
		</div>
		
		<?php include "file/tema/edisi_spesial_standart/konten.php";?>
		
		<div id="sidebar">
			<?php include "file/tema/edisi_spesial_standart/sidebar.php";?>
		</div>
	<div class="clear"></div>
	
		<?php include "file/tema/edisi_spesial_standart/footer.php"; ?>
	
	<div class="clear"></div>
	</div>
	
			<!-- PopUP Windows -->
							<div id="popup">
								<div class="window">
									<a href="#" class="close-button" title="Close">X</a>
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
	
</body>
</html>