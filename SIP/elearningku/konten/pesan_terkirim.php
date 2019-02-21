<div class="panel panel-primary">
<div class="panel-heading">Pesan Terkirim</div>
<div class="panel-body table-responsive">
<meta http-equiv="refresh" content="60"/>

<?php if($_SESSION['orangtua']){
echo"<table class='table' width='100%'>
		<tr>
			<td width='10%'><a href='?p=pesanortu'><img class='img-responsive' src='images/pesan.png'/>Kirim Pesan</a>&nbsp&nbsp</td>
			<td width='10%'><a href='?p=inbox'><img class='img-responsive' src='images/inbox.png'/>Pesan Masuk</a></td>
			<td width='10%'><a href='?p=pesanterkirim'><img class='img-responsive' src='images/sent.png'/>Pesan Terkirim</a></td>
		</tr>
	</table>";
echo"<table class='table'>
		<tr>
			<th>No</th>
			<th>Pengirim</th>
			<th>Waktu</th>
			<th>Status Pesan</th>
			<th></th>
		</tr>";

$sInbox=mysql_query("SELECT sh_pesan.*, sh_ortu.*, sh_guru_staff.*
                    FROM sh_pesan JOIN sh_ortu ON sh_pesan.pengirim = sh_ortu.id_ortu
                    JOIN sh_guru_staff ON sh_pesan.penerima = sh_guru_staff.nip
                    WHERE pengirim='$_SESSION[orangtua]' AND status_pengirim='0' ORDER BY id_pesan DESC LIMIT 10")or die("ERROR".mysql_error());
$rInbox=mysql_num_rows($sInbox);
$no=1;
    while($inbox=mysql_fetch_array($sInbox)){?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $inbox['nama_gurustaff']?></td>
            <td><?php echo $inbox['tanggal_pesan']?></td>
            <td><?php if($inbox['status_pesan']=="0"){
                echo"<p class='text-danger'>Terkirim</p>";
            }elseif($inbox['status_pesan']=="1"){
                echo"<p class='text-success'>Terbaca</p>";
            }?></td>
            <td><a href="?p=terkirim_detail&id=<?php echo $inbox['id_pesan']?>">Lihat Pesan</a> -
            <a href="?p=pesanhapus&id_terkirim=<?php echo $inbox['id_pesan']?>" onClick="return confirm('Anda yakin ingin menghapus?')">Hapus</a></td>
        </tr>
<?php }
echo "</table>";
}?>
<!------------------------------------------------------>
<?php if($_SESSION['guru']){
echo "<table class='table' width='100%'>
		  <tr>
			<td width='10%'><a href='?p=pesanguru'><img class='img-responsive' src='images/pesan.png'/>Kirim Pesan</a>&nbsp&nbsp</td>
			<td width='10%'><a href='?p=inbox'><img class='img-responsive' src='images/inbox.png'/>Pesan Masuk</a></td>
			<td width='10%'><a href='?p=pesanterkirim'><img class='img-responsive' src='images/sent.png'/>Pesan Terkirim</a></td>
		  </tr>
	  </table>
	  ";
echo"<table class='table'>
		<tr>
			<th>No</th>
			<th>Penerima</th>
			<th>Waktu</th>
			<th>Status Pesan</th>
			<th></th>
		</tr>";
$sInbox=mysql_query("SELECT sh_pesan.*,sh_guru_staff.*,sh_ortu.* FROM sh_pesan
                    JOIN sh_guru_staff ON sh_pesan.pengirim=sh_guru_staff.nip 
                    JOIN sh_ortu ON sh_pesan.penerima=sh_ortu.id_ortu
                    WHERE sh_pesan.pengirim= '$_SESSION[guru]' AND status_pengirim='0' ORDER BY id_pesan DESC LIMIT 10")or die("ERROR".mysql_error());
$rInbox=mysql_num_rows($sInbox);
$no=1;
    while($inbox=mysql_fetch_array($sInbox)){?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $inbox['nama_ortu']?></td>
            <td><?php echo $inbox['tanggal_pesan']?></td>
            <td><?php if($inbox['status_pesan']=="1"){
                echo"<p class='text-success'>Terbaca</p>";
            }elseif($inbox['status_pesan']=="0"){
                echo"<p class='text-danger'>Terkirim</p>";
            }?></td>
            <td><a href="?p=terkirim_detail&id=<?php echo $inbox['id_pesan']?>">Lihat Pesan</a> &nbsp;
            <a href="?p=pesanhapus&id_terkirim=<?php echo $inbox['id_pesan']?>" onClick="return confirm('Anda yakin ingin menghapus?')"><img src="data:image/jpeg;base64,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" width="20"></a></td>
        <tr>
<?php }
echo"</table>";
}?>
</div>
</div>