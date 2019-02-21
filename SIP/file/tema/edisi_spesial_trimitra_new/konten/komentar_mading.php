<div class="row">
	<div class="col-md-12"><h3 class="heading">Komentar anda</h3></div>
</div>
<?php
	$sqlkomen=mysql_query("SELECT * FROM sh_mading WHERE id_mading='$_GET[id]'");
	$komen=mysql_fetch_array($sqlkomen);
?>
<div class="row">
	<div class="col-md-8">
		<form class="form-horizontal" method="POST" action="kontenweb/insert_komentar_mading.php">
			<input class="form-control" name="id" type="hidden" value="<?php echo $komen['id_mading']?>"/>
			<label>Nama</label>
			<input type="text" name="nama" class="form-control"/>
			<label>Email</label>
			<input type="text" name="email" class="form-control"/>
			<label>Komentar</label>
			<textarea class="form-control" rows="5" name="komentar"></textarea><br/>
			<img src="kontenweb/captcha.php?date=<?php echo date('YmdHis');?>" alt="security image" /><br/>
			<i>Masukan Kode diatas</i>
			<input type="text" name="kode" class="form-control"/><br/>
			<input type="submit" value="Kirim" class="btn btn-info"/>	<input type="reset" value="Batal" class="btn btn-danger"/>
		</form>
	</div>
</div>