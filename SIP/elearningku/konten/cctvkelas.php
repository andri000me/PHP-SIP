<div class="panel panel-primary">
<div class="panel-heading" ><h3 class="panel-title">Monitor CCTV Berdasarkan Kelas</h3></div>
<div class="panel-body">
<!-- Pencarian Berdasarkan Kelas -->
	<form method="POST" action="?p=cctvkelas" class="form-horizontal text-left">
        <div class="row">
            <div class="col-sm-4">
				<select name="kelas" onChange="this.form.submit()" class="form-control">
					<option value="" selected="">--Pilih CCTV--</option>
					<?php
					$tampilkelas=mysql_query("SELECT * FROM sh_kelas");
					while($tk=mysql_fetch_array($tampilkelas)){
					echo "<option value='$tk[id_kelas]'>$tk[nama_kelas]</option>";}
					?>
				</select>
            </div>
        </div>
	 </form>
     <br />
<!-- Pencarian Berdasarkan Kelas -->

<!-- Style Camera 01 -->
	<?php
		$no   =1;
		$cctv = mysql_query("SELECT *
							FROM sh_cctv , sh_kelas
							WHERE sh_cctv.id_kelas = sh_kelas.id_kelas AND sh_kelas.id_kelas = '$_POST[kelas]'");
		$cek_cctv=mysql_num_rows($cctv);
		if($cek_cctv > 0){
		while($c=mysql_fetch_array($cctv)){
	?>

<div class="alert alert-info">CCTV ON <?php echo "$c[nama_kelas]";?> </div>
<div class="panel panel-info">
<img class="img-responsive" src="<?php echo "$c[alamat_cctv]";?>" alt="real-time video feed"  />
</div><!-- End Style Camera 02 -->

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
</div>
