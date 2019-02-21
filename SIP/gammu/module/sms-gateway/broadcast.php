    <div class="row">
       <div class="col-lg-12">
          <h3 class="page-header"><strong> Pesan BroadCast </strong></h3>
        </div>
            <!-- /.col-lg-12 -->
      </div>
			
	<form method="post" action="index.php?module=broadcast&op=send">
		
		<div class="col-lg-6">
			<label> Pilih Group :</label>
			<select class="form-control" name="group">
			<option value=""> - Pilih Group Kontak - </option>
			<option value="semua"> Kirim - Semua Group - </option>
				<?php
				$query = "SELECT * FROM pbk_groups ORDER BY ID";
				$hasil = mysql_query($query);
				while($data = mysql_fetch_array($hasil))
				{
					echo "<option value=".$data['ID'].">".$data['Name']."&nbsp;&nbsp;&nbsp;(".$data['keterangan'].")&nbsp;</option>";
				}
				?>
			</select>
			<br/>		
			<label> Dikirim via Modem :</label>
				<select class="form-control" name="modem">
				<?php
					$query = "SELECT ID FROM phones ORDER BY ID";
					$hasil = mysql_query($query);
					while($data = mysql_fetch_array($hasil))
					{
						echo "<option>".$data['ID']."</option>";
					}
				?>
				</select><br/>
				
			 <div class="form-group">
			 <label> Pesan :</label>
				 <textarea class="form-control" placeholder="Masukkan Pesan .." name="pesan" rows="3" onKeyDown="textCounter(this.form.pesan,this.form.countDisplay);" onKeyUp="textCounter(this.form.pesan,this.form.countDisplay);"></textarea>
				 <br/>
				 <div align="right"> <label> <input readonly type="text" name="countDisplay" size="3" maxlength="3" value="160"> Sisa Karakter </label> </div>
		   </div>
				<br/>				
			<div align="right">  <input type="submit" name="submit" value="Kirim SMS" class="btn btn-default" > &nbsp;&nbsp;&nbsp; <input type="reset" name="reset" value="Reset" class="btn btn-default" > </div>
		</div> <!-- End Div col-lg-6 -->	
	</form>
	
	<?php
	
	if (isset($_GET['op']))
	{
		if ($_GET['op'] == 'send')
		{
			include 'functionsis.php';
			$pesan = $_POST['pesan'];
			$group = $_POST['group'];
			
		  if ($group == "semua")
			  {
				// query untuk membaca semua nomor jika yang dipilih 'Semua'
				$query = "SELECT * FROM pbk";
			  }
		  else
			  {
				// query untuk membaca nomor dalam group jika yang dipilih group tertentu
				$query = "SELECT * FROM pbk WHERE GroupID = '$group'";
			  }
	  
	  $hasil = mysql_query($query);
	  while ($data = mysql_fetch_array($hasil))
		  {
			//Data No HP -1
			$nohp = $data['Number'];
			//Data No HP -2
			$nohp2 = $data['Number_2'];
			$nama = $data['Name'];
			//No HP yang dikirim -1
			$nohpnew = "+62$nohp";
			//No HP yang dikirim -2
			$nohpnew2 = "+62$nohp2";
			$modem = $_POST['modem'];
			$pesan = $_POST['pesan'];
			//Filter Karakter Pesan yang dikirim
			$pesan = str_replace("'","\'",$pesan);
			// Proses Kirim SMS ke Number -1
			$querykirim = "INSERT INTO outbox (DestinationNumber, SenderID, TextDecoded, CreatorID) VALUES ('$nohpnew', '$modem', '$pesan', 'Gammu 1.28.90')";
			$hasilkirim = mysql_query($querykirim);
		if($nohp2!="") {
			// Proses Kirim SMS ke Number -2
			$querykirim2 = "INSERT INTO outbox (DestinationNumber, SenderID, TextDecoded, CreatorID) VALUES ('$nohpnew2', '$modem', '$pesan', 'Gammu 1.28.90')";
			$hasilkirim2 = mysql_query($querykirim2);
			}
			if ($hasilkirim || $hasilkirim2) echo "<script>window.alert('Pesan BroadCast Sukses Dikirim !'); window.location='index.php?module=kotakkeluar';</script>";
			else echo "<script>window.alert('Pesan BroadCast Gagal Di Kirim ! '); window.history.go(-1);</script>";
		  }
		}
	  }
	
	?>