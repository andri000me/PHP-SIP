		<?php
			if (isset($_GET['module']))
			{ if ($_GET['module'] == 'groupkontak' and $_GET['op'] == 'tambah')
				{	  ?>
				    <div class="row">
					<div class="col-lg-12">
					<h3 class="page-header"><strong> Tambah Group Kontak </strong></h3>
					</div>
					<!-- /.col-lg-12 -->
					</div>
					
					<!-- Form Input -->
					<form method="post" action="index.php?module=groupkontak&op=savekontak">
					<div class="col-lg-6">
					<label>Nama Group Kontak</label>
						<div class="form-group input-group">
								<input type="text" class="form-control" placeholder="Nama Group Kontak di Isi" name="namagroup">
						</div>
						
						<div class="form-group">
						  <label> Keterangan </label>
							 <textarea class="form-control" placeholder="Keterangan di Isi" name="keterangan" rows="3"></textarea>
						</div>
							<input type="submit" name="submit" value="Save Group" class="btn btn-default" >&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" class="btn btn-default" >
					</div> <!-- End Div col-lg-6 -->	
					</form>
				
				<?php } else if ($_GET['module'] == 'groupkontak' and $_GET['op'] == 'edit') { ?>	
				
				<div class="row">
				<div class="col-lg-12">
				<h3 class="page-header"><strong> Edit Group Kontak </strong></h3>
				</div>
				<!-- /.col-lg-12 -->
				</div>
			
				<?php
				$no=1;
				$sql=mysql_query("SELECT * FROM pbk_groups Where ID = '$_GET[id]'");
				while($data=mysql_fetch_array($sql)){
				$ID = $_GET['id'];
				$namagroup = $data['Name'];
				$keterangan = $data['keterangan'];
				?> 
				
				<!-- Form Edit -->
				<form method="post" action="index.php?module=groupkontak&op=saveedit">
						<div class="col-lg-6">
						<label>Nama Group Kontak</label>
							<div class="form-group input-group">
									<input type="text" class="form-control" placeholder="Nama Group Kontak di Isi" name="namagroup" value="<?php echo $namagroup; ?>">
									<input type="text" name="ID" value="<?php echo $ID; ?>" hidden="hidden">
							</div>
							
							<div class="form-group">
							  <label> Keterangan </label>
								 <textarea class="form-control" placeholder="<?php echo $keterangan; ?>" name="keterangan" rows="3" ></textarea>
							</div>
								<input type="submit" name="submit" value="Update Group" class="btn btn-default" >&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" class="btn btn-default" >
						</div> <!-- End Div col-lg-6 -->	
				</form>
			<?php } ?>	
		   <?php } ?>
		 <?php } ?>
		<?php
		if (isset($_GET['op']))
		{
			//Get 'op' untuk Insert Data 
			if ($_GET['op'] == 'savekontak')
			{
			$namagroup = $_POST['namagroup'];	
			$keterangan = $_POST['keterangan'];
			$query = "INSERT INTO pbk_groups (Name, keterangan) VALUES ('$namagroup', '$keterangan')";	
			$hasil = mysql_query($query);
			if ($hasil) echo "<script>window.alert('Group Kontak Berhasil di Tambahkan !'); window.location.href='index.php?module=groupkontak&op=tambah';</script>";
				else echo "<script>window.alert('Group Kontak Gagal di Tambahkan ! '); window.history.go(-1);</script>";
			}
			//Get 'op' untuk Edit Data 			
			if ($_GET['op'] == 'saveedit')
			{
			$ID = $_POST['ID'];
			$namagroup = $_POST['namagroup'];	
			$keterangan = $_POST['keterangan'];
			$queryupdate = "UPDATE pbk_groups SET Name = '$namagroup' , keterangan = '$keterangan' where ID = '$ID'";	
			$hasilupdate = mysql_query($queryupdate);
			if ($hasilupdate) echo "<script>window.alert('Group Kontak Berhasil di Update !'); window.location.href='index.php?module=groupkontak&op=tambah';</script>";
				else echo "<script>window.alert('Group Kontak Gagal di Update ! '); window.history.go(-1);</script>";
			}
			
		}
		//Get 'op' untuk Hapus Data 
		if (isset($_GET['act'])){			
			if ($_GET['act'] == 'hapus')
			{
			$ID = $_GET['id'];	
			$query = "DELETE from pbk_groups where ID = '$ID'";	
			$hasil = mysql_query($query);
			if ($hasil) echo "<script>window.alert('Group Kontak Berhasil di Hapus !'); window.history.go(-1);</script>";
				else echo "<script>window.alert('Group Kontak Gagal di Hapus ! '); window.history.go(-1);</script>";
			}
		}
		?>
	<!-- /.row -->
            <div class="row">
                <div class="col-lg-12"> <br/>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Group Kontak
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Group</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											<?php
												$no=1;
												$sql=mysql_query("SELECT * FROM pbk_groups ORDER BY ID DESC");
												while($datain=mysql_fetch_array($sql)){
												$namagroup = $datain['Name'];
												$keterangan = $datain['keterangan'];
											?> 
											<tr class="odd gradeX">
                                            <td ><?php echo $namagroup;  ?></td>
                                            <td ><?php echo $keterangan;  ?></td>
											<td class="text-center"><a href="index.php?module=groupkontak&op=edit&id=<?php echo $datain['ID'] ?>"><button type="button" class="btn btn-info">Edit</button> <a href="index.php?module=groupkontak&act=hapus&id=<?php echo $datain['ID'] ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data ini ?')">Hapus</button></a></td>
                                        </tr>
										<?php
										}
										?>
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