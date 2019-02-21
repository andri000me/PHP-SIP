<h3>CCTV</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="cctv.php">Daftar CCTV</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="monitor_cctv.php">Monitor CCTV</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php
				$hitungcctv=mysql_query("SELECT * FROM sh_cctv");
				$jumlah=mysql_num_rows($hitungcctv);
			?>
			Jumlah Kamera (<?php echo "$jumlah";?>)
			</div>
		</div>
	
	<!-- Untuk Memberi Jarak -->	
	<div class="atastabel" style="margin-bottom: 10px"> </div>		
	
		<?php if(isset($_GET['id'])) { ?>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" align="center">CCTV List Monitor</th>
				<th class="tabel" align="center">Tempat / Ruang Kelas</th>
			</tr>
		
					<?php
					
					// Query Select sh_cctv dengan tambahan kondisi $_GET[id]
					$cctv = mysql_query("SELECT *
										FROM sh_cctv , sh_kelas
										WHERE sh_cctv.id_kelas = sh_kelas.id_kelas AND sh_cctv.id_cctv ='$_GET[id]'");
					$cek_cctv=mysql_num_rows($cctv);
					if($cek_cctv > 0){
					while($c=mysql_fetch_array($cctv)){
						
					?>
				
			<tr class="tabel">
				<td class="tabel" align="center">
				
				<!-- Pemanggilan CCTV -->
				  <div class="container">
						<div class="content">
							<img class="img-responsive" src="<?php echo "$c[alamat_cctv]";?>" width="725px"/>
					    </div>
				  </div>
				<!-- Pemanggilan CCTV -->
				  
				</td>
				
				<td class="tabel" align="center"><h1><b><?php echo "$c[nama_kelas]";?></b><h1></td>
				
			</tr>
			<?php } 
			} else { ?>
			<tr class="tabel"><td class="tabel" colspan="2" align="center"><font color="red"><b>DATA CCTV BELUM TERSEDIA</b></font></td></tr> <?php } ?>
		</table>
				
	<?php } /* End Of IF */ Else { ?>	
		
		<?php // Jika Tidak Ada GET id  ?>
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" align="center">CCTV List Monitor</th>
				<th class="tabel" align="center">Tempat / Ruang Kelas</th>
			</tr>
			
					<?php
					// Query Select sh_cctv
					$cctv = mysql_query("SELECT *
										FROM sh_cctv , sh_kelas
										WHERE sh_cctv.id_kelas = sh_kelas.id_kelas");
					$cek_cctv=mysql_num_rows($cctv);
					if($cek_cctv > 0){
					while($c=mysql_fetch_array($cctv)){
					?>
				
			<tr class="tabel">
				<td class="tabel" align="center">
				
				<!-- Pemanggilan CCTV -->
				  <div class="container">
						<div class="content">
							<img class="img-responsive" src="<?php echo "$c[alamat_cctv]";?>" width="725px"/>
					    </div>
				  </div>
				<!-- Pemanggilan CCTV -->
				  
				</td>
				
				<td class="tabel" align="center"><h1><b><?php echo "$c[nama_kelas]";?></b><h1></td>
			</tr>
			
			<?php } 
			} else { ?>
			<tr class="tabel"><td class="tabel" colspan="2" align="center"><font color="red"><b>DATA CCTV BELUM TERSEDIA</b></font></td></tr> <?php } ?>
		</table>
		
	<?php }	//End Of Else ?>
				
		<div class="atastabel" style="margin: 5px 10px 0 10px">
			<div id="pageNavPosition"></div>
		</div>
		
		<div class="atastabel" style="margin: 5px 10px 0 10px">
		
		<script type="text/javascript"><!--
        var pager = new Pager('results', 3); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
		</div>
	</div><!--Akhir class isi kanan-->
	