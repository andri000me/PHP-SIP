<!DOCTYPE HTML>
<html>
<head>
<?php
$namasekolah=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='8'");
$ns=mysql_fetch_array($namasekolah);
?>
<title>E-learning <?php echo $ns[isi_pengaturan]?></title>
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
<script language="JavaScript" src="js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
</head>