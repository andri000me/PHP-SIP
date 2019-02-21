<?php

include 'koneksi.php';
include 'function.php';

// menampilkan semua sms di Sentitems

$queryouts = "SELECT * FROM sentitems ORDER BY SendingDateTime DESC";
$hasilouts = mysql_query($queryouts);

echo "<table border='1'>";
echo "<tr><th>Pesan SMS</th><th>Penerima</th><th>Waktu</th><th>Status</th><th>Modem</th></tr>";		
while ($dataouts = mysql_fetch_array($hasilouts))
{
	$nohpouts = $dataouts['DestinationNumber'];
	$modemouts = $dataouts['SenderID']; 
	$timeouts = $dataouts['SendingDateTime'];
	$statusouts = $dataouts['Status']; 
	$textouts = $dataouts['TextDecoded'];
	echo "<tr><td>".$textouts."</td><td>".$nohpouts."</td><td>".$timeouts."</td><td>".$statusouts."</td><td>".$modemouts."</td></tr>";
}	
echo "</table>";

?>