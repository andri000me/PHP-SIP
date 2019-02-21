<?php
if($_SESSION['leveluser'] == 'Super Admin') {
?>
		<table class="tabel">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="400px">Isi Polling</th>
				<th class="tabel">Status</th>
				<th class="tabel">Jml Poll</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$polling=mysql_query("SELECT * FROM sh_sidebar WHERE jenis='polling' ORDER BY id_sidebar ASC");
				while($p=mysql_fetch_array($polling)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><a href="<?php echo "?pilih=edit&id=$p[id_sidebar]";?>"><b><?php echo "$p[nama]";?></b></a></td>
				<td class="tabel"><?php echo "$p[isi2]";?></td>
				<td class="tabel"><?php echo "$p[isi1]";?></td>
				<td class="tabel">
				<?php if ($p[isi2]== 'pertanyaan') {
				echo "
					<div class='editdata'><a href='?pilih=edit&id=$p[id_sidebar]'>edit</a></div>";}
				else {
				echo "
					<div class='hapusdata'><a href='$database?pilih=polling&untukdi=hapus&id=$p[id_sidebar]'>hapus</a></div>
					<div class='editdata'><a href='?pilih=edit&id=$p[id_sidebar]'>edit</a></div>";	
				} ?>
				</td>
			</tr>
			<?php
			$no++;
			}
			?>
		
		</table>
<?php } ?>