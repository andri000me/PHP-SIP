<?php
$nama_kategori=mysql_query("SELECT * FROM sh_kategori WHERE id_kategori='$_GET[id]'");
$nk=mysql_fetch_array($nama_kategori);
$jml_berita_kat=mysql_query("SELECT * FROM sh_berita WHERE status_terbit='1' AND id_kategori='$_GET[id]'");
$hitung_berita_kat=mysql_num_rows($jml_berita_kat);
?>
<div class="row"><!--Panel Info-->
  <div class="col-md-12">
	<h3 class="heading">Ada <?php echo $hitung_berita_kat?> berita dalam kategori <i><?php echo $nk[nama_kategori]?></i></h3>
  </div>
</div>
<div class="row">
	<div class="col-md-12">
<?php
$berita =mysql_query("SELECT * FROM sh_berita, sh_kategori, sh_users WHERE sh_berita.id_kategori=sh_kategori.id_kategori AND sh_berita.s_username=sh_users.s_username AND status_terbit='1' AND sh_berita.id_kategori='$_GET[id]' ORDER BY id_berita DESC");
$cek_berita=mysql_num_rows($berita);

if($cek_berita > 0){
while ($r=mysql_fetch_array($berita)){
	$tgl=date("d-m-Y", strtotime($r['tanggal_posting']));
$hitung_komen=mysql_query("SELECT * FROM sh_komentar WHERE id_berita='$r[id_berita]'");
$jml_komen=mysql_num_rows($hitung_komen);
?>
<?php echo "<h4><a href='?p=detberita&id=$r[id_berita]'>$r[judul_berita]</a></h4><br>
<small>Diposting pada: <a href='?p=tglberita&tgl=$r[tanggal_posting]'>$tgl</a>, oleh : <a href='?p=userberita&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katberita&id=$r[id_kategori]'>$r[nama_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_berita = strip_tags($r[isi_berita]); 
						$isi = substr($isi_berita,0,450);
if ($r[gambar_kecil] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_kecil]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 3px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";
}}	
}
else { ?>
<b>Data berita dalam kategori <?php echo $nk[nama_kategori]?> belum tersedia</b>
<?php } ?>
	</div>
</div>