<nav class="navbar navbar-default navbar-fixed-bottom" id="footer">
	<div class="container-fluid">
		<div class="row">
					<div class="col-md-4 text-left">
						<a href="http://trimitra-sisteminfo.com/web/index.php" target="_blank">Copyright &copy; 2016 Powered by : Trimitra Sistem Informasi</a>
					</div>
					<div class="col-md-4 text-center"></div>
					<div class="col-md-4 text-right">
						<a href="?p=psb">PSB</a> | <?php if($_SESSION['siswa'] OR $_SESSION['guru'] OR $_SESSION['orangtua']){
							echo'<a href="elearningku/">E-learning</a> |';
						}else{?>
							<a href="?p=login#popup">Login</a> |
						<?php }?>
							<a href="?p=halaman_utama">Home</a>
					</div>
		</div>
	</div>
</nav>