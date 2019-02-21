<?php
define('DB1_NAMA', 'absensi'); // sesuaikan dengan nama database pertama anda
define('DB1_USER', 'root'); // sesuaikan dengan nama pengguna database pertama anda
define('DB1_PASSWORD', ''); // sesuaikan dengan kata sandi database pertama anda
define('DB1_HOST', 'localhost'); // ganti jika letak database mysql di komputer lain
 
define('DB2_NAMA', 'sip'); // sesuaikan dengan nama database kedua anda
define('DB2_USER', 'root'); // sesuaikan dengan nama pengguna database kedua anda
define('DB2_PASSWORD', ''); // sesuaikan dengan kata sandi database kedua anda
define('DB2_HOST', 'localhost'); // ganti jika letak database mysql di komputer lain

define('DB3_NAMA', 'gammu_sch'); // sesuaikan dengan nama database ketiga anda
define('DB3_USER', 'root'); // sesuaikan dengan nama pengguna database ketiga anda
define('DB3_PASSWORD', ''); // sesuaikan dengan kata sandi database ketiga anda
define('DB3_HOST', 'localhost'); // ganti jika letak database mysql di komputer lain
 
 
// mengambil alamat direktori tempat berkas konfigurasi.php disimpan
define('ABSPATH', dirname(__FILE__).'/');
 
// memanggil berkas fungsi.php
require ABSPATH.'fungsi_db.php';

?>