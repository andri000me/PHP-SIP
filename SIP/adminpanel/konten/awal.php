<!DOCTYPE HTML>
<?php include "../konfigurasi/koneksi.php"; ?>
<html>
<head>
<title>Trimitra Sistem Informasi</title>
<link rel="stylesheet" type="text/css" href="css/utama.css">
<link rel="stylesheet" type="text/css" href="css/kalendar.css">
<script language="JavaScript" src="js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="js/highslide.js"></script>
<script type="text/javascript" src="js/paging.js"></script>

<script type="text/javascript">
	hs.graphicsDir = 'js/graphics/';
	hs.wrapperClassName = 'wide-border';
</script>
    <link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" />   
    <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="js/ui/ui.core.js"></script>
    <script type="text/javascript" src="js/ui/ui.datepicker.js"></script>
	<!-- Date Time Picker -->
    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
	  
	   $(document).ready(function(){
        $("#tanggal1").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
    </script>
	
	<!-- Reload Page -->
      <script type="text/JavaScript">
         <!--
            function AutoRefresh( t ) {
               setTimeout("location.reload(true);", t);
            }
         //-->
      </script>
	  
	  <!-- Form Dinamis -->
	  <!-- <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script> BENTROK DATE PICKER -->
		<script language="javascript">
			function tambahMapel() 	{
				var idf = document.getElementById("idf").value;
				var stre;
				stre="<p id='srow" + idf + "'> <select name='mata_pelajaran[]'> <option value='' selected>Pilih Mata Pelajaran..</option> <?php $mapel=mysql_query("SELECT * FROM sh_mapel ORDER BY nama_mapel ASC");
											   while($m=mysql_fetch_array($mapel)){ echo "	<option value='$m[id_mapel]'>$m[nama_mapel]</option>"; } ?> </select> <input type='hidden' /> <a href='#' style=\"color:#3399FD;\" onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus Tambahan</a></p>";
				$("#divMapel").append(stre);	
				idf = (idf-1) + 2;
				document.getElementById("idf").value = idf;
				}
			function hapusElemen(idf) {
				$(idf).remove();
				}
		</script>
	  
</head>