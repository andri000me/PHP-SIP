<?php
session_start();
include "konfigurasi/koneksi.php";
include "fungsi_kalendar.php";
include "file/tema/edisi_spesial_standart/atas.php";
?>
<!DOCTYPE HTML>
<head>
	<title>Sekolah Trimitra Sisteminfo</title>
</head>
<div id='Back-to-top'>
<img alt='Scroll to top' src='https://lh6.googleusercontent.com/-18ivhAksPaU/Uqfnr_rXbbI/AAAAAAAAIzw/klENnMeM290/s128/backtotop.png'/>
</div>

<script type='text/javascript'>
$(function() { $(window).scroll(function() {
    if($(this).scrollTop()>400) {
        $('#Back-to-top').fadeIn();
        }
    else { $('#Back-to-top').fadeOut();}
    });
    $('#Back-to-top').click(function() {
        $('body,html')
        .animate({scrollTop:0},300)
        .animate({scrollTop:40},200)
        .animate({scrollTop:0},130)
        .animate({scrollTop:15},100)
        .animate({scrollTop:0},70);
        });
});
</script>
  
    <!--<script src='http://misbahudin.googlecode.com/files/daun%20gugur.js'></script>-->    
 
<div id="wrapper">
<div class="col-md-2">
<div class="container-fluid">
<div  id="header" class="row visible-xs-block" >
		<form method="POST" action="?p=pencarian" class="form-horizontal" role="form">
          <div style="padding:0px 15px;" class="form-group has-default has-feedback visible-xs-block">
           <div class="input-group">
              <input type="text" name="cari" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" placeholder="Pencarian" required/>
            <span class="input-group-addon"><input type="image" src="file/tema/edisi_spesial_standart/styles/img/cari1.png" alt="Submit" name="btn_cari" title="Cari" width="20"/></span>
           </div>
          </div>
        </form></div>

		<?php 			if (isset($_SESSION['siswa'])){
				$profilsaya=mysql_query("SELECT * FROM sh_siswa, sh_kelas WHERE sh_siswa.id_kelas=sh_kelas.id_kelas AND nis='$_SESSION[siswa]'");
				$ps=mysql_fetch_array($profilsaya);?>
				
				<div class="row hidden-md hidden-lg" id="propil" style="top:50px;">
					<div class="panel panel-primary">
					<div class="panel-heading"><h3  style="font-family:Bree Serif;" class="panel-title">Profil</h3></div>
					<div class="panel-body">
				<img src="<?php $path = $ps[foto]; $ambilpath = substr($path,28); echo "".$ambilpath; ?>" class="img img-responsive" style="width:50px;height:50px;float:left;"/>
				<?php echo"<a href='elearningku/?p=profil'' title='Klik untuk sunting profil anda'><br/>&nbsp;$_SESSION[namasiswa]</a>";?>
				</div>
				<div class="panel-body">
				<div id="spoiler">
					<div><input  onclick="if (this.parentNode.parentNode.getElementsByTagName('div')['show'].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')['show'].style.display = ''; this.parentNode.parentNode.getElementsByTagName('div')['hide'].style.display = 'none'; this.innerText = ''; this.value = 'Tutup'; } else { this.parentNode.parentNode.getElementsByTagName('div')['show'].style.display = 'none'; this.parentNode.parentNode.getElementsByTagName('div')['hide'].style.display = ''; this.innerText = ''; this.value = 'Notifikasi'; }" name="button" class="btn btn-default" type="button" value="Notifikasi" /></div>
					<div id="show" style="display: none;">
					<table class="table table-striped">
					
					<?php   $notif=mysql_query("SELECT * FROM sh_mading WHERE nama_siswa='$_SESSION[namasiswa]'");
							while($n=mysql_fetch_array($notif)){
								$note=mysql_query("SELECT * FROM sh_like WHERE id_mading='$n[id_mading]' AND nama<>'$_SESSION[namasiswa]' AND id<>'' ORDER BY time DESC LIMIT 6");
								$hitungnote=mysql_num_rows($note);
								if($hitungnote>0){
									while($h=mysql_fetch_array($note)){
										echo "<tr class='hver'><td><a href='?p=detmading&id=$h[id_mading]'><small><b>$h[nama]</b> menyukai mading anda</small></a></td></tr>";
									}
								}
								if($hitungnote<0){
									while($h=mysql_fetch_array($note)){
										echo "<tr class='hver'><td><small><b>$h[nama]</b> menyukai mading anda</small></td></tr>";
									}
								}
							}?>
					</table>
					</div><div id="hide"></div></div></div></div></div>
		<?php	}
			elseif (isset($_SESSION['guru'])){
				$profilsaya=mysql_query("SELECT * FROM sh_guru_staff WHERE nip='$_SESSION[guru]'");
				$ps=mysql_fetch_array($profilsaya);?>
		
				<div class="row hidden-md hidden-lg" id="propil" style="top:50px;" >
					<div class="panel panel-primary">
					<div class="panel-heading"><h3  style="font-family:Bree Serif;" class="panel-title">Profil</h3></div>
					<div class="panel-body"><?php
			echo "<img src='images/foto/guru/$ps[foto]' style='height:50px;float:left;' width='50' class='img-circle img-responsive'/><a href='elearningku/?p=profil'' title='Klik untuk sunting profil anda'><br/>&nbsp;$_SESSION[namaguru]</a></div></div></div>";
			}
			elseif (isset($_SESSION['orangtua'])){$profilsaya=mysql_query("SELECT * FROM sh_ortu WHERE id_ortu='$_SESSION[orangtua]'");
				$ps=mysql_fetch_array($profilsaya);?>
		
				<div class="row hidden-md hidden-lg" id="propil" style="top:50px;" >
					<div class="panel panel-primary">
					<div class="panel-heading"><h3  style="font-family:Bree Serif;" class="panel-title">Profil</h3></div>
					<div class="panel-body"><?php
			echo "<img src='images/foto/ortu/$ps[foto_ortu]' style='height:50px;float:left;' width='50' class='img-circle img-responsive'/><a href='elearningku/?p=profil' title='Klik untuk sunting profil anda'><br/>&nbsp;$_SESSION[namaortu]</a></div></div></div>";
			} ?>

</div>
</div>
<div class="col-md-8">
<div class="container-fluid">
<div class="row"><?php include"file/tema/edisi_spesial_standart/menu.php"?></div>

  
  <br />
  <div class="row" id="content">
      <?php include"file/tema/edisi_spesial_standart/konten.php"?>
      
      <?php include"file/tema/edisi_spesial_standart/sidebar.php"?>
  </div>
  
  <?php include"file/tema/edisi_spesial_standart/footeratas.php"?>
  
  <div class="row" id="footer"><?php include"file/tema/edisi_spesial_standart/footer.php"?></div>
</div>
</div>
<div class="col-md-2">
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
</div>