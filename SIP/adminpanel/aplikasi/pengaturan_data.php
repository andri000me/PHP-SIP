<?php
if($_SESSION['leveluser'] == 'Super Admin') {
$database="aplikasi/database/pengaturan.php";
 ?>
<h3>Pengaturan</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="tahun_ajaran.php">Tahun Ajaran</a></div>
			<div class="menuhorisontalaktif"><a href="pengaturan.php">Website</a></div>
			<div class="menuhorisontal"><a href="tema.php">Tema</a></div>
			<div class="menuhorisontal"><a href="ym.php">Yahoo! Messenger</a></div>
			<div class="menuhorisontal"><a href="polling.php">Polling</a></div>
			<div class="menuhorisontal"><a href="link.php">Link</a></div>
			<div class="menuhorisontal"><a href="statistik.php">Statistik</a></div>
		</div>

		<table class="isian">
		<form method='POST' action="<?php echo "$database";?>" name='editpengaturan' id='editpengaturan' >
			<?php
			$url=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan=1");
			$u=mysql_fetch_array($url);
			?>
			<tr><td class="isiankanan" width="350px">URL website</td><td class="isian"><input type="text" name="url" class="sedang" value ="<?php echo "$u[isi_pengaturan]";?>"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan url website tanpa di awalai dengan http:// , contoh <b>www.trimitra-sisteminfo.com</b>
			</i><br><hr></td></tr>
			
			<?php
			$tambahadmin=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan=2");
			$ta=mysql_fetch_array($tambahadmin);
			?>			
			<tr><td class="isiankanan" width="100px">Perbolehkan Administrator menambah data admin lain</td><td class="isian">
						<select name="status_tambah_admin">
						<?php if ($ta[isi_pengaturan]== 0){
						echo "
							<option value='1'>Ya</option>
							<option value='0' selected>Tidak</option>";}
						else {
						echo "
							<option value='1' selected>Ya</option>
							<option value='0'>Tidak</option>";
						} ?>
						</select>
			</td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Jika anda memilih <b>Ya</b>, maka administrator pertama atau anda dapat menambahkan admin lain untuk memelihara website anda
			</i><br><hr></td></tr>
			
			<?php
			$jumlahtampil=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan=3");
			$jt=mysql_fetch_array($jumlahtampil);
			?>
			<tr><td class="isiankanan" width="100px">Jumlah data yang tampil pada setiap halaman admin</td><td class="isian"><input type="text" name="jml_data" class="pendek" value ="<?php echo "$jt[isi_pengaturan]";?>"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan jumlah data yang ditampilkan di setiap halaman atau modul yang ada di halaman admin
			</i><br><hr></td></tr>
			
			<?php
			$siswa=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan=4");
			$s=mysql_fetch_array($siswa);
			?>
			<tr><td class="isiankanan" width="100px">Perbolehkan pengunjung melihat data Siswa</td><td class="isian">
						<select name="data_siswa_status">
						<?php if ($s[isi_pengaturan]== 0){
						echo "
							<option value='1'>Ya</option>
							<option value='0' selected>Tidak</option>";}
						else {
						echo "
							<option value='1' selected>Ya</option>
							<option value='0'>Tidak</option>";
						} ?>
						</select>
			</td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Jika anda memlilih <b>Ya</b>, maka pengunjung akan dapat melihat detail setiap data, jika anda memilih <b>Tidak</b> maka pengunjung hanya dapat melihat Nama siswa, JK dan Kelas
			</i><br><hr></td></tr>
			
			<?php
			$alumni=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan=5");
			$a=mysql_fetch_array($alumni);
			?>
			<tr><td class="isiankanan" width="100px">Perbolehkan pengunjung melihat data Alumni</td><td class="isian">
						<select name="data_alumni_status">
						<?php if ($a[isi_pengaturan]== 0){
						echo "
							<option value='1'>Ya</option>
							<option value='0' selected>Tidak</option>";}
						else {
						echo "
							<option value='1' selected>Ya</option>
							<option value='0'>Tidak</option>";
						} ?>
						</select>
			</td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Jika anda memlilih <b>Ya</b>, maka pengunjung akan dapat melihat detail setiap data, jika anda memilih <b>Tidak</b> maka pengunjung hanya dapat melihat Nama alumni, JK dan Tahun lulus
			</i><br><hr></td></tr>

			<?php
			$guru=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan=6");
			$g=mysql_fetch_array($guru);
			?>
			<tr><td class="isiankanan" width="100px">Perbolehkan pengunjung melihat data Guru</td><td class="isian">
						<select name="data_guru_status">
						<?php if ($g[isi_pengaturan]== 0){
						echo "
							<option value='1'>Ya</option>
							<option value='0' selected>Tidak</option>";}
						else {
						echo "
							<option value='1' selected>Ya</option>
							<option value='0'>Tidak</option>";
						} ?>
						</select>
			</td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Jika anda memlilih <b>Ya</b>, maka pengunjung akan dapat melihat detail setiap data, jika anda memilih <b>Tidak</b> maka pengunjung hanya dapat melihat Nama guru, JK dan Mengajar
			</i><br><hr></td></tr>
			
			<?php
			$formalumni=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan=7");
			$f=mysql_fetch_array($formalumni);
			?>
			<tr><td class="isiankanan" width="100px">Tampilkan form input alumni pada halaman alumni</td><td class="isian">
						<select name="form_alumni_status">
						<?php if ($f[isi_pengaturan]== 0){
						echo "
							<option value='1'>Ya</option>
							<option value='0' selected>Tidak</option>";}
						else {
						echo "
							<option value='1' selected>Ya</option>
							<option value='0'>Tidak</option>";
						} ?>
						</select>
			</td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Jika anda memlilih <b>Ya</b> maka form input alumni akan tampil ketika pengunjung meng klik link yang ada pada halaman alumni. Dan pengunjung dapat menginputkan data alumni
			</i><br><hr></td></tr>
			
			<?php
			$bukutamu=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan=16");
			$bt=mysql_fetch_array($bukutamu);
			?>
			<tr><td class="isiankanan" width="100px">Tampilkan data pesan di halaman buku tamu</td><td class="isian">
						<select name="buku_tamu">
						<?php if ($bt[isi_pengaturan]== 0){
						echo "
							<option value='1'>Ya</option>
							<option value='0' selected>Tidak</option>";}
						else {
						echo "
							<option value='1' selected>Ya</option>
							<option value='0'>Tidak</option>";
						} ?>
						</select>
			</td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Jika anda memlilih <b>Ya</b> maka akan muncul setiap pesan yang masuk dari form buku tamu
			</i><br><hr></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			</td></tr>
		</form>
		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editpengaturan");
			frmvalidator.addValidation("url","req","URL website harus diisi");
	  
			frmvalidator.addValidation("jml_data","req","Jumlah data harus diisi");
			//]]>
		</script>
		</table>
</div><!--Akhir class isi kanan-->
<?php }

else { ?>
<h3>Anda tidak diijinkan mengakses halaman ini</h3>
<?php } ?>