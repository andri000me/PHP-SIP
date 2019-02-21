<div class="panel panel-default">
<div class="panel-heading"  style="background: #5bc0de;"><h3 class="panel-title">Pencarian Materi Pelajaran</h3></div>
<div class="panel-body">
<p style="color: #2980b9">*) Tips : Klik pada judul materi untuk download</p>

<div class="row">
<form method="POST" action="?p=pencarian" class="form-horizontal">
<div class="col-sm-3"><input type="text" name="cari" class="form-control"/></div>
<div class="col-md-1"><input type="submit" class="btn btn-md btn-primary" value="Cari"/></div>
</form>
</div>
<br />
<div class="table-responsive">
    <table class="table" id="results">
			<tr>
                <td><strong>No</strong></td>
				<td><strong>Judul Materi</strong></td>
				<td><strong>Mata Pelajaran</strong></td>
				<td><strong>Kelas</strong></td>
				<td><strong>Guru Pengajar</strong></td>
				<td><strong>Tgl. Upload</strong></td>
			</tr>
			<?php
			$no=1;
			$semua=mysql_query("SELECT sh_materi.download, sh_materi.judul_materi, sh_mapel.nama_mapel, sh_kelas.nama_kelas, sh_guru_staff.nama_gurustaff, sh_materi.tanggal_upload
									FROM sh_kelas, sh_jadwal, sh_materi, sh_mapel, sh_guru_staff
									WHERE sh_materi.id_mapel = sh_mapel.id_mapel
									AND sh_mapel.id_mapel = sh_jadwal.id_mapel
									AND sh_guru_staff.id_gurustaff = sh_jadwal.id_gurustaff
									AND sh_kelas.id_kelas = sh_jadwal.id_kelas
									AND sh_materi.nip = sh_guru_staff.nip
									AND sh_guru_staff.nip ='$_SESSION[guru]'  
									ORDER BY id_materi DESC");
			$hitung=mysql_num_rows($semua);
			
			if ($hitung > 0){
			while($sm=mysql_fetch_array($semua)){
			?>
			<tr><td><?php echo $no?></td>
				<td><b><a href="<?php echo "download.php?id=$data[id_materi]";?>"><?php echo $sm[judul_materi]?></a>&nbsp(<?php echo $sm[download]?>)</b></td>
				<td><a href="<?php echo "?p=mmapel&id=$sm[id_mapel]";?>"><?php echo $sm[nama_mapel]?></a></td>
				<td><a href="<?php echo "?p=mmapel&id=$sm[nama_kelas]";?>"><?php echo $sm[nama_kelas]?></a></td>	
				<td><i><a href="<?php echo "?p=pguru&nip=$sm[nip]";?>"><?php echo $sm[nama_gurustaff]?></a></i></td>
				<td><?php echo $sm[tanggal_upload]?></td>
				
			</tr>
			<?php $no++;  }}
			else {?>
			<tr><td colspan="5"><b>Belum ada materi yang diupload</b></td></tr>
			<?php } ?>
		</table>
</div>		
				<div id="pageNavPosition"></div>
</div><!--panel body-->
</div><!--panel panel-default-->

			    <script type="text/javascript"><!--
        var pager = new Pager('results', 10); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>