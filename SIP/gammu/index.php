<?php
session_start();
if(!empty($_SESSION['adminsh'])){
$uidi =$_SESSION['adminsh'];	
$usre =$_SESSION['namalengkap'];
$level=$_SESSION['leveluser']  ;

include "koneksi.php";

?>



<!DOCTYPE html>
<html>

<head>

<script type="text/javascript">
		function ajaxrunning()
		{
			if (window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				xmlhttp =new ActiveXObject("Microsoft.XMLHTTP");
			}
	
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				}
			}
	
			xmlhttp.open("GET","runsis.php");
			xmlhttp.send();
			setTimeout("ajaxrunning()", 5000);
		}
</script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> TRIMITRA | AUTO RESPON APLICATION </title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
	
	<!-- Script untuk Menghitung Karakter di Input TextBox --> 
	<script language="javascript" type="text/javascript"> 
		var maxAmount = 160; // Bisa Di Setting Sesuai Dengan Permintaan
		function textCounter(textField, showCountField) {
			if (textField.value.length > maxAmount) {
				textField.value = textField.value.substring(0, maxAmount);
			} else { 
				showCountField.value = maxAmount - textField.value.length;
			}
		}
	</script>

</head>

 <body onload="ajaxrunning()">

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
			<a class="navbar-header" href="index.php?module=home"> <img src="img/logo-sisar.png" height="55px" width="215px"/> </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src = "img/icon-user.png" height="20px" width="20px" /><?php echo "<b>$usre</b>";?></a>
                </li>
										
				<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src = "img/calendar.png" height="25px" width="25px" /> <?php echo "<b>".date("d-m-Y")."</b>"; ?> </a>
                </li>
				
				<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="" href="logout.php">  <img src = "img/logout-icon.png" height="20px" width="20px" /><b>Logout</b></a>
                </li>     

                <!-- /.dropdown -->
            </ul>
			
			<!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
					
				<!-- Search Box -->
				
				       <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
						
				<!-- Search Box -->
					
					<!-- Module untuk SMS Gateway -->
                        <li>
                            <a href="#"> <img src = "img/pesan.png" height="30px" width="30px" />   SMS Gateway  <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
							
                                <li>
                                    <a href=""> <img src = "img/instan.jpg" height="20px" width="20px" /> Buat Pesan SMS <span class="fa arrow"></span> </a>
									 <ul class="nav nav-third-level">
									 <li> <a href="index.php?module=pesaninstant"> <img src = "img/instants.jpg" height="15px" width="15px" /> Pesan Instant </a> </li>
									 <li> <a href="index.php?module=broadcast"> <img src = "img/broadcast.png" height="15px" width="15px" />  Pesan BroadCast </a> </li>
									 </ul>
                                </li>
								
                                <li>
                                    <a href="index.php?module=pesanmasuk"> <img src = "img/inbox.jpg" height="20px" width="20px" />  Kotak Masuk </a>
                                </li>
								
								<li>
                                    <a href="index.php?module=kotakkeluar"> <img src = "img/outbox.jpg" height="20px" width="20px" /> Kotak Keluar </a>
                                </li>
								
								<li>
                                    <a href="index.php?module=pesanterkirim"> <img src = "img/sent.png" height="20px" width="20px" />   Pesan Terkirim </a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>  
						
						<!-- Module untuk Buku Telepon -->
						<li>
                            <a href="#"> <img src = "img/kontak.png" height="30px" width="30px" />   Buku Telepon  <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								
                                <li>
                                    <a href="index.php?module=groupkontak&op=tambah"> <img src = "img/group.png" height="20px" width="20px" />  Group Kontak </a>
                                </li>
								
								<li>
                                    <a href="index.php?module=allkontak&op=tambah"> <img src = "img/all.png" height="20px" width="20px" /> Daftar Semua Kontak </a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>  
						
						
						<!-- Module untuk Auto Respon -->
						<li>
                            <a href="#"> <img src = "img/auto-sms.png" height="30px" width="35px" /> Auto Respon SMS <span class="fa arrow"></span></a>
                            
							<ul class="nav nav-second-level">
							
							<li>
                                    <a href=""> <img src = "img/sekolah.png" height="20px" width="20px" />  Sekolah <span class="fa arrow"></span> </a>
									
							<ul class="nav nav-third-level">
							
								<li>
                                    <a href=""> <img src = "img/data-siswa.png" height="20px" width="20px" /> Data Siswa </span> </a>
                                </li>
								
                                <li>
                                    <a href=""> <img src = "img/nilai.png" height="20px" width="20px" /> Nilai </span> </a>
                                </li>
								
                                <li>
                                    <a href=""> <img src = "img/spp.png" height="20px" width="20px" />  SPP </a>
                                </li>
								
								<li>
                                    <a href=""> <img src = "img/absensi.jpg" height="20px" width="20px" /> Absensi </a>
                                </li>
								
								<li>
                                    <a href=""> <img src = "img/point.jpg" height="20px" width="20px" />   Point </a>
                                </li>
                               </ul>
                              <!-- /.nav-Third-level -->
						     </li>						   
                          </ul>   <!-- /.nav-Second-level -->
                        </li>  
						
						<!-- Module untuk Manajemen User -->
						<li>
                            <a href="#"> <img src = "img/user.png" height="30px" width="30px" />   Manajemen User  <span class="fa arrow"></span> </a>
							<ul class="nav nav-second-level">
                               <!-- <li>
                                    <a href="index.php?module=adduser"> <img src = "img/useradd.png" height="20px" width="20px" />  Tambah User </a>
                                </li> -->
							</ul>
							<!-- /.nav-Second-level -->
                        </li>  
						
						<!-- Module untuk Setting Modem -->
						<li>
                            <a href="#"> <img src = "img/setting.png" height="30px" width="30px" />  Setting Modem  <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
							
                                <!-- <li>
								    <?php 
									//$data_modem = mysql_fetch_array(mysql_query("select DISTINCT ID from phones"));
									?>
                                    <a href="index.php?module=settingmodem"> <img src = "img/modem.png" height="20px" width="20px" /> MODEM : <?php // echo $data_modem['ID']; ?> </a>
                                 </li> -->
								
								 <li>
                                    <a href="index.php?module=cekpulsa"> <img src = "img/modem.png" height="20px" width="20px" />  CEK PULSA  </a>
                                 </li>
								
								 <li>
                                    <a href="index.php?module=ftm"> <img src = "img/fg.png" height="20px" width="20px" />  FTM : FINGER-GURU </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>  
                     </ul>
                    <!-- /#side-menu -->
                 </div>
                <!-- /.sidebar-collapse -->
             </div>
            <!-- /.navbar-static-side -->
         </nav>

        <div id="page-wrapper">
		<?php  include "content.php";   ?>

        </div>
        <!-- /#page-wrapper -->
		<p align="center" class="navbar navbar-default navbar-fixed-bottom"> <b> &copy; 2016 PT.TRIMITRA SISTEM INFORMASI </b> </p>
    </div>
    <!-- /#wrapper -->
	
    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>

<?php } else header('location:login.php'); ?>