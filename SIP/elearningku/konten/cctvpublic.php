<!DOCTYPE html>
<style>
	.container h1 {
	margin: 50px 0 30px 0;	
}

.btn-sm {
	padding: 3px 5px;	
}

.thumbnail {
	position: relative;
	overflow: hidden;	
}

.caption {
	position: absolute;
	top: 0;
	right: 0;
	background-color: rgba(6,6,0,0.5);
	width: 100%;
	height: 100%;
	padding: 2%;
	display: none;
	text-align: center;
	color: #fff !important;
	z-index: 2;	
}

</style>
<html>
<body>
<div class="panel panel-primary">
	<div class="panel-heading"><h3 class="panel-title"> Monitor CCTV </h3></div>
	<div class="panel-body">


<!-- Style Camera 01 -->
	<?php
		$no   =1;
		$cctv = mysql_query("SELECT * FROM sh_cctv WHERE id_cctv='$_GET[id]'");
		$cek_cctv=mysql_num_rows($cctv);
		if($cek_cctv > 0){
		while($c=mysql_fetch_array($cctv)){
	?>

<div class="titleCctv"><?php echo "$c[nama_kelas]";?> <hr/></div>
<div class="clear"></div>
<div class="cctv">
<img class="img-responsive img-rounded" src="<?php echo "$c[alamat_cctv]";?>"   />
</div>
<div class="clear"></div><!-- End Style Camera 02 -->

	<?php
		$no++;
		} }
		else { ?>
		<font color="red"><b> ERROR REVIEW : DATA CCTV BELUM TERSEDIA </b></font>
		<div class="cctv">
		<div class="clear"></div>
		</div> <!-- End Style Camera 02 -->
	<?php }	?>
	
</div>

<div class="panel-body">
<div class="panel-heading"><h3 class="panel-title"> Monitor Public Area </h3></div>
<div class="clear"></div>
	<div class="row">
		<?php 
	$cctvP = mysql_query("SELECT * FROM sh_cctv , sh_kelas
							WHERE sh_cctv.id_kelas = sh_kelas.id_kelas LIMIT 6");
	while($cc=mysql_fetch_array($cctvP)){ ?>
	
		<div class="col-md-2">
			<div class="thumbnail">
				<div class="caption">
				<p style="text-decoration:none; color:#fff;"><?php echo $cc['nama_kelas']?></p>
				<a href="?p=cctvpublic&id=<?php echo "$cc[id_cctv]";?>"><img src="images/play.png" width="30px"/></a>
				</div>
				<a href="?p=cctvpublic&id=<?php echo "$cc[id_cctv]";?>"><img class="img-responsive img-rounded" src="<?php echo "$cc[alamat_cctv]";?>"/></a>
			</div>
		</div>
		
	<?php } ?>
		
		
		
	</div>
</div>

</div>
<script>
	$('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
</script>
</body>
</html>
