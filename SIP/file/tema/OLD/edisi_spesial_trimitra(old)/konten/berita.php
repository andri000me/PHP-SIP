<div class="panel panel-primary">
      <div class="panel-heading">
       <h3 class="panel-title">Berita</a></h3>
      </div>
<div class="panel-body">

<?php	$batas= 5;
		$halaman=$_GET['halaman'];
		If (empty($halaman)){
		$posisi=0;
		$halaman=1;
		}

		else { $posisi=($halaman-1) * $batas;
		}
		$tampil2 = mysql_query ("SELECT * FROM sh_berita WHERE status_terbit='1'");
		$jmldata = mysql_num_rows($tampil2);
		$jmlhal = ceil($jmldata/$batas);
$berita =mysql_query("SELECT * FROM sh_berita, sh_kategori, sh_users WHERE sh_berita.id_kategori=sh_kategori.id_kategori AND sh_berita.s_username=sh_users.s_username AND status_terbit='1' ORDER BY id_berita DESC LIMIT $posisi, $batas");
$cek_berita=mysql_num_rows($berita);

if($cek_berita > 0){
while ($r=mysql_fetch_array($berita)){
$hitung_komen=mysql_query("SELECT * FROM sh_komentar WHERE id_berita='$r[id_berita]'");
$jml_komen=mysql_num_rows($hitung_komen);
?>
<?php echo "<h4><a href='?p=detberita&id=$r[id_berita]'>$r[judul_berita]</a></h4>
<small>Diposting pada: <a href='?p=tglberita&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=userberita&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katberita&id=$r[id_kategori]'>$r[nama_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_berita = strip_tags($r[isi_berita]); 
						$isi = substr($isi_berita,0,450);
if ($r[gambar_kecil] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_kecil]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";
}}
		if ($halaman > 1){
		$prev=$halaman-1;
		echo 	"	<div class='hal' style='float: left'><a href='?p=berita&halaman=$prev' title='Halaman Sebelumnya'>&laquo; Sebelumnya</a></div>";
		}
		if ($halaman < $jmlhal) {
		$next=$halaman+1;
		echo "	<div class='hal' style='float: right'><a href='?p=berita&halaman=$next' title='halaman Berikutnya'>Berikutnya &raquo;</a></div>"; }
}
else { ?>
<b>Data berita belum tersedia</b>
<?php } ?>
</div>
</div>