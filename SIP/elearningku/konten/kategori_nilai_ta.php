<div class="panel panel-primary">
<div class="panel-heading"> <h3 align="center"> Kategori Nilai </h3> </div>
<div class="panel-body"> <br/>
<a href ="index.php?p=nilai"> << Kembali ke NILAI </a> <br/>
	<input type="button" class ="btn btn-primary active" value="Tambah Kategori" onclick="window.location.href='?p=tambahkategorinilai';" style="float:right">
	   <br/>
	   <!-- Sortir Berdasarkan Mata Pelajaran -->
			<form method="POST" style="float: left" action="index.php?p=kategorinilaikelas">
				<select name="mpl" onChange="this.form.submit()" class="form-control">
					<option value="" selected>Tampil Berdasarkan Mapel</option>
					<?php
					$tampilmapel=mysql_query("SELECT DISTINCT sh_kategori_nilai.id_mapel_guru , sh_mapel_guru.nama_mapel FROM sh_kategori_nilai , sh_mapel_guru  , sh_guru_staff where 
											  sh_kategori_nilai.id_mapel_guru = sh_mapel_guru.id_mapel_guru
											  AND sh_guru_staff.id_gurustaff = sh_mapel_guru.id_gurustaff
											  AND sh_guru_staff.id_gurustaff = '$_SESSION[idguru]'");
					while($tm=mysql_fetch_array($tampilmapel)){
					echo "<option value='$tm[id_mapel_guru]'>$tm[nama_mapel]</option>";}
					?>
				</select>
			</form>
		<!-- Sortir Berdasarkan Tahun Ajaran -->
			<form method="POST" style="float: left" action="index.php?p=kategorinilaita">
				<select name="ta" onChange="this.form.submit()" class="form-control">
					<option value="" selected>Tampil Berdasarkan Tahun Ajaran</option>
					<?php
					$tampilta=mysql_query("SELECT * FROM sh_tahun_ajaran");
					while($ta=mysql_fetch_array($tampilta)){
					echo "<option value='$ta[id_tahun_ajaran]'>$ta[tahun_ajaran]";
					if($ta['semester']==0) {
					$sms = "Genap";
					} Else {
					$sms = "Ganjil";
					}
					echo " - $sms</option>";
					}
					?>
				</select>
			 </form>
		   <br/>
		<!-- Data Tabel -->
		<table class="table"  id="results">
			<tr class="garis">
            <th width="2%"  class="garis">No</a></th>
			<th width="15%" class="garis">Tahun Ajaran</a></th>
			<th width="15%" class="garis">Nama Kategori Nilai</a></th>
			<th width="15%" class="garis">Mata Pelajaran</a></th>
			<th width="10%" class="garis">Kelas</a></th>
			<th width="10%" class="garis">Aksi </a></th>
			</tr>	
			
			<?php
				$guru=$_SESSION['guru'];
				$view=mysql_query("SELECT * FROM sh_kategori_nilai , sh_tahun_ajaran ,sh_mapel_guru, sh_guru_staff , sh_kelas   WHERE sh_kategori_nilai.id_tahun_ajaran = sh_tahun_ajaran.id_tahun_ajaran
				AND sh_kategori_nilai.id_mapel_guru = sh_mapel_guru.id_mapel_guru 
				AND sh_kategori_nilai.id_kelas = sh_kelas.id_kelas 
				AND sh_guru_staff.id_gurustaff = sh_mapel_guru.id_gurustaff 
				AND sh_guru_staff.id_gurustaff = '$_SESSION[idguru]'
				AND sh_tahun_ajaran.id_tahun_ajaran = '$_POST[ta]' order by sh_kategori_nilai.id_kategori_nilai asc");
				$i = 1;
				$cek =mysql_num_rows($view);
				if($cek > 0){
				while($row=mysql_fetch_array($view)){
					?>
					<tr class="garis">
                        <td class="garis"><?php echo $i;?></td>
						<td class="garis">
						<?php
						if($row['semester']==0) {
						$sms = "Genap";
						} Else {
						$sms = "Ganjil";
						}
						echo "$row[tahun_ajaran]-$sms</option>"; ?>
						</td>
						<td class="garis"><?php echo $row['nama_kategori_nilai'];?></td>
						<td class="garis"><?php echo $row['nama_mapel'];?></td>
						<td class="garis"><?php echo $row['nama_kelas'];?></td>
						<td class="garis">
							<a href="<?php echo"index.php?p=ubahkategorinilai&id=$row[id_kategori_nilai]&tahun=$row[id_tahun_ajaran]";?>"><img title="Ubah" width="30" src="css/img/edit.png" /></a> &nbsp;&nbsp;&nbsp
							<a href="<?php echo"proses-kategori-nilai.php?id=$row[id_kategori_nilai]";?>" onclick="return confirm('Menghapus Kategori Juga Menghapus Nilai yg sudah diinput - Yakin ?')" ><img title="Hapus" width="28" src="css/img/delete.jpg"/></a> 
						</td>
					</tr>
					<?php
					$i++;
				}
					$jumSis = $i-1;
			}  else { ?>
			<tr class="garis"><td class="garis" colspan="9"><font color="red"><b>DATA KATEGORI NILAI BELUM TERSEDIA</b></font></td></tr>
			<?php } ?>
		  </table>
	    </div>
	  </div>
	</div>