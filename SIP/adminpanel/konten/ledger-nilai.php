<?php

// nama file

$namaFile = "laporan-ledger-nilai-$_POST[kelas]-$_POST[semester]-$_POST[tahun].xls";

// Function penanda awal file (Begin Of File) Excel

function xlsBOF() {
echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
return;
}

// Function penanda akhir file (End Of File) Excel

function xlsEOF() {
echo pack("ss", 0x0A, 0x00);
return;
}

// Function untuk menulis data (angka) ke cell excel

function xlsWriteNumber($Row, $Col, $Value) {
echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
echo pack("d", $Value);
return;
}

// Function untuk menulis data (text) ke cell excel

function xlsWriteLabel($Row, $Col, $Value ) {
$L = strlen($Value);
echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
echo $Value;
return;
}

// header file excel

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,
        pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");

// header untuk nama file
header("Content-Disposition: attachment;
        filename=".$namaFile."");

header("Content-Transfer-Encoding: binary ");

xlsBOF();
xlsWriteLabel(0,0,"NO");               
xlsWriteLabel(0,1,"NAMA SISWA");               
xlsWriteLabel(0,2,"NIS");              
xlsWriteLabel(0,3,"NAMA KELAS");
xlsWriteLabel(0,4,"NAMA MAPEL");
xlsWriteLabel(0,5,"NILAI TUGAS");   
xlsWriteLabel(0,6,"NILAI UTS"); 
xlsWriteLabel(0,7,"NILAI UAS"); 
xlsWriteLabel(0,8,"TOTAL NILAI RATA"); 


include "../../konfigurasi/koneksi.php";

// VARIABLE -> POST
$kelas = $_POST['kelas'];
$semester = $_POST['semester'];
$tahun = $_POST['tahun'];

$hasil = mysql_query("SELECT * FROM sh_nilai nilai, sh_siswa siswa, sh_mapel mapel, sh_kelas kelas
								   WHERE nilai.id_siswa=siswa.id_siswa and nilai.id_kelas= '$kelas' and nilai.id_kelas = kelas.id_kelas and
								   nilai.id_mapel= mapel.id_mapel and nilai.semester = '$semester' and nilai.tahun_ajaran= '$tahun' order by siswa.nama_siswa asc");

$noBarisCell = 1;

$noData = 1;

while ($data = mysql_fetch_array($hasil))
{
   xlsWriteNumber($noBarisCell,0,$noData);
   xlsWriteLabel($noBarisCell,1,$data['nama_siswa']);
   xlsWriteLabel($noBarisCell,2,$data['nis']);
   xlsWriteLabel($noBarisCell,3,$data['nama_kelas']);
   xlsWriteLabel($noBarisCell,4,$data['nama_mapel']);
   xlsWriteNumber($noBarisCell,5,$data['nilai_tugas']);
   xlsWriteNumber($noBarisCell,6,$data['nilai_uts']);
   xlsWriteNumber($noBarisCell,7,$data['nilai_uas']);
   xlsWriteNumber($noBarisCell,8,$data['rata']);

   $noBarisCell++;
   $noData++;
}

// memanggil function penanda akhir file excel
xlsEOF();
exit();

?>
