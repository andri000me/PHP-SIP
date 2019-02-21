<?php
session_start();
if ($_SESSION['posisi'] =="guru") {

?>
<div id="header-content1">

		<font id="bold">.::Ujian Online::.</font><br>
		Login Date: <?php $date = date("l, d F, Y - H:i A"); echo "$date";?>
		<br>Anda Login Sebagai <?php echo $_SESSION['namaguru']; ?>
</div>
		
<div id="header-content2">

	<img src="images/images_admin/img_admin_home.png" align="absmiddle" class="img_header" /> 
	<a href="index.php">Dashboard</a> 
	
	<!-- "User di Create Langsung dari Admin Panel"	
	<img src="images/images_admin/img_admin_user.png" align="absmiddle" class="img_header" /> 
	<a href="index.php?page=users">Users</a> -->
		
	<img src="images/images_admin/img_admin_logout.png" width="22" height="20" align="absmiddle" class="img_header" /> 
	<a href="logout.php">Logout</a>

</div>

<?php } else if($_SESSION['posisi'] =="siswa") { ?>

<div id="header-content1">

		<font id="bold">.::Ujian Online::.</font><br>
		Login Date: <?php $date = date("l, d F, Y - H:i A"); echo "$date";?>
		<br>Anda Login Sebagai <?php echo $_SESSION['namasiswa']; ?>
</div>
		
<div id="header-content2">

	<img src="images/images_admin/img_admin_home.png" align="absmiddle" class="img_header" /> 
	<a href="index.php">Dashboard</a> 
	
	<!-- "User di Create Langsung dari Admin Panel"	
	<img src="images/images_admin/img_admin_user.png" align="absmiddle" class="img_header" /> 
	<a href="index.php?page=users">Users</a> -->
		
	<img src="images/images_admin/img_admin_logout.png" width="22" height="20" align="absmiddle" class="img_header" /> 
	<a href="logout.php">Logout</a>

</div>

<?php
 } else { 
	include "error/error-access-denied-page.php"; 
}
?>

