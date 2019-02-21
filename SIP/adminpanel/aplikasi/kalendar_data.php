<?php
// Fungsi Merubah Format Tanggal Indonesia
function tgl_indo($tgl)
{

   $date  = substr($tgl,8,2);
   $month = get_bulan(substr($tgl,5,2));
   $year  = substr($tgl,0,4);
   return $date.' '.$month.' '.$year;

}
// Fungsi Merubah Format Bulan
function get_bulan($bln) 
{
switch ($bln){
        case 1;
		  return "Jan";
		  break;
        case 2;
		  return "Feb";
		  break;
		case 3;
		  return "Mar";
		  break;
		case 4;
		  return "Apr";
		  break;
		case 5;
		  return "Mei";
		  break;
		case 6;
		  return "Jun";
		  break;
		case 7;
		  return "Jul";
		  break;
		case 8;
		  return "Agu";
		  break;
		case 9;
		  return "Sept";
		  break;
		case 10;
		  return "Okt";
		  break;
		case 11;
		  return "Nov";
		  break;
		case 12;
		  return "Des";
		  break;

}

}

?>

<?php
$database="aplikasi/database/kalendar.php";
switch($_GET['pilih']){
default: ?>

<h3>Kalendar Akademik</h3>
<div class="isikanan"> <!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="kalendar_akademik.php">Kalendar Akademik</a></div>
		</div>
		<div class="atastabel" style="margin-bottom: 10px">
			
		<!-- Tambah Jadwal -->
		<div class="cari">
			<input type="button" class="pencet" value="Tambah Jadwal" onclick="window.location.href='?pilih=tambah';">
		</div>		
		
		<div align="center"/>
		<!-- Kalendar -->
		<?php
              // Array Variable Nama Bulan dalam Versi Indonesia      
			  $monthNames = Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", 
                                  "Agustus", "September", "Oktober", "November", "Desember");
              ?>

              <?php
              // Jika data bulan & tahun tidak kosong   
			  if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
              if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");
                 
			  ?>

              <?php
			  //Bulan Sekarang
              $cMonth = $_REQUEST["month"];
			  //Tahun Sekarang
              $cYear  = $_REQUEST["year"];
			  //Hari  Sekarang
			  $dnow = date('d');
			  //Bulan Sekarang
			  $mnow = date('m');
			  //Tahun Sekarang
			  $ynow = date('Y');
 
              $prev_year  = $cYear;
              $next_year  = $cYear;
              $prev_month = $cMonth-1;
              $next_month = $cMonth+1;
 
              if($prev_month == 0 ) 
			  {
                 $prev_month = 12;
                 $prev_year = $cYear - 1;
              }

			  if($next_month == 13 )
			  {
                 $next_month = 1;
                 $next_year = $cYear + 1;
              }
              ?>
				 
			  <table id="calendar" cellspacing="0" cellpadding="0">
				<!-- Caption Kalendar -->
                     <caption class='kalendar'>
					 <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>" class="nav">&laquo;Previous</a>
			         &nbsp;&nbsp;&nbsp;<strong><font size="10px" color="Lightblue"><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></font></strong>&nbsp;&nbsp;&nbsp;
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
					      echo "<td class='kalendar' valign='top' height='150px' ".($jmlAcara > 0 ? " " : '').">";
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
	</div>
		<div class="clear"></div>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel">Tanggal</th>
				<th class="tabel">Subjek</th>
				<th class="tabel">Keterangan</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				// Menampilkan data dari tabel sh_jadwal
				$kalendar=mysql_query("SELECT * FROM sh_kalendar_akademik ORDER BY id_kalendar ASC");
				$cek_kalendar=mysql_num_rows($kalendar);
				if($cek_kalendar > 0){
				while ($k=mysql_fetch_array($kalendar)){
				#Ubah menjadi format tanggal Indonesia untuk tanggal input dan tanggal maintenance
				$tgl_akademik = tgl_indo($k['tgl_akademik']);
				#Merapikan keluaran untuk format teks untuk keterangan
				$keterangan = nl2br($k['keterangan']);
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><?php echo "$tgl_akademik"; ?></td>
				<td class="tabel"><?php echo"$k[subjek]";?></td>
				<td class="tabel"><?php echo"$keterangan";?></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?pilih=kalendar&untukdi=hapus&id=$k[id_kalendar];"?> " onclick="return confirm('Apakah Anda Yakin Menghapus Kalendar Akademik Ini ?')" > Hapus  </a> </div>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$k[id_kalendar]";?>">Edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
				} 
			}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="8"><font color="red"><b>DATA KALENDAR AKADEMIK PELAJARAN BELUM TERSEDIA</b></font></td></tr>
			<?php } ?>
		</table>
		
		<div class="atastabel" style="margin: 5px 10px 0 10px">
		<div id="pageNavPosition"></div>
		</div>
		
		<div class="atastabel" style="margin: 5px 10px 0 10px">
		<?php
			$jumlahtampil=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='3'");
			$jt=mysql_fetch_array($jumlahtampil);
		?>
			    <script type="text/javascript"><!--
				var pager = new Pager('results', <?php echo "$jt[isi_pengaturan]"; ?>); 
				pager.init(); 
				pager.showPageNav('pager', 'pageNavPosition'); 
				pager.showPage(1);
			//--></script>
		</div>	
</div><!--Akhir class isi kanan-->
		<?php break;
		
		case "tambah":
			include "aplikasi/kalendar_tambah.php";
		break;
		
		case "edit":
		    include "aplikasi/kalendar_edit.php";
		}
		?>
	