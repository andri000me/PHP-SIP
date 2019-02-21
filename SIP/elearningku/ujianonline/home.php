<?php
session_start();
if($_SESSION['posisi']=="guru") {
?>
<div id="content" style="height:650px;">
<div id="title_content">
<img src="images/images_admin/icon_admin_home.png" align="absmiddle" class="img_title" /> Dashboard
</div>

<div id="bg_content_welcome">
Selamat Datang Di Dashboard -Ujian Online Guru-, Jangan Lupa Logout Setelah Selesai Menggunakan Aplikasi Ini !
</div>
</div>
<?php
} else if($_SESSION['posisi']=="siswa") {
?>
<div id="content" style="height:650px;">
<div id="title_content">
<img src="images/images_admin/icon_admin_home.png" align="absmiddle" class="img_title" /> Dashboard
</div>

<div id="bg_content_welcome">
Selamat Datang Di Dashboard -Ujian Online Siswa-, Jangan Lupa Logout Setelah Selesai Menggunakan Aplikasi Ini !
</div>
</div>
<?php }  else {
include "error/error-access-denied-page.php";
} ?>