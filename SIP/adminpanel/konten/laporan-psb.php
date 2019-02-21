<?php

// nama file

$namaFile = "laporan-psb.xls";

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
xlsWriteLabel(0,1,"NO.REG");               
xlsWriteLabel(0,2,"TANGGAL DAFTAR");              
xlsWriteLabel(0,3,"NAMA PENDAFTAR");
xlsWriteLabel(0,4,"JENKEL");
xlsWriteLabel(0,5,"NEM");   
xlsWriteLabel(0,6,"SEKOLAH ASAL"); 
xlsWriteLabel(0,7,"NO STTB"); 
xlsWriteLabel(0,8,"TANGGAL STTB"); 
xlsWriteLabel(0,9,"TEMPAT LAHIR"); 
xlsWriteLabel(0,10,"TANGGAL LAHIR"); 
xlsWriteLabel(0,11,"BB (Kg)"); 
xlsWriteLabel(0,12,"TB (Cm)"); 
xlsWriteLabel(0,13,"NAMA ORANG TUA"); 
xlsWriteLabel(0,14,"PEKERJAAN ORANG TUA"); 
xlsWriteLabel(0,15,"ALAMAT"); 
xlsWriteLabel(0,16,"TELEPON"); 
xlsWriteLabel(0,17,"EMAIL"); 


include "../../konfigurasi/koneksi.php";


$query = "SELECT * FROM sh_psb ORDER BY nem DESC";
$hasil = mysql_query($query);

$noBarisCell = 1;

$noData = 1;

while ($data = mysql_fetch_array($hasil))
{
   xlsWriteNumber($noBarisCell,0,$noData);
   xlsWriteNumber($noBarisCell,1,$data['id_psb']);
   xlsWriteLabel($noBarisCell,2,$data['tanggal_psb']);
   xlsWriteLabel($noBarisCell,3,$data['nama_psb']);
   xlsWriteLabel($noBarisCell,4,$data['jenkel']);
   xlsWriteNumber($noBarisCell,5,$data['nem']);
   xlsWriteLabel($noBarisCell,6,$data['sekolah_asal']);
   xlsWriteLabel($noBarisCell,7,$data['no_sttb']);
   xlsWriteLabel($noBarisCell,8,$data['tanggal_sttb']);
   xlsWriteLabel($noBarisCell,9,$data['tempat_lahir']);
   xlsWriteLabel($noBarisCell,10,$data['tanggal_lahir']);
   xlsWriteNumber($noBarisCell,11,$data['bb']);
   xlsWriteNumber($noBarisCell,12,$data['tb']);
   xlsWriteLabel($noBarisCell,13,$data['nama_ortu']);
   xlsWriteLabel($noBarisCell,14,$data['pekerjaan_ortu']);
   xlsWriteLabel($noBarisCell,15,$data['alamat_psb']);
   xlsWriteLabel($noBarisCell,16,$data['telepon']);
   xlsWriteLabel($noBarisCell,17,$data['email']);

   $noBarisCell++;
   $noData++;
}

// memanggil function penanda akhir file excel
xlsEOF();
exit();

?>
