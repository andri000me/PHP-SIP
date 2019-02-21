<h3>Komentar (Ditolak)</h3>
<div class="isikanan"><!--Awal class isi kanan-->
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="berita.php">Berita</a></div>
			<div class="menuhorisontal"><a href="kategori.php">Kategori</a></div>
			<div class="menuhorisontalaktif"><a href="komentar.php">Komentar</a></div>
		</div>
		
		<div class="atastabel" style="margin: 30px 10px 0 10px">
		<?php
		if($_SESSION[leveluser]=='Super Admin'){
		$komentar =mysql_query("SELECT * FROM sh_komentar");}
		else {
		$komentar =mysql_query("SELECT * FROM sh_komentar, sh_berita WHERE sh_komentar.id_berita=sh_berita.id_berita AND sh_berita.s_username='$_SESSION[adminsh]'");
		}
		$jmltotal=mysql_num_rows($komentar);
		
		if($_SESSION[leveluser]=='Super Admin'){
		$komentarterima=mysql_query("SELECT * FROM sh_komentar WHERE status_terima='1'");}
		else {
		$komentarterima=mysql_query("SELECT * FROM sh_komentar, sh_berita WHERE sh_komentar.id_berita=sh_berita.id_berita AND sh_berita.s_username='$_SESSION[adminsh]' AND status_terima='1'");
		}
		$jmlterima=mysql_num_rows($komentarterima);
		
		if($_SESSION[leveluser]=='Super Admin'){
		$komentartolak=mysql_query("SELECT * FROM sh_komentar WHERE status_terima='0'");}
		else {
		$komentartolak=mysql_query("SELECT * FROM sh_komentar, sh_berita WHERE sh_komentar.id_berita=sh_berita.id_berita AND sh_berita.s_username='$_SESSION[adminsh]' AND status_terima='0'");
		}
		$jmltolak=mysql_num_rows($komentartolak);
		?>
			<div class="tombol">
			<?php echo "<a href='komentar.php'>Jumlah data</a>"; ?> (<?php echo "$jmltotal"; ?>)&nbsp;&nbsp;|
			<?php echo "<a href='komentar.php?pilih=diterima'>Diterima</a>"; ?> (<?php echo "$jmlterima"; ?>)&nbsp;&nbsp;|
			<?php echo "<a href='komentar.php?pilih=ditolak'>Ditolak</a>"; ?> (<?php echo "$jmltolak"; ?>)
			</div>
			<div class="cari">
			<form method="POST" <?php echo "action=?pilih=pencarian";?> >
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<?php echo "<form method='POST' action='$database?pilih=tolak&untukdi=hapusbanyak'>"; ?>
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?pilih=tambah';">
			<input type="submit" class="hapus" value="Hapus yang ditandai">
			</div>
		</div>
		<div class="clear"></div>
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="20px">No</th>
				<th class="tabel" width="15px">&nbsp;</th>
				<th class="tabel">Nama</th>
				<th class="tabel">Tanggal</th>
				<th class="tabel">Jdl. berita</th>
				<th class="tabel">Komentar</th>
				<th class="tabel" width="150px">Pilihan</th>
			</tr>
			<?php
			$no=1;
			if($_SESSION[leveluser]=='Super Admin'){
			$komentar=mysql_query("SELECT * FROM sh_komentar, sh_berita WHERE sh_komentar.id_berita=sh_berita.id_berita AND status_terima='0' ORDER BY id_komentar DESC");
			}
			else {
			$komentar=mysql_query("SELECT * FROM sh_komentar, sh_berita WHERE sh_komentar.id_berita=sh_berita.id_berita AND status_terima='0' AND sh_berita.s_username='$_SESSION[adminsh]' ORDER BY id_komentar DESC");
			}
			$cek_komentar=mysql_num_rows($komentar);
			
			if($cek_komentar > 0){
			while ($kom=mysql_fetch_array($komentar)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no"; ?></td>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$kom[id_komentar] id=id$no>"; ?></td>
				<td class="tabel"><a href="<?php echo "?pilih=edit&id=$kom[id_komentar]";?>"><?php echo "$kom[nama_komentar]";?></a></td>
				<td class="tabel"><?php echo "$kom[tanggal_komentar]";?></td>
				<td class="tabel"><a href="<?php echo "berita.php?pilih=edit&id=$kom[id_berita]";?>"><b><?php echo "$kom[judul_berita]";?></b></a></td>
				<td class="tabel"><?php echo "$kom[isi_komentar]";?></td>
				<td class="tabel">
				<?php 
				echo "
					<div class='hapusdata'><a href='$database?pilih=tolak&untukdi=hapus&id=$kom[id_komentar]'>hapus</a></div>
					<div class='editdata'><a href='?pilih=edit&id=$kom[id_komentar]'>edit</a></div>
					<div class='terbitdata'><a href='$database?pilih=tolak&untukdi=terima&id=$kom[id_komentar]'>terima</a></div>";
				?>
				</td>
			</tr>
			<?php
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="7"><b>TIDAK ADA DATA KOMENTAR YANG DITOLAK</b></td></tr>
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
		</script>
		</div>
			
		</form>		
</div><!--Akhir class isi kanan-->