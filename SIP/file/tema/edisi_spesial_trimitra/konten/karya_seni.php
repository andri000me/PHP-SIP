<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<div id="ms" class="panel panel-primary">
<div class="panel-heading"><h3 style="font-family:Bree Serif;" class="panel-title">Mading Karya Seni</h3></div>
<div class="panel-body">


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
		$mading =mysql_query("SELECT * FROM sh_mading, sh_mading_kategori, sh_siswa WHERE sh_mading.id_kategori=sh_mading_kategori.id_mading_kategori AND sh_mading.nama_siswa=sh_siswa.nama_siswa AND status_terbit='1' AND id_kategori=1 ORDER BY sh_mading.id_mading DESC LIMIT $posisi, $batas");
		$cek_mading=mysql_num_rows($mading);

		if($cek_mading > 0){
		while ($r=mysql_fetch_array($mading)){
		$hitung_komen=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$r[id_mading]'");
		$jml_komen=mysql_num_rows($hitung_komen);
		
		$foto=mysql_query("SELECT * FROM sh_siswa WHERE nama_siswa='$r[nama_siswa]'");
		$f=mysql_fetch_array($foto);
?>		
		<div class="panel panel-default">
		<div class="panel-body">
		<div class="row" style="padding-left:15px;">
		<img src="<?php $path = $f[foto]; $ambilpath = substr($path,28); echo $ambilpath; ?>" style="width:50px;height:50px;float:left;padding-left" /><a style="margin-left:10px;" href=""> <?php echo $r[nama_siswa];?></a><br/><p style="margin-left:60px;"><?php echo tgl_indo($r[tanggal_posting]);?><br/><small><?php echo "<a  style='margin-left:0px;' href='?p=katmading&id=$r[id_mading_kategori]'>$r[nama_mading_kategori]</a>";?></small></p>
		</div>
<?php echo "<h4 class='hver' style='font-family:Bree Serif;'><a href='?p=detmading&id=$r[id_mading]'>$r[judul_mading]</a></h4>
		<br>";
			//isi mading karya tulis
			
			$isi_mading = strip_tags($r[isi_mading]); 
			$isi = substr($isi_mading,0,650);

			if ($r[gambar_mading] != 'no_image.jpg'){
			echo "<p><img src='images/$r[gambar_mading]' width='175px' height='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'><br/>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p>";}
else {
echo "<p>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p>";
}
	$hitunglike=mysql_query("SELECT * FROM sh_like WHERE id_mading='$r[id_mading]'");
	$jml_like=mysql_num_rows($hitunglike);
	
	$ceklike=mysql_query("SELECT * FROM sh_like WHERE id_mading='$r[id_mading]' AND id='$_SESSION[siswa]' OR id_mading='$r[id_mading]' AND id='$_SESSION[orangtua]' OR id_mading='$r[id_mading]' AND id='$_SESSION[guru]'");
	$jml_cek=mysql_num_rows($ceklike);
	if($jml_cek==1){$like="Anda menyukai ini";}else{$like="";}
echo "<small><p style='float:left;'><b>$jml_like Like</b></p><p style='color:#989898;float:left;'>&nbsp;$like</p></small>";
echo "<small><p style='float:right;'><b>$jml_komen Komentar</b></p></small>";
echo "</div>";
	if ($_SESSION[siswa]){
		if($jml_cek==0){
		echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=like&no=$r[id_mading]&hal=madingKaryaSeni' class='btn btn-default btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Like
				</a></p>";}
		else{
			echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=unlike&no=$r[id_mading]&hal=madingKaryaSeni' class='btn btn-info btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Unlike
				</a></p>";}}
elseif ($_SESSION[guru]){
	if($jml_cek==0){
		echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=like&no=$r[id_mading]&hal=madingKaryaSeni' class='btn btn-default btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Like
				</a></p>";}
		else{
			echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=unlike&no=$r[id_mading]&hal=madingKaryaSeni' class='btn btn-info btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Unlike
				</a></p>";}}
elseif ($_SESSION[orangtua])
	{if($jml_cek==0){
		echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=like&no=$r[id_mading]&hal=madingKaryaSeni' class='btn btn-default btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Like
				</a></p>";}
		else{
			echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=unlike&no=$r[id_mading]&hal=madingKaryaSeni' class='btn btn-info btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Unlike
				</a></p>";}}

		echo"</div>";}
		if ($halaman > 1){
		$prev=$halaman-1;
		echo 	"	<div class='hal' style='float: left'><a href='?p=mading&halaman=$prev' title='Halaman Sebelumnya'>&laquo; Sebelumnya</a></div>";
		}
		if ($halaman < $jmlhal) {
		$next=$halaman+1;
		echo "	<div class='hal' style='float: right'><a href='?p=mading&halaman=$next' title='halaman Berikutnya'>Berikutnya &raquo;</a></div>"; }
}
else { 
?>
<b>Data mading belum tersedia</b>
<?php } ?>
</div>
<!-- awal id lebar -->
</div>