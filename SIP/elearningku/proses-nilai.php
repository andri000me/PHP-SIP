<?php
include "../konfigurasi/koneksi.php";

//VARIABLE DARI POST
	$jumSis = $_POST['jumlah'];

	for ($i=1; $i<=$jumSis; $i++)
	{
	   //Mengambil data dari Method POST Form
	   $id_siswa = $_POST['id_siswa'.$i];
	   $nilai  = $_POST['nilai'.$i];
	   $kategori = $_POST['kategori'];
	   $tahun = $_POST['tahun'];
	   $mapel = $_POST['mapel'];
	   $kelas = $_POST['kelas'];
	   $namaguru= $_POST['namaguru'];
	
	   $query = "insert into sh_nilai (id_kategori_nilai , id_tahun_ajaran , id_siswa , nilai , user_input) 
								values('$kategori','$tahun','$id_siswa','$nilai','$namaguru')";
	   $hasil=mysql_query($query);
	}
	
	if($hasil){
		?><script language="javascript">document.location.href="index.php?p=input_nilai_selesai&id_kelas=<?php echo $kelas;?>&id_mapel=<?php echo $mapel;?>&kat_nilai=<?php echo $kategori;?>&tahun=<?php echo $tahun;?>";</script><?php
	}else{
		?><script language="javascript">document.location.href="index.php?p=tambahnilai";</script><?php
	}

?>