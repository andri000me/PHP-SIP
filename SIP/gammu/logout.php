<?php
session_start();
unset($_SESSION['adminsh']);
unset($_SESSION['namalengkap']);
unset($_SESSION['leveluser']);

header('location:login.php');
?>