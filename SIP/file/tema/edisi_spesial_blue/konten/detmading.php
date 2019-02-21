<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<?php
$pencarian =mysql_query("SELECT * FROM sh_mading, sh_mading_kategori, sh_siswa WHERE sh_mading.id_kategori=sh_mading_kategori.id_mading_kategori AND sh_mading.nama_siswa=sh_siswa.nama_siswa AND status_terbit='1' AND id_mading='$_GET[id]'");
$r=mysql_fetch_array($pencarian);
?>
<div class="panel panel-primary"><!--Panel Info-->
  <div class="panel-heading"><h4  style="font-family:Bree Serif;" class="panel-title"><?php echo "$r[judul_mading]";?></h4></div>
    <div class="panel-body">

<?php echo "
<small>Diposting pada: <a href='?p=tglmading&tgl=$r[tanggal_posting]'>".tgl_indo($r['tanggal_posting'])."</a>, oleh : <a href='?p=usermading&user=$r[nama_siswa]'>$r[nama_siswa]</a>, Kategori: <a href='?p=katmading&id=$r[id_mading_kategori]'>$r[nama_mading_kategori]</a></small><br>";
if ($r['gambar_mading'] != 'no_image.jpg'){
			echo "<p><img src='images/$r[gambar_mading]' width='230px'  style='float:left; margin: 10px 20px 10px 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'><br/>$r[isi_mading]</p>";}
else {echo "<p>$r[isi_mading]</p><br>";}
$ceklike=mysql_query("SELECT * FROM sh_like WHERE id_mading='$r[id_mading]' AND id='$_SESSION[siswa]' OR id_mading='$r[id_mading]' AND id='$_SESSION[orangtua]' OR id_mading='$r[id_mading]' AND id='$_SESSION[guru]'");
	$jml_cek=mysql_num_rows($ceklike);?>
	</div>
	<div class="panel-body">
<?php
if ($_SESSION[siswa]){
		if($jml_cek==0){
		echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=like&no=$r[id_mading]&hal=detmading&id=$r[id_mading]' class='btn btn-default btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Like
				</a></p>";}
		else{
			echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=unlike&no=$r[id_mading]&hal=detmading&id=$r[id_mading]' class='btn btn-info btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-down'></span> Unlike
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
				  <span class='glyphicon glyphicon-thumbs-down'></span> Unlike
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
				  <span class='glyphicon glyphicon-thumbs-down'></span> Unlike
				</a></p>";}}?>
				</div>
<div class="panel-body">
<h4>Baca isi mading Lainnya</h4>
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

<?php
$hitung_komentar_ini=mysql_query("SELECT * FROM sh_komentar_mading WHERE status_terima='1' AND id_mading='$r[id_mading]'");
$jml_komentar_ini=mysql_num_rows($hitung_komentar_ini);
if($jml_komentar_ini<=0) { echo "<h4>Belum ada komentar untuk mading ini</h4>";}else{?>
<br>
<h4>Ada <?php echo $jml_komentar_ini?> komentar untuk mading ini</h4>
<?php }?>
<ul style="list-style: none; padding-left: 0px;">
    <?php $komentar=mysql_query("SELECT * FROM sh_komentar_mading WHERE status_terima='1' AND id_mading='$r[id_mading]' ORDER BY id_komentar_mading ASC");
            while($k=mysql_fetch_array($komentar)){
				if($k[status]=="visitor"){
					$foto="images/foto/visitor.jpg";
				}
				elseif($k[status]=="ortu"){
					$fhoto=mysql_query("SELECT * FROM sh_ortu WHERE nama_ortu='$k[nama_komentar]'");
					$p=mysql_fetch_array($fhoto);
					$foto="images/foto/ortu/$p[foto_ortu]";
				}
				elseif($k[status]=="guru"){
					$fhoto=mysql_query("SELECT * FROM sh_guru_taff WHERE nama_gurustaff='$k[nama_komentar]'");
					$p=mysql_fetch_array($fhoto);
					$foto="images/foto/guru/$p[foto]";
				}
				elseif($k[status]=="siswa"){
					$fhoto=mysql_query("SELECT * FROM sh_siswa WHERE nama_siswa='$k[nama_komentar]'");
					$p=mysql_fetch_array($fhoto);
					$path = $p[foto]; $foto = substr($path,28);
				}
			?>
			<div class="panel panel-default">
			<div class="panel-body">
    <li>
	<img src="<?php echo $foto;?>" style="width:50px;height:50px;float:left;margin-right:5px;" />
    <p><b><?php echo "<a href=''>$k[nama_komentar]</a>";?></b><br><small><?php echo tgl_indo($k[tanggal_komentar]);?></small></p>
    <p><?php echo "$k[isi_komentar]"?></p>
	<ul style="list-style: none; padding-left: 50px;">
	<?php 
	$reply=mysql_query("SELECT * FROM sh_reply WHERE id_komentar_mading='$k[id_komentar_mading]' ORDER BY id_komentar_mading ASC");
            while($d=mysql_fetch_array($reply)){
					$fhot=mysql_query("SELECT * FROM sh_siswa WHERE nama_siswa='$d[nama]'");
					$pd=mysql_fetch_array($fhot);
					$pat = $pd[foto]; $fot = substr($pat,28);
				
			echo "
			
			<li><div class='panel panel-default'><div class='panel-body'><img src='$fot' style='width:50px;height:50px;float:left;margin-right:5px;' /><p><b><a href=''>$d[nama]</a></b><br><small>".tgl_indo($d[tanggal_komentar])."</small></p>
			<q>$d[isi_reply]</q>
			<br><small><p  class='text-right'><a href=''>Hapus</a></p></small></div></div></li>";}
	if(!empty($_SESSION[siswa])){
	if($_SESSION[namasiswa]==$r[nama_siswa]){?>
	<div id="spoiler">
					<div class="text-right"><input  onclick="if (this.parentNode.parentNode.getElementsByTagName('div')['show'].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')['show'].style.display = ''; this.parentNode.parentNode.getElementsByTagName('div')['hide'].style.display = 'none'; this.innerText = ''; this.value = 'Balas'; } else { this.parentNode.parentNode.getElementsByTagName('div')['show'].style.display = 'none'; this.parentNode.parentNode.getElementsByTagName('div')['hide'].style.display = ''; this.innerText = ''; this.value = 'Balas'; }" name="button" class="btn btn-default" type="button" value="Balas" /></div>
					<div id="show" style="display: none;">
					<form class="form-horizontal" method="POST" action="kontenweb/insert_reply_komentar.php" id="formkomenta" name="formkomenta">
					<table class="table table-responsive" style="padding-left:25px;">
					<tr ><td><?php echo"<input type='hidden' name='nama' value='$_SESSION[namasiswa]'><input type='hidden' name='id' value='$k[id_komentar_mading]'><input type='hidden' name='idm' value='$r[id_mading]'>";?>
					<img src="<?php echo $ambilpath; ?>" style="width:30px;height:30px;float:left;margin-right:5px;" /><textarea name="komentar" required placeholder="Tulis balasan.." style="width: 50%; height: 31px;"></textarea></td><td align="left"><input class="btn btn-default" type="submit" value="Kirim"></td></tr>
									
					</table></form>
	</div><div id="hide"></div></div><?php }else{}} ?>
    </li></div></div>
    <?php } ?>
       
</ul></ul>
<?php ?>
<h4>Tinggalkan Komentar</h4>
<br>
<?php if ($_SESSION[siswa]){?><div class="panel panel-default">
<form class="form-horizontal" method="POST" action="kontenweb/insert_komentar_mading.php" id="formkomentar" name="formkomentar">
<?php 
echo "<input type='hidden' name='id' value='$r[id_mading]'><input type='hidden' name='nama' value='$_SESSION[namasiswa]'><input type='hidden' name='email' value=''>";?>
<table class="table table-responsive">
	<tr><td class="info">Komentar:</td></tr>
	<tr><td>
	<img src="<?php echo $ambilpath; ?>" style="width:50px;height:50px;float:left;margin-right:5px;" /><textarea name="komentar" required placeholder="Tulis komentar.." style="width: 80%; height: 51px;"></textarea>
	</td></tr>
	<tr><td><input type="submit" class="tombol btn btn-default" value="Kirim"></td></tr>
</table>
</form>
</div><?php }
elseif ($_SESSION[guru]){?><div class="panel panel-default">
<form class="form-horizontal" method="POST" action="kontenweb/insert_komentar_mading.php" id="formkomentar" name="formkomentar">
<?php 
echo "<input type='hidden' name='id' value='$r[id_mading]'><input type='hidden' name='nama' value='$_SESSION[namaguru]'><input type='hidden' name='email' value=''>";?>
<table class="table table-responsive">
	<tr><td class="info">Komentar:</td></tr>
	<tr><td>
	<img src="images/foto/guru/<?php echo $ps[foto];?>" style="width:50px;height:50px;float:left;margin-right:5px;" /><textarea required name="komentar" placeholder="Tulis komentar.." style="width: 80%; height: 52px;"></textarea>
	</td></tr>
	<tr><td><input type="submit" class="tombol btn btn-default" value="Kirim"></td></tr>
</table>
</form>
</div><?php }
elseif ($_SESSION[orangtua]){?><div class="panel panel-default">
<form class="form-horizontal" method="POST" action="kontenweb/insert_komentar_mading.php" id="formkomentar" name="formkomentar">
<?php 
echo "<input type='hidden' name='id' value='$r[id_mading]'><input type='hidden' name='nama' value='$_SESSION[namaortu]'><input type='hidden' name='email' value=''>";?>
<table class="table table-responsive">
	<tr><td class="info">Komentar:</td></tr>
	<tr><td>
	<img src="images/foto/ortu/<?php echo $ps[foto_ortu];?>" style="width:50px;height:50px;float:left;margin-right:5px;" /><textarea required name="komentar" placeholder="Tulis komentar.." style="width: 80%; height: 52px;"></textarea>
	</td></tr>
	<tr><td><input type="submit" class="tombol btn btn-default" value="Kirim"></td></tr>
</table>
</form>
</div><?php }
else{?>
<div class="panel panel-default">
<form class="form-horizontal" method="POST" action="kontenweb/insert_komentar_mading.php" id="formkomentar" name="formkomentar">
<?php echo "<input type='hidden' name='id' value='$r[id_mading]'>";?>
<table class="table table-responsive">
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
<?php }} ?>
</div>
</div>

