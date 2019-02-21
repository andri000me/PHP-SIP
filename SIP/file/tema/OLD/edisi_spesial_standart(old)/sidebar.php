<!-- Pengumuman -->
			<div id="kecil" style="width:325px; margin-left: 0px">
				<div class="pengumuman"><!-- Awal menampilkan pengumuman paling baru-->
				<?php
				$pengumuman=mysql_query("SELECT * FROM sh_pengumuman, sh_users WHERE sh_pengumuman.s_username=sh_users.s_username ORDER BY id_pengumuman DESC");
				$cek_pengumuman=mysql_num_rows($pengumuman);
				
				if($cek_pengumuman > 0){
				$peng=mysql_fetch_array($pengumuman);
				echo "<h4>$peng[judul_pengumuman]</h4>
				<p>$peng[isi_pengumuman]</p>
				<p><b>Diterbitkan pada: $peng[tanggal_pengumuman]</b></p>
				<p><b>Oleh: $peng[nama_lengkap_users]</b></p>";
				}
				else {
				?>
				<h4>PENGUMUMAN</h4>
				<p><b>Belum ada pengumuman</b></p>
				<?php } ?>
				</div>
			</div>

<!-- Polling -->
<div class="kotakSidebar">
			<img src="file/tema/edisi_spesial_standart/css/img/polling.png">
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
			<tr><td style="padding: 5px 0 5px 0;"><input type="radio" name="poll" id="poll" <?php echo "value=$pol[id_sidebar]";?>></td><td style="padding: 5px 0 5px 0;"><?php echo "$pol[nama]";?></td></tr>
			<?php } ?>
			<tr><td colspan="2"><input type="submit" class="tombol" value="Poll">&nbsp;<input type="button" class="tombol" value="Hasil" onclick="window.location.href='?p=polling';"></td></tr>
			</form></table>
</div>

<!--Kalendar Akademik-->
<div class="kotakSidebar">	 
  
	 <h3>Kalendar Akademik</h3>
	     <?php include "fungsi_kalendar.php"; ?> 
			  <table id="calendar" cellspacing="0" cellpadding="0">
				<!-- Caption Kalendar -->
                     <caption class='kalendar'>
					 <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>" class="nav">&laquo;Previous</a>
			         &nbsp;&nbsp;&nbsp;<strong><font size="5px" color="Lightblue"><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></font></strong>&nbsp;&nbsp;&nbsp;
                     <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>" class="nav">Next&raquo;</a>
					 </caption>
				  <!-- Header Table Kalendar --> 
                     <tr>
                          <th class="kalendar">Minggu</th>
                          <th class="kalendar">Senin</th>
                          <th class="kalendar">Selasa</th>
                          <th class="kalendar">Rabu</th>
                          <th class="kalendar">Kamis</th>
                          <th class="kalendar">Jum'at</th>
                          <th class="kalendar">Sabtu</th>
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
				               echo"<br><a href=?month=$cMonth&year=$cYear&id=$acara[id_kalendar]&#popup style=text-decoration:none; color: blue;><font size=1px color=red>*[$acara[subjek]]</font></a>";
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
<!--Kalendar Akademik-->


<!--Agenda-->
<div class="kotakSidebar">
  <div class="kotak_agenda">
     <img src="file/tema/edisi_spesial_standart/css/img/notepad.png">
                    <?php
					$agenda=mysql_query("SELECT * FROM sh_agenda ORDER BY id_agenda DESC limit 1");
					$hitungagenda=mysql_num_rows($agenda);
					
					if($hitungagenda > 0){
					while($ag=mysql_fetch_array($agenda)){
					?>
                    <ul>
	                  <li><?php echo "<a href=''>$ag[judul_agenda]";?></li>
                      <li>Pada tanggal <?php echo "$ag[tanggal_agenda]";?></li>
					  <li>Bertempat di <?php echo "$ag[tempat_agenda]";?></li>
					  <li>Keterangan : <?php echo "$ag[keterangan_agenda]</a>";?></li>
					<?php }
                    }else {?>
					  <li><a href="">Data agenda belum ada</a></li>
					<?php } ?>
                    </ul>
  </div>
</div>
<!--Agenda-->

<!--link-->
<div class="kotakSidebar" style="padding-bottom: 8px;">
<img src="file/tema/edisi_spesial_standart/css/img/link.jpg">
    <a href="http://www.trimitra-sisteminfo.com" target = "_blank"/>
      <img src="file/tema/edisi_spesial_standart/css/img/Logo-Fixed-Trimitra.png" width="200"/>
    </a>
</div>
<!--link-->
