<?php
    $dir = '../instalasi/';
    foreach(glob($dir.'*.*') as $v){
    unlink($v);
    }

	rmdir('../instalasi');
	header('location:../adminpanel/index.php');
?>