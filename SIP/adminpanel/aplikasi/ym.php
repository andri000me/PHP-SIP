<?php
if($_SESSION['leveluser'] == 'Super Admin') {
?>
		<table class="tabel">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="125px">Nama Lengkap</th>
				<th class="tabel">Email</th>
				<th class="tabel">Status</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$ym=mysql_query("SELECT * FROM sh_sidebar WHERE jenis='ym' ORDER BY id_sidebar DESC");
				$cek_ym=mysql_num_rows($ym);
				
				if($cek_ym > 0){
				while ($y=mysql_fetch_array($ym)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><a href=""><b><?php echo "$y[nama]";?></b></a></td>
				<td class="tabel"><?php echo "$y[isi1]";?></td>
				<td class="tabel">
				<a href="http://messenger.yahoo.com/edit/send/?.target=<?php echo "$y[isi1]";?>">
				<img src="http://opi.yahoo.com/yahooonline/u=<?php echo "$y[isi1]";?>/m=g/t=1/l=us/opi.jpg" border="0" alt="Status YM" /></a>
				</td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?pilih=ym&untukdi=hapus&id=$y[id_sidebar]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$y[id_sidebar]";?>">edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="5"><b>DATA YAHOO! MESSENGER BELUM TERSEDIA</b></td></tr>
			<?php }
			?>
		</table>
<?php }?>