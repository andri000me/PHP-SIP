<?php
if($_SESSION['leveluser'] == 'Super Admin') {
?>
		<table class="tabel">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="125px">Nama Link</th>
				<th class="tabel">URL website</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			
			<?php
				$no=1;
				$link=mysql_query("SELECT * FROM sh_sidebar WHERE jenis='link' ORDER BY id_sidebar ASC");
				$cek_link=mysql_num_rows($link);
				
				if($cek_link > 0){
				while($l=mysql_fetch_array($link)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><a href="<?php echo "?pilih=edit&id=$l[id_sidebar]";?>"><b><?php echo "$l[nama]";?></b></a></td>
				<td class="tabel"><a href="<?php echo "http://$l[isi1]";?>" target="_blank"><?php echo "$l[isi1]";?></a></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?pilih=link&untukdi=hapus&id=$l[id_sidebar]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$l[id_sidebar]";?>">edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="4"><b>DATA LINK BELUM TERSEDIA</b></td></tr>
			<?php }
			?>
		</table>
<?php } ?>	