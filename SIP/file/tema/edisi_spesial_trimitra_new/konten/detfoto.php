<div id="popup">
	<div class="window">
	<?php 
		$s=mysql_query("SELECT * FROM sh_galeri WHERE id_galeri='$_GET[id]'");
		$d=mysql_fetch_array($s);
	?>
		<a href="?p=foto&id=<?php echo $d['id_album']?>" class="close" title="close" style="color:red;">X</a>
        <?php $sql = mysql_query("SELECT * FROM sh_galeri WHERE id_galeri ='$_GET[id]'")or die("ERROR TAMPIL !".mysql_error());
          $data=mysql_fetch_array($sql);?>
			<img class="img-responsive" src="images/foto/galeri/<?php echo "$data[nama_galeri]";?>" width="100%"/>
	</div>
</div>