<?php
session_start();
unset($_SESSION['adminsh']);
header('location:login.php');
?>