    <div class="row">
       <div class="col-lg-12">
          <h3 class="page-header"><strong> Balas Pesan </strong></h3>
        </div>
            <!-- /.col-lg-12 -->
      </div>
			
		<?php 
		// Jika Data GET id tidak sama dengan NULL
		if ($_GET['id'] <> Null)
		{
		// Tangkap Variable ID
		$ID = $_GET['id'];
		$sql=mysql_query("SELECT * FROM inbox Where ID = $ID");
		while($dataouts =mysql_fetch_array($sql)){
		$nohp = $dataouts['SenderNumber'];
		// Ambil data No 11 Angka Terakhir
		$hpfilter = substr($nohp,-11);
		$text = $dataouts['TextDecoded'];
		?>		
			
	<form method="post" action="index.php?module=balas&op=send">
	
	<div class="col-lg-6">
	 <label>Pesan Sebelumnya : </label> <br/>
	  <label>Dari : <?php echo $_GET['pengirim']; ?> </label>
		<div class="form-group">
             <textarea class="form-control" readonly = "readonly" placeholder="Masukkan Pesan .." name="pesansebelum" rows="3" ><?php echo $text; ?></textarea>
        </div>
	  <hr/>
	<label>Nomer Penerima</label>
		<div class="form-group input-group">
            <span class="input-group-addon">+62</span>
                <input type="text" class="form-control" placeholder="No Telepon Penerima" name="nohp" value="<?php echo $hpfilter; ?>">
        </div>

	<?php } } // End Of While ?>	 
		
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
		</select>
		<br/>
		<div class="form-group">
		 <label> Pesan :</label>
          <textarea class="form-control" placeholder="Masukkan Pesan .." name="pesan" rows="3" onKeyDown="textCounter(this.form.pesan,this.form.countDisplay);" onKeyUp="textCounter(this.form.pesan,this.form.countDisplay);"></textarea>
				 <br/>
			<div align="right"> <label> <input readonly type="text" name="countDisplay" size="3" maxlength="3" value="160"> Sisa Karakter </label> </div>
       </div>
	   
	   	<div align="right"> 	<input type="submit" name="submit" value="Kirim SMS" class="btn btn-default" > </div>
	</div> <!-- End Div col-lg-6 -->	

	</form>
	
	<?php
	
	if (isset($_GET['op']))
	{
		if ($_GET['op'] == 'send')
		{
			$nohp = $_POST['nohp'];
			$nohpnew = "+62$nohp";
			$modem = $_POST['modem'];
			$pesan = $_POST['pesan'];
			$query = "INSERT INTO outbox (DestinationNumber, SenderID, TextDecoded, CreatorID) VALUES ('$nohpnew', '$modem', '$pesan', 'Gammu 1.28.90')";
			$hasil = mysql_query($query);
			if ($hasil) echo "<script>window.alert('Pesan Sukses Dikirim !'); window.location='index.php?module=kotakkeluar';</script>";
			else echo "<script>window.alert('Pesan Gagal Di Kirim ! '); window.history.go(-1);</script>";
		}
	}
	
	?>