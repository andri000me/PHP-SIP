<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<?php
$hal=$_GET[hal];
$no=$_GET[no];
if ($_SESSION[siswa]){
	$id=$_SESSION[siswa];
	$nama=$_SESSION[namasiswa];}
elseif ($_SESSION[guru]){$id=$_SESSION[guru];$nama=$_SESSION[namaguru];}
elseif ($_SESSION[orangtua]){$id=$_SESSION[orangtua];$nama=$_SESSION[namaortu];}

if($_GET[to]=="like"){
$like=mysql_query("INSERT INTO sh_like SET id_mading='$no',id='$id',time=NOW(),nama='$nama'");
echo "<meta http-equiv='refresh' content='0; url=?p=".$hal."&id=".$no."'>";
}

if($_GET[to]=="unlike"){
$like=mysql_query("DELETE FROM sh_like WHERE id_mading='$no' AND id='$id'");
echo "<meta http-equiv='refresh' content='0; url=?p=".$hal."&id=".$no."'>";
}
?>