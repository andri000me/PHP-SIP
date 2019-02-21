<h3>Berita</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="berita.php">Berita</a></div>
			<div class="menuhorisontal"><a href="kategori.php">Kategori</a></div>
			<div class="menuhorisontal"><a href="komentar.php">Komentar</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php
			//Menghitung jumlah total data berita
			if($_SESSION['leveluser']=='Super Admin'){
			$berita=mysql_query("SELECT * FROM sh_berita");}
			else {
			$berita=mysql_query("SELECT * FROM sh_berita WHERE s_username='$_SESSION[adminsh]'");
			}
			$jmltotal=mysql_num_rows($berita);
			
			//Menghitung jumlah data berita yang terbit
			if($_SESSION['leveluser']=='Super Admin'){
			$terbit=mysql_query("SELECT * FROM sh_berita WHERE status_terbit='1'");}
			else {
			$terbit=mysql_query("SELECT * FROM sh_berita WHERE status_terbit='1' AND s_username='$_SESSION[adminsh]'");
			}
			$jmlterbit=mysql_num_rows($terbit);
			
			//Menghitung jumlah data berita konsep
			if($_SESSION['leveluser']=='Super Admin'){
			$konsep=mysql_query("SELECT * FROM sh_berita WHERE status_terbit='0'");}
			else {
			$konsep=mysql_query("SELECT * FROM sh_berita WHERE status_terbit='0' AND s_username='$_SESSION[adminsh]'");
			}
			$jmlkonsep=mysql_num_rows($konsep);
			?>
			<?php echo "<a href='berita.php'>Jumlah data</a>"; ?> (<?php echo "$jmltotal"; ?>)&nbsp;&nbsp;| 
			<?php echo "<a href='berita.php?pilih=terbit'>Terbit</a>"; ?> (<?php echo "$jmlterbit"; ?>)&nbsp;&nbsp;| 
			<?php echo "<a href='berita.php?pilih=konsep'>Konsep</a>"; ?> (<?php echo "$jmlkonsep"; ?>)
			</div>
			
			<!--Form pencarian data berita -->
			<div class="cari">
			<form method="POST" action="berita.php?pilih=pencarian">
			<input type="text" name="cari" class="pencarian"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<form method="POST" style="float: left" action="berita.php?pilih=kategori">
				<select name="kategori" onChange="this.form.submit()">
					<option value="" selected>Kategori</option>
					<?php
					$kategori=mysql_query("SELECT * FROM sh_kategori");
					while ($k=mysql_fetch_array($kategori)){
					echo "
					<option value='$k[id_kategori]'>$k[nama_kategori]</option>"; }
					?>
				</select>
			</form>
			<?php
			if($_SESSION['leveluser']=='Super Admin'){
			?>
			<form method="POST" style="float: left" action="berita.php?pilih=penulis">
				<select name="penulis" onChange="this.form.submit()">
					<option value="" selected>Penulis</option>
					<?php
					$penulis=mysql_query("SELECT * FROM sh_users");
					while ($p=mysql_fetch_array($penulis)){
					echo "
					<option value='$p[s_username]'>$p[nama_lengkap_users]</option>"; }
					?>
				</select>
			</form>
			<?php } ?>
			</div>
			
			<?php echo "<form method='POST' action='$database?pilih=berita&untukdi=hapusbanyak'>"; ?>
			<div class="cari">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?pilih=tambah';">
			<input type="submit" class="hapus" value="Hapus yang di tandai">
			</div>
		</div>
		<div class="clear"></div>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel">Judul</th>
				<th class="tabel">Penulis</th>
				<th class="tabel">Tanggal</th>
				<th class="tabel" width="100px">Kategori</th>
				<th class="tabel">Komentar</th>
				<th class="tabel" width="150px">Pilihan</th>
			</tr>
			<?php
	
			$no=1;
			if($_SESSION['leveluser']=='Super Admin'){
			$databerita=mysql_query("SELECT * FROM sh_berita,sh_users, sh_kategori WHERE sh_berita.s_username=sh_users.s_username AND sh_berita.id_kategori=sh_kategori.id_kategori AND sh_berita.id_kategori='$_POST[kategori]' ORDER BY id_berita DESC");
			}
			else {
			$databerita=mysql_query("SELECT * FROM sh_berita,sh_users, sh_kategori WHERE sh_berita.s_username=sh_users.s_username AND sh_berita.id_kategori=sh_kategori.id_kategori AND sh_berita.id_kategori='$_POST[kategori]' AND sh_berita.s_username='$_SESSION[adminsh]' ORDER BY id_berita DESC");
			}
			$cek_databerita=mysql_num_rows($databerita);
			
			if($cek_databerita > 0){
			while ($db=mysql_fetch_array($databerita)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td><!--Menampilkan nomor baris -->
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$db[id_berita] id=id$no>"; ?></td><!--Menampilkan checkbox-->
				<?php if ($db[status_terbit]==1) { ?>
				<td class="tabel"><b><?php echo "$db[judul_berita]";?></b></td><!--Menampilkan judul berita -->
				<?php }
				else { ?>
				<td class="tabel"><font style="color: #799e57;"><b><?php echo "$db[judul_berita]";?></b></font></td><!--Menampilkan judul berita -->
				<?php } ?>
				<td class="tabel"><a href=""><?php echo "$db[nama_lengkap_users]";?></a></td><!--Menampilkan penulis -->
				<td class="tabel"><?php echo "$db[tanggal_posting]";?></td><!--Menampilkan tanggal posting -->
				<td class="tabel"><?php echo "<a href=''>$db[nama_kategori]</a>";?></td><!--Menampilkan kategori -->
				
				<td class="tabel">
				<?php
				$komentarberita=mysql_query("SELECT * FROM sh_komentar WHERE id_berita='$db[id_berita]'");
				$jmlkomentar=mysql_num_rows($komentarberita);
				echo "<a href=''>$jmlkomentar</a>";
				?>
				</td><!--Menampilkan jumlah komentar -->
				
				<td class="tabel" width="150px">
					<div class="hapusdata">
					<a href="<?php echo "$database?pilih=berita&untukdi=hapus&id=$db[id_berita]";?>">hapus</a>
					</div>
					
					<div class="editdata">
					<a href="<?php echo "?pilih=edit&id=$db[id_berita]";?>">edit</a>
					</div>
					
					<!--apabila status berita 0 atau tidak terbit maka akan tampil tombol dibawah ini-->
					<?php 
					if ($db[status_terbit]==0){
					?>
					<div class="terbitdata">
					<a href="<?php echo "$database?pilih=berita&untukdi=terbitkan&id=$db[id_berita]";?>">terbitkan</a>
					</div>
					
					<!--apabila status berita 1 atau terbit maka akan tampil tombol dibawah ini-->
					<?php }
					else { ?>
					<div class="bataldata">
					<a href="<?php echo "$database?pilih=berita&untukdi=batalkan&id=$db[id_berita]";?>">batalkan</a>
					</div>
					<?php }?>
				</td>
			</tr>
			<?php
			$no++;
			} }
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="8"><b>DATA BERITA DENGAN KATEGORI <u><?php
			$nama_kategori=mysql_query("SELECT *FROM sh_kategori WHERE id_kategori='$_POST[kategori]'");
			$nk=mysql_num_rows($nama_kategori);
			echo "$nk[nama_kategori]";
			?></u>
			BELUM TERSEDIA</b></td></tr>
			<?php }
			?>
			
		</table>
		<div class="atastabel" style="margin: 5px 10px 0 10px">
				<div id="pageNavPosition"></div>
		</div>
		<div class="atastabel" style="margin: 5px 10px 0 10px">
		<?php
			$jumlahtampil=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='3'");
			$jt=mysql_fetch_array($jumlahtampil);
		?>
			    <script type="text/javascript"><!--
        var pager = new Pager('results', <?php echo "$jt[isi_pengaturan]"; ?>); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
		</div>
		</form>
</div><!--Akhir class isi kanan-->