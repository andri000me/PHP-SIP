<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<div class="panel panel-primary"><!--Panel Info-->
  <div class="panel-heading"><h3  style="font-family:Bree Serif;" class="panel-title">Artikel Berita</h3></div>
    <div class="panel-body">
    <!--Paging artikel-->
    <div class="panel panel-default">
            <ul class="pager ">
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
            <img id="headline" class="img-responsive" src="images/<?php echo $data[gambar_kecil]?>" width="100%"/>
			<div class="captionn">
				  <h3 class="hver"><a href="?p=detberita&id=<?php echo $data['id_berita']?>#art" style="color:#000;margin:0px 10px;"><?php echo $data['judul_berita']?></a></h3>
				  <?php echo "<p class='hidden-xs' style='color:#6CB4FF;margin:0px 10px;opacity:1;'><small>".$isi."...<a style='color:#000;' href='?p=detberita&id=$data[id_berita]'>Baca selengkapnya...</a></small></p>";?>
				</div></li>
            
      <?php }
	  $pre=$_GET[hal]-1;
	  $next=$_GET[hal]+1;
	?><br />
              <li> <?php if (!isset($_GET[hal]) OR $_GET[hal]==0){echo "<a href='#headline'>";}else{echo "<a href='?hal=$pre#headline'>";} ?><span class="glyphicon glyphicon-chevron-left"></span>PREV</a></li>
              <li> <?php if ($_GET[hal]==3-1){echo "<a href='#headline'>";}else{echo "<a href='?hal=$next#headline'>";}?>NEXT<span class="glyphicon glyphicon-chevron-right"></span></a></li>
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
						<li><a style="font-size:16px;font-family: 'Bree Serif', cursive;" href="<?php echo "?p=detberita&id=$b[id_berita]";?>"><?php echo "<b>$b[judul_berita]</b>";?></a>
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
?>		
		<div class="panel panel-default">
		<div class="panel-body">
		<div class="row" style="padding-left:15px;">
		<img src="<?php $path = $f[foto]; $ambilpath = substr($path,28); echo $ambilpath; ?>" style="width:50px;height:50px;float:left;padding-left" /><a style="margin-left:10px;" href=""> <?php echo $r[nama_siswa];?></a><br/><p style="margin-left:60px;color:#989898;"><small><?php echo tgl_indo($r[tanggal_posting]);?><br/><?php echo "<a  style='margin-left:0px;' href='?p=katmading&id=$r[id_mading_kategori]'>$r[nama_mading_kategori]</a>";?></small></p>
		</div>
<?php echo "<h4 class='hver' style='font-family:Bree Serif;'><a href='?p=detmading&id=$r[id_mading]'>$r[judul_mading]</a></h4>";
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