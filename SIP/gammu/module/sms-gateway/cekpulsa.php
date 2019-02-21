<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form" id="form">
    <p class="style1">Masukkan Kode :
      <input name="kode" type="text" id="kode" />
      <input name="submit1" type="submit" id="submit1" value="&lt;&lt; Cek Pulsa &gt;&gt;" />
    </p>
</form>  
<?php
if ($_POST['submit1']) 
{
ini_set('max_execution_time', 300);
$kode = $_POST['kode']; 
exec("c:\\xampp\\htdocs\\gammu\\gammu -c c:\\xampp\\htdocs\\gammu\\gammurc getussd $kode", $hasil);

// proses filter hasil output
for ($i=0; $i<=count($hasil)-1; $i++)
{
   if (substr_count($hasil[$i], 'Service reply') > 0) $index = $i;
}
 
// menampilkan sisa pulsa

echo "Gagal <br/> $kode";
echo $hasil[$index];
}
?>