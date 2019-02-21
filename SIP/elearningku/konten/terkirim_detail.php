<?php if($_SESSION['guru']){?>
<div class="panel panel-primary">
<div class="panel-heading">Detail Pesan Terkiri</div>
<div class="panel-body">
<?php if($_GET['id']){
	$sInbox=mysql_query("SELECT sh_pesan.*,sh_ortu.*,sh_guru_staff.*
						FROM sh_pesan JOIN sh_ortu ON sh_pesan.penerima=sh_ortu.id_ortu
						JOIN sh_guru_staff ON sh_pesan.pengirim=sh_guru_staff.nip
						WHERE sh_pesan.id_pesan='$_GET[id]' ORDER BY id_pesan DESC")or die("ERROR".mysql_error());
	$rInbox=mysql_num_rows($sInbox);
	$no=1;
		while($inbox=mysql_fetch_array($sInbox)){?>
			<p class="text-success text-left" style="padding:10px;"><i>
				Dari : <?php echo $inbox['nama_gurustaff']?><br/>
				Kepada : <?php echo $inbox['nama_ortu']?><br/>
				Tanggal : <?php echo $inbox['tanggal_pesan']?></i>
			</p><hr/>
			<p class="text-left alert alert-default">
				<?php echo $inbox['isi_pesan'];?>
			</p>
<?php }}?>
</div>
</div>
<?php }?>


<?php if($_SESSION['orangtua']){?>
<div class="panel panel-primary">
<div class="panel-heading">Detail Pesan Terkirim</div>
<div class="panel-body">
<?php if($_GET['id']){
	$sInbox=mysql_query("SELECT sh_pesan.*,sh_ortu.*,sh_guru_staff.*
						FROM sh_pesan JOIN sh_ortu ON sh_pesan.pengirim=sh_ortu.id_ortu
						JOIN sh_guru_staff ON sh_pesan.penerima=sh_guru_staff.nip
						WHERE sh_pesan.id_pesan='$_GET[id]' ORDER BY id_pesan DESC")or die("ERROR".mysql_error());
	$rInbox=mysql_num_rows($sInbox);
	$no=1;
		while($inbox=mysql_fetch_array($sInbox)){?>
			<p class="text-success text-left" style="padding:10px;"><i>
				Dari : <?php echo $inbox['nama_ortu']?><br/>
				Kepada : <?php echo $inbox['nama_gurustaff']?><br/>
				Tanggal : <?php echo $inbox['tanggal_pesan']?></i>
			</p><hr/>
			<p class="text-left alert alert-default">
				<?php echo $inbox['isi_pesan'];?>
			</p>
<?php }}?>
</div>
</div>
<?php }?>