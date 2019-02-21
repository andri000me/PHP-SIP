<?php
session_start();
unset($_SESSION['guru']);
unset($_SESSION['siswa']);
unset($_SESSION['orangtua']);
header('location:../index.php');
?>