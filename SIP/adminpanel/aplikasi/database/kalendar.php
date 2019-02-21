<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

 #Mengubah format date menjadi varchar untuk tanggal kalendar agenda
		 $pecah = explode("-", $_POST['tgl_kalendar']);
         $date  = $pecah[2];
         $month = $pecah[1];
         $year  = $pecah[0];
			
 #Menghilangkan angka nol di depan tanggal dan bulan 			
		 $tgl   = ltrim($date,'0');
		 $bln   = ltrim($month,'0');	 
		 $jadwal_kalendar = "$tgl-$bln-$year";

if ($pilih=='kalendar' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_kalendar_akademik(tgl_akademik,
							 tgl_kalendar,
							 subjek,
							 keterangan)
				 VALUES('$_POST[tgl_kalendar]',
						'$jadwal_kalendar',
						'$_POST[subjek_kalendar]',
						'$_POST[keterangan_kalendar]')");
					
	header('location:../../kalendar_akademik.php');
}

elseif ($pilih=='kalendar' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_kalendar_akademik  SET 	tgl_akademik ='$_POST[tgl_kalendar]',
													tgl_kalendar ='$jadwal_kalendar',
													subjek = '$_POST[subjek_kalendar]',
													keterangan = '$_POST[keterangan_kalendar]'
													WHERE id_kalendar ='$_POST[id]'");		
										
	header('location:../../kalendar_akademik.php');
}


elseif ($pilih=='kalendar' AND $untukdi=='hapus'){
	if ($_GET['id']== 0){					
	header('location:../../kalendar_akademik.php');
	}
	else {
	mysql_query("DELETE FROM sh_kalendar_akademik WHERE id_kalendar ='$_GET[id]'");					
	header('location:../../kalendar_akademik.php');
	}
}

?>