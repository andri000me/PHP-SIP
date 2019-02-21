<div class="panel panel-primary"><!--Panel Info-->
  <div class="panel-heading"><h3 class="panel-title">Artikel Berita</h3></div>
    <div class="panel-body">
    <!--Paging artikel-->
    <div class="panel panel-default">
            <ul class="pager hidden-xs">
      <?php 
			$baris 		= 1;
			$halaman 	= isset($_GET['hal']) ? $_GET['hal'] : 0;
            $sql = mysql_query("SELECT * FROM sh_berita WHERE status_terbit='1' AND status_headline='1'") or die("ERROR artikel".mysql_error());
            $row = mysql_num_rows($sql);
		    $maksData	= ceil($row/$baris);
		   
		    $mySql = "SELECT * FROM sh_berita WHERE status_terbit='1' AND status_headline='1' ORDER BY id_berita LIMIT $halaman, $baris";
			$myQry = mysql_query($mySql)  or die ("Query salah : ".mysql_error());
           while($data=mysql_fetch_array($myQry)){
		   $isi_berita = strip_tags($data[isi_berita]);
		   $isi = substr($isi_berita,0,200);?>
		   <li><div class="ImageHolder">
            <img id="headline" class="img-responsive" src="images/<?php echo $data[gambar_kecil]?>" width="100%" style="height:450px;"/>
			<div class="captionn">
				  <h3><a href="?p=detberita&id<?php echo $data['id_berita']?>#art" style="color:#000;margin:0px 10px;"><?php echo $data['judul_berita']?></a></h3>
				  <?php echo "<p style='color:#6CB4FF;margin:0px 10px;opacity:1;'><small>".$isi."...<a style='color:#000;' href='?p=detberita&id=$data[id_berita]'>Baca selengkapnya...</a></small></p>";?>
				</div></li>
            
      <?php }
	?><br />
              <li <?php if ($_GET[hal]==0){echo "class='hidden'";}?>><a href="?hal=<?php echo $_GET[hal]-1;?>#headline"><span class="glyphicon glyphicon-chevron-left"></span>PREV</a></li>
              <li <?php if ($_GET[hal]==$row-1){echo "class='hidden'";}?>><a href="?hal=<?php echo $_GET[hal]+1;?>#headline">NEXT<span class="glyphicon glyphicon-chevron-right"></span></a></li>
            </ul>
    </div>
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
						<li><a style="font-size:16px;font-family: 'Bubblegum Sans', cursive;" href="<?php echo "?p=detberita&id=$b[id_berita]";?>"><?php echo "<b>$b[judul_berita]</b>";?></a>
						<br><small>Kategori: <a href="?p=katberita&id=<?php echo $b[id_kategori]?>"><?php echo $b[nama_kategori]?></a>
						&nbsp;Komentar : 
						<?php
						$hitungkomentar=mysql_query("SELECT * FROM sh_komentar WHERE id_berita='$b[id_berita]'");
						$jumlahkomentar=mysql_num_rows($hitungkomentar);
						echo $jumlahkomentar?></small>
						<?php
						$isi_berita = strip_tags($b[isi_berita]); 
						$isi = substr($isi_berita,0,500);
						if ($b[gambar_kecil] != 'no_image.jpg'){
						echo "<p><img src='images/$b[gambar_kecil]' width='100px' style='float:left; margin: 5px 10px 0 0; padding: 3px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detberita&id=$b[id_berita]'>Baca selengkapnya...</a></p><br>";}
						else {
						echo "<p>$isi...<a href='?p=detberita&id=$b[id_berita]'>Baca selengkapnya...</a></p>";
						}
						?>
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
        <h3 class="panel-title">Mading Siswa</h3>
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
						while($b=mysql_fetch_array($mading)){
					?>
						<li >
						<!-- Judul Mading  -->
							<p style="font-size:16px; font-family: 'Bubblegum Sans', cursive;"><a href="<?php echo "?p=detmading&id=$b[id_mading]";?>">
									<?php echo "<b>$b[judul_mading]</b>";?>
							</a></p>
						
						<!-- Nama Kategori -->
						<p style="margin: -10px 0 0 0px"><small>Kategori: <a href="?p=katmading&id=<?php echo $b[id_mading_kategori]?>">
						<!-- Komentar -->
						<?php echo $b[nama_mading_kategori]?></a>
						&nbsp;Komentar : 
						<?php
						$hitungkomentar=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$b[id_mading]'");
						$jumlahkomentar=mysql_num_rows($hitungkomentar);
						echo $jumlahkomentar?></small></p>

						<!-- Isi Mading -->
						<?php
						$isi_mading = strip_tags($b[isi_mading]); 
						$isi = substr($isi_mading,0,500);

						// Gambar
						if ($b[gambar_mading] != 'no_image.jpg'){
						echo "<p><img src='images/$b[gambar_mading]' width='100px'  height ='100px' style='float:left; 
							margin: 5px 10px 0 0;	 
							padding: 3px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detmading&id=$b[id_mading]'>Baca selengkapnya...</a></p>";}
						else {
						echo "<p>$isi...<a href='?p=detmading&id=$b[id_mading]'>Baca selengkapnya...</a></p>";
						}
						?>
						</li>
					<?php }}

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