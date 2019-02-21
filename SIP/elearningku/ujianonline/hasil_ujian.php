<?php
session_start();
include "set/koneksi.php";
?>
<?php 
error_reporting(0);	
//untuk menantukan tanggal awal dan tanggal akhir data di database
$min_tanggal=mysql_fetch_array(mysql_query("select min(tanggal) as min_tanggal from tuser"));
$max_tanggal=mysql_fetch_array(mysql_query("select max(tanggal) as max_tanggal from tuser"));
?>
<html>
<head>
<title>.::Test Online::.</title>

<link rel="stylesheet" type="text/css" href="files/style_admin.css" />
<link rel="stylesheet" type="text/css" href="tabel.css"/>
<link rel="shorcut icon" href="images/images_admin/img_icon.gif" />
<script src="files/jquery.js" type="text/javascript"></script>
<script src="files/sdmenu.js" type="text/javascript"></script>
<script src="tinymce/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="tinymce/jscripts/tiny_mce/tiny_miniw0rm.js" type="text/javascript"></script>

<script type="text/javascript">
	var myMenu;
	window.onload = function() {
	myMenu = new SDMenu("my_menu");
	myMenu.init();
	};
</script>
</head>

<body onLoad="document.postform.elements['nasabah'].focus();">

<div id="main">

<!-- Menu Left -->
<div id="left">
<img src="images/images_admin/bg_admin_banner.png" alt="Aldyfrz" class="aldyfrz" />
<?php include "menu-left.php"; ?> 
</div>


<!-- Right Content -->
<div id="right">

<!-- Header Right -->
<div id="header-content">
<?php include "header.php"; ?>
</div>
<?php
echo"
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Input Nama Siswa & Waktu Ujian
</div>
";
?>
<!-- Content Right -->
<center>
<form action="hasil_ujian.php" method="get" name="postform">
<table width="435" border="0">
<tr>
    <td width="111">Nama Siswa</td>
    <td colspan="2"><input type="text" name="nasabah" value="<?php  if(isset($_GET['nasabah'])){ echo $_GET['nasabah']; }?>"/></td>
</tr>
<tr>
    <td>Tanggal Awal</td>
    <td colspan="2"><input type="text" name="tanggal_awal" size="15" value="<?php  echo $min_tanggal['min_tanggal'];?>"/>
    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
    </td>
</tr>
<tr>
    <td>Tanggal Akhir</td>
    <td colspan="2"><input type="text" name="tanggal_akhir" size="15" value="<?php  echo $max_tanggal['max_tanggal'];?>"/>
    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
    </td>
</tr>
<tr>
    <td><input type="submit" value="Tampilkan Data" name="cari"></td>
    <td colspan="2">&nbsp;</td>
</tr>
</table>
</form>
</center>

<p>

<?php  //di proses jika sudah klik tombol cari
if(isset($_GET['cari'])){
	
	//menangkap nilai form
	$nasabah=$_GET['nasabah'];
	$tanggal_awal=$_GET['tanggal_awal'];
	$tanggal_akhir=$_GET['tanggal_akhir'];
	
	if(empty($nasabah) and empty($tanggal_awal) and empty($tanggal_akhir)){
		//jika tidak menginput apa2
		$query=mysql_query("SELECT tuser.tanggal, tuser.nim, tuser.nama, kelas, tlp,  tjawab.nilai, tjawab1.nilai1, tjawab2.nilai2 FROM tuser INNER JOIN tjawab ON tuser.nim = tjawab.nim INNER JOIN tjawab1 ON tuser.nim = tjawab1.nim INNER JOIN tjawab2 ON tuser.nim = tjawab2.nim");
		
	}else{
		$query=mysql_query("select * from tuser where nama like '%$nasabah%' and tanggal between '$tanggal_awal' and '$tanggal_akhir'");	
		?><i>Jumlah Record : <?php echo mysql_num_rows($query);?><b> Informasi : </b> Pencarian Nama Siswa <b><?php  echo ucwords($nasabah);?></b> dari tanggal <b><?php  echo $tanggal_awal;?></b> sampai dengan tanggal <b><?php  echo $tanggal_akhir; ?></b></i><?php  

	}

}else{
	$query=mysql_query("select * from tuser");
	
}
?>

</p>

<?php  
	$entries=50; //nilai awal==jumlah data yang ditampilkan setiap halaman
	$get_pages=mysql_num_rows($query); //dapatkan jumlah semua data
	
	if ($get_pages>$entries)  //jika jumlah semua data lebih banyak dari nilai awal yang diberikan
	{
		echo "Halaman : ";
		$pages=1;
		while($pages<=ceil($get_pages/$entries))
		{
			if ($pages!=1)
			{
				echo " | ";
			}
		?>
		<!--Membuat link sesuai nama halaman-->
		<a href="hasil_ujian.php?page=<?php  echo ($pages-1); ?><?php if(isset($_GET['cari'])){ echo "&nasabah=".$_GET['nasabah']."&tanggal_awal=".$_GET['tanggal_awal']."&tanggal_akhir=".$_GET['tanggal_akhir']."&cari=Tampilkan+Data";} ?>" style="text-decoration:none"><font size="2" face="verdana" color="#009900"><?php  echo $pages; ?></font></a>
		 <?php 
				$pages++;
		}
	}else{
		$pages=0;
	}
	
	//**************akhir paging*****************//
	?></font><?php
	$page=(int)$_GET["page"];
	$offset=$page*$entries;
	
	if(isset($_GET["cari"])){
		//ambil parameter dari link GET
		$nasabah=$_GET["nasabah"];
		$tanggal_awal=$_GET["tanggal_awal"];
		$tanggal_akhir=$_GET["tanggal_akhir"];
		
		
		
		//menampilkan data dengan menggunakan limit sesuai parameter paging yang diberikan
		$result=mysql_query("SELECT tuser.tanggal, tuser.nim, tuser.nama, kelas, tlp,  tjawab.nilai, tjawab1.nilai1, tjawab2.nilai2 FROM tuser INNER JOIN tjawab ON tuser.nim = tjawab.nim INNER JOIN tjawab1 ON tuser.nim = tjawab1.nim INNER JOIN tjawab2 ON tuser.nim = tjawab2.nim where tuser.nama like '%$nasabah%' and tuser.tanggal between '$tanggal_awal' and '$tanggal_akhir' limit $offset,$entries"); //output
	}else{
		$result=mysql_query("SELECT tuser.tanggal, tuser.nim, tuser.nama, kelas, tlp,  tjawab.nilai, tjawab1.nilai1, tjawab2.nilai2 FROM tuser INNER JOIN tjawab ON tuser.nim = tjawab.nim INNER JOIN tjawab1 ON tuser.nim = tjawab1.nim INNER JOIN tjawab2 ON tuser.nim = tjawab2.nim  limit $offset,$entries");
	}
	
?>
<br/>
<center><h2>LAPORAN DATA HASIL UJIAN<br>
SISWA BARU</h2></center>

<?php
echo "<a href =\'download.php?nasabah=$nasabah&tanggal_awal=$tanggal_awal&tanggal_akhir=$tanggal_akhir\'><img src=..\ujianonline\images\icon\excel-icon.jpeg> Export to Excel</a><br><br>";
?>


<table class="datatable">
	<tr>
    	<th width="34">No</th>
    	<th width="90">Tanggal</th>
    	<th width="200">Nama Siswa </th>
    	<th width="200">Jurusan</th>
		<th width="200">Telepon</th>
		<th width="100">Analisa</th>
		<th width="100">Kuantitatif</th>
		<th width="100">B. Inggris</th>
    </tr>
	<?php  //untuk penomoran data
	$no=0;
	
	//menampilkan data
	while($row=mysql_fetch_array($result)){
	?>
    <tr>
    	<td><?php  echo $offset=$offset+1; ?></td>
		<td><?php  echo $row['tanggal']; ?></td>
		<td><?php  echo $row['nama'];?></td>
		<td align="center"><?php  echo $row['kelas'];?></td>
			<td align="center"><?php  echo $row['tlp'];?></td>
		<td align="center"><?php  echo $row['nilai'];?></td>
		<td align="center"><?php  echo $row['nilai1'];?></td>
		<td align="center"><?php  echo $row['nilai2'];?></td>
		
    </tr>
    <?php  }
	?>
         
    <tr>
    	<td colspan="8" align="center"> 
		<?php  //jika data tidak ditemukan
		if(mysql_num_rows($query)==0){
			echo "<font color=red><blink>Tidak ada data yang dicari!</blink></font>";
		}
		?>
        </td>
    </tr>
     
</table>

<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</div>
<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>
