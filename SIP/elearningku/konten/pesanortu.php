<div class="panel panel-primary">
<div class="panel-heading">Kirim Pesan Guru</div>
<div class="panel-body">
<?php 
$sInbox=mysql_query("SELECT * FROM sh_pesan WHERE status_pesan='0' AND penerima='$_SESSION[orangtua]'");
$rInbox=mysql_num_rows($sInbox);
?>
<div class="table-responsive">
<table class="table">
        <tr>
            <th>No</th>
            <th>Nama Guru</th>
            <th>Telp</th>
            <th></th>
        </tr>
<?php

$sGuru=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='guru'")or die("ERROR".mysql_error());
$no=1;
while($dGuru=mysql_fetch_array($sGuru)){?>
    <tr>
        <td><?php echo $no++?></td>
        <td><?php echo $dGuru['nama_gurustaff']?></td>
        <td><?php echo $dGuru['telepon']?></td>
        <td><a class="btn btn-info" href="?p=kirimpesan&id=<?php echo $dGuru['id_gurustaff']?>">Kirim Pesan</a></td>
    </tr>
<?php }?>
</table>
</div>
</div>
</div>