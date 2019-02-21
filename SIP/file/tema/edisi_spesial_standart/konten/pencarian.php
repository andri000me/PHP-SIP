<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<?php
$cari = trim($_POST['cari']);
$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);

?>
<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 style="font-family:Bree Serif;">Hasil Pencarian dengan kata kunci "<?php echo "$cari"?>"</a></h3>
      </div>
    <div class="panel-body">
    <?php
$pencarian =mysql_query("SELECT * FROM sh_berita, sh_kategori, sh_users WHERE sh_berita.id_kategori=sh_kategori.id_kategori AND sh_berita.s_username=sh_users.s_username AND status_terbit='1' AND judul_berita LIKE '%$cari%' ORDER BY id_berita DESC");
$hitung=mysql_num_rows($pencarian);

if ($hitung > 0){
while ($r=mysql_fetch_array($pencarian)){
$hitung_komen=mysql_query("SELECT * FROM sh_komentar WHERE id_berita='$r[id_berita]'");
$jml_komen=mysql_num_rows($hitung_komen);
?>
<?php echo "<h4><a style='font-family:Bree Serif' href='?p=detberita&id=$r[id_berita]'>$r[judul_berita]</a></h4>
<small>Diposting pada: <a href='?p=tglberita&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=userberita&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katberita&id=$r[id_kategori]'>$r[nama_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_berita = strip_tags($r[isi_berita]); 
						$isi = substr($isi_berita,0,450);
if ($r[gambar_kecil] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_kecil]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";
}}}

else {
echo "";
}

$pencaria =mysql_query("SELECT * FROM sh_mading, sh_mading_kategori, sh_siswa WHERE sh_mading.id_kategori=sh_mading_kategori.id_mading_kategori AND sh_mading.nama_siswa=sh_siswa.nama_siswa AND status_terbit='1' AND judul_mading LIKE '%$cari%' ORDER BY id_mading DESC");
$hitun=mysql_num_rows($pencaria);

if ($hitun > 0){
while ($r=mysql_fetch_array($pencaria)){
$hitung_kome=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_komentar_mading='$r[id_mading]'");
$jml_kome=mysql_num_rows($hitung_kome);
echo "<h4><a style='font-family:Bree Serif' href='?p=detmading&id=$r[id_mading]'>$r[judul_mading]</a></h4>
<small>Diposting pada: <a href='?p=tglmading&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=usermading&user=$r[nama_siswa]'>$r[nama_siswa]</a>, Kategori: <a href='?p=katmading&id=$r[id_mading_kategori]'>$r[nama_mading_kategori]</a>
			, Komentar : $jml_komen
			</small><br>";
			$isi_mading = strip_tags($r[isi_mading]); 
			$isi = substr($isi_mading,0,450);

			if ($r[gambar_mading] != 'no_image.jpg'){
			echo "<p><img src='images/$r[gambar_mading]' width='175px' height='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'><br/>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br/>";}
else {
echo "<p>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br>";
}}}

else {
echo "";
}

$pencari =mysql_query("SELECT * FROM sh_agenda WHERE judul_agenda LIKE '%$cari%'");
$hitu=mysql_num_rows($pencari);

if ($hitu > 0){
while ($r=mysql_fetch_array($pencari)){
echo "<ul class='list-unstyled'>
	                  <li><a href='?p=agenda'><b>$r[judul_agenda]</b></a></li>
                      <li>Pada tanggal $r[tanggal_agenda]</li>
					  <li>Bertempat di $r[tempat_agenda]</li>
					  <li>Keterangan : $r[keterangan_agenda]</li></ul>";
}}

else {
echo "";
}

$pencar =mysql_query("SELECT * FROM sh_pengumuman WHERE judul_pengumuman LIKE '%$cari%'");
$hit=mysql_num_rows($pencar);

if ($hit > 0){
while ($r=mysql_fetch_array($pencar)){
echo "<h4><a style='font-family:Bree Serif' href='?p=pengumuman'>$r[judul_pengumuman]</a></h4>";
echo "<p>$r[isi_pengumuman]</p>";
}}

else {
echo "";
}

if ($hitung<1 AND $hitun<1 AND $hitu<1 AND $hit<1){echo "<h3 style='font-family:Sans-Serif' class='text-center'>Tidak ada kata yg cocok</h3>";}
?>
    </div>
</div>