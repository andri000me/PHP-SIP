<?php
session_start();
include "set/koneksi.php";
include "files/pagging.php";

if ($_SESSION['posisi'] =="guru") {

// Dashboard
if($_GET['page']=="home"){
include "home.php";
}

// Site Configuration
else if($_GET['page']=="config"){
	if ($_SESSION["posisi"]=='guru'){
	include "files/site-config.php";
	}
	else{
	  echo "<meta http-equiv='refresh' content='0; url=error/error-access-denied-page.php'>";
	}
}

// Cari Pegawai
else if($_GET['page']=="caripegawai"){
	if ($_SESSION["posisi"]=='guru'){
	include "caripegawai.php";
	}
	else{
	echo "<meta http-equiv='refresh' content='0; url=error/error-access-denied-page.php'>";
	}
}

// Users
else if($_GET['page']=="users"){
	if ($_SESSION["posisi"]=='guru'){
	include "user.php";
}
else {
	echo "<meta http-equiv='refresh' content='0; url=error/error-access-denied-page.php'>";
  }
}


// Soal
else if($_GET['page']=="soalanalisa"){
include "soalanalisa.php";
}

else if($_GET['page']=="listsoalanalisa"){
include "listsoalanalisa.php";
}

// Cari Pegawai
else if($_GET['page']=="listsoalkuantitatif"){
include "listsoalkuantitatif.php";
}

else if($_GET['page']=="listsoalinggris"){
include "listsoalinggris.php";
}

else{
include "home.php";
}

}

else if($_SESSION['posisi'] =="siswa") {

// Dashboard
if($_GET['page']=="home"){
include "home.php";
}

// Soal
else if($_GET['page']=="soalanalisa"){
include "soalanalisa.php";
}

else if($_GET['page']=="listsoalanalisa"){
include "listsoalanalisa.php";
}

// Cari Pegawai
else if($_GET['page']=="listsoalkuantitatif"){
include "listsoalkuantitatif.php";
}

else if($_GET['page']=="listsoalinggris"){
include "listsoalinggris.php";
}

else {
include "home.php";
}

} else {
//include './error/error-access-denied-page.php';
}
?>