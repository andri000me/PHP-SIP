<?php
session_start();
unset($_SESSION['guru']);
unset($_SESSION['siswa']);
unset($_SESSION['posisi']);
header('location:../index.php');
?>
