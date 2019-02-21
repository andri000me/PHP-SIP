<!------------------------------ORANG TUA------------------------------------>

<?php if($_SESSION['orangtua']){ 
 if(isset($_POST['btn_kirim'])){
	$tgl=date("d-M-Y");
	$add_pesan="INSERT INTO sh_pesan VALUES('','$tgl','$_POST[isi_pesan]','$_POST[pengirim]','$_POST[penerima]','')";
	$q_add_pesan=mysql_query($add_pesan)or die("ERROR".mysql_error());
	if($q_add_pesan){
		echo"<script>alert('Pesan Terkirim !')</script>";
	}else{
		echo"<script>alert('Pesan Gagal Terkirim !')</script>";
	}
}?>
<div class="panel panel-primary">
<div class="panel-heading">Kirim Pesan Untuk Guru</div>
<div class="panel-body">
<?php 
if(isset($_GET['id'])){
	$sql_pesan_kirim="SELECT * FROM sh_guru_staff WHERE id_gurustaff='$_GET[id]' ORDER BY id_ortu";
	$q_pesan_kirim=mysql_query($sql_pesan_kirim)or die("ERROR".mysql_error());
	$d_pesan_kirim=mysql_fetch_array($q_pesan_kirim);
	?>
	<form class="form-horizontal text-left" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
		<input type="hidden" name="pengirim" value="<?php echo $_SESSION['orangtua']?>" />
		<input type="hidden" name="penerima" value="<?php echo $d_pesan_kirim['id_gurustaff']?>" />
		<input type="text" placeholder="Kepada : <?php echo $d_pesan_kirim['nama_gurustaff']?>" class="form-control"/>
		<br/>
		<textarea name="isi_pesan" class="form-control" rows="5"></textarea>
		<br/>
		<input type="submit" name="btn_kirim" value="Kirim" class="btn btn-primary"/>
	</form>
<?php }else{?>
<div class="table-responsive text-left">
<a class="btn btn-success" href="?p=pesan_masuk&id=<?php echo $_SESSION['orangtua']?>">Kotak Masuk</a><br/><br/>
<table class="table">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Pengajar</th>
		<th>Alamat</th>
		<th>Telp</th>
		<th></th>
	</tr>
<?php
	$pesan="SELECT sh_guru_staff.*, sh_mapel_guru.* FROM sh_guru_staff JOIN sh_mapel_guru ON sh_guru_staff.id_gurustaff=sh_mapel_guru.id_gurustaff ORDER BY sh_guru_staff.id_gurustaff";
	$query_pesan=mysql_query($pesan)or die("ERROR".mysql_error());
	$no=1;
	while($data_pesan=mysql_fetch_array($query_pesan)){?>
	<tr>
		<td><?php echo $no++?></td>
		<td><?php echo $data_pesan['nama_gurustaff']?></td>
		<td><?php echo $data_pesan['nama_mapel']?></td>
		<td><?php echo $data_pesan['alamat']?></td>
		<td><?php echo $data_pesan['telepon']?></td>
		<td><a class="btn btn-primary" href="?p=pesan_ortu&id=<?php echo $data_pesan['id_gurustaff']?>">Kirim Pesan</a></td>
		<?php echo $_SESSION['orangtua']?>
	</tr>
<?php }?>
</table>
</div>
</div>
</div>
<?php }}else{
	echo"data kosong";
}?>