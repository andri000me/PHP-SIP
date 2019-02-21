 <div class="col-md-4">
  
    <!--Pencarian-->
    <div class="panel-body">
        <form method="POST" action="?p=pencarian" class="form-horizontal" role="form">
          <div class="form-group has-default has-feedback">
           <div class="input-group">
              <input type="text" name="cari" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" placeholder="Pencarian berita"/>
            <span class="input-group-addon"><input type="image" src="file/tema/edisi_spesial_trimitra/styles/img/cari1.png" alt="Submit" name="btn_cari" title="Cari" width="20"/></span>
           </div>
          </div>
        </form>
    </div>
    <!--Pencarian-->
  
    <!--Profile Kepala Sekolah-->
      <?php 
      $sql   = "SELECT * FROM sh_info_sekolah WHERE id_info ='15' ";
      $query = mysql_query($sql)or die("ERROR SQL TAMPIL INFO");
      $data= mysql_fetch_array($query);
      ?>
    <div class="panel panel-primary">
     <div class="panel-heading">
        <h3 class="panel-title"><?php echo $data[nama_info];?></h3> 
     </div><!--panel heading-->
     <div class="panel-body">
        <p>
        <?php echo $data[isi_info];?>
        </p>
     </div><!--panel body-->
    </div><!--panel primary-->
  <!--Profile Kepala Sekolah-->
      
      <div class="panel panel-primary">
	  <div class="panel-heading">
        <h3 class="panel-title"><img src="file/tema/edisi_spesial_trimitra/styles/img/kalender.png"/>Kalender Akademik</h3>
	  </div>
      <div class="kotakSidebar">	 
	     <?php include "fungsi_kalendar.php"; ?> 
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
              </table><br />

</div>
    </div><!--panel primary-->
  <br />
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><img src="file/tema/edisi_spesial_trimitra/styles/img/notepad.png"/> Agenda Sekolah</h3>
      </div><!--panel heading-->  
      <div class="panel-body">     
                    <?php
					$agenda=mysql_query("SELECT * FROM sh_agenda ORDER BY id_agenda DESC limit 1");
					$hitungagenda=mysql_num_rows($agenda);
					
					if($hitungagenda > 0){
					while($ag=mysql_fetch_array($agenda)){
					?>
                    <ul class="list-unstyled">
	                  <li><?php echo "<a href=''><b>$ag[judul_agenda]</b>";?></a></li>
                      <li>Pada tanggal <?php echo "$ag[tanggal_agenda]";?></li>
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
<h3 class="panel-title"><img src="file/tema/edisi_spesial_trimitra/styles/img/galeri.png"/>Galeri Terbaru</h3>
</div><!--panel heading-->
<div class="panel-body">
<table class="table">
  <tr>
			<?php
			$poto=mysql_query("SELECT * FROM sh_galeri ORDER BY id_galeri ASC LIMIT 4");
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