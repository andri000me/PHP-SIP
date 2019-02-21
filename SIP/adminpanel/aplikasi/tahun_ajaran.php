<?php
if($_SESSION['leveluser'] == 'Super Admin') {
?>
		<table class="tabel">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="125px">Tahun Ajaran</th>
				<th class="tabel" width="100px">Semester</th>
				<th class="tabel" width="125px">Tanggal Mulai</th>
				<th class="tabel" width="125px">Tanggal Akhir</th>
				<th class="tabel" width="100px">Status</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			
			<?php
				$no=1;
				$ta=mysql_query("SELECT * FROM sh_tahun_ajaran ORDER BY id_tahun_ajaran ASC");
				$cek_ta=mysql_num_rows($ta);
				
				if($cek_ta > 0){
				while($l=mysql_fetch_array($ta)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><a href="<?php echo "?pilih=edit&id=$l[id_tahun_ajaran]";?>"><b><?php echo "$l[tahun_ajaran]";?></b></a></td>
				<td class="tabel">
				<b>
				<?php if($l["semester"]==1) { echo "GANJIL"; } Else { echo "GENAP"; }?>
				</b></td>
				<td class="tabel"><b><?php echo "$l[waktu_awal_semester]";?></b></td>
				<td class="tabel"><b><?php echo "$l[waktu_akhir_semester]";?></b></td>
				<td class="tabel">
				<b>
				<?php if($l["aktif"]==1) { echo "AKTIF"; } Else { echo "TIDAK AKTIF"; }?>
				</b></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?pilih=tahun_ajaran&untukdi=hapus&id=$l[id_tahun_ajaran]";?>">Hapus</a></div>
					<div class="editdata"><a href="<?php echo "?pilih=edit&id=$l[id_tahun_ajaran]";?>">Edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>DATA TAHUN AJARAN BELUM TERSEDIA</b></td></tr>
			<?php }
			?>
		</table>
<?php } ?>	