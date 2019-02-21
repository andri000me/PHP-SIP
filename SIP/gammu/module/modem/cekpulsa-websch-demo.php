	<br /><br />
       <!--<form action="<?php echo $_SERVER['PHP_SELF'];?>?module=cekpulsa" method="post">
            <input type="hidden" name="mati" value="mati">
            <input type="submit" value="MATIKAN">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>?module=cekpulsa" method="post">
            <input type="hidden" name="hidup" value="hidup">
            <input type="submit" value="HIDUPKAN">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>?module=cekpulsa" method="post">
            <input type="hidden" name="cekdevice" value="cekdevice">
            <input type="submit" value="CEK DEVICE">
        </form>-->
		
		<form action="<?php $_SERVER['PHP_SELF']; ?>?module=cekpulsa" method="post" name="form" id="form">
			<p class="style1">Masukkan Kode :
			  <input name="kode" type="text" id="kode" />
			  <input name="submit1" type="submit" id="submit1" value="&lt;&lt; Cek Pulsa &gt;&gt;" />
			</p>
		</form> 
	
<?php

/* Sesuaikan dengan name service gammu 
name services : trimitra01
Sample mematikan gammu service cmd : c:\xampp\htdocs\gammu\gammu-smsd -c smsdrc -s -n trimitra01
Sample menghidupkan gammu  service cmd : c:\xampp\htdocs\gammu\gammu-smsd -n trimitra01 -k

/*Sesuaikan dengan LOKASI GAMMU anda*/
$data_modem = mysql_fetch_array(mysql_query("select DISTINCT ID from phones"));

$nameservice	= 	 $data_modem['ID'];
$gammuexe       =    "c:\\xampp\\htdocs\\websch-demo\\gammu\\gammu";
$gammurc        =    "c:\\xampp\\htdocs\\websch-demo\\gammu\\gammurc";
$gammusvc       =    "c:\\xampp\\htdocs\\websch-demo\\gammu\\gammu-smsd";
$gammusmsdrc    =    "c:\\xampp\\htdocs\\websch-demo\\gammu\\smsdrc";

	// Matikan Service
    if($_GET['svc']== "off"){
        exec("$gammusvc -n $nameservice -k",$ret);
		echo "<br/>";
        echo "<center>" . $ret[0] ."</center>";
    }

	// Hidupkan Service
     if(isset($_POST['hidup'])){
        exec("$gammusvc -c $gammusmsdrc -s -n $nameservice",$ret);
        echo "<center>" . $ret[0] ."</center>";
    }
	
	// Cek Devices
    if(isset($_POST['cekdevice'])){
        exec("$gammuexe -c $gammurc --identify",$ret);
        echo "<center>" . $ret[0];
        echo $ret[1];
        echo $ret[2];
        echo $ret[3];
        echo $ret[4] . "</center>";        
    }
	
	// POST Submit
    if ($_POST['submit1']) {
	
		// Matikan Service GAMMU
		 exec("$gammusvc -n $nameservice -k",$ret);
		 
		// Maksimal Waktu Proses
		ini_set('max_execution_time', 300);
		
		// POST Kode
		$kode = $_POST['kode'];
		
		// Tanda '\' harus double sesuai dengan Versi PHP ! Worked in 14 Nop 2016 Time : 16:55 
		exec("c:\\xampp\\htdocs\\websch-demo\\gammu\\gammu -c c:\\xampp\\htdocs\\websch-demo\\gammu\\gammurc getussd $kode", $hasil);

		// proses filter hasil output
		for ($i=0; $i<=count($hasil)-1; $i++)
		{
		   if (substr_count($hasil[$i], 'Service reply') > 0) $index = $i;
		}
		 
		// menampilkan sisa pulsa
		//echo "Gagal <br/> $kode";
		echo "<b>";
		echo $hasil[$index];   
		echo "</b>";
		
		// Menghidupkan Service GAMMU
		 exec("$gammusvc -c $gammusmsdrc -s -n $nameservice",$ret);
		 echo "<br/>";
         echo "<center>" . $ret[0] ."</center>";
    }
	
    ?>