			
			<div id="popup">
				<div class="window">
					<a href="?page=" class="close" title="close">X</a>
                    <?php 
							$sql = mysql_query("SELECT * FROM sh_siswa,sh_kelas WHERE nama_siswa ='$_GET[id]' AND sh_siswa.id_kelas=sh_kelas.id_kelas")or die("ERROR TAMPIL !".mysql_error());
							$jml = mysql_num_rows($sql);
							$sq = mysql_query("SELECT * FROM sh_guru_staff WHERE nama_gurustaff ='$_GET[id]'")or die("ERROR TAMPIL !".mysql_error());
							$jm = mysql_num_rows($sq);
							$s = mysql_query("SELECT * FROM sh_ortu WHERE nama_ortu ='$_GET[id]'")or die("ERROR TAMPIL !".mysql_error());
							$j = mysql_num_rows($s);
							
							
							$data=mysql_fetch_array($sql);
							$path = $data[foto];
							$ambilpath = substr($path,28);
							echo "<div class='panel panel-default'>
							<div class='panel-body'>
							<img src='$ambilpath'/ style='width:50%;float:left;'>
							<p>&nbsp;$data[nama_siswa]</p>
							<p>&nbsp;$data[nama_kelas]</p>
							</div></div>";
							?>
					
				</div>
			</div>
			</div>