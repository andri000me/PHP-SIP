<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">Materi Berdasarkan Mata Pelajaran</h3></div>
<div class="panel-body">
    <div class="table-responsive panel panel-default">
		<table id="results" class="table" cellpadding="1" cellspacing ="1" style="font-size:13px;">
			<tr class="info">
				<th><strong>No</strong></th>
				<th><strong>Mata Pelajaran</strong></th>
				<th><strong>Jml.Materi</strong></th>
			</tr>
			<?php if($_SESSION["guru"]) { ?>
			<?php
			$no=1;
			$mapel=mysql_query("SELECT * FROM  sh_mapel_guru,sh_guru_staff WHERE sh_guru_staff.id_gurustaff=sh_mapel_guru.id_gurustaff AND nip='$_SESSION[guru]'");
			while($data=mysql_fetch_array($mapel)){
			?>
			<tr>
				<td class="garis" width="30"><?php echo $no?></td>
				<td class="garis"><b><a href="<?php echo "?p=upload&id=$data[id_mapel_guru]";?>"><?php echo $data[nama_mapel]?></a></b></td>
				<td class="garis">
				<?php
				$hitungmateri=mysql_query("SELECT * FROM sh_materi WHERE id_mapel='$data[id_mapel_guru]'");
				$totalmateri=mysql_num_rows($hitungmateri);
				echo $totalmateri
				?>
				&nbsp; File
				</td>
			</tr>
			<?php $no++; } ?>
		  <?php } ?>
		  
		  <?php if($_SESSION["siswa"]) { ?>
			<?php
			$no=1;
			$mapel=mysql_query("SELECT * FROM  sh_mapel , sh_mapel_guru , sh_kelas , sh_siswa WHERE sh_siswa.id_kelas = sh_kelas.id_kelas 
								AND sh_mapel_guru.id_mapel = sh_mapel.id_mapel
								AND sh_mapel.tingkat = sh_kelas.tingkat
								AND sh_siswa.nis = '$_SESSION[siswa]'");
			while($data=mysql_fetch_array($mapel)){
			?>
			<tr>
				<td class="garis" width="30"><?php echo $no?></td>
				<td class="garis"><b><a href="<?php echo "?p=upload&id=$data[id_mapel_guru]&kelas=$data[id_kelas]";?>"><?php echo $data["nama_mapel"]?></a></b></td>
				<td class="garis">
				<?php
				$hitungmateri=mysql_query("SELECT * FROM sh_materi WHERE kelas = '$data[id_kelas]' and id_mapel = '$data[id_mapel_guru]'");
				$totalmateri=mysql_num_rows($hitungmateri);
				echo $totalmateri
				?>
				&nbsp; File
				</td>
			</tr>
			<?php $no++; } ?>
		  <?php } ?>
		  
		</table>
    </div>    
		<div id="pageNavPosition"></div>
    </div><!--Panel body-->
</div><!--Panel-->

	<script type="text/javascript"><!--
        var pager = new Pager('results', 10); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>