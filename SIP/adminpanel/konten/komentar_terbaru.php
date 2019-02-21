<div class="judulbox">Komentar Terbaru</div>
<?php
	$komentarterbaru = mysql_query("SELECT * FROM sh_komentar, sh_berita WHERE sh_komentar.id_berita=sh_berita.id_berita ORDER BY id_komentar DESC LIMIT 8");
	$hitungkomen=mysql_num_rows($komentarterbaru);
	
	if ($hitungkomen != 0){
	while ($kt=mysql_fetch_array($komentarterbaru)) {
?>
			<div class="komen">
			<a href="<?php echo "mailto:$kt[email_komentar]"; ?>"><b><?php echo  "$kt[nama_komentar]" ;?></b></a> pada 
			<a href="<?php echo "berita.php?pilih=edit&id=$kt[id_berita]" ;?>"><?php echo "$kt[judul_berita]" ;?></a> (<?php echo "$kt[tanggal_komentar]" ;?>)<br>
			<?php echo "$kt[isi_komentar]"; ?>
			<hr>
			</div>
<?php } }

else { ?>
			<div class="komen">
			<b>Belum ada data komentar</b>
			<hr>
			</div>
<?php } ?>