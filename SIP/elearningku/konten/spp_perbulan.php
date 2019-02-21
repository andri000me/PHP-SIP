<?php
include "../adminpanel/aplikasi/database/koneksi_absensi_websch.php";
?>

<div class="panel panel-primary">
	<div class="panel-heading"><h3 class="panel-title"> Rincian Pembayaran SPP </h3></div>
	<div class="panel-body">

	<div class="row">
	<div class="col-md-3">
	<form class="form-horizontal text-center" method="POST" action="?p=sppperbulan" >
	
        <select class="form-control" name="bulan" onchange="this.form.submit()">
			<option selected="selected">Pencarian SPP PerBulan</option>
			<?php
				$bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","July","Agustus","September","Oktober","November","Desember");	
		//Perulangan semester ganjil			
			for ($bulan=7;$bulan<=12;$bulan++) {
				if (strlen($bulan)==1) {echo "<option value='0$bulan'>$bln[$bulan]</option>";} else {echo "<option value='$bulan'>$bln[$bulan]</option>";}
			}
		//Perulangan semester genap
			for ($bulan2=1;$bulan2<=6;$bulan2++) {
			if (strlen($bulan2)==1) {echo "<option value='0$bulan2'>$bln[$bulan2]</option>";} else {echo "<option value='0$bulan2'>$bln[$bulan2]</option>";}
			}
			?>
		</select>
	</form>
	</div>
</div>
	
	
	
<?php


// Data Pembayaran SPP
		echo "
		<div class=table-responsive>
		<table bgcolor=#ffffff cellspacing=1 cellpadding=1 id=results class=table>
		<tr bgcolor=#3498db  width=80%>
		<th class=tabel>No</th>
		<th class=tabel>No.Induk</th>
		<th class=tabel>Nama</th>
		<th class=tabel>Kelas</th>
		<th class=tabel>Tanggal Bayar</th>
		<th class=tabel>Jumlah</th>
		</tr>";
		
			// Query Menampilkan Data
			$data_siswa=mysql_query("SELECT * FROM sh_kelas , sh_siswa , sh_byrspp ,  sh_spp , sh_ortu   WHERE MONTH( tgl_bayar ) = '$_POST[bulan]'
									AND sh_kelas.id_kelas = sh_siswa.id_kelas AND
									sh_ortu.id_siswa = sh_siswa.id_siswa AND
									sh_ortu.id_ortu = '$_SESSION[orangtua]' AND
									sh_byrspp.id_spp = sh_spp.id_spp AND
									sh_byrspp.nis = sh_siswa.nis");
			$cek_spp=mysql_num_rows($data_siswa);
			if($cek_spp > 0){
			while ($isi_siswa=mysql_fetch_array($data_siswa)){
			$no++;
			
			// Perulangan untuk Query $data_spp
			$data_spp=mysql_fetch_array(mysql_query("select * from sh_byrspp , sh_spp
			where sh_byrspp.id_spp = sh_spp.id_spp AND
			sh_byrspp.nis='$isi_siswa[nis]'"));
			
			// Untuk Merubah Outpout Angka Int DB jadi Format Mata Uang
			$jumlah = number_format($data_spp['jumlah'],0,",", ",");
			echo "<tr class=tabel>
			<td class=tabel>$no.</td>
			<td class=tabel>$isi_siswa[nis]</td>
			<td class=tabel>$isi_siswa[nama_siswa]</td>
			<td class=tabel>$isi_siswa[nama_kelas]</td>
			<td class=tabel>$isi_siswa[tgl_bayar]</td>
			<td class=tabel>Rp." . $jumlah. ",-</td>
			</tr>";
			 } // End Of While
			} else {
			echo "<tr> <td colspan=6 > BELUM ADA DATA PEMBAYARAN </td> </tr>";
			}
		echo "</table> </div>";
		
		?>
		
		<!-- Paging -->
		<div id="pageNavPosition"></div>
		<script type="text/javascript"><!--
		var pager = new Pager('results', 5); 
		pager.init(); 
		pager.showPageNav('pager', 'pageNavPosition'); 
		pager.showPage(1);
		//--></script>
		
<br/>		


		
		<?php
		
		$data_siswa=mysql_query("select * from sh_kelas , sh_siswa , sh_ortu where 
										  sh_kelas.id_kelas = sh_siswa.id_kelas AND
										  sh_siswa.id_siswa = sh_ortu.id_siswa AND
										  sh_ortu.id_ortu = '$_SESSION[orangtua]'");
			//Perulangan $data_siswa						
			while ($isi_siswa=mysql_fetch_array($data_siswa)){
		
			$tgl_now=date("d");//tanggal sekarang
			$bulan_now=date("m");//bulan sekarang
			$tgl_exp="25";//tanggal expired
			
			//query untuk menampilkan data
			$ce_spp=mysql_fetch_array(mysql_query("select tgl_bayar from sh_byrspp where nis = '$isi_siswa[nis]' ORDER BY tgl_bayar DESC"));
			
			// Untuk cek data didatabase
			$ce_spp_row=mysql_num_rows(mysql_query("select tgl_bayar from sh_byrspp where sh_byrspp.nis='$isi_siswa[nis] order by tgl_bayar desc'" ));
			
			// Untuk memisahkan data pada tanggal pembayaran pada database
			$tanggal = $ce_spp['tgl_bayar'];
			$tgl_explode = explode ("-",$tanggal);
			$tahun = $tgl_explode[0];
			$bulan = $tgl_explode[1];
			$hari = $tgl_explode[2];
			
    //Untuk cek data pembayaran SPP 
    if ($bulan == $bulan_now)
  {
   //Kosong
  } 
    //Untuk cek data yang belum melakukan pembayaran
    else if ($bulan < $bulan_now && $tgl_now = $tgl_exp )
   {
        //Untuk menampilkan peringatan SPP
		echo" <div class=popup1-wrapper id=popup1>
			  <div class=popup1-containerr> 
			  <h2>Anda belum melakukan pembayaran SPP bulan ini</h2>
			  <a class=popup1-close href=#popup1>X</a>
			  </div>
			  </div>";
	} 
    //Untuk cek isi data pada database SPP
    else if ($ce_spp_row == 0 ) 
   {
    //Untuk menampilkan peringatan SPP
		echo" <div class=popup1-wrapper id=popup1>
			  <div class=popup1-containerr> 
			  <h2>Anda belum melakukan pembayaran SPP bulan ini</h2>
			  <a class=popup1-close href=#popup1>X</a>
			  </div>
			  </div>";
	}

			}
			
			// Pengambilan alamat link get untuk halaman cetak
echo	"<a href='../elearning/konten/cetak/print_lap_spp_ortu.php?tahun=$_POST[bln_thn]&tingkat=$_POST[tingkat]&orangtua=$_SESSION[orangtua]' target=_blank>
		 <img class='img-responsive' src='konten/cetak/ico-printer.png' width='40px' style=float:right;/></a>";


 ?>
 
</div>
</div>