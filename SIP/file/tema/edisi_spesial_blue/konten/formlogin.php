<!-- POPUP LOGIN-->
			
			<div id="popup">
				<div class="window">
					<a href="?p=" class="close-button" title="close">X</a>

					<?php
						if (isset($_SESSION['siswa']) OR isset($_SESSION['guru'])){
					?>
					<table class="table">
					<?php if ($_SESSION['siswa']) { 
						$data_siswa_login=mysql_query("SELECT * FROM sh_siswa WHERE nis='$_SESSION[siswa]'");
						$datasl=mysql_fetch_array($data_siswa_login);
					?>
					<tr class="form"><td><a href="elearningku/logout.php" onClick="return confirm ('Apakah anda benar-benar akan keluar dari sistem?')" title='Log out'>Logout</a></td></tr>

					<?php }
					else { 
					$data_guru_login=mysql_query("SELECT * FROM sh_guru_staff WHERE nip='$_SESSION[guru]'");
					$dgl=mysql_fetch_array($data_guru_login);
					?>
					<tr class="form"><td><img src="images/foto/guru/<?php echo $dgl[foto]?>" width="60px" style="padding: 3px; border: 1px solid #dcdcdc;"></td></tr>
					<tr class="form"><td><a href="elearningku/index.php?p=profil" title="Profil"><b><?php echo $dgl[nama_gurustaff]?></b></a></td></tr>
					<tr class="form"><td><b><?php echo $dgl[nip]?></b></td></tr>
					<tr class="form"><td><a href="elearningku/logout.php" onClick="return confirm ('Apakah anda benar-benar akan keluar dari sistem?')" title='Log out'>Logout</a></td></tr>

					<?php } ?>
					</table>
					<?php }
					else { ?>
					<br/><br/>
                    <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title">Login System</h3></div>
                    <div class="panel-body">
                    
						<form class="form-horizontal" role="form" method="POST" action="elearningku/validasi.php" name="login" id="login">
						
                          <div class="col-lg-12"><input type="text" class="form-control" name="username" title="Masukkan NIP atau NIS anda" placeholder="Username"/><br /></div>
                        
                        
                          <div class="col-lg-12"><input type="password" placeholder="Password" class="form-control" name="password" title="Masukkan password anda"/><br /></div>
                        
                        
                          <div class="col-lg-12">
                            <select name="status" class="form-control">
						      <option value=""selected>Pilih status...</option>
						      <option value="guru">Guru</option>
						      <option value="siswa">Siswa</option>
						      <option value="ortu">Orang Tua</option>
							</select>
                          <br /></div>
                        
						
                        <div class="row">
                          <div class="col-lg-12">
                            <input type="submit" class="btn-primary" value="Login">
                          </div>
                        </div>
						</form>
							<script language="JavaScript" type="text/javascript" xml:space="preserve">
								//<![CDATA[
								var frmvalidator  = new Validator("login");
								
								frmvalidator.addValidation("username","req","Anda belum memasukkan Username");
								frmvalidator.addValidation("password","req","Anda belum memasukkan Password");
								frmvalidator.addValidation("status","req","Anda belum memilih status");
								//]]>
							</script>
					</table>
					<?php } ?>
			<!-- POPUP --><br />
            </div>
			</div>
            </div>
			</div>