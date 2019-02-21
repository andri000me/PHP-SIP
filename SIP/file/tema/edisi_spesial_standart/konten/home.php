<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<div class="panel panel-primary"><!--Panel Info-->
  <div class="panel-heading"><h3  style="font-family:Bree Serif;" class="panel-title">Artikel Berita</h3></div>
    <div class="panel-body">
	<style>
	@media screen and (max-width : 670px){
    .carousel-inner > .item > img,
	.carousel-inner > .item > a > img {
      width: 100%;
	  height: 150px;
      margin: auto;
	}
	.carousel-caption h4{
		font-size:14px;
	}
	}
	@media screen and (min-width : 670px){
	  .carousel-inner > .item > img,
	  .carousel-inner > .item > a > img {
      width: 100%;
	  height: 300px;
      margin: auto;
	}
	}
</style>
    <!--Paging artikel-->
     <div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators 
			<ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			  <li data-target="#myCarousel" data-slide-to="1"></li>
			  <li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>-->

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox" >

			  <div class="item active">
				 <?php 
                $headline=mysql_query("SELECT * , id_berita as berita1 FROM sh_berita WHERE
                    status_terbit='1' AND status_headline='1' ORDER BY id_berita DESC LIMIT 1") or die("ERROR DB".mysql_error());
                $data=mysql_fetch_array($headline);	
				$isi_berita = strip_tags($data[isi_berita]); 
				$isi = substr($isi_berita,0,80);
			?>
				<img src="images/<?php echo $data['gambar_kecil']?>" >
				<div class="carousel-caption">
				  <h4><a href="?page=29&id=<?php echo $data['id_berita'];?>#art" style="color:#D1D931;"><?php echo $data['judul_berita']?></a></h4>
				  <p class="hidden-xs" style="color:#fff;"><?php echo "$isi...<a href='?page=29&id=$data[id_berita]#art' >Baca selengkapnya...</a>";?></p>
				</div>
			  </div>

			  <div class="item">
			    <?php $headlin=mysql_query("SELECT * , id_berita as berita2 FROM sh_berita WHERE
                    status_terbit='1' AND status_headline='1' AND id_berita <> '$data[berita1]' ORDER BY id_berita DESC LIMIT 1") or die("ERROR DB".mysql_error());
                $dat=mysql_fetch_array($headlin);	
				$isi_berita = strip_tags($dat[isi_berita]); 
				$isi = substr($isi_berita,0,80);?>
				<img src="images/<?php echo $dat['gambar_kecil']?>">
				<div class="carousel-caption">
				  <h4><a href="?page=29&id=<?php echo $data['id_berita'];?>#art" style="color:#D1D931;"><?php echo $data['judul_berita']?></a></h4>
				  <p class="hidden-xs" style="color:#fff;"><?php echo "$isi...<a href='?page=29&id=$data[id_berita]#art' >Baca selengkapnya...</a>";?></p>
				</div>
			  </div>
			
			  <div class="item">
			  <?php $headli=mysql_query("SELECT * FROM sh_berita WHERE
                    status_terbit='1' AND status_headline='1' AND id_berita <> '$data[berita1]' AND id_berita <> '$dat[berita2]' ORDER BY id_berita DESC LIMIT 1") or die("ERROR DB".mysql_error());
                $da=mysql_fetch_array($headli);	
				$isi_berita = strip_tags($da[isi_berita]); 
				$isi = substr($isi_berita,0,80); ?>
				<img src="images/<?php echo $da['gambar_kecil']?>">
				<div class="carousel-caption">
				  <h4><a href="?page=29&id=<?php echo $data['id_berita'];?>#art" style="color:#D1D931;"><?php echo $data['judul_berita']?></a></h4>
				  <p class="hidden-xs" style="color:#fff;"><?php echo "$isi...<a href='?page=29&id=$data[id_berita]#art' >Baca selengkapnya...</a>";?></p>
				</div>
			  </div>
		  
			</div>

			<!-- Left and right controls 
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			  <span class="sr-only">Next</span>
			</a>-->
	</div>
	</br>
    <!--Paging artikel-->
   	<ul class="list-unstyled">
     				<?php
					$berita=mysql_query("SELECT * FROM sh_berita, sh_kategori, sh_users WHERE 
					sh_berita.id_kategori=sh_kategori.id_kategori AND sh_berita.s_username=sh_users.s_username AND
					status_terbit='1' ORDER BY id_berita DESC LIMIT 2");
					$hitungberita=mysql_num_rows($berita);
					
					if($hitungberita > 0){
					while($b=mysql_fetch_array($berita)){
					?>
						<li>
						
						<a style="font-size:16px;font-family: 'Bree Serif', cursive;" href="<?php echo "?p=detberita&id=$b[id_berita]";?>"><?php echo "<b>$b[judul_berita]</b>";?></a>
						<br><small><b>Kategori: <a href="?p=katberita&id=<?php echo $b[id_kategori]?>"><?php echo $b[nama_kategori]?></a>
						<p style="float:right;">
						<?php
						$hitungkomentar=mysql_query("SELECT * FROM sh_komentar WHERE id_berita='$b[id_berita]' AND status_terima='1'");
						$jumlahkomentar=mysql_num_rows($hitungkomentar);
						echo $jumlahkomentar?> Komentar</b></p></small>
						<?php
						$isi_berita = strip_tags($b[isi_berita]); 
						$isi = substr($isi_berita,0,500);
						if ($b[gambar_kecil] != 'no_image.jpg'){
						echo "<p><img src='images/$b[gambar_kecil]' width='150px' style='float:left; margin: 5px 10px 0 0; padding: 3px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detberita&id=$b[id_berita]'>Baca selengkapnya...</a></p>";
						echo "<hr />";}
						else {
						echo "<p>$isi...<a href='?p=detberita&id=$b[id_berita]'>Baca selengkapnya...</a></p>";?>
						<?php } ?>
						</li>
					<?php }}

					else {?>
					<li><a href=""><b>Data berita belum ada</b></a></li>
					<?php } ?>
      </ul>
    </div>
</div><!--Panel Info-->
    
    
    
    
    
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 style="font-family:Bree Serif;" class="panel-title">Mading Siswa</h3>
      </div>
    <div class="panel-body">
    <ul class="list-unstyled">
      <?php
						$mading=mysql_query("SELECT * 
										FROM sh_mading, sh_mading_kategori, sh_siswa
										WHERE sh_mading.id_kategori = sh_mading_kategori.id_mading_kategori
										AND sh_mading.nama_siswa = sh_siswa.nama_siswa
										AND status_terbit =  '1'
										ORDER BY id_mading DESC 
										LIMIT 4"
									   );
						$hitungmading=mysql_num_rows($mading);
						
						if($hitungmading > 0){
						while($r=mysql_fetch_array($mading)){
							$hitungkomentar=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$r[id_mading]' AND status_terima='1'");
							$jml_komen=mysql_num_rows($hitungkomentar);

		$foto=mysql_query("SELECT * FROM sh_siswa WHERE nama_siswa='$r[nama_siswa]'");
		$f=mysql_fetch_array($foto);
		 $path = $f[foto]; 
		 $ambilpath = substr($path,28); 
?>		
		<div class="panel panel-default">
		<div class="panel-body">
		<div class="row" style="padding-left:15px;">
		<?php if ($f[foto] != ''){?>
		<img src="<?php echo $ambilpath; ?>" style="width:50px;height:50px;float:left;padding-left" /><?php } else {?>
		<img src="images/foto/galeri/no_image.jpg" style="width:50px;height:50px;float:left;padding-left" /><?php } ?>
		
		
		<a style="margin-left:10px;" href=""> <?php echo $r[nama_siswa];?></a><br/><p style="margin-left:60px;color:#989898;"><small><?php echo tgl_indo($r[tanggal_posting]);?><br/><?php echo "<a  style='margin-left:0px;' href='?p=katmading&id=$r[id_mading_kategori]'>$r[nama_mading_kategori]</a>";?></small></p>
		</div>
<?php echo "<h4 class='hver' style='font-family:Bree Serif;'><a href='?p=detmading&id=$r[id_mading]'>$r[judul_mading]</a></h4>";
			//isi mading karya tulis
			
			$isi_mading = strip_tags($r[isi_mading]); 
			$isi = substr($isi_mading,0,650);

			if ($r[gambar_mading] != 'no_image.jpg'){
			echo "<p><img src='images/$r[gambar_mading]' width='150px' height='150px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'><br/>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br/>";}
else {
echo "<p>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br/>";
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
				<a href='?p=".MD5(like)."&to=like&no=$r[id_mading]' class='btn btn-default btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Like
				</a></p>";}
		else{
			echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=unlike&no=$r[id_mading]' class='btn btn-info btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Unlike
				</a></p>";}}
elseif ($_SESSION[guru]){
	if($jml_cek==0){
		echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=like&no=$r[id_mading]' class='btn btn-default btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Like
				</a></p>";}
		else{
			echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=unlike&no=$r[id_mading]' class='btn btn-info btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Unlike
				</a></p>";}}
elseif ($_SESSION[orangtua])
	{if($jml_cek==0){
		echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=like&no=$r[id_mading]' class='btn btn-default btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Like
				</a></p>";}
		else{
			echo "<p style=padding-right:10px;' class='text-right'>
				<a href='?p=".MD5(like)."&to=unlike&no=$r[id_mading]' class='btn btn-info btn-sm'>
				  <span class='glyphicon glyphicon-thumbs-up'></span> Unlike
				</a></p>";}}
	
				
echo "</div></li>";}}

					else {?>
					<li><a href=""><b>Data mading belum ada</b></a></li>
					<?php } ?>
     </ul>
    </div>
</div>
    
    <!--Popup-->
    <div id="popup">
    	<div class="window">
        	<a href="#" class="close-button" title="Close">X</a>
            <img src="images/logo.png" width="100"/>
            <h4>Trimitra Sistem Informasi</h4>
            <div id="login">
            <form>
            <div class="form-group">
                  
                  <input type="text" name="" placeholder="Username" class="form-control"/><br />
                  <input type="password" name="" placeholder="Password" class="form-control"/>  <br />
                  <select class="form-control" name="">
                    <option value="Kosong">-Pilih Jenis-</option>
                    <option value="">Guru</option>
                    <option value="">Orang tua</option>
                    <option value="">Murid</option>
                  </select><br />
                  <input type="submit" name="" value="Submit" class="form-control" style="background: #C8C8C8; color: #000;"/>
              </div>
            </form>
        </div>
    </div>
    </div>