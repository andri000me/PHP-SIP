		<div class="judulbox">Data Kategori</div>
		<table class="tabel" style="width: 95%;">
			<tr>
				<th class="tabel" width="10px">No</th>
				<th class="tabel">Nama</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
			$no=1;
			$kategori=mysql_query("SELECT * FROM sh_kategori ORDER BY id_kategori ASC");
			while ($kat=mysql_fetch_array($kategori)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo $no ?></td>
				<td class="tabel"><b>
				<?php
				$jmlberita =mysql_query("SELECT * FROM sh_berita WHERE id_kategori='$kat[id_kategori]'");
				$jml=mysql_num_rows($jmlberita);
				echo "$kat[nama_kategori]&nbsp;($jml)"; ?>
				</b></td>
				<td class="tabel">
				<?php
				if ($kat[id_kategori]==1){
				echo "<div class='editdata'><a href='?pilih=edit&id=$kat[id_kategori]'>edit</a></div>";}
				else {
				echo "<div class='hapusdata'><a href='$database?pilih=kategori&untukdi=hapus&id=$kat[id_kategori]'>hapus</a></div>
					<div class='editdata'><a href='?pilih=edit&id=$kat[id_kategori]'>edit</a></div>"; }
				?>
				</td>
			</tr>
			<?php
			$no++;
			}
			?>
		
		</table>