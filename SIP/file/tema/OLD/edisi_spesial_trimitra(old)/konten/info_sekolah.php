<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Info Sekolah</h3>
      </div>
      <div class="panel-body">
      <?php
        $info=mysql_query("SELECT * FROM sh_info_sekolah WHERE id_info='$_GET[id]'");
        $r=mysql_fetch_array($info);?>
        
        <h3><?php echo "$r[nama_info]";?></h3>
        <p><?php echo "$r[isi_info]";?></p>
      </div>
</div>