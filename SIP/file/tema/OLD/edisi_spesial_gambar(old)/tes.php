<!-- awal mading -->
<?php case "mading":?>
<?php if ($_GET[p]=="mading" and $_GET[kategori]=="karyatulis"){?>

ini halaman karya tulis

<?php } else { ?>
<div id="konten">
<div id="lebar">
<h3>Beritasssss ada di konten spesial gambar</h3><br>

<?php	$batas= 5;
		$halaman=$_GET['halaman'];
		If (empty($halaman)){
		$posisi=0;
		$halaman=1;
		}

		else { $posisi=($halaman-1) * $batas;
		}
		$tampil2 = mysql_query ("SELECT * FROM sh_mading WHERE status_terbit='1'");
		$jmldata = mysql_num_rows($tampil2);
		$jmlhal = ceil($jmldata/$batas);
$mading =mysql_query("SELECT * FROM sh_mading, sh_mading_kategori, sh_users WHERE sh_mading.id_kategori=sh_mading_kategori.id_mading_kategori AND sh_mading.s_username=sh_users.s_username AND status_terbit='1' ORDER BY sh_mading.id_mading DESC LIMIT $posisi, $batas");
$cek_mading=mysql_num_rows($mading);

if($cek_mading > 0){
while ($r=mysql_fetch_array($mading)){
$hitung_komen=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$r[id_mading]'");
$jml_komen=mysql_num_rows($hitung_komen);
?>
<?php echo "<h4><a href='?p=detmading&id=$r[id_mading]'>$r[judul_mading]</a></h4><br>
<small>Diposting pada: <a href='?p=tglmading&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=usermading&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katmading&id=$r[id_mading_kategori]'>$r[nama_mading_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_mading = strip_tags($r[isi_mading]); 
						$isi = substr($isi_mading,0,450);
if ($r[gambar_mading] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_mading]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br>";
}}
		if ($halaman > 1){
		$prev=$halaman-1;
		echo 	"	<div class='hal' style='float: left'><a href='?p=mading&halaman=$prev' title='Halaman Sebelumnya'>&laquo; Sebelumnya</a></div>";
		}
		if ($halaman < $jmlhal) {
		$next=$halaman+1;
		echo "	<div class='hal' style='float: right'><a href='?p=mading&halaman=$next' title='halaman Berikutnya'>Berikutnya &raquo;</a></div>"; }
}
else { ?>
<b>Data mading belum tersedia</b>
<?php } ?>
</div>
</div>
<?php break; ?>


<!--Menampilkan hasil pencarian berita-->
<?php case "pencarian":
$cari = trim($_POST['cari']);
$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
?>
<div id="konten">
<div id="lebar">
<h3>Hasil Pencarian dengan kata kunci <a href="">"<?php echo "$cari"?>"</a></h3><br><br>
<?php
$pencarian =mysql_query("SELECT * FROM sh_mading, sh_mading_kategori, sh_users WHERE sh_mading.id_mading=sh_mading_kategori.id_mading_kategori AND sh_mading.s_username=sh_users.s_username AND status_terbit='1' AND judul_mading LIKE '%$cari%' ORDER BY id_mading DESC");
$hitung=mysql_num_rows($pencarian);

if ($hitung > 0){
while ($r=mysql_fetch_array($pencarian)){
$hitung_komen=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$r[id_mading]'");
$jml_komen=mysql_num_rows($hitung_komen);
?>
<?php echo "<h4><a href='?p=detmading&id=$r[id_mading]'>$r[judul_mading]</a></h4><br>
<small>Diposting pada: <a href='?p=tglmading&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=usermading&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katmading&id=$r[id_mading_kategori]'>$r[nama_mading_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_mading = strip_tags($r[isi_mading]); 
						$isi = substr($isi_mading,0,450);
if ($r[gambar_mading] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_mading]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br>";
}}}

else {
echo "<p>mading tidak ditemukan</p>";
}?>
</div>
</div>
<?php break ?>


<!--Menampilkan berita berdasarkan kategori-->
<?php case "katmading":?>

<div id="konten">
<div id="lebar">
<?php
$nama_mading_kategori=mysql_query("SELECT * FROM sh_mading_kategori WHERE id_mading_kategori='$_GET[id]'");
$nk=mysql_fetch_array($nama_mading_kategori);
$jml_mading_kat=mysql_query("SELECT * FROM sh_mading WHERE status_terbit='1' AND id_kategori='$_GET[id]'");
$hitung_mading_kat=mysql_num_rows($jml_mading_kat);
?>
<h3>Ada <?php echo $hitung_mading_kat?> mading dalam kategori <u><?php echo $nk[nama_mading_kategori]?></u></h3><br>

<?php
$mading=mysql_query("SELECT * FROM sh_mading, sh_mading_kategori, sh_users WHERE sh_mading.id_kategori=sh_mading_kategori.id_mading_kategori AND sh_mading.s_username=sh_users.s_username AND status_terbit='1' AND sh_mading.id_kategori='$_GET[id]' ORDER BY id_mading DESC");
$cek_mading=mysql_num_rows($mading);

if($cek_mading > 0){
while ($r=mysql_fetch_array($madi)){
$hitung_komen=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$r[id_mading]'");
$jml_komen=mysql_num_rows($hitung_komen);
?>
<?php echo "<h4><a href='?p=detmading&id=$r[id_mading]'>$r[judul_mading]</a></h4><br>
<small>Diposting pada: <a href='?p=tglmading&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=usermading&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katmading&id=$r[id_mading_kategori]'>$r[nama_mading_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_mading = strip_tags($r[isi_mading]); 
						$isi = substr($isi_mading,0,450);
if ($r[gambar_mading] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_mading]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br>";
}}	
}
else { ?>
<b>Data mading dalam kategori <?php echo $nk[nama_mading_kategori]?> belum tersedia</b>
<?php } ?>
</div>
</div>
<?php break; ?>


<!--Menampilkan berita berdasarkan penulis-->
<?php case "usermading":?>

<div id="konten">
<div id="lebar">
<?php
$nama_user=mysql_query("SELECT * FROM sh_users WHERE s_username='$_GET[user]'");
$nu=mysql_fetch_array($nama_user);
$hitung_user_mading=mysql_query("SELECT * FROM sh_mading WHERE status_terbit='1' AND s_username='$_GET[user]'");
$jml_mading_user=mysql_num_rows($hitung_user_mading);
?>
<h3>Ada <?php echo $jml_mading_user?> mading yang ditulis oleh <u><?php echo $nu[nama_lengkap_users]?></u></h3><br>

<?php
$mading =mysql_query("SELECT * FROM sh_mading, sh_mading_kategori, sh_users WHERE sh_mading.id_kategori=sh_mading_kategori.id_mading_kategori AND sh_mading.s_username=sh_users.s_username AND status_terbit='1' AND sh_mading.s_username='$_GET[user]' ORDER BY id_mading DESC");
$cek_mading=mysql_num_rows($mading);

if($cek_madinh > 0){
while ($r=mysql_fetch_array($mading)){
$hitung_komen=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$r[id_mading]'");
$jml_komen=mysql_num_rows($hitung_komen);
?>
<?php echo "<h4><a href='?p=detmading&id=$r[id_mading]'>$r[judul_mading]</a></h4><br>
<small>Diposting pada: <a href='?p=tglmading&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=usermading&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katmading&id=$r[id_mading_kategori]'>$r[nama_mading_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_mading = strip_tags($r[isi_mading]); 
						$isi = substr($isi_mading,0,450);
if ($r[gambar_mading] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_mading]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detmading&id=$r[id_mading_kategori]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br>";
}}	
}
else { ?>
<b>Data mading yang ditulis oleh <?php echo $nu[nama_lengkap_users]?> belum tersedia</b>
<?php } ?>
</div>
</div>
<?php break; ?>


<!--Menampilkan berita berdasarkan penulis-->
<?php case "tglmading":?>

<div id="konten">
<div id="lebar">
<?php
$hitung_tgl_mading=mysql_query("SELECT * FROM sh_mading WHERE status_terbit='1' AND tanggal_posting='$_GET[tgl]'");
$jml_mading_tgl=mysql_num_rows($hitung_tgl_mading);
$tgl=mysql_fetch_array($hitung_tgl_madinh);
?>
<h3>Ada <?php echo $jml_mading_tgl?> mading yang ditulis pada <u><?php echo $tgl[tanggal_posting]?></u></h3><br>

<?php
$mading =mysql_query("SELECT * FROM sh_mading, sh_mading_kategori, sh_users WHERE sh_mading.id_kategori=sh_mading_kategori.id_mading_kategori AND sh_mading.s_username=sh_users.s_username AND status_terbit='1' AND sh_mading.tanggal_posting='$_GET[tgl]' ORDER BY id_mading DESC");
$mading=mysql_num_rows($mading);

if($cek_mading> 0){
while ($r=mysql_fetch_array($mading)){
$hitung_komen=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$r[id_mading]'");
$jml_komen=mysql_num_rows($hitung_komen);
?>
<?php echo "<h4><a href='?p=detmading&id=$r[id_mading]'>$r[judul_mading]</a></h4><br>
<small>Diposting pada: <a href='?p=tglmading&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=usermading&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katbmading&id=$r[id_mading_kategori]'>$r[nama_mading_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_mading = strip_tags($r[isi_mading]); 
						$isi = substr($isi_mading,0,450);
if ($r[gambar_mading] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_mading]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br>";
}}	
}
else { ?>
<b>Data mading yang ditulis oleh <?php echo $nu[nama_lengkap_users]?> belum tersedia</b>
<?php } ?>
</div>
</div>
<?php break; ?>


<!--Menampilkan detail berita-->
<?php case "detmading": ?>
<?php
$pencarian =mysql_query("SELECT * FROM sh_mading, sh_mading_kategori, sh_users WHERE sh_mading.id_kategori=sh_mading_kategori.id_mading_kategori AND sh_mading.s_username=sh_users.s_username AND status_terbit='1' AND id_mading='$_GET[id]' ORDER BY id_mading DESC");
$r=mysql_fetch_array($pencarian);
?>
<div id="konten">
<div id="lebar">
<h3><?php echo "$r[judul_mading]";?></h3>
<?php echo "
<small>Diposting pada: <a href='?p=tglmading&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=usermading&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katmading&id=$r[id_mading_kategori]'>$r[nama_mading_kategori]</a></small><br>
<p>$r[isi_mading]</p><br>";?>

<h3>mading Lainnya</h3>
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
<form method="POST" action="kontenweb/insert_komentar.php" id="formkomentar" name="formkomentar">
<?php echo "<input type='hidden' name='id' value='$r[id_mading]'>";?>
<table>
	<tr><td width="75px"><b>Nama *</b></td><td><input type="text" name="nama" class="sedang"></td></tr>
	<tr><td><b>Email *</b></td><td><input type="text" name="email" class="sedang">&nbsp;<small><i>Tidak akan diterbitkan</i></small></td></tr>
	<tr><td><b>Komentar *</b></td><td>
	<textarea name="komentar" style="width: 200px; height: 75px;"></textarea>
	</td></tr>
	<tr><td></td><td><img src="kontenweb/captcha.php?date=<?php echo date('YmdHis');?>" alt="security image" /></td></tr>
	<tr><td></td><td><input type="text" name="kode" class="pendek">&nbsp;<small><i>Masukkan kode diatas</i></td></tr>
	<tr><td></td><td><input type="submit" class="tombol" value="Kirim">&nbsp;<input type="reset" class="tombol" value="Reset"></td></tr>
</table>
</form>
<?php include "form_komentar.php";?>

<?php
$hitung_komentar_ini=mysql_query("SELECT * FROM sh_komentar_mading WHERE status_terima='1' AND id_mading='$r[id_mading]'");
$jml_komentar_ini=mysql_num_rows($hitung_komentar_ini); ?>
<br>
<h3>Ada <?php echo $jml_komentar_ini?> komentar untuk mading ini</h3>
<ul style="list-style: none; padding-left: 5px;">
	<?php $komentar=mysql_query("SELECT * FROM sh_komentar _mading WHERE status_terima='1' AND id_mading='$r[id_mading]' ORDER BY id_komentar_mading DESC");
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
<?php break ?>
<?php } ?>
<!-- akhir mading -->