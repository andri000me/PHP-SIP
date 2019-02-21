<?php
$pencarian =mysql_query("SELECT * FROM sh_berita, sh_kategori, sh_users WHERE sh_berita.id_kategori=sh_kategori.id_kategori AND sh_berita.s_username=sh_users.s_username AND status_terbit='1' AND id_berita='$_GET[id]' ORDER BY id_berita DESC");
$r=mysql_fetch_array($pencarian);
$tgl=date("d-m-Y",strtotime($r['tanggal_posting']))
?>
<div class="row"><!--Panel Info-->
  <div class="col-md-12">
<?php echo"<img src=images/$r[gambar_kecil] class=img-responsive  width=960 height=345/><br/>";
echo"<h3 class=heading>$r[judul_berita]</h3>";
echo "<small>Diposting pada: <a href='?p=tglberita&tgl=$r[tanggal_posting]'>$tgl</a>, oleh : <a href='?p=userberita&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katberita&id=$r[id_kategori]'>$r[nama_kategori]</a></small><br>
<p>$r[isi_berita]</p><br>";?>

<h3>Berita Lainnya</h3>
<ul style ="list-style: none; padding-left: 20px;">
<?php
$beritaterkait=mysql_query("SELECT * FROM sh_berita WHERE id_berita!='$r[id_berita]' AND status_terbit='1' ORDER BY RAND() LIMIT 5");
while($bt=mysql_fetch_array($beritaterkait)){
?>
	<li style="padding: 5px 0 5px 0;"><a href="<?php echo "?p=detberita&id=$bt[id_berita]";?>"><?php echo "$bt[judul_berita]";?></a></li>
<?php } ?>
</ul><br><br>
<?php
if ($r[status_komentar] == 1){
?>
<h3>Tinggalkan Komentar</h3>
<br>
<form class="form-horizontal" method="POST" action="kontenweb/insert_komentar.php" id="formkomentar" name="formkomentar">
<?php echo "<input type='hidden' name='id' value='$r[id_berita]'>";?>
<table class="table">
<div class="row">
    <div class="col-md-6">
	<tr><td><b>Nama *</b></td><td><input type="text" name="nama" class="form-control"></td></tr>
	<tr><td><b>Email *</b></td><td><input type="text" name="email" class="form-control">&nbsp;<small><i>Tidak akan diterbitkan</i></small></td></tr>
	<tr><td><b>Komentar *</b></td><td>
	<textarea name="komentar" class="form-control" rows="5"></textarea>
	</td></tr>
	<tr><td></td><td><img src="kontenweb/captcha.php?date=<?php echo date('YmdHis');?>" alt="security image" /></td></tr>
	<tr><td></td><td><input type="text" name="kode" class="form-control">&nbsp;<small><i>Masukkan kode diatas</i></td></tr>
	<tr><td></td><td><input type="submit" class="btn btn-info" value="Kirim">&nbsp;<input type="reset" class="btn btn-danger" value="Reset"></td></tr>
</table>
</form>
<?php include "file/tema/edisi_spesial_trimitra/form_komentar.php";?>

<?php
$hitung_komentar_ini=mysql_query("SELECT * FROM sh_komentar WHERE status_terima='1' AND id_berita='$r[id_berita]'");
$jml_komentar_ini=mysql_num_rows($hitung_komentar_ini); ?>
<br>
<h3>Ada <?php echo $jml_komentar_ini?> komentar untuk berita ini</h3>
<ul style="list-style: none; padding-left: 5px;">
	<?php $komentar=mysql_query("SELECT * FROM sh_komentar WHERE status_terima='1' AND id_berita='$r[id_berita]' ORDER BY id_komentar DESC");
			while($k=mysql_fetch_array($komentar)){?>
	<li style="padding: 5px 0 5px 0; border-bottom: 1px solid #dcdcdc">
	<p><b><?php echo "<a href=''>$k[nama_komentar]</a>";?></b><br><small><?php echo "$k[tanggal_komentar]";?></small></p>
	<p><?php echo "$k[isi_komentar]"?></p>
	<?php } ?>
	</li>
		
</ul>
<?php } ?>
</div>
</div>
</div>
</div>
</div>