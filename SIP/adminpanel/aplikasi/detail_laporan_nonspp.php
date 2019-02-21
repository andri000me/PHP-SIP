<h3>LAPORAN NON SPP</h3>
<div class="isikanan"><!--Awal class isi kanan-->

	<div class="judulisikanan">
			<div class="menuhorisontal"><a href="spp.php">Master</a></div>
			<div class="menuhorisontal"><a href="spp_transaksi.php">Transaksi</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="spp_laporan.php">Laporan</a></div>
            
           
		</div>	
		<br/><br/><br/>
		<h2>&nbsp;&nbspDETAIL TANGGAL PEMBAYARAN</h2>
	
		
		
		
		<?php
		$sql = "SELECT * FROM sh_siswa WHERE nis = '$_GET[nid]'";
		$query = mysql_query($sql)or die("ERROR SQL DATABASE".mysql_error());
	    $data = mysql_fetch_array($query)
		?>
		<div class="ataskanan" style="float:left;">
		<b>&nbsp;&nbsp&nbsp;&nbspATAS NAMA</b>
		<table width="20px" align="left">
		<tr>         
           <td><b> Nama</td>
		   <td> :&nbsp;&nbsp;</b><?php echo $data['nama_siswa']?></td>
        </tr>
		<tr>
		   <td><b> Nis</td>
		   <td>:&nbsp;&nbsp;</b><?php echo $data['nis']?></td>
        </tr> 
        </table>
		</div>
				  <table class="tabel">
                      <tr>
                        <th class="tabel">No</th>
                        <th class="tabel" align="left">Tanggal</th>
                        <th class="tabel" align="left">Biaya</th>
                      </tr>
		
		         <?php $sql = "SELECT * FROM sh_byrnonspp WHERE nis = '$_GET[nid]' ORDER BY tgl_bayar";
                  $query = mysql_query($sql)or die("ERROR SQL DATABASE".mysql_error());
                  $no=1;
                  while($data = mysql_fetch_array($query)){?>
                      <tr>
                        <td class="tabel" align="left"><?php echo $no++?></td>
                        <td class="tabel" align="left"><?php echo $data['tgl_bayar']?></td>
                        <td class="tabel" align="left"><?php echo $data['jumlah']?></td>
                      </tr>
                 <?php }?>

                    </table>