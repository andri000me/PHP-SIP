<nav class="navbar navbar-default navbar-fixed-top" id="header">
<div class="container-fluid">
<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  
				<?php
			//	$logo=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='13'");
			//	$l=mysql_fetch_array($logo);
			 //   echo "<img src='images/$l[isi_pengaturan]' width='40px' alt='Logo sekolah'>";
				?>
        <!-- <img src="images/trimitra.png" width="100"/> -->
</div> 
		<ul class="nav navbar-right"><li class="blank hidden-sm hidden-xs">
		<?php if (isset($_SESSION['orangtua']) OR isset($_SESSION['siswa']) OR isset($_SESSION['guru'])){ ?>
		<a href="elearningku/" class="glyphicon glyphicon-chevron-right" style="text-align:center;" ><br/>E-learning</a>
		<?php }else{?>
		<a class="glyphicon glyphicon-user" style="text-align:center;" href="?p=login#popup"><br/>Login</a>
		<?php }?>
		</li></ul>      
</div>
</nav>
<div class="container">
<div id="head2">
	<div class="row">
		<div class="col-md-3">
				<?php
					$logo=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='13'");
					$l=mysql_fetch_array($logo);
					echo "<img src='images/$l[isi_pengaturan]' width='70px' alt='Logo sekolah' style=margin-left:0px;>";
				?>
		</div>
		<div class="col-md-9"><h4>Sistem Informasi Pendidikan Trimitra</h4></div>
	</div>
</div>
</div>