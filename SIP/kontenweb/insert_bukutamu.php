<?php
include "../konfigurasi/koneksi.php";

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
session_start();
if(md5($_POST['kode']) == $_SESSION['image_random_value']){
mysql_query("INSERT into sh_buku_tamu (nama_bukutamu, subjek, isi_pesan, email, tanggal_kirim)
			VALUES ('$_POST[nama]','$_POST[subjek]','$_POST[pesan]','$_POST[email]','$tanggal')");
echo "<script>window.alert('Terimakasih telah mengisi buku tamu kami, pesan anda akan dimoderasi oleh admin');window.location=('../index.php?p=bukutamu')</script>";
}
else {
echo "<script>window.alert('Kode verifikasi yang anda masukkan salah. Silahkan ulangi kembali');window.location=('../index.php?p=bukutamu')</script>";
}

?>