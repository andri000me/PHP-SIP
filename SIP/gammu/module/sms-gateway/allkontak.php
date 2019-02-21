		<?php
			if (isset($_GET['module']))
			{ if ($_GET['module'] == 'allkontak' and $_GET['op'] == 'tambah')
				{	  ?>
				    <div class="row">
					<div class="col-lg-12">
					<h3 class="page-header"><strong> Tambah Kontak </strong></h3>
					</div>
					<!-- /.col-lg-12 -->
					</div>
					
					<!-- Form Input -->
					<form method="post" action="index.php?module=allkontak&op=savekontak">
					<div class="col-lg-6">
					<label>Nama Kontak</label>
						<div class="form-group input-group">
								<input type="text" class="form-control" placeholder="Nama  Kontak di Isi" name="nama">
						</div>
						
					<label>Nomer Kontak</label>
						<div class="form-group input-group">
							<span class="input-group-addon">+62</span>
							<input type="text" class="form-control" placeholder="No Telepon Kontak" name="nohp">
						</div>
						
					<label>Nomer Kontak Tambahan</label>
						<div class="form-group input-group">
							<span class="input-group-addon">+62</span>
							<input type="text" class="form-control" placeholder="No Telepon Kontak" name="nohp2">
						</div>
						
					<label> Pilih Group :</label>
							<select class="form-control" name="group">
							<option value=""> - Pilih Group Kontak - </option>
							<?php
								$query = "SELECT * FROM pbk_groups ORDER BY ID";
								$hasil = mysql_query($query);
								while($data = mysql_fetch_array($hasil))
								{
									echo "<option value=".$data['ID'].">".$data['Name']."&nbsp;&nbsp;&nbsp;(".$data['keterangan'].")&nbsp;</option>";
								}
							?>
							</select>
							
					<label>Keterangan</label>
						<div class="form-group input-group">
								<input type="text" class="form-control" placeholder="Tambahan Keterangan" name="ket">
						</div>
					<br/>
					<input type="submit" name="submit" value="Save Kontak" class="btn btn-default" >&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" class="btn btn-default" >
					</div> <!-- End Div col-lg-6 -->	
					</form>
				
				<?php } else if ($_GET['module'] == 'allkontak' and $_GET['op'] == 'edit') { ?>	
				
				<div class="row">
				<div class="col-lg-12">
				<h3 class="page-header"><strong> Edit Kontak </strong></h3>
				</div>
				<!-- /.col-lg-12 -->
				</div>
			
				<?php
				$no=1;
				$sql=mysql_query("SELECT * FROM pbk Where ID = '$_GET[id]'");
				while($data=mysql_fetch_array($sql)){
				$ID = $_GET['id'];
				$nama = $data['Name'];
				$nohp = $data['Number'];
				$nohp2 = $data['Number_2'];
				$group = $data['GroupID'];
				$ket = $data['Keterangan'];
				?> 
				
				<!-- Form Edit -->
				<form method="post" action="index.php?module=allkontak&op=saveedit">
					<div class="col-lg-6">
					<label>Nama Kontak</label>
						<div class="form-group input-group">
								<input type="text" class="form-control" placeholder="Nama  Kontak di Isi" name="nama" value="<?php echo $nama; ?>">
								<input type="text" name="ID" value="<?php echo $ID; ?>" hidden="hidden">
						</div>
						
					<label>Nomer Kontak</label>
						<div class="form-group input-group">
							<span class="input-group-addon">+62</span>
							<input type="text" class="form-control" placeholder="No Telepon Kontak" name="nohp" value="<?php echo $nohp; ?>">
						</div>
						
					<label>Nomer Kontak Tambahan</label>
						<div class="form-group input-group">
							<span class="input-group-addon">+62</span>
							<input type="text" class="form-control" placeholder="No Telepon Kontak" name="nohp2" value="<?php echo $nohp2; ?>">
						</div>
					
					<label> Pilih Group :</label>
							<select class="form-control" name="group">
							<option value=""> - Pilih Group Kontak - </option>
							<?php
								$query = "SELECT * FROM pbk_groups where ID = '$group' ORDER BY ID";
								$hasil = mysql_query($query);
								while($data = mysql_fetch_array($hasil))
								{
									echo "<option value=".$data['ID']." selected>".$data['Name']."&nbsp;&nbsp;&nbsp;(".$data['keterangan'].")&nbsp;</option>";
								}
							?>
							<!-- Break Down Normal -->
							<?php
								$query2 = "SELECT * FROM pbk_groups ORDER BY ID";
								$hasil2 = mysql_query($query2);
								while($data2 = mysql_fetch_array($hasil2))
								{
									echo "<option value=".$data2['ID'].">".$data2['Name']."&nbsp;&nbsp;&nbsp;(".$data2['keterangan'].")&nbsp;</option>";
								}
							?>
							</select>
							
						<label>Keterangan</label>
						<div class="form-group input-group">
								<input type="text" class="form-control" placeholder="Tambahan Keterangan" name="ket" value="<?php echo $ket; ?>">
						</div>
					<br/>
					<input type="submit" name="submit" value="Update Kontak" class="btn btn-default" >&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" class="btn btn-default" >
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
			$nohp2 = $_POST['nohp2'];
			$group = $_POST['group'];
			$ket = $_POST['ket'];
			$query = "INSERT INTO pbk (Name, Number ,Number_2 ,GroupID,keterangan) VALUES ('$nama', '$nohp','$nohp2','$group','$ket')";	
			$hasil = mysql_query($query);
			if ($hasil) echo "<script>window.alert(' Kontak Berhasil di Tambahkan !'); window.location.href='index.php?module=allkontak&op=tambah';</script>";
				else echo "<script>window.alert(' Kontak Gagal di Tambahkan ! '); window.history.go(-1);</script>";
			}
			//Get 'op' untuk Edit Data 			
			if ($_GET['op'] == 'saveedit')
			{
			$ID = $_POST['ID'];
			$nama= $_POST['nama'];	
			$nohp = $_POST['nohp'];
			$nohp2 = $_POST['nohp2'];
			$group = $_POST['group'];
			$ket = $_POST['ket'];
			$queryupdate = "UPDATE pbk SET Name = '$nama' , Number = '$nohp' , Number_2 = '$nohp2' , GroupID = '$group' , keterangan = '$ket' where ID = '$ID'";	
			$hasilupdate = mysql_query($queryupdate);
			if ($hasilupdate) echo "<script>window.alert(' Kontak Berhasil di Update !'); window.location.href='index.php?module=allkontak&op=tambah';</script>";
				else echo "<script>window.alert(' Kontak Gagal di Update ! '); window.history.go(-1);</script>";
			}
			
		}
		//Get 'op' untuk Hapus Data 
		if (isset($_GET['act'])){			
			if ($_GET['act'] == 'hapus')
			{
			$ID = $_GET['id'];	
			$query = "DELETE from pbk where ID = '$ID'";	
			$hasil = mysql_query($query);
			if ($hasil) echo "<script>window.alert(' Kontak Berhasil di Hapus !'); window.history.go(-1);</script>";
				else echo "<script>window.alert(' Kontak Gagal di Hapus ! '); window.history.go(-1);</script>";
			}
		}
		?>
	<!-- /.row -->
	 <div class="row">
		<div class="col-lg-6" style = "margin-top:350px">
		<!-- Filter Berdasarkan Group -->
			<label> Filter Group :</label>
			  <form method="POST" action="index.php?module=allkontak&op=group">
				 <select class="form-control" name="group" onChange="this.form.submit()">
					<option value=""> - Pilih Group Kontak - </option>
						<?php
							$query = "SELECT * FROM pbk_groups ORDER BY ID";
							$hasil = mysql_query($query);
							while($data = mysql_fetch_array($hasil))
							{
								echo "<option value=".$data['ID'].">".$data['Name']."&nbsp;&nbsp;&nbsp;(".$data['keterangan'].")&nbsp;</option>";
							}
						?>
					</select>
				</div>
			  </div>
			  
			<?php 
			
			//Get 'op' untuk Group		
			if ($_GET['op'] == 'group')
			{
			//Variable POST group
				$group = $_POST['group'];
			?>
			 
            <div class="row">
                <div class="col-lg-12"> 				
				   <br/>
                    <div class="panel panel-default">			
                        <div class="panel-heading">
                            Data Kontak
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama </th>
                                             <th class="text-center">No Telepon</th>
											 <th class="text-center">No Telepon(Tambahan)</th>
											 <th class="text-center">Group</th>
											 <th class="text-center">Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											<?php
												$no=1;
												$sql=mysql_query("SELECT * FROM pbk Where GroupID = '$group' "); // Menampilkan Berdasarkan GroupID
												while($datain=mysql_fetch_array($sql)){
												$nama= $datain['Name'];
												$nohp = $datain['Number'];
												$nohp2 = $datain['Number_2'];
												$ket = $datain['keterangan'];
												$group = $datain['GroupID'];
											?> 
											<tr class="odd gradeX">
                                            <td ><?php echo $nama;  ?></td>
                                            <td ><?php echo $nohp;  ?></td>
											<td ><?php echo $nohp2;  ?></td>
											<?php
											$query2 = "SELECT * FROM pbk_groups where ID = '$group' ORDER BY ID";
											$hasil2 = mysql_query($query2);
											while($data2 = mysql_fetch_array($hasil2))
											{ ?>
											 <td ><?php echo $data2['Name'];  ?></td>
											<?php } ?>		
											 <td ><?php echo $ket;  ?></td>											
											<td class="text-center"><a href="index.php?module=allkontak&op=edit&id=<?php echo $datain['ID'] ?>"><button type="button" class="btn btn-info">Edit</button> <a href="index.php?module=allkontak&act=hapus&id=<?php echo $datain['ID'] ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data ini ?')">Hapus</button></a></td>
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
			
		<?php } /* Jika <> group */ else { ?>
	
		<div class="row">
                <div class="col-lg-12"> 				
				   <br/>
                    <div class="panel panel-default">			
                        <div class="panel-heading">
                            Data Kontak
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama </th>
                                             <th class="text-center">No Telepon</th>
											 <th class="text-center">No Telepon(Tambahan)</th>
											 <th class="text-center">Group</th>
											 <th class="text-center">Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											<?php
												$no=1;
												$sql=mysql_query("SELECT * FROM pbk ORDER BY ID DESC");
												while($datain=mysql_fetch_array($sql)){
												$nama= $datain['Name'];
												$nohp = $datain['Number'];
												$nohp2 = $datain['Number_2'];
												$ket = $datain['keterangan'];
												$group = $datain['GroupID'];
											?> 
											<tr class="odd gradeX">
                                            <td ><?php echo $nama;  ?></td>
                                            <td ><?php echo $nohp;  ?></td>
											<td ><?php echo $nohp2;  ?></td>
											<?php
											$query2 = "SELECT * FROM pbk_groups where ID = '$group' ORDER BY ID";
											$hasil2 = mysql_query($query2);
											while($data2 = mysql_fetch_array($hasil2))
											{ ?>
											 <td ><?php echo $data2['Name'];  ?></td>
											<?php } ?>		
											 <td ><?php echo $ket;  ?></td>											
											<td class="text-center"><a href="index.php?module=allkontak&op=edit&id=<?php echo $datain['ID'] ?>"><button type="button" class="btn btn-info">Edit</button> <a href="index.php?module=allkontak&act=hapus&id=<?php echo $datain['ID'] ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data ini ?')">Hapus</button></a></td>
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
			
		<?php } // End Of if op = group ?>