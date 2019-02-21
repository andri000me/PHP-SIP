<?php
//Fungsi Cek Modem
function getParam($x, $i)
{
	$handle = @fopen("smsdrc".$i, "r");
	if ($handle) 
	{
		while (!feof($handle)) 
		{
			$buffer = fgets($handle);
			if (substr_count($buffer, $x.' = ') > 0)
			{
				$split = explode($x." = ", $buffer);
				$param = str_replace(chr(13).chr(10), "", $split[1]);
			}
		}
	}		
	fclose($handle);
	return $param;
}

// Merubah Kode No Telp 0 -> +62
function hp($nohp) {
    // kadang ada penulisan no hp 0811 239 345
    $nohp = str_replace(" ","",$nohp);
    // kadang ada penulisan no hp (0274) 778787
    $nohp = str_replace("(","",$nohp);
    // kadang ada penulisan no hp (0274) 778787
    $nohp = str_replace(")","",$nohp);
    // kadang ada penulisan no hp 0811.239.345 
    $nohp = str_replace(".","",$nohp);

    // cek apakah no hp mengandung karakter + dan 0-9
    if(!preg_match('/[^+0-9]/',trim($nohp))){
        // cek apakah no hp karakter 1-3 adalah +62
        if(substr(trim($nohp), 0, 3)=='+62'){
            $hp = trim($nohp);
        }
        // cek apakah no hp karakter 1 adalah 0
        elseif(substr(trim($nohp), 0, 1)=='0'){
            $hp = '+62'.substr(trim($nohp), 1);
        }
    }
 // print $hp; Menampilkan Data $hp
}

// mengecek apakah sebuah nomor hp sudah teregistrasi atau belum
function ceknohp($nohp)
{
	$query = "SELECT * FROM sh_ortu WHERE no_hp = '$nohp'";
	$hasil = mysql_query($query);
	if (mysql_num_rows($hasil) > 0) return 1;
	else return 0;
}

// mengecek apakah sebuah nomor hp sudah teregistrasi atau belum untuk absensi
function ceknohpabsen($nohp)
{
	$query = "SELECT * FROM wali WHERE no_hp = '$nohp'";
	$hasil = mysql_query($query);
	if (mysql_num_rows($hasil) > 0) return 1;
	else return 0;
}

// cek kesesuaian nomor hp dan pin
function cekpin($nohp, $pin)
{
	$query = "SELECT * FROM sh_ortu WHERE no_hp = '$nohp'";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);
	if ($pin == $data['pin']) return 1;
	else return 0;
}

/* ------------------------------------------------------------------------- */

// mengecek apakah sebuah nomor hp BOS sudah teregistrasi atau belum
function ceknohpbos($nohp)
{
	$query = "SELECT * FROM bos WHERE nohp = '$nohp'";
	$hasil = mysql_query($query);
	if (mysql_num_rows($hasil) > 0) return 1;
	else return 0;
}

// mengecek apakah namagroup yang dikirim telah sesuai
function ceknamagroup($namagroup)
{
	$query = "SELECT * FROM pbk_groups WHERE Name = '$namagroup'";
	$hasil = mysql_query($query);
	if (mysql_num_rows($hasil) > 0) return 1;
	else return 0;
}

// cek kesesuaian nomor hp dan pin BOS
function cekpinbos($nohp, $pin)
{
	$query = "SELECT * FROM bos WHERE nohp = '$nohp'";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);
	if ($pin == $data['pin']) return 1;
	else return 0;
}

// baca nilai matapelajaran berdasarkan kode mapel dan no hp si orangtua
function bacanilai($nohp, $kode_mapel)
{
	$query = "SELECT id_siswa FROM sh_ortu WHERE no_hp = '$nohp'";
	$hasil = mysql_query($query);
	$data  = mysql_fetch_array($hasil);
	$id_siswa   = $data['id_siswa'];
	
	$query = "SELECT nama_siswa, nama_ortu, nama_mapel,semester,tahun_ajaran,nilai_tugas,nilai_uts,nilai_uas FROM sh_siswa, sh_mapel, sh_nilai WHERE 
			  sh_mapel.id_mapel = sh_nilai.id_mapel AND 
			  sh_siswa.id_siswa = sh_nilai.id_siswa AND 
			  sh_siswa.id_siswa = '$id_siswa' AND sh_mapel.kode_mapel = '$kode_mapel'";
	$hasil = mysql_query($query);
	if (mysql_num_rows($hasil) > 0)
	{
		$data = mysql_fetch_array($hasil);
		return "Kepada YTH Bapak/Ibu ".$data['nama_ortu']. "  Tahun Ajaran : ".$data['tahun_ajaran']. " Semester : ".$data['semester']. " Mata Pelajaran : ".$data['nama_mapel']. " Nama Siswa : ".$data['nama']." Nilai TUGAS : ".$data['nilai_tugas']." Nilai UTS : ".$data['nilai_uts']." Nilai UAS: ".$data['nilai_uas'];
	}
	else return "Mata Pelajaran tidak ditemukan / Nilai Belum di Update";	
}

// kirim sms
function sendsms($nohp, $pesan, $modem)
{
	
	$pesan = str_replace("'", "\'", $pesan);
	
	if (strlen($pesan)<=160)
	{ 
		$query = "INSERT INTO outbox (DestinationNumber, TextDecoded, SenderID, CreatorID) 
		          VALUES ('$nohp', '$pesan', '$modem', 'Gammu')";
		$hasil = mysql_query($query);
	}
	else
	{
		$jmlSMS = ceil(strlen($pesan)/153);
		$pecah  = str_split($pesan, 153);
		 
		$query = "SHOW TABLE STATUS LIKE 'outbox'";
		$hasil = mysql_query($query);
		$data  = mysql_fetch_array($hasil);
		$newID = $data['Auto_increment'];
	
		$random = rand(1, 255);
		$headerUDH = sprintf("%02s", strtoupper(dechex($random)));
	
		for ($i=1; $i<=$jmlSMS; $i++)
		{
		
			$udh = "050003".$headerUDH.sprintf("%02s", $jmlSMS).sprintf("%02s", $i);
			$msg = $pecah[$i-1];
	  
			if ($i == 1) 
			{	
				$query = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, SenderID, CreatorID)
						  VALUES ('$nohp', '$udh', '$msg', '$newID', 'true', '$modem', 'Gammu')";	  	  
			}						 
			else $query = "INSERT INTO outbox_multipart(UDH, TextDecoded, ID, SequencePosition)
						   VALUES ('$udh', '$msg', '$newID', '$i')";					  
			mysql_query($query); 	  
	  	  
		}
   }
}

?>