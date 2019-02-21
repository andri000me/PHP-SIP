			
			<div id="popup">
				<div class="window">
					<a href="?page=" class="close" title="close">X</a>
                    <?php $sql = mysql_query("SELECT * FROM sh_galeri WHERE id_galeri ='$_GET[id]'")or die("ERROR TAMPIL !".mysql_error());
                          $data=mysql_fetch_array($sql);?>
                    <img class="img-responsive" src="images/foto/galeri/<?php echo "$data[nama_galeri]";?>" width="350px"/>
				</div>
			</div>
			</div>