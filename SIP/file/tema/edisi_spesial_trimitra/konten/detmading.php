<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<?php
$pencarian =mysql_query("SELECT * FROM sh_mading, sh_mading_kategori, sh_siswa WHERE sh_mading.id_kategori=sh_mading_kategori.id_mading_kategori AND sh_mading.nama_siswa=sh_siswa.nama_siswa AND status_terbit='1' AND id_mading='$_GET[id]'");
$r=mysql_fetch_array($pencarian);
?>
<div class="panel panel-primary"><!--Panel Info-->
  <div class="panel-heading"><h3  style="font-family:Bree Serif;" class="panel-title"><?php echo "$r[judul_mading]";?></h3></div>
    <div class="panel-body">

<?php echo "
<small>Diposting pada: <a href='?p=tglmading&tgl=$r[tanggal_posting]'>".tgl_indo($r[tanggal_posting])."</a>, oleh : <a href='?p=usermading&user=$r[nama_siswa]'>$r[nama_siswa]</a>, Kategori: <a href='?p=katmading&id=$r[id_mading_kategori]'>$r[nama_mading_kategori]</a></small><br>
<p>$r[isi_mading]</p><br>";
$ceklike=mysql_query("SELECT * FROM sh_like WHERE id_mading='$r[id_mading]' AND id='$_SESSION[siswa]' OR id_mading='$r[id_mading]' AND id='$_SESSION[orangtua]' OR id_mading='$r[id_mading]' AND id='$_SESSION[guru]'");
	$jml_cek=mysql_num_rows($ceklike);

if ($_SESSION[siswa]){
		if($jml_cek==0){
		echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=like&no=$r[id_mading]&hal=detmading&id=$r[id_mading]' class='btn btn-default btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Like
				</a></p>";}
		else{
			echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=unlike&no=$r[id_mading]&hal=detmading&id=$r[id_mading]' class='btn btn-info btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Unlike
				</a></p>";}}
elseif ($_SESSION[guru]){
	if($jml_cek==0){
		echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=like&no=$r[id_mading]&hal=detmading&id=$r[id_mading]' class='btn btn-default btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Like
				</a></p>";}
		else{
			echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=unlike&no=$r[id_mading]&hal=detmading&id=$r[id_mading]' class='btn btn-info btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Unlike
				</a></p>";}}
elseif ($_SESSION[orangtua])
	{if($jml_cek==0){
		echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=like&no=$r[id_mading]&hal=detmading&id=$r[id_mading]' class='btn btn-default btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Like
				</a></p>";}
		else{
			echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=unlike&no=$r[id_mading]&hal=detmading&id=$r[id_mading]' class='btn btn-info btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Unlike
				</a></p>";}}?>

<h3>Baca isi mading Lainnya</h3>
<ul style ="list-style: none; padding-left: 20px;">
<?php
$madingterkait=mysql_query("SELECT * FROM sh_mading WHERE id_mading!='$r[id_mading]' AND status_terbit='1' ORDER BY RAND() LIMIT 5");
while($bt=mysql_fetch_array($madingterkait)){
?>
    <li style="padding: 5px 0 5px 0;"><a href="<?php echo "?p=detmading&id=$bt[id_mading]";?>"><?php echo "$bt[judul_mading]";?></a></li>
<?php } ?>
</ul><br><br>
<?php
if ($r[status_komentar] == 1){
?>
<h3>Tinggalkan Komentar</h3>
<br>
<div class="panel panel-default">
<form class="form-horizontal" method="POST" action="kontenweb/insert_komentar_mading.php" id="formkomentar" name="formkomentar">
<?php echo "<input type='hidden' name='id' value='$r[id_mading]'>";?>
<table class="table table-responsive">
	<div class="row">
	<tr><td class="info"><p>Nama:</p></td></tr>
	<tr><td><input type="text" name="nama" class="sedang"></td></tr>
	<tr><td class="info">Email:</td></tr>
	<tr><td><input type="text" name="email" class="sedang">&nbsp;<small><i>Tidak akan diterbitkan</i></small></td></tr>
	<tr><td class="info">Komentar:</td></tr>
	<tr><td>
	<textarea name="komentar" style=""></textarea>
	</td></tr>
	<tr><td><img src="kontenweb/captcha.php?date=<?php echo date('YmdHis');?>" alt="security image" /></td></tr>
	<tr><td><input type="text" name="kode" class="pendek">&nbsp;<small><i>Masukkan kode diatas</i></td></tr>
	<tr><td><input type="submit" class="tombol" value="Kirim">&nbsp;<input type="reset" class="tombol" value="Reset"></td></tr>
</table>
</form>
<?php include "file/tema/edisi_spesial_standart/form_komentar.php";?>
</div>
<?php
$hitung_komentar_ini=mysql_query("SELECT * FROM sh_komentar_mading WHERE status_terima='1' AND id_mading='$r[id_mading]'");
$jml_komentar_ini=mysql_num_rows($hitung_komentar_ini); ?>
<br>
<h3>Ada <?php echo $jml_komentar_ini?> komentar untuk mading ini</h3>
<ul style="list-style: none; padding-left: 5px;">
    <?php $komentar=mysql_query("SELECT * FROM sh_komentar_mading WHERE status_terima='1' AND id_mading='$r[id_mading]' ORDER BY id_komentar_mading DESC");
            while($k=mysql_fetch_array($komentar)){ ?>
    <li style="padding: 5px 0 5px 0; border-bottom: 1px solid #dcdcdc">
    <p><b><?php echo "<a href=''>$k[nama_komentar]</a>";?></b><br><small><?php echo "$k[tanggal_komentar]";?></small></p>
    <p><?php echo "$k[isi_komentar]"?></p>
    <?php } ?>
    </li>
       
</ul>
<?php } ?>
</div>
</div>
