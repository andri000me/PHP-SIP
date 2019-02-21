<div class="row">
<div class="col-md-12">
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators 
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>-->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
<?php $sql=mysql_query("SELECT *,id_berita as berita1 FROM sh_berita WHERE status_terbit =1 AND status_headline=1 ORDER BY RAND() DESC  LIMIT 5");
	  $data=mysql_fetch_array($sql);?>
        <img src="images/<?php echo $data['gambar_kecil']?>" alt="Chania" width="960" height="345">
        <div class="carousel-caption">
          <h3 style="color:#f8f53e; text-align:left; margin-left:20px;"><?php echo $data['judul_berita']?></h3>
        </div>
      </div>
	  
      <div class="item">
<?php $sq=mysql_query("SELECT *,id_berita as berita2 FROM sh_berita WHERE status_terbit =1 AND status_headline=1 AND id_berita <> $data[berita1] ORDER BY RAND() DESC LIMIT 5");
	 $dat=mysql_fetch_array($sq);?>
        <img src="images/<?php echo $dat['gambar_kecil']?>" alt="Chania" width="960" >
        <div class="carousel-caption">
          <h3 style="color:#f8f53e; text-align:left; margin-left:20px;"><?php echo $dat['judul_berita']?></h3>
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
</div>
</div>
<br/>
    <!--Paging artikel-->
<div class="row">    
     				<?php
					$berita=mysql_query("SELECT * FROM sh_berita, sh_kategori, sh_users WHERE 
					sh_berita.id_kategori=sh_kategori.id_kategori AND sh_berita.s_username=sh_users.s_username AND
					status_terbit='1' ORDER BY id_berita ASC LIMIT 2");
					$hitungberita=mysql_num_rows($berita);
					if($hitungberita > 0){
					while($b=mysql_fetch_array($berita)){
						$dtgl=$b['tanggal_posting'];
						$dtggl=date("d-m-Y",strtotime($dtgl))
					?>  <div class="col-sm-8 col-md-6">
						<a href="<?php echo "?p=detberita&id=$b[id_berita]";?>"><?php echo "<b>$b[judul_berita]</b>";?></a><br/>
						<a href="?p=katberita&id=<?php echo $b[id_kategori]?>">Kategori: <?php echo $b[nama_kategori]?></a>
						<p class="text-success"><small>Diposting pada: <?php echo $dtggl?>, Oleh : <?php echo $b['nama_lengkap_users']?>,
						Komentar : 
						<?php
						$hitungkomentar=mysql_query("SELECT * FROM sh_komentar WHERE id_berita='$b[id_berita]'");
						$jumlahkomentar=mysql_num_rows($hitungkomentar);
						echo $jumlahkomentar."</p>"?></small>
						<?php
						$isi_berita = strip_tags($b[isi_berita]); 
						$isi = substr($isi_berita,0,500);
						if ($b[gambar_kecil] != 'no_image.jpg'){
						echo "<p><img src='images/$b[gambar_kecil]' width='100px' style='float:left; margin: 5px 10px 0 0; padding: 3px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detberita&id=$b[id_berita]'>Baca selengkapnya...</a></p><br>";}
						else {
						echo "<p>$isi...<a href='?p=detberita&id=$b[id_berita]'>Baca selengkapnya...</a></p>";
						}
						?>
						
						</div>
					<?php }}

					else {?>
					<a href=""><b>Data berita belum ada</b></a>
					<?php } ?>
</div><hr/>    
<div class="row">    
    
    
		<?php
			$mading=mysql_query("SELECT sh_mading.*,sh_mading_kategori.* FROM sh_mading JOIN sh_mading_kategori ON sh_mading.id_kategori=sh_mading_kategori.id_mading_kategori 
								WHERE id_kategori=1
								AND status_terbit=1
								ORDER BY id_mading DESC 
								LIMIT 2")or die("ERROR".mysql_error());
			$hitungmading=mysql_num_rows($mading);
						
		if($hitungmading > 0){
			while($b=mysql_fetch_array($mading)){
			$komen=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$b[id_mading]'");
			$rowkomen=mysql_num_rows($komen);
			$iberita = strip_tags($b[isi_mading]); 
			$i = substr($iberita,0,500);
			$btgl=date("d-m-Y",strtotime($b['tanggal_posting']));

		?>
			<div class="col-md-6">
				<div class="text-left">
					<h4 class="text-info"><?php echo $b['judul_mading']?></h4>
					<img src="images/<?php echo $b['gambar_mading']?>" class="img-thumbnail" width="100" style="float:left; margin-right:5pxs;"/>
					<p><?php echo $i?>..<a href='?p=detmading&id=<?php echo $b[id_mading]?>'>Baca selengkapnya...</a></p>
					<small><a href="?p=katmading&id=<?php echo $b['id_kategori']?>">Kategori : <?php echo $b['nama_mading_kategori']?></a>
					<p class="text-success">Diposting pada : <?php echo $btgl?>, Oleh : <?php echo $b[nama_siswa]?>, 
					Komentar : <?php echo $rowkomen?></p></small>
					<?php 
					$hitunglike=mysql_query("SELECT * FROM sh_like WHERE id_mading='$b[id_mading]'");
					$jml_like=mysql_num_rows($hitunglike);
					
					$ceklike=mysql_query("SELECT * FROM sh_like WHERE id_mading='$b[id_mading]' AND id='$_SESSION[siswa]' OR id_mading='$b[id_mading]' AND id='$_SESSION[orangtua]' OR id_mading='$b[id_mading]' AND id='$_SESSION[guru]'");
						$jml_cek=mysql_num_rows($ceklike);
						if($jml_cek==1){$like="Anda menyukai ini";}else{$like="";}
					echo "<small><p style='float:left;'><b>$jml_like Like</b></p><p style='color:#989898;float:left;'>&nbsp;$like</p></small>";
					if($_SESSION['siswa'] or $_SESSION['guru'] or $_SESSION['orangtua']){
						if($jml_cek==0){
						echo "<p style=padding-right:10px;' class='text-right'>
								<a href='?p=".MD5(like)."&to=like&no=$b[id_mading]' class='btn btn-default btn-sm'>
								  <span class='glyphicon glyphicon-thumbs-up'></span> Like
								</a></p>";}
						else{
							echo "<p style=padding-right:10px;' class='text-right'>
								<a href='?p=".MD5(like)."&to=unlike&no=$b[id_mading]' class='btn btn-info btn-sm'>
								  <span class='glyphicon glyphicon-thumbs-up'></span> Unlike
								</a></p>";}
					}?>
				</div>
			</div>
		<?php }
		}?>
</div>
<div class="row"> 
		<?php
			$m=mysql_query("SELECT sh_mading.*,sh_mading_kategori.* FROM sh_mading JOIN sh_mading_kategori ON sh_mading.id_kategori=sh_mading_kategori.id_mading_kategori 
								WHERE id_kategori=2
								AND status_terbit=1
								ORDER BY id_mading DESC 
								LIMIT 2")or die("ERROR".mysql_error());
			$h=mysql_num_rows($m);
						
		if($h > 0){
			while($bm=mysql_fetch_array($m)){
			$kom=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$bm[id_mading]'");
			$rowkom=mysql_num_rows($kom);
			$ib = strip_tags($bm[isi_mading]); 
			$is = substr($ib,0,500);
			?>
			<div class="col-md-6">
				<div class="text-left">
					<h4 class="text-info"><?php echo $bm['judul_mading']?></h4>
					<p><?php echo $is?>..<a href='?p=detmading&id=<?php echo $bm[id_mading]?>'>Baca selengkapnya...</a></p>
					<small><a href="?p=katmading&id=<?php echo $bm['id_kategori']?>">Kategori : <?php echo $bm['nama_mading_kategori']?></a><p class="text-success">Diposting pada: <?php echo $bm[tanggal_posting]?>, Oleh : <?php echo $bm[nama_siswa]?>, 
					Komentar : <?php echo $rowkom?></p></small>
					<?php 
					$hitunglike=mysql_query("SELECT * FROM sh_like WHERE id_mading='$bm[id_mading]'");
					$jml_like=mysql_num_rows($hitunglike);
					
					$ceklike=mysql_query("SELECT * FROM sh_like WHERE id_mading='$bm[id_mading]' AND id='$_SESSION[siswa]' OR id_mading='$bm[id_mading]' AND id='$_SESSION[orangtua]' OR id_mading='$bm[id_mading]' AND id='$_SESSION[guru]'");
						$jml_cek=mysql_num_rows($ceklike);
						if($jml_cek==1){$like="Anda menyukai ini";}else{$like="";}
					echo "<small><p style='float:left;'><b>$jml_like Like</b></p><p style='color:#989898;float:left;'>&nbsp;$like</p></small>";
					if($_SESSION['siswa'] or $_SESSION['guru'] or $_SESSION['orangtua']){
						if($jml_cek==0){
						echo "<p style=padding-right:10px;' class='text-right'>
								<a href='?p=".MD5(like)."&to=like&no=$bm[id_mading]' class='btn btn-default btn-sm'>
								  <span class='glyphicon glyphicon-thumbs-up'></span> Like
								</a></p>";}
						else{
							echo "<p style=padding-right:10px;' class='text-right'>
								<a href='?p=".MD5(like)."&to=unlike&no=$bm[id_mading]' class='btn btn-info btn-sm'>
								  <span class='glyphicon glyphicon-thumbs-up'></span> Unlike
								</a></p>";}
					}?>
				</div>
			</div>
		<?php }
		}?>		
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