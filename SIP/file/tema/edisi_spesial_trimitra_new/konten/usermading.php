<div class="row">
<?php
	$mad=mysql_query("SELECT * FROM sh_mading WHERE nama_siswa='$_GET[user]' AND status_terbit='1'");
	while($r=mysql_fetch_array($mad)){

	$kom=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$r[id_mading]' AND status_terbit='1'");
	$datkom=mysql_fetch_array($kom);
	$jml_komen=mysql_num_rows($kom);
	
?>
	<div class="col-sm-8 col-md-4">
		<?php echo "<h4><a href='?p=detmading&id=$r[id_mading]'>$r[judul_mading]</a></h4><br>
		<small>Diposting pada: <a href='?p=tglmading&tgl=$r[tanggal_posting]'>$tggl</a>, oleh : <a href='?p=usermading&user=$r[nama_siswa]'>$r[nama_siswa]</a>, Kategori: <a href='?p=katmading&id=$r[id_mading_kategori]'>$r[nama_mading_kategori]</a>
			, Komentar : $jml_komen
			</small><br>";
			//isi mading karya tulis
			
			$isi_mading = strip_tags($r[isi_mading]); 
			$isi = substr($isi_mading,0,250);

				if ($r[gambar_mading] != 'no_image.jpg'){
					echo "<p><img src='images/$r[gambar_mading]' width='175px' height='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'><br/>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
				}else {
					echo "<p>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br>";
				}
		}?>
	</div>
</div>