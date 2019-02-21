<?php

include 'koneksi.php';
include 'function.php';

// menampilkan semua sms di inbox

$queryin = "SELECT * FROM inbox ORDER BY ReceivingDateTime DESC";
$hasilin = mysql_query($queryin);

echo "<table border='1'>";
echo "<tr><th>Pesan SMS</th><th>Pengirim</th><th>Waktu</th><th>Processed</th><th>Modem</th></tr>";		
while ($datain = mysql_fetch_array($hasilin))
{
	$nohp = $datain['SenderNumber'];
	$modem = $datain['RecipientID']; 
	$time = $datain['ReceivingDateTime'];
	$Processed = $datain['Processed'];
	$text = $datain['TextDecoded'];
	echo "<tr><td>".$text."</td><td>".$nohp."</td><td>".$time."</td><td>".$Processed."</td><td>".$modem."</td></tr>";
}	
echo "</table>";

?>