<!------------------------------Guru------------------------------------>
<?php if($_SESSION['guru']){ 
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
<div class="panel-heading">Kirim Pesan Untuk Orang Tua</div>
<div class="panel-body">
<?php 
if(isset($_GET['id'])){
	$sql_pesan_kirim="SELECT * FROM sh_ortu WHERE id_ortu='$_GET[id]' ORDER BY id_ortu";
	$q_pesan_kirim=mysql_query($sql_pesan_kirim)or die("ERROR".mysql_error());
	$d_pesan_kirim=mysql_fetch_array($q_pesan_kirim);
	?>
	<form class="form-horizontal text-left" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
		<input type="hidden" name="pengirim" value="<?php echo $_SESSION['guru']?>" />
		<input type="hidden" name="penerima" value="<?php echo $d_pesan_kirim['id_ortu']?>" />
		<input type="text" placeholder="Kepada : <?php echo $d_pesan_kirim['nama_ortu']?>" class="form-control"/>
		<br/>
		<textarea name="isi_pesan" class="form-control" rows="5"></textarea>
		<br/>
		<input type="submit" name="btn_kirim" value="Kirim" class="btn btn-primary"/>
	</form>
<?php }else{?>
<div class="table-responsive text-left">
<a class="btn btn-success" href="?p=pesan_masuk&id=<?php echo $_SESSION['guru']?>">Kotak Masuk</a><br/><br/>
<table class="table">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Nama Anak</th>
		<th>Alamat</th>
		<th>Telp</th>
		<th></th>
	</tr>
<?php
	$pesan="SELECT sh_ortu.*, sh_siswa.* FROM sh_ortu JOIN sh_siswa ON sh_ortu.id_siswa=sh_siswa.id_siswa ORDER BY id_ortu";
	$query_pesan=mysql_query($pesan)or die("ERROR".mysql_error());
	$no=1;
	while($data_pesan=mysql_fetch_array($query_pesan)){?>
	<tr>
		<td><?php echo $no++?></td>
		<td><?php echo $data_pesan['nama_ortu']?></td>
		<td><?php echo $data_pesan['nama_siswa']?></td>
		<td><?php echo $data_pesan['alamat']?></td>
		<td><?php echo $data_pesan['no_hp']?></td>
		<td><a class="btn btn-primary" href="?p=pesan_guru&id=<?php echo $data_pesan['id_ortu']?>">Kirim Pesan</a></td>
	</tr>
<?php }?>
</table>
</div>
</div>
</div>
<?php }}else{
	echo"data kosong";
}?>

