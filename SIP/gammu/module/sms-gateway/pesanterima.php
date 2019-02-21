					<div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong> Kotak Masuk </strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Pesan Masuk
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="50%">Pesan SMS</th>
                                            <th class="text-center">Pengirim</th>
                                            <th class="text-center">Waktu</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											<?php
												$no=1;
												$sql=mysql_query("SELECT * FROM inbox ORDER BY `inbox`.`ReceivingDateTime` DESC");
												while($datain=mysql_fetch_array($sql)){
												$ID = $datain['ID'];
												$text = $datain['TextDecoded'];
												$nohp = $datain['SenderNumber'];
												$time = $datain['ReceivingDateTime'];
												// Ambil data No 11 Angka Terakhir
												$hpfilter = substr($nohp,-11);
											?> 
											<tr class="odd gradeX">
                                            <td ><?php echo $text;  ?></td>
											<?php $sql2=mysql_query("SELECT * FROM pbk Where Number = '$hpfilter'");
												  $cek=mysql_num_rows($sql2);
												  if($cek > 0){
												  while($datain2=mysql_fetch_array($sql2)){ 
												  $nama = $datain2['Name'];
												  $ket = $datain2['keterangan']; ?>
                                            <td > <?php echo $nama ."<br>". $ket;  ?> </td>
											<?php } // End Of While
											   } else { ?>
											<td ><?php echo $nohp;  ?></td>  
											<?php } ?>
                                            <td ><?php echo $time;  ?></td>
                                        <td class="text-center"><a href="index.php?module=balas&id=<?php echo $ID; ?>&pengirim=<?php echo $nama; ?>"><button type="button" class="btn btn-info">Balas</button> <a href="index.php?module=pesanmasuk&act=hapus&id=<?php echo $ID; ?>"><button type="button" class="btn btn-danger">Hapus</button></a></td>
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
	<?php
		//Get 'op' untuk Hapus Data 
		if (isset($_GET['act'])){			
			if ($_GET['act'] == 'hapus')
			{
			$ID = $_GET['id'];	
			$query = "DELETE from inbox where ID = '$ID'";	
			$hasil = mysql_query($query);
			if ($hasil) echo "<script>window.alert('Inbox Berhasil di Hapus !'); window.history.go(-1);</script>";
				else echo "<script>window.alert('Inbox Gagal di Hapus ! '); window.history.go(-1);</script>";
			}
		}
	?>