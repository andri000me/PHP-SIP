<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">Profil Guru</h3></div>
<div class="panel-body">

<?php
$profilguru=mysql_query("SELECT * FROM sh_guru_staff, sh_mapel_guru WHERE sh_guru_staff.id_gurustaff=sh_mapel_guru.id_gurustaff AND nip='$_GET[nip]'");
$data=mysql_fetch_array($profilguru);
?>
<div class="row">
 <div class="col-sm-2">
	<div class="text-left">	
		<div class="panel panel-info"><img src="../images/foto/guru/<?php echo $data[foto]?>" class="img-thumbnail"/></div>
		<?php if($_SESSION['orangtua']){?><a href="?p=kirimpesan&id=<?php echo $data['id_gurustaff']?>" class="btn btn-info">Kirim Pesan</a><?php }?>
    </div>
 </div>
 
 <div class="col-sm-10 text-left">   
    
  <div class="table-responsive">
    <table class="table">
    
    <tr>
		<td><b>Nama</b></td>
        <td><b>:</b></td>
        <td><?php echo $data[nama_gurustaff]?></td>
    </tr>
    <tr>
        <td><b>Mengajar</b></td>
        <td><b>:</b></td>
        <td><?php echo $data[nama_mapel]?></td>
    </tr>
	<tr>
        <td><b>Alamat</b></td>
        <td><b>:</b></td>
        <td><?php echo $data[alamat]?></td>
    </tr>
	<tr>
        <td><b>Telp/ HP</b></td>
        <td><b>:</b></td>
        <td><?php echo $data[telepon]?></td>
    </tr>	
	<tr>
        <td><b>Email</b></td>
        <td><b>:</b></td>
        <td><?php echo $data[email]?></td>
    </tr>
	<tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
	    
    </table>
  </div>

      
 </div>
 </div>	
</div>
</div>		
				<div id="pageNavPosition"></div>
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 10); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>