<div class="kotakSidebar">	 
	     <?php include "fungsi_kalendar.php"; ?> 
			  <table id="calendar" cellspacing="0" cellpadding="0" class="table-bordered">
				<!-- Caption Kalendar -->
                     <caption class='kalendar' style="height:50px;">
					 <a style="float:left; margin-left:20px; color:#fff;" href="?p=kalendarAkademik&month=<?php echo $prev_month?>&year=<?php echo $prev_year?>" class="nav">&laquo;Previous</a>
			         &nbsp;&nbsp;&nbsp;<strong><font size="4px" color="Lightblue"><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></font></strong>&nbsp;&nbsp;&nbsp;
                     <a style="float:right; margin-right:20px; color:#fff;" href="?p=kalendarAkademik&month=<?php echo $next_month?>&year=<?php echo $next_year?>" class="nav">Next&raquo;</a>
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
				               echo"<br><a href=?p=kalendarAkademik&month=$cMonth&year=$cYear&id=$acara[id_kalendar]&#popupkalendar style=text-decoration:none; color: blue;><font size=1px color=red>*[$acara[subjek]]</font></a>";
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
              </table><br />

</div>