<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">Share Materi</h3></div>
<div class="panel-body">

<?php if($_SESSION["guru"]) { ?>
<div class="hver row">
	<a style="float:left; padding-left:15px; font-size:12px;" href="?p=uploadpopup#popup1"><img width="30" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgrpgIxj554_GkiQJ_H1Vf2675yX15CcpAmtRFo1lz6INswMgXyw"/> UPLOAD MATERI</a>
   
<?php 
$filter="";

if(isset($_GET['id'])){
	$filter="AND sh_materi.id_mapel='$_GET[id]'";
}
?>
</div><br/>
<div class="row">
    <div class="col-sm-12">
	<div class="panel panel-default">
        <div class="table-responsive">
		<table class="table" style="font-size:14px;"  id="results">
			<tr class="info">
				<th><strong>No</strong></th>
				<th><strong>Judul Materi</strong></th>
				<th><strong>Tgl.Upload</strong></th>
				<th><strong>Mata Pelajaran</strong></th>
				<th><strong>Deskripsi</strong></th>
                <th><strong>Kelas</strong></th>
				<th width="35"><strong></strong></th>
				<th width="35"><strong></strong></th>
			</tr>
			<?php
			$no=1;
			$materiku=mysql_query("SELECT sh_materi.*,sh_kelas.nama_kelas,sh_mapel_guru.nama_mapel FROM sh_materi JOIN sh_kelas ON sh_materi.kelas=sh_kelas.id_kelas JOIN sh_mapel_guru ON sh_mapel_guru.id_mapel_guru = sh_materi.id_mapel WHERE nip ='$_SESSION[guru]' $filter");
			$hitung=mysql_num_rows($materiku);
			
			if ($hitung > 0){
			while ($data=mysql_fetch_array($materiku)){
			?>
			<tr>
				<td width="30"><?php echo $no?></td>
				<td><b><?php echo $data[judul_materi]?></b></td>
				<td><?php echo IndonesiaTgl($data[tanggal_upload])?></td>
				<td><?php echo $data[nama_mapel]?></td>
				<td><?php echo $data[deskripsi_materi]?></td>
				<td><?php echo $data[nama_kelas]?></td>
				<td><a href="<?php echo "download.php?id=$data[id_materi]";?>"><img title="Download" width="30" src="css/img/upoload.png" /></a></td>
			<td><a href="proses.php?pilih=guru&untukdi=hapus&id=<?php echo "$data[id_materi]";?>" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS MATERI INI ... ?')"><img title="Hapus" width="28" src="css/img/delete.jpg"/></a></td>
			</tr>
			<?php $no++;} }
			else { ?>
			<tr><td colspan="5"><b>Belum ada materi yang diupload</b></td></tr>
			<?php } ?>
		</table>
     </div>
	</div>
  </div>
</div>
<?php } ?>	

<?php if($_SESSION["siswa"]) { ?>

<div class="row">
    <div class="col-sm-12">
	<div class="panel panel-default">
        <div class="table-responsive">
		<table class="table" style="font-size:14px;"  id="results">
			<tr class="info">
				<th><strong>No</strong></th>
				<th><strong>Judul Materi</strong></th>
				<th><strong>Tgl.Upload</strong></th>
				<th><strong>Mata Pelajaran</strong></th>
				<th><strong>Deskripsi</strong></th>
				<th width="35"><strong></strong></th>
				<th width="35"><strong></strong></th>
			</tr>
			<?php
			$no=1;
			$materiku=mysql_query("SELECT * FROM sh_materi , sh_mapel_guru WHERE sh_materi.id_mapel = sh_mapel_guru.id_mapel_guru AND kelas = '$_GET[kelas]' and sh_materi.id_mapel = '$_GET[id]'");
			$hitung=mysql_num_rows($materiku);
			
			if ($hitung > 0){
			while ($data=mysql_fetch_array($materiku)){
			?>
			<tr>
				<td width="30"><?php echo $no?></td>
				<td><b><?php echo $data[judul_materi]?></b></td>
				<td><?php echo IndonesiaTgl($data[tanggal_upload])?></td>
				<td><?php echo $data[nama_mapel]?></td>
				<td><?php echo $data[deskripsi_materi]?></td>
				<td><a href="<?php echo "download.php?id=$data[id_materi]";?>"><img title="Download" width="30" src="css/img/upoload.png" /></a></td>
			<td><a href="proses.php?pilih=guru&untukdi=hapus&id=<?php echo "$data[id_materi]";?>" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS MATERI INI ... ?')"><img title="Hapus" width="28" src="css/img/delete.jpg"/></a></td>
			</tr>
			<?php $no++;} }
			else { ?>
			<tr><td colspan="5"><b>Belum ada materi yang diupload</b></td></tr>
			<?php } ?>
		</table>
      </div>
	</div>
  </div>
</div>
<?php } ?>	


	<div id="pageNavPosition"></div>
    </div><!--Panel body-->
</div><!--Panel-->
    
	   <script type="text/javascript"><!--
        var pager = new Pager('results', 10); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
	
