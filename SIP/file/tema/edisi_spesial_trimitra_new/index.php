<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
//****Silahkan atur konfigurasi database sesuai dengan kebutuhan dan keadaan server dan sistem****//

//Silahkan ganti nama server dibawah ini sesuai dengan nama server anda//
//Default untuk server lokal komputer adalah "localhost";
$SERVER = "localhost";

//Silahkan ganti nama user atau username dibawah ini sesuai dengan nama user pada server anda//
//Default untuk nama user pada localhost atau server komputer lokal adalah "root"//
$NAMAUSER = "root";

//Silahkan isi password username anda, apabila tidak ada password kosongkan saja//
//Default password pada instalasi server lokal pertama adalah "Tidak ada" atau "kosong"//
$PASSWORDUSER = "trimitra19xampp";

//Silahkan isi database sesuai dengan databse yang taelah adan buat pada server anda//
$DATABASE = "websch-demo";


//Dibawah ini adakn dipanggil deklarasi dalam koneksi ke server dan databasa//
//Jika anda tidak paham atau tidak mengerti pemrograman php, saya sarankan jangan mengganti sedikitpun kode dibawah ini//
mysql_connect ($SERVER, $NAMAUSER, $PASSWORDUSER) or die ("<h1>Tidak terkoneksi ke server</h1>");
mysql_select_db ($DATABASE) or die ("<h1>Database tidak ditemukan</h1>");
?>
<!DOCTYPE HTML>
<head>
	<title> <?php $sql_logo = mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan = '8'"); 
				  $logo     = mysql_fetch_array($sql_logo);
				  echo $logo['isi_pengaturan'];	?> 
	</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta http-equiv="content-type" content="text/html" />
  <meta name="author" content="deded" />

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="file/tema/edisi_spesial_trimitra_new/css/bootstrap.css"/>
<!-- Optional theme -->
<link rel="stylesheet" href="file/tema/edisi_spesial_trimitra_new/styles/style.css"/>

<!-- Latest compiled and minified JavaScript -->
<script src="file/tema/edisi_spesial_trimitra_new/js/js/highslide.js"></script>


<link href='file/tema/edisi_spesial_trimitra_new/styles/font.css' rel='stylesheet' type='text/css'/>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>

<!-- Latest compiled and minified CSS 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->

<!-- jQuery library -->
<script src="file/tema/edisi_spesial_trimitra_new/js/jquery.min.js"></script>

<!-- Latest compiled JavaScript 
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<script src="file/tema/edisi_spesial_trimitra_new/js/bootstrap.min.js"></script>


</head>

  
    <!--<script src='http://misbahudin.googlecode.com/files/daun%20gugur.js'></script>-->    
 

<div id="wrapper">
<div class="container">
  <?php include"header.php"?>
  
  <div id="wrapp" class="row" style="margin-top:0px; background:#fff; margin-left:15px; margin-right:0px;">
        <div class="col-sm-6 col-md-3"><?php include"menu.php"?></div>
        <div class="col-sm-12 col-md-9"><?php include"halaman.php"?></div>
  </div>
</div>
        <?php include"footer.php"?>
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