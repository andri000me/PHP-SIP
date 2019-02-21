					<div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong> Pesan Terkirim </strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Pesan Terkirim
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="30%">Pesan SMS</th>
                                            <th class="text-center">Penerima</th>
                                            <th class="text-center">Waktu</th>
											<th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											$no=1;
											$sql=mysql_query("SELECT * FROM sentitems ORDER BY SendingDateTime DESC");
											while($dataouts =mysql_fetch_array($sql)){
												$ID = $dataouts['ID'];
												$textouts = $dataouts['TextDecoded'];
												$nohpouts = $dataouts['DestinationNumber'];
												$timeouts = $dataouts['SendingDateTime'];
												$statusouts = $dataouts['Status'];
												// Ambil data No 11 Angka Terakhir
												$hpfilter = substr($nohpouts,-11);

										?>  
										    <tr class="odd gradeX">
                                            <td ><?php echo $textouts;  ?></td>
											<?php $sql2=mysql_query("SELECT * FROM pbk Where Number = '$hpfilter'");
												  $cek=mysql_num_rows($sql2);
												  if($cek > 0){
												  while($datain2=mysql_fetch_array($sql2)){ 
												  $nama = $datain2['Name'];
												  $ket = $datain2['keterangan']; ?>
                                            <td > <?php echo $nama ."<br>". $ket;  ?> </td>
											<?php } // End Of While
											   } else { ?>
											<td ><?php echo $nohpouts;  ?></td>  
											<?php } ?>
                                            <td ><?php echo $timeouts;  ?></td>
											<td ><?php echo $statusouts;?></td>

                                        <td class="text-center"><a href="index.php?module=teruskan&id=<?php echo $ID; ?>"><button type="button" class="btn btn-info"> Teruskan </button> <a href="index.php?module=pesanterkirim&act=hapus&id=<?php echo $ID; ?>"><button type="button" class="btn btn-danger">Hapus</button></a></td>

                                        </tr>
										<?php
										} // End Of While
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
			
	<?php
		//Get 'op' untuk Hapus Data 
		if (isset($_GET['act'])){			
			if ($_GET['act'] == 'hapus')
			{
			$ID = $_GET['id'];	
			$query = "DELETE from sentitems where ID = '$ID'";	
			$hasil = mysql_query($query);
			if ($hasil) echo "<script>window.alert('Pesan Terkirim Berhasil di Hapus !'); window.history.go(-1);</script>";
				else echo "<script>window.alert('Pesan Terkirim Gagal di Hapus ! '); window.history.go(-1);</script>";
			}
		}
	?>