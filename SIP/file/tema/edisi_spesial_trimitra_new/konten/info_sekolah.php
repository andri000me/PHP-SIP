<div class="row">
	<div class="col-md-12">
<?php
        $info=mysql_query("SELECT * FROM sh_info_sekolah WHERE id_info='$_GET[id]'");
        $r=mysql_fetch_array($info);?>
        
        <h3 class="heading"><?php echo "$r[nama_info]";?></h3>
        <p><?php echo "$r[isi_info]";?></p>
	</div>
</div>