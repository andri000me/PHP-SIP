<?php

include 'koneksi.php';
include 'function.php';

// menampilkan semua sms di outbox

$queryout = "SELECT * FROM outbox ORDER BY SendingDateTime DESC";
$hasilout = mysql_query($queryout);

echo "<table border='1'>";
echo "<tr><th>Pesan SMS</th><th>Pengirim</th><th>Waktu</th><th>Modem</th></tr>";		
while ($dataout = mysql_fetch_array($hasilout))
{
	$nohpout = $dataout['DestinationNumber'];
	$modemout = $dataout['SenderID']; 
	$timeout = $dataout['SendingDateTime'];
	$textout = $dataout['TextDecoded'];
	echo "<tr><td>".$textout."</td><td>".$nohpout."</td><td>".$timeout."</td><td>".$modemout."</td></tr>";
}	
echo "</table>";

?>