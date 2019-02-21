<div class="container-fluid">
<div class="row">
<div class="col-md-6"><!--col-md-4-->
<div class="alert alert-info"><!--panel primary-->
<div class="panel-heading"><!--panel heading-->
    <h3 class="panel-title"><img src="file/tema/edisi_spesial_trimitra/styles/img/statistik.png"/> Statik Web</h3>
</div><!--panel heading-->		
<div class="panel-body">
    <table width="100%" class="table">
			<?php
			  $ip      = $_SERVER['REMOTE_ADDR'];
              $tanggal = date("Ymd");
              $waktu   = time();

              $cekstatistik = mysql_query("SELECT * FROM sh_statistik WHERE ip_addres='$ip' AND tanggal='$tanggal'");
              // Kalau belum ada, simpan data user tersebut ke database
              if(mysql_num_rows($cekstatistik) == 0){
                mysql_query("INSERT INTO sh_statistik(ip_addres, tanggal ,mengunjungi, online) VALUES('$ip','$tanggal','1','$waktu')");
              } 
              else{
                mysql_query("UPDATE sh_statistik SET mengunjungi=mengunjungi+1, online='$waktu' WHERE ip_addres='$ip' AND tanggal='$tanggal'");
              }

              $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM sh_statistik WHERE tanggal='$tanggal' GROUP BY ip_addres"));
              $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(mengunjungi) FROM sh_statistik"), 0); 
              $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(mengunjungi) as kunjunganhariini FROM sh_statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
              $totalhits        = mysql_result(mysql_query("SELECT SUM(mengunjungi) FROM sh_statistik"), 0); 
              $bataswaktu       = time() - 300;
              $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM sh_statistik WHERE online > '$bataswaktu'"));
			?>
			<tr><td style="padding: 5px 0px 5px 10px"><?php echo "$totalhits";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/edisi_spesial_standart/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px"><b>Total Hits Halaman</b></td>
			</tr>
			<tr><td style="padding: 5px 0px 5px 10px"><?php echo "$totalpengunjung";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/edisi_spesial_standart/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px"><b>Total Pengunjung</b></td>
			</tr>
			<tr><td style="padding: 5px 0px 5px 10px"><?php echo "$hits[kunjunganhariini]";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/edisi_spesial_standart/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px"><b>Hits Hari Ini</b></td>
			</tr>
			<tr><td style="padding: 5px 0px 5px 10px"><?php echo "$pengunjung";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/edisi_spesial_standart/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px"><b>Pengunjung Hari Ini</b></td>
			</tr>
			<tr><td style="padding: 5px 0px 5px 10px"><?php echo "$pengunjungonline";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/edisi_spesial_standart/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px"><b>Pengunjung Online</b></td>
			</tr>
			</table>
   </div><!--panel body-->
   </div><!--panel primary-->
</div><!--col-md-4-->
<!---------------------------------------------------->
<div class="col-md-6"> <!--col-md-4-->   
<div class="alert alert-info"><!--panel primary-->
<div class="panel-heading"><!--panel heading-->
        <h3 class="panel-title"><img src="file/tema/edisi_spesial_trimitra/styles/img/polling.png"/> POLLING</h3>
</div><!--panel heading-->

<div class="panel-body"><!--panel body-->
  <table class="table">
          <?php
			$pertanyaan=mysql_query("SELECT * FROM sh_sidebar WHERE jenis='polling' AND status='1' AND isi2='pertanyaan'");
			$tanya=mysql_fetch_array($pertanyaan);
			echo "
			<table width='100%' style='padding: 0px 10px 10px 10px;margin-bottom: 20px;'><form method='POST' action='kontenweb/insert_polling.php'>
			<tr><td colspan='2'><b>$tanya[nama]</td></tr>
			";
			
			$polling=mysql_query("SELECT * FROM sh_sidebar WHERE jenis='polling' AND status='1' AND isi2!='pertanyaan'");
			while($pol=mysql_fetch_array($polling)){
			?>
			<tr><td style="padding: 5px 0 5px 0;"><input type="radio" name="poll" id="poll" <?php echo "value=$pol[id_sidebar]";?>></td><td style="padding: 5px 0 5px 0;"><?php echo "$pol[nama]";?><br /></td></tr>
			<?php } ?>
			<tr><td colspan="2"><input type="submit" class="tombol" value="Poll">&nbsp;<input type="button" class="tombol" value="Hasil" onclick="window.location.href='?p=polling';"></td></tr>
			</form>
   </table>
 </div><!--panel body-->
</div><!--panel primary-->
</div><!--col-md-4-->
</div>
</div>
