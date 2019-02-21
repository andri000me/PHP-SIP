<div class="panel panel-primary">
<div class="panel-heading"><h1 class="panel-title">Profil Anda</h1></div>
<div class="panel-body table-responsive">
<?php
if ($_SESSION['guru']){
$profilsaya=mysql_query("SELECT * FROM sh_guru_staff, sh_mapel_guru WHERE sh_guru_staff.id_gurustaff=sh_mapel_guru.id_gurustaff AND nip='$_SESSION[guru]'");
$ps=mysql_fetch_array($profilsaya);
?>		<form method="POST" action="proses.php?pilih=guru&untukdi=edit" name="editprofil" id="editprofil" class="form-horizontal">
		<?php
		echo "<input type='hidden' name='nip' value='$_SESSION[guru]'>";
		?>
		
		<div class="row">
			<div class="col-md-3 text-left"></div>
			<div class="col-md-6 text-left">
				<img style="border:1px solid blue;" src="../images/foto/guru/<?php echo $ps[foto]?>" width="30%" class="img-rounded img-responsive"/>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Nama</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[nama_gurustaff]?>" disabled="">
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>NIP</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[nip]?>" disabled="">
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Mengajar</strong>
			</div>
			<div class="col-md-6 text-left">
				<?php
				$profilsay=mysql_query("SELECT * FROM  sh_mapel_guru,sh_guru_staff WHERE sh_guru_staff.id_gurustaff=sh_mapel_guru.id_gurustaff AND nip='$_SESSION[guru]'");
				while($p=mysql_fetch_array($profilsay)){?>
				<input type="text" class="form-control" value="<?php echo "$p[nama_mapel]";?>" disabled=""><br/><?php } ?>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Password</strong>
			</div>
			<div class="col-md-6 text-left">
				<a href="<?php echo "index.php?p=password&nip=$_SESSION[guru]"; ?>"><b><u>Ganti Password</u></b></a>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-12 text-center">
				<strong><h3>Data Personal</h3></strong><hr/>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Tempat, Tanggal Lahir</strong>
			</div>
			<div class="col-md-3 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[tempat_lahir]?>" disabled>
			</div>
			<div class="col-md-3 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[tanggal_lahir]?>" disabled>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Alamat</strong>
			</div>
			<div class="col-md-6 text-left">
				<textarea name="alamat" readonly="" class="form-control"><?php echo $ps[alamat]?></textarea>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Email</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text"  name="email" class="form-control" value="<?php echo $ps[email]?>">
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Telepon</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text"  name="telepon" class="form-control" value="<?php echo $ps[telepon]?>">
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Pendidikan Terakhir</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[pendidikan_terakhir]?>" disabled>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Tahun Masuk</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[tahun_masuk]?>" disabled>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Status Perkawinan</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[status_kawin]?>" disabled>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong></strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="submit" class="btn btn-primary" value="Simpan">
			</div>
		</div>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editprofil");
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
<?php
} else if ($_SESSION['orangtua']){
$profilsaya=mysql_query("SELECT sh_ortu.id_ortu , sh_ortu.nama_ortu , sh_ortu.alamat , sh_ortu.pekerjaan_ortu , sh_ortu.no_hp ,
								sh_siswa.nama_siswa , sh_siswa.nis , sh_siswa.foto ,
								sh_kelas.nama_kelas , sh_guru_staff.nama_gurustaff
									FROM sh_ortu , sh_siswa , sh_kelas ,sh_guru_staff
									WHERE sh_ortu.id_siswa = sh_siswa.id_siswa AND 
									sh_guru_staff.id_gurustaff = sh_kelas.id_gurustaff AND
									sh_siswa.id_kelas = sh_kelas.id_kelas AND 
									id_ortu = '$_SESSION[orangtua]'");
$ps=mysql_fetch_array($profilsaya);
?>		<form method="POST" action="proses.php?pilih=ortu&untukdi=edit" name="editprofil" id="editprofil" enctype="multipart/form-data">
		<?php
		echo "<input type='hidden' name='id_ortu' value='$_SESSION[orangtua]'>";
		?>
		<table class="table">
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Data Personal Orang Tua</th></tr>
			<tr class="form"><td><b>ID Orang Tua</b></td><td><input type="text" class="panjang" value="<?php echo $ps[id_ortu]?>" disabled></td></tr>
			<tr class="form"><td><b>Nama</b></td><td><input type="text" name ="nama_ortu" class="panjang" value="<?php echo $ps[nama_ortu]?>"></td></tr>
			<tr class="form"><td><b>Alamat</b></td><td><input type="text" name ="alamat" class="panjang" value="<?php echo $ps[alamat]?>"></td></tr>
			<tr class="form"><td><b>Pekerjaan</b></td><td><input type="text" name ="pekerjaan" class="panjang" value="<?php echo $ps[pekerjaan_ortu]?>"></td></tr>
			<tr class="form"><td><b>No. Telp</b></td><td><input type="text" name ="no_hp" class="panjang" value="<?php echo $ps[no_hp]?>"></td></tr>
			<tr class="form"><td><b>Foto</b></td><td>
			<?php if($ps[foto_ortu]==""){
				echo"<input type='file' name='foto'/>";
			}else{
				echo"<a>Ubah Foto</a>";
			}?>
			</td></tr>
			<tr class="form"><td><b>Password</b></td>
			<td><a href="<?php echo "index.php?p=password&idortu=$_SESSION[orangtua]"; ?>"><b><u>Ganti Password</u></b></a></td>
			</tr>
		
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Data Hubungan Siswa</th></tr>
			<!--<tr class="form"><td rowspan="5"  width="160px"><img src="<?php //$path = $ps[foto]; $ambilpath = substr($path,22); echo "..".$ambilpath; ?>" width="150px" style="padding: 10px; background: #fff; border: 1px solid #dcdcdc;"></td>-->
			<tr class="form"><td><b>Nama</b></td><td><input type="text" class="panjang" value="<?php echo $ps[nama_siswa]?>" disabled></td></tr>
			<tr class="form"><td><b>NIS</b></td><td><input type="text" class="panjang" value="<?php echo $ps[nis]?>" disabled></td></tr>
			<tr class="form"><td><b>Kelas</b></td><td><input type="text" class="panjang" value="<?php echo $ps[nama_kelas]?>" disabled></td></tr>
			<tr class="form"><td><b>Wali Kelas</b></td><td><input type="text" class="panjang" value="<?php echo $ps[nama_gurustaff]?>" disabled></td></tr>
			<tr class="form"><td></td><td><input type="submit" class="tombol" value="Simpan Perubahan"></td></tr>
		</table>
		
		</form>
		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editprofil");
			frmvalidator.addValidation("nama_ortu","req","Nama harus diisi !");
			frmvalidator.addValidation("alamat","req","Alamat harus diisi !");
			frmvalidator.addValidation("pekerjaan","req","Pekerjaan harus diisi !");
			frmvalidator.addValidation("no_hp","req","No Telp harus diisi !");
			//]]>
		</script>

<?php
} else { 
$profilsaya=mysql_query("SELECT * FROM sh_siswa, sh_kelas WHERE sh_siswa.id_kelas=sh_kelas.id_kelas AND nis='$_SESSION[siswa]'");
$ps=mysql_fetch_array($profilsaya);
?>		<form method="POST" action="proses.php?pilih=siswa&untukdi=edit" name="editprofil" id="editprofil" class="form-horizontal">
		<?php
		echo "<input type='hidden' name='nis' value='$_SESSION[siswa]'>";
		?>
		
		<div class="row">
			<div class="col-md-6 text-left">
				<img style="border:1px solid blue;" src="<?php $path = $ps[foto]; $ambilpath = substr($path,27); echo "..".$ambilpath; ?>" class="img-rounded img-responsive"/>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Nama</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[nama_siswa]?>" disabled="" />
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>NIS</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[nis]?>" disabled="" />
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Kelas</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[nama_kelas]?>" disabled="">
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Password</strong>
			</div>
			<div class="col-md-6 text-left">
				<a href="<?php echo "index.php?p=password&nis=$_SESSION[siswa]"; ?>"><b><u>Ganti Password</u></b></a>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-12 text-center">
				<strong><h3>Data Personal</h3></strong><hr/>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Tempat, Tanggal Lahir</strong>
			</div>
			<div class="col-md-3 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[tempat_lahir]?>" disabled>
			</div>
			<div class="col-md-3 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[tanggal_lahir]?>" disabled>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Alamat</strong>
			</div>
			<div class="col-md-6 text-left">
				<textarea name="alamat" readonly="" class="form-control"><?php echo $ps[alamat]?></textarea>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Email</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text"  name="email" class="form-control" value="<?php echo $ps[email]?>">
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Telepon</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text"  name="telepon" class="form-control" value="<?php echo $ps[telepon]?>">
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Sekolah Asal</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[sekolah_asal]?>" disabled>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Tahun Registrasi</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[tahun_registrasi]?>" disabled>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong>Nama Orang Tua</strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="text" class="form-control" value="<?php echo $ps[nama_ortu]?>" disabled>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3 text-left">
				<strong></strong>
			</div>
			<div class="col-md-6 text-left">
				<input type="submit" class="btn btn-primary" value="Simpan">
			</div>
		</div>

		
			<tr class="form"><td><b></b></td><td></td></tr>
			<tr class="form"><td><b></b></td><td></td></tr>
			<tr class="form"><td><b></b></td><td></td></tr>
			<tr class="form"><td><b></b></td><td></td></tr>
			<tr class="form"><td></td><td></td></tr>
		
		</table>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editprofil");
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
<?php } ?>
</div>
</div>