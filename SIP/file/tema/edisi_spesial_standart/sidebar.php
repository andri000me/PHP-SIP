<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

 <div class="col-sm-4">
    <!--Pencarian-->
	
        <form method="POST" action="?p=pencarian" class="form-horizontal" role="form">
          <div style="padding:0px 15px;" class="form-group has-default has-feedback hidden-xs">
           <div class="input-group">
              <input type="text" name="cari" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" placeholder="Pencarian" required/>
            <span class="input-group-addon"><input type="image" src="file/tema/edisi_spesial_trimitra/styles/img/cari1.png" alt="Submit" name="btn_cari" title="Cari" width="20"/></span>
           </div>
          </div>
        </form>
    <!--Pencarian-->
  
    <!--Profile Kepala Sekolah-->
      <?php 
      $sql   = "SELECT * FROM sh_pengumuman WHERE ditujukan='all' ";
      $query = mysql_query($sql)or die("ERROR SQL TAMPIL INFO");
      $data= mysql_fetch_array($query);
      ?>
    <div class="panel panel-primary">
     <div class="panel-heading">
        <h3 style="font-family:Bree Serif;" class="panel-title"><img width="40"src="file/tema/edisi_spesial_standart/styles/img/spiker.png" /> Pengumuman</h3> 
     </div><!--panel heading-->
     <div class="panel-body">
        <a href="?p=pengumuman"><b><?php echo $data[judul_pengumuman];?></b></a>
        <p><?php echo $data[isi_pengumuman];?></p>
     </div><!--panel body-->
    </div><!--panel primary-->
  <!--Profile Kepala Sekolah-->
      
      <div class="panel panel-primary">
	  <div class="panel-heading">
        <h3 style="font-family:Bree Serif;" class="panel-title"><img src="file/tema/edisi_spesial_trimitra/styles/img/kalender.png"/>Kalender Akademik</h3>
	  </div>
      <div class="kotakSidebar">
			  <table id="calendar" cellspacing="0" cellpadding="0" class="table-bordered">
				<!-- Caption Kalendar -->
                     <caption class='kalendar'>
					 <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>" class="nav">&laquo;Previous</a>
			         &nbsp;&nbsp;&nbsp;<strong><font size="5px" color="Lightblue"><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></font></strong>&nbsp;&nbsp;&nbsp;
                     <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>" class="nav">Next&raquo;</a>
					 </caption>
				  <!-- Header Table Kalendar --> 
                     <tr>
                          <th class="kalendar">Min</th>
                          <th class="kalendar">Sen</th>
                          <th class="kalendar">Sel</th>
                          <th class="kalendar">Rab</th>
                          <th class="kalendar">Kam</th>
                          <th class="kalendar">Jum</th>
                          <th class="kalendar">Sab</th>
                     </tr>
            
			         <?php
					// Pengaturan Penanggalan	
                     $timestamp = mktime(0,0,0,$cMonth,1,$cYear);
                     $maxday    = date("t",$timestamp);
                     $thismonth = getdate ($timestamp);
                     $startday  = $thismonth['wday'];
                    
					// Perulangan Jika $i < ($maxday+$startday)
					 for ($i=0; $i<($maxday+$startday); $i++) 
			         {
					 $tgl  = ($i - $startday + 1);
					 
					 // Jika $i % 7
	                   if(($i % 7) == 0 ) 
			           {
		                   echo "<tr>";
	                   }
	                   
					   // Jika $i < $startday
					   if($i < $startday)
			           {
		                  echo "<td class='kalendar'></td>";
	                   } 
					   
					   // Persamaan Waktu - Tanggal - Bulan & Tahun u/ mencari tgl saat ini
					   else if ($tgl == $dnow && $cMonth == $mnow && $cYear == $ynow) 
					   {
						  echo "<td class='today'>$tgl</td>";
					   }	   
					   
			           else
			           {
						 // Query menampilkan tabel sh_kalendar_akademik
		                  $sql_1    = "SELECT * FROM sh_kalendar_akademik WHERE tgl_kalendar='".($i - $startday + 1).'-'.$cMonth.'-'.$cYear."'";
		                  $hs       = mysql_query($sql_1);
		                  $jmlAcara = mysql_num_rows($hs);
		                 // Perhitungan Jumlah Acara    
					      echo "<td class='kalendar' valign='top' ".($jmlAcara > 0 ? " " : '').">";
		                  echo ($i - $startday + 1);
						// Jika jumlah acara > 0
					      if($jmlAcara > 0)
				          {
			                 while($acara = mysql_fetch_array($hs))
				             {
							 // Menampilkan Acara Sesuai dengan tanggal
				               echo"<br><a href=?month=$cMonth&year=$cYear&id=$acara[id_kalendar]&#popupkalendar style=text-decoration:none; color: blue;><font size=1px color=red>*[$acara[subjek]]</font></a>";
			                 }
		                  }
		                    
					      echo "</td>";
	                   }
	                  // Jika $i % 7 = 6
					   if(($i % 7) == 6 )
			           {
		                   echo "</tr>";
	                   }
			         }
			      ?>			
              </table>

</div>
    </div><!--panel primary-->
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 style="font-family:Bree Serif;" class="panel-title"><img src="file/tema/edisi_spesial_trimitra/styles/img/notepad.png"/> Agenda Sekolah</h3>
      </div><!--panel heading-->  
      <div class="panel-body">     
                    <?php
					$agenda=mysql_query("SELECT * FROM sh_agenda ORDER BY id_agenda DESC limit 1");
					$hitungagenda=mysql_num_rows($agenda);
					
					if($hitungagenda > 0){
					while($ag=mysql_fetch_array($agenda)){
					?>
                    <ul class="list-unstyled">
	                  <li><?php echo "<a href='?p=agenda'><b>$ag[judul_agenda]</b>";?></a></li>
                      <li>Pada tanggal <?php echo tgl_indo($ag[tanggal_agenda]);?></li>
					  <li>Bertempat di <?php echo "$ag[tempat_agenda]";?></li>
					  <li>Keterangan : <?php echo "$ag[keterangan_agenda]";?></li>
					<?php }
                    }else {?>
					  <li><a href="">Data agenda belum ada</a></li>
					<?php } ?>
                    </ul>
     </div><!--panel body-->
     </div><!--panel primary-->
     
     <!-------------------------Galeri--------------------------->
<div class="panel panel-primary"><!--panel primary-->
<div class="panel-heading"><!--panel heading-->
<h3 style="font-family:Bree Serif;" class="panel-title"><img src="file/tema/edisi_spesial_trimitra/styles/img/galeri.png"/>Galeri Terbaru</h3>
</div><!--panel heading-->
<div class="panel-body">
<table class="table">
  <tr>
			<?php
			$poto=mysql_query("SELECT * FROM sh_galeri ORDER BY id_galeri ASC LIMIT 3");
			$hitungfoto=mysql_num_rows($poto);
			
			if($hitungfoto > 0){
			while($ph=mysql_fetch_array($poto)){
			?>
			<td>
            <a href="index.php?p=detfoto&id=<?php echo "$ph[id_galeri]";?>#popup">
			  <img width="200" class="img-responsive" src="images/foto/galeri/<?php echo "$ph[nama_galeri]";?>" title="Klik untuk memperbesar"/>
            </a>
			</td>
			<?php }}
			else {?>
			<b>Foto belum ada</b>
			<?php } ?>
   </tr>
</table>
</div><!--panel body-->
</div><!--panel primary-->

<div class="panel panel-primary"><!--panel primary-->
<div class="panel-heading"><!--panel heading-->
    <h3 style="font-family:Bree Serif;" class="panel-title"><img src="file/tema/edisi_spesial_trimitra/styles/img/statistik.png"/> Statik Web</h3>
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
			<tr><td style="padding: 5px 0px 5px 10px; font-size:12px;"><?php echo "$totalhits";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/edisi_spesial_standart/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px; font-size:12px;"><b>Total Hits Halaman</b></td>
			</tr>
			<tr><td style="padding: 5px 0px 5px 10px; font-size:12px;"><?php echo "$totalpengunjung";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/edisi_spesial_standart/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px; font-size:12px;"><b>Total Pengunjung</b></td>
			</tr>
			<tr><td style="padding: 5px 0px 5px 10px; font-size:12px;"><?php echo "$hits[kunjunganhariini]";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/edisi_spesial_standart/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px; font-size:12px;"><b>Hits Hari Ini</b></td>
			</tr>
			<tr><td style="padding: 5px 0px 5px 10px; font-size:12px;"><?php echo "$pengunjung";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/edisi_spesial_standart/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px; font-size:12px;"><b>Pengunjung Hari Ini</b></td>
			</tr>
			<tr><td style="padding: 5px 0px 5px 10px; font-size:12px;"><?php echo "$pengunjungonline";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/edisi_spesial_standart/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px; font-size:12px;"><b>Pengunjung Online</b></td>
			</tr>
			</table>
   </div><!--panel body-->
   </div><!--panel primary-->
   
   <div class="panel panel-primary"><!--panel primary-->
<div class="panel-heading"><!--panel heading-->
        <h3 style="font-family:Bree Serif;" class="panel-title"><img src="file/tema/edisi_spesial_trimitra/styles/img/polling.png"/> POLLING</h3>
</div><!--panel heading-->

<div class="panel-body"><!--panel body-->
  <table class="table">
          <?php
			$pertanyaan=mysql_query("SELECT * FROM sh_sidebar WHERE jenis='polling' AND status='1' AND isi2='pertanyaan'");
			$tanya=mysql_fetch_array($pertanyaan);
			echo "
			<table width='100%' style='padding: 0px 10px 10px 10px;margin-bottom: 20px; font-size:13px;'><form method='POST' action='kontenweb/insert_polling.php'>
			<tr><td colspan='2'><b>$tanya[nama]?</td></tr>
			";
			
			$polling=mysql_query("SELECT * FROM sh_sidebar WHERE jenis='polling' AND status='1' AND isi2!='pertanyaan'");
			while($pol=mysql_fetch_array($polling)){
			?>
			<tr><td style="padding: 5px 0 5px 0;"><input type="radio" name="poll" id="poll" <?php echo "value=$pol[id_sidebar]";?>></td><td style="padding: 5px 0 5px 0; font-size:12px;"><?php echo "$pol[nama]";?><br /></td></tr>
			<?php } ?>
			<tr><td colspan="2"><input type="submit" class="tombol" value="Poll">&nbsp;<input type="button" class="tombol" value="Hasil" onclick="window.location.href='?p=polling';"></td></tr>
			</form>
   </table>
 </div><!--panel body-->
</div><!--panel primary-->