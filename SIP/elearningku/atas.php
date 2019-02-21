<!DOCTYPE HTML>
<html>
<head>
<?php include "inc.library.php"; ?>
<?php
$namasekolah=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='8'");
$ns=mysql_fetch_array($namasekolah);
?>
<title>E-learning <?php echo $ns[isi_pengaturan]?></title>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow">
    <meta http-equiv="Copyleft" content="schoolhos">
    <meta name="author" content="Ari Rusmanto">
    <meta name="language" content="Indonesia">
    <meta name="robots" content="index, follow">
    <meta name="description" content="Schoolhos Free Open Source CMS">
    <meta name="keywords" content="CMS, Free, Indonesia, Sekolahan, E-learning">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/paging.js"></script>
    <script lang="javascript" src="js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
  
	<script type="text/javascript" src="tigra_calendar/tcal.js"></script>
    <script type="text/javascript" lang="javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" lang="javascript" src="js/bootstrap.min.js"></script>
	
    <link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="tigra_calendar/tcal.css" />
  
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
  
  
  
</head>