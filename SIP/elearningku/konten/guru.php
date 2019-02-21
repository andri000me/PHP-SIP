<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">Daftar Semua Guru</h3></div>
<div class="panel-body">
<?php if($_SESSION['guru'] OR $_SESSION['siswa']){ ?>
<div class="table-responsive panel panel-default">
		<table id="results" class="table" style="font-size:13px;">
			<tr class="info">
				<th><strong>No</strong></th>
				<th><strong>Nama Guru</strong></th>
				<th><strong>Mengajar</strong></th>
			</tr>
			<?php
			$no=1;
			$dirguru=mysql_query("SELECT * FROM sh_guru_staff WHERE sh_guru_staff.posisi='guru' ORDER BY sh_guru_staff.nama_gurustaff");
			while ($dg=mysql_fetch_array($dirguru)){
			?>
			<tr>
                <td><?php echo $no?></td>
				<td><a href="<?php echo "?p=pguru&nip=$dg[nip]";?>"title="profil guru"><b><?php echo $dg[nama_gurustaff]?></b></a></td>
				<td><?php
				$profilsay=mysql_query("SELECT * FROM  sh_mapel_guru WHERE id_gurustaff='$dg[id_gurustaff]'");
				while($p=mysql_fetch_array($profilsay)){ echo "$p[nama_mapel]</br>";} ?></font></td>
			</tr>
			
		<?php $no++; } ?>
		
		
		</table>
  </div>
		<div id="pageNavPosition"></div>
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 10); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>

<?php } ELSE {?>
<div class="table-responsive">

<!--<center><h3 align="center" style="color: #2980b9">Materi Berdasarkan Guru</h3></center>-->
		<table id="results" class="table table-bordered">
			<tr>
				<th><strong>No</strong></th>
				<th><strong>Nama Guru</strong></th>
				<th><strong>Mengajar</strong></th>
				<th></th>
			</tr>
			<?php
			$no=1;
			$dirguru=mysql_query("SELECT * FROM sh_guru_staff WHERE sh_guru_staff.posisi='guru' ORDER BY sh_guru_staff.nama_gurustaff");
			while ($dg=mysql_fetch_array($dirguru)){
			?>
			<tr>
				<td width="30"><?php echo $no?></td>
				<td align="left"><a href="<?php echo "?p=pguru&nip=$dg[nip]";?>" title="profil guru"><b><?php echo $dg[nama_gurustaff]?></b></a></td>
				<td><font style="color: #2980b9"><?php
				$profilsay=mysql_query("SELECT * FROM  sh_mapel_guru WHERE id_gurustaff='$dg[id_gurustaff]'");
				while($p=mysql_fetch_array($profilsay)){ echo "$p[nama_mapel]</br>";} ?></font></td>
				<td><a href="?p=kirimpesan&id=<?php echo $dg['id_gurustaff']?>"><img style="margin-top:-5px; float:left;" class="img-responsive" width="30" src="images/pesan.png"/>Kirim Pesan</a></td>
			</tr>
			
		<?php $no++; } ?>
		
		
		</table>
  </div>
		<div id="pageNavPosition"></div>
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 10); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>

	<?php } ?>
 </div>
 </div>