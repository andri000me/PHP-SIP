<?php 
include "../../konfigurasi/koneksi.php";
$database="database/mading.php";
switch($_GET['pilih']){
default:

?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
	
<?php  if(isset($_GET['op'])) { ?>
<!-- tambah mading -->
<div class="panel panel-primary">
<div class="panel-heading"><h1 class="panel-title">Tambah Mading Siswa </h1></div>
<div class="panel-body">
	<div class="isikanan table-responsive"><!--Awal class isi kanan-->		
			<table class="table">
			<form class="form-horizontal" method="POST" <?php echo "action='database/mading.php?pilih=mading&untukdi=tambah'";?> name='formtambahmading' id='formtambahmading' enctype="multipart/form-data">
				<?php
				echo "<input type='hidden' name='nama_siswa' value='$_SESSION[namasiswa]'>";
				?>
				
				<tr><td class="isian"><b>Judul Mading</b></td><td class="isian" colspan="2"><input class="form-control" type="text" class="panjang" name="judul_mading" value="Judul mading disini..." onblur="if(this.value=='') this.value='Judul mading disini...';" onfocus="if(this.value=='Judul mading disini...') this.value='';"></td></tr>
				
				<tr><td class="isian" colspan="2"><textarea class="tini" name="isi_mading"></textarea></td></tr>
				
				<tr><td class="isiankanan" width="100px">Gambar</td>
					<td class="isian"><input type="file" name="fupload"></td>
				</tr>
				<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Gambar kecil digunakan untuk headline halaman depan website dan summary pada halaman arsip</i><br><hr></td></tr>
				
				<tr><td class="isiankanan" width="100px">Kategori</td>
					<td class="isian">
						<select name="kategori">
							<option value="1" selected>Pilih Kategori..</option>
							<?php
							$kategori=mysql_query("SELECT * FROM sh_mading_kategori");
							while ($r=mysql_fetch_array($kategori)){
							echo " <option value=$r[id_mading_kategori]>$r[nama_mading_kategori]</option>";} ?>
						</select>
					</td>
				</tr>
				<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Pilih kategori untuk mading, jika anda tidak memilih kategori maka secara otomatis diinputkan "Tanpa Kategori"</i><br><hr></td></tr>
				
				<tr><td class="isiankanan" width="100px">Terima Komentar</td>
					<td class="isian">
						<input type="radio" name="status_komentar" value="1" checked/>Ya&nbsp;
						<input type="radio" name="status_komentar" value="0">Tidak
					</td>
				</tr>
				<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Anda bisa menonaktifkan form komentar pada mading dengan memilih "Tidak"</i><br><hr></td></tr>
				
				<tr><td class="isiankanan" width="100px">Headline</td>
					<td class="isian">
						<input type="radio" name="status_headline" value="1">Ya&nbsp;
						<input type="radio" name="status_headline" value="0" checked/>Tidak
					</td>
				</tr>
				<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Setiap mading yang anda tulis dapat dijadikan sebagai headline pada halaman utama website. Dengan catatan mading harus mempuntai gambar kecil, jika tidak ada gambar kecil maka akan diinputkan gambar default</i><br><hr></td></tr>
				
				<tr><td class="isian" colspan="2">
				<input type="submit" class="btn btn-primary" value="Terbitkan">
				<input type="button" class="btn btn-danger" value="Batal" onclick="self.history.back()">
				</td></tr>
			</form>
			<script language="JavaScript" type="text/javascript" xml:space="preserve">
				//<![CDATA[
				var frmvalidator  = new Validator("formtambahmading");
				frmvalidator.addValidation("judul_mading","req","Judul mading harus diisi");
				frmvalidator.addValidation("judul_mading","maxlen=100","Judul mading maksimal 100 karakter");
				frmvalidator.addValidation("judul_mading","minlen=5",	"Judul mading minimal 5 karakter");
		  
				frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk gambar adalah : jpg, gif, png");
				//]]>
			</script>
			</table>
		</div>
		</div>
		</div>
		<!--Akhir class isi kanan-->
		<?php } else { ?>
	<!-- end tambah mading -->



	<!--************-->
	<!-- edit mading -->
	<!--************-->

	<!--****************-->
	<!-- end edit mading -->
	<!--****************-->









<div class="panel panel-primary">

<div class="panel-heading"><h1 class="panel-title"> Mading Siswa </h1></div>
<div class="panel-body">	
<a href="index.php?p=mading&op=tambah" class="btn btn-primary text-left">Tambah Mading</a>
<br/>
<div class="table-responsive">
<table id="results" class="table" cellpadding="1" cellspacing="1">
	<tr width="80%">
		<th>No</th>
		<th>Judul</th>
		<th>Penulis</th>
		<th>Tanggal</th>
		<th>Kategori</th>
		<th>Konfirmasi</th>
		<th>Pilihan</th>
	</tr><br/>
	<?php		
				$no=1;
				$madingg=mysql_query("SELECT * FROM sh_mading, sh_mading_kategori, sh_siswa
									WHERE sh_mading.id_kategori = sh_mading_kategori.id_mading_kategori
									AND sh_mading.nama_siswa = sh_siswa.nama_siswa 		  
									and sh_mading.nama_siswa='$_SESSION[namasiswa]'
									ORDER BY id_mading DESC");
				$cek_absen=mysql_num_rows($madingg);
				
				if($cek_absen > 0){
				while($row=mysql_fetch_array($madingg)){				
				
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo $no;?></td>
				<td class="tabel"><a href="<?php echo "../index.php?p=detmading&id=$row[id_mading]";?>"><?php echo "<b>$row[judul_mading]</b>";?></a></td>
				<td class="tabel"><?php echo $row['nama_siswa'];?></td>
				<td class="tabel"><?php echo $row['tanggal_posting'];?></td>
				<td class="tabel"><?php echo $row['nama_mading_kategori'];?></td>
				<!-- pemilihan status -->
				<?php  
				if($row['status_terbit']=="0")
					{
					$konfirm = "proses";
					}
					else if($row['status_terbit']=="1"){
							$konfirm = "publis";
						}	 
						else $konfirm ="reject";

						?>
				<!-- pemilihan status -->
				<td class="tabel"><?php echo $konfirm;?></td>
				<td class="tabel"><a href="?p=mading&pilih=edit&id=<?php echo $row[id_mading]; ?>">Edit</div>
			</tr>
			<?php
			$no++;
			} 
		  }  { ?>
			<?php } ?>
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
	
	<?php } ?>

<?php break;
		
		
		case "edit":
			include "konten/mading_edit.php";
		break;
				
		case "terima":
			include "aplikasi/mading_terima.php";
		break;
		
		case "tolak":
			include "aplikasi/mading_tolak.php";
		}
		?>
</div>
</div>
</div>