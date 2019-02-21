<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

	<?php
			if (isset($_GET['module']))
			{ if ($_GET['module'] == 'ftm' AND $_GET['op'] == 'tambah')
				{	  ?>
				    <div class="row">
					<div class="col-lg-12">
					<h3 class="page-header"><strong> Pengaturan FTM - FINGER GURU </strong></h3>
					</div>
					<!-- /.col-lg-12 -->
					</div>
					
					<!-- Form Input -->
					<form method="post" action="index.php?module=ftm&op=savekontak">
					<div class="col-lg-6">
					<label>Nama Penerima</label>
						<div class="form-group input-group">
								<input type="text" class="form-control" placeholder="Nama  Kontak di Isi" name="nama">
						</div>
						
					<label>Nomer HP</label>
						<div class="form-group input-group">
							<span class="input-group-addon">+62</span>
							<input type="text" class="form-control" placeholder="No Telepon Kontak" name="nohp">
						</div>
						<!-- Scan Masuk -->
					<label>Pengaturan Waktu Scan Masuk</label>
						<div class="form-group input-group">
						 <br/>
							<select name="jammulaimasuk" id="jammulaimasuk">
							<?php for($i=4;$i<=17;$i++){
							if($i<=9){$i="0$i";}
							echo "<option>$i</option>";
							}?>
							</select>
							&nbsp;&nbsp;
							<select name="menitmulaimasuk" id="menitmulaimasuk">
							<?php for($i=0;$i<=59;$i++){
							if($i<=9){
							$i="0$i";
							}
							echo "<option>$i</option>";
							}?>
							</select>
							&nbsp;s/d&nbsp;
							<select name="jamakhirmasuk" id="jamakhirmasuk">
							<?php for($i=4;$i<=17;$i++){
							if($i<=9){$i="0$i";}
							echo "<option>$i</option>";
							}?>
							</select>
							&nbsp;&nbsp;
							<select name="menitakhirmasuk" id="menitakhirmasuk">
							<?php for($i=0;$i<=59;$i++){
							if($i<=9){
							$i="0$i";
							}
							echo "<option>$i</option>";
							}?>
						</select>
						   <br/>
						  <br/>
						 </div>
						  <!-- Scan Pulang -->
						<label>Pengaturan Waktu Scan Pulang</label>
						<div class="form-group input-group">
						<br/>
							<select name="jammulaipulang" id="jammulaipulang">
							<?php for($i=15;$i<=23;$i++){
							if($i<=9){$i="0$i";}
							echo "<option>$i</option>";
							}?>
							</select>
							&nbsp;&nbsp;
							<select name="menitmulaipulang" id="menitmulaipulang">
							<?php for($i=0;$i<=59;$i++){
							if($i<=9){
							$i="0$i";
							}
							echo "<option>$i</option>";
							}?>
							</select>
							&nbsp;s/d&nbsp;
							<select name="jamakhirpulang" id="jamakhirpulang">
							<?php for($i=15;$i<=23;$i++){
							if($i<=9){$i="0$i";}
							echo "<option>$i</option>";
							}?>
							</select>
							&nbsp;&nbsp;
							<select name="menitakhirpulang" id="menitakhirpulang">
							<?php for($i=0;$i<=59;$i++){
							if($i<=9){
							$i="0$i";
							}
							echo "<option>$i</option>";
							}?>
						</select>
						</div>
					   <br/>
					 <input type="submit" name="submit" value="Save" class="btn btn-default" >&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" class="btn btn-default" >
				    </div> <!-- End Div col-lg-6 -->	
				  </form>
				
				<?php } else if ($_GET['module'] == 'ftm' and $_GET['op'] == 'edit') { ?>	
				
				<div class="row">
				<div class="col-lg-12">
				<h3 class="page-header"><strong> Pengaturan FTM - FINGER GURU </strong></h3>
				</div>
				<!-- /.col-lg-12 -->
				</div>
			
				<?php
				$no=1;
				$sql=mysql_query("SELECT * FROM ftm_setting Where ftm_settingid = '$_GET[id]'");
				while($data=mysql_fetch_array($sql)){
				$id = $_GET['id'];
				$nama = $data['nama'];
				$nohp = $data['nohp'];
				$jammulaimasuk = $data['jam_awalmasuk'];
				$jamakhirmasuk = $data['jam_akhirmasuk'];
				$jammulaipulang = $data['jam_awalpulang'];
				$jamakhirpulang = $data['jam_akhirpulang'];
				?> 
				
				<!-- Form Edit -->
				<form method="post" action="index.php?module=ftm&op=saveedit">
					<div class="col-lg-6">
					<label>Nama Penerima</label>
						<div class="form-group input-group">
								<input type="text" class="form-control" placeholder="Nama  Kontak di Isi" name="nama" value="<?php echo $nama; ?>">
								<input type="text" name="id" value="<?php echo $id; ?>" hidden="hidden">
						</div>
						
					<label>Nomer HP</label>
						<div class="form-group input-group">
							<span class="input-group-addon">+62</span>
							<input type="text" class="form-control" placeholder="No Telepon Kontak" name="nohp" value="<?php echo $nohp; ?>">
						</div>
						
					<!-- Scan Masuk -->
					<label>Pengaturan Waktu Scan Masuk</label>
						<div class="form-group input-group">
						 <br/>
							<select name="jammulaimasuk" id="jammulaimasuk">
							<?php 
							//Explode dari Jam
							$fm = explode(":",$jammulaimasuk);
							$em = explode(":",$jamakhirmasuk);
							?>
							<?php 
							for($i=4;$i<=17;$i++){
							if($i<=9){$i="0$i";}
							if($i==$fm[0]){
							echo "<option selected=\"selected\">$i</option>";
							}else{
							echo "<option>$i</option>";
							}}?>
							</select>
							<select name="menitmulaimasuk" id="menitmulaimasuk">
							<?php for($i=0;$i<=59;$i++){
							if($i<=9){
							$i="0$i";
							}
							if($i==$fm[1]){
							echo "<option selected=\"selected\">$i</option>";
							}else{
							echo "<option>$i</option>";
							}}?>
							</select>
							&nbsp;s/d&nbsp;
							<select name="jamakhirmasuk" id="jamakhirmasuk">
							<?php for($i=4;$i<=17;$i++){
							if($i<=9){$i="0$i";}
							if($i==$em[0]){
							echo "<option selected=\"selected\">$i</option>";
							}else{
							echo "<option>$i</option>";
							}}?>
							</select>
							<select name="menitakhirmasuk" id="menitakhirmasuk">
							<?php for($i=0;$i<=59;$i++){
							if($i<=9){
							$i="0$i";
							}
							if($i==$em[1]){
							echo "<option selected=\"selected\">$i</option>";
							}else{
							echo "<option>$i</option>";
							}}
							?>
						</select>
						   <br/>
						  <br/>
						</div>
						  <!-- Scan Pulang -->
						<label>Pengaturan Waktu Scan Pulang</label>
						<div class="form-group input-group">
						<br/>
							<select name="jammulaipulang" id="jammulaipulang">
							<?php 
							//Explode dari Jam
							$fp = explode(":",$jammulaipulang);
							$ep = explode(":",$jamakhirpulang);
							?>
							<?php 
							for($i=15;$i<=23;$i++){
							if($i<=9){$i="0$i";}
							if($i==$fp[0]){
							echo "<option selected=\"selected\">$i</option>";
							}else{
							echo "<option>$i</option>";
							}}?>
							</select>
							<select name="menitmulaipulang" id="menitmulaipulang">
							<?php for($i=0;$i<=59;$i++){
							if($i<=9){
							$i="0$i";
							}
							if($i==$fp[1]){
							echo "<option selected=\"selected\">$i</option>";
							}else{
							echo "<option>$i</option>";
							}}?>
							</select>
							&nbsp;s/d&nbsp;
							<select name="jamakhirpulang" id="jamakhirpulang">
							<?php for($i=15;$i<=23;$i++){
							if($i<=9){$i="0$i";}
							if($i==$ep[0]){
							echo "<option selected=\"selected\">$i</option>";
							}else{
							echo "<option>$i</option>";
							}}?>
							</select>
							<select name="menitakhirpulang" id="menitakhirpulang">
							<?php for($i=0;$i<=59;$i++){
							if($i<=9){
							$i="0$i";
							}
							if($i==$ep[1]){
							echo "<option selected=\"selected\">$i</option>";
							}else{
							echo "<option>$i</option>";
							}}
							?>
						   </select>
					      </div>
					    <br/>
					  <input type="submit" name="submit" value="Update" class="btn btn-default" >&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" class="btn btn-default" >
					  </div> <!-- End Div col-lg-6 -->	
					</form>
				<br/>	
			<?php } ?>	
		   <?php } ?>
		 <?php } ?>
		<?php
		if (isset($_GET['op']))
		{
			//Get 'op' untuk Insert Data 
			if ($_GET['op'] == 'savekontak')
			{
			$nama= $_POST['nama'];	
			$nohp = $_POST['nohp'];
			// Masuk
			$jammulaimasuk = $_POST['jammulaimasuk'];
			$menitmulaimasuk = $_POST['menitmulaimasuk'];
			$jamakhirmasuk = $_POST['jamakhirmasuk'];
			$menitakhirmasuk = $_POST['menitakhirmasuk'];
			// Pulang
			$jammulaipulang = $_POST['jammulaipulang'];
			$menitmulaipulang = $_POST['menitmulaipulang'];
			$jamakhirpulang= $_POST['jamakhirpulang'];
			$menitakhirpulang = $_POST['menitakhirpulang'];
			// Gabung
			$jmm = "$_POST[jammulaimasuk]:$_POST[menitmulaimasuk]";
			$jam = "$_POST[jamakhirmasuk]:$_POST[menitakhirmasuk]";
			$jmp= "$_POST[jammulaipulang]:$_POST[menitmulaipulang]";
			$jap = "$_POST[jamakhirpulang]:$_POST[menitakhirpulang]";
			// Query Insert
			$query = "INSERT INTO ftm_setting (nama, nohp , jam_awalmasuk ,jam_akhirmasuk, jam_awalpulang ,jam_akhirpulang) VALUES ('$nama', '$nohp', '$jmm', '$jam', '$jmp' ,'$jap')";	
			$hasil = mysql_query($query);
			if ($hasil) echo "<script>window.alert(' Pengaturan FTM Berhasil di Tambahkan !'); window.location.href='index.php?module=ftm&op=tambah';</script>";
				else echo "<script>window.alert(' Pengaturan FTM Gagal di Tambahkan ! '); window.history.go(-1);</script>";
			}
			
			//Get 'op' untuk Edit Data 			
			if ($_GET['op'] == 'saveedit')
			{
			$id = $_POST['id'];	
			$nama= $_POST['nama'];	
			$nohp = $_POST['nohp'];
			// Masuk
			$jammulaimasuk = $_POST['jammulaimasuk'];
			$menitmulaimasuk = $_POST['menitmulaimasuk'];
			$jamakhirmasuk = $_POST['jamakhirmasuk'];
			$menitakhirmasuk = $_POST['menitakhirmasuk'];
			// Pulang
			$jammulaipulang = $_POST['jammulaipulang'];
			$menitmulaipulang = $_POST['menitmulaipulang'];
			$jamakhirpulang= $_POST['jamakhirpulang'];
			$menitakhirpulang = $_POST['menitakhirpulang'];
			// Gabung
			$jmm = "$_POST[jammulaimasuk]:$_POST[menitmulaimasuk]";
			$jam = "$_POST[jamakhirmasuk]:$_POST[menitakhirmasuk]";
			$jmp= "$_POST[jammulaipulang]:$_POST[menitmulaipulang]";
			$jap = "$_POST[jamakhirpulang]:$_POST[menitakhirpulang]";
			// Query Update
			$queryupdate = "UPDATE ftm_setting SET nama = '$nama' , nohp = '$nohp' , jam_awalmasuk = '$jmm' , jam_akhirmasuk = '$jam' , jam_awalpulang = '$jmp' , jam_akhirpulang = '$jap'  where ftm_settingid = '$id'";	
			$hasilupdate = mysql_query($queryupdate);
			if ($hasilupdate) echo "<script>window.alert(' Pengaturan FTM Berhasil di Update !'); window.location.href='index.php?module=ftm';</script>";
				else echo "<script>window.alert(' Pengaturan FTM Gagal di Update ! '); window.history.go(-1);</script>";
			}
			
		}
		//Get 'op' untuk Hapus Data 
		if (isset($_GET['act'])){			
			if ($_GET['act'] == 'hapus')
			{
			$id = $_GET['id'];	
			$query = "DELETE from ftm_setting where ftm_settingid = '$id'";	
			$hasil = mysql_query($query);
			if ($hasil) echo "<script>window.alert(' Pengaturan FTM Berhasil di Hapus !'); window.history.go(-1);</script>";
				else echo "<script>window.alert(' Pengaturan FTM Gagal di Hapus ! '); window.history.go(-1);</script>";
			}
		}
		?>
	<!-- /.row -->
		      <div class="row">
                <div class="col-lg-12"> 				
				   <br/>
                    <div class="panel panel-default">			
                        <div class="panel-heading">
                            Pengaturan FTM - FINGER GURU
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Penerima </th>
                                             <th class="text-center">No HP</th>
											 <th class="text-center">Waktu Scan Masuk Awal</th>
											 <th class="text-center">Waktu Scan Masuk Akhir</th>
											 <th class="text-center">Waktu Scan Pulang Awal</th>
											 <th class="text-center">Waktu Scan Pulang Akhir</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											<?php
												$no=1;
												$sql2=mysql_query("SELECT * FROM ftm_setting");
												while($datain=mysql_fetch_array($sql2)){
												$nama2 = $datain['nama'];
												$nohp2 = $datain['nohp'];
												$jammulaimasuk2 = $datain['jam_awalmasuk'];
												$jamakhirmasuk2 = $datain['jam_akhirmasuk'];
												$jammulaipulang2 = $datain['jam_awalpulang'];
												$jamakhirpulang2 = $datain['jam_akhirpulang'];
											?> 
											<tr class="odd gradeX">
                                            <td ><?php echo $nama2;  ?></td>
                                            <td ><?php echo $nohp2;  ?></td>
											<td ><?php echo $jammulaimasuk2;  ?></td>
											<td ><?php echo $jamakhirmasuk2;  ?></td>
											<td ><?php echo $jammulaipulang2;  ?></td>
											<td ><?php echo $jamakhirpulang2;  ?></td>								
											<td class="text-center"><a href="index.php?module=ftm&op=edit&id=<?php echo $datain['ftm_settingid'] ?>"><button type="button" class="btn btn-info">Edit</button> <a href="index.php?module=ftm&act=hapus&id=<?php echo $datain['ftm_settingid'] ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Pengaturan FTM ini ?')">Hapus</button></a> </td>
                                          </tr>
										<?php }	?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->