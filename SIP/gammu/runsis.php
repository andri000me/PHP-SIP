<?php
include 'koneksi_gabungan.php';
include 'functionsis.php';
//Buka Koneksi ke DB Gammu
koneksi3_buka();
// Cek semua sms masuk di inbox
$query = "SELECT * FROM inbox WHERE Processed = 'false'";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
	$id = $data['ID'];
	$sms = strtoupper($data['TextDecoded']);
	$nohp = $data['SenderNumber'];
	$split = explode("#", $sms);
	
	// baca keyword utama
	$command = $split[0];
	
/********************************************************************************* INI BAGIAN CEK FORWARD ***********************************************************************/
// NOTE : FORWARD SUDAH BERJALAN NORMAL 
	
	// jika keywordnya FORWARD	
	if ($command == "FWD")
	{
	// jika jml parameternya 4
		if (count($split) == 4)
		{
			// cek apakah nomor hp terdaftar
			if (ceknohpbos($nohp) == 1)
			{
				// baca pin
				$pin = $split[3];
				// baca isi
				$namagroup = $split[1];
				$pesan = $split[2];
				// cek kesesuaian pin dan no hp
				if (cekpinbos($nohp, $pin) == 1)
				{
				// Cek Kesesuaian Format Group
				if (ceknamagroup($namagroup) == 1)
				{
				// Mendapatkan NAMA Forwarding
				$querybos = "SELECT nama from bos where nohp = '$nohp'";
				$hasilbos = mysql_query($querybos);
				$databos = mysql_fetch_array($hasilbos);
				$bosnama = $databos['nama'];
				// Mendapatkan Group ID
				$querygid = "SELECT ID from pbk_groups where Name = '$namagroup'";
				$hasilgid = mysql_query($querygid);
				$datagid = mysql_fetch_array($hasilgid);
				$gid = $datagid['ID'];
				// Mendapatkan Kontak dari Group
				$query = "SELECT * FROM pbk WHERE GroupID = '$gid'";
				$hasil = mysql_query($query);
				while ($data = mysql_fetch_array($hasil))
				  {
				  $nohpkontak = $data['Number'];
				  $nohpnew = "+62$nohpkontak";
				  $pesannew = " Informasi BroadCast dari ".$bosnama." : ".$pesan." Forward by - PT.Trimitra - ";
				  // kirim balasan Forward ke Group
				  sendsms($nohpnew, $pesannew, '');
				  }	
				if($hasil){
				  // kirim balasan ke si pengirim pesan 
				  $replysucsess = " Pesan Forward BroadCast SUKSES dikirimkan. Forward by - PT. Trimitra - ";
				  sendsms($nohp, $replysucsess, ''); 
				  }
				 } else $reply = "Maaf Kode Group Salah !";	
				} else $reply = "Maaf PIN salah !";	
			  } else $reply = "Maaf No HP tidak terdaftar !";
			} else $reply = "Format SMS salah !";
			// kirim balasan gagal ke pengirim
			sendsms($nohp, $reply, '');
		} 

/********************************************************************************* INI BAGIAN CEK ABSENSI ***********************************************************************/
// NOTE : ABSENSI CEK NO TELP PENGIRIM MASIH BELUM DAPAT SOLUSI -- TROUBLE DI KONEKSI CLEAR DI JAM 14.50 WIB 17 MEI 2016

// jika keywordnya ABSENSI
else if($command == "ABSENSI")
	{
	  // jika jml parameternya 3
	  if (count($split) == 3)
		{
		// baca noinduk
		$noinduk = $split[1];
		$tanggal_cek = $split[2];
		
		//Buka Koneksi ke DB Absensi disini 
		koneksi1_buka();
		// Merubah Format No Telp dari Pengirim
		$hp0 = substr_replace($nohp,'0',0,3); 
		// cek apakah nomor hp terdaftar
		if (ceknohpabsen($hp0) == 1)
			{
				// Menampilkan data siswa berdasar nis dan tanggal awal & tanggal akhir absensi
				$queryAB = "SELECT nama,hari,scan_date,result_proc.n_induk,tahun_ajaran,result_proc.siswa_name,kelas_name,jadwal_name,jam_masuk,scan_in,terlambat,jam_pulang,scan_out,pulang_cepat,status_hadir 
							FROM result_proc , siswa , wali
							where result_proc.n_induk ='$noinduk' AND
							result_proc.scan_date ='$tanggal_cek' AND 
							siswa.siswa_id = wali.siswa_id AND
							result_proc.siswa_name = siswa.siswa_name order by result_proc.scan_date desc";
				$hasilAB = mysql_query($queryAB);
				while($row = mysql_fetch_array($hasilAB))
				{
				// explode di gunakan untuk memisahkan data per kata
				$datetime = $row['scan_date'];
				$arr_tanggaljam = explode (" ",$datetime);
				$nama_ortu = $row['nama'];
				$tanggal = $arr_tanggaljam[0];
				$nama_siswa = $row['siswa_name'];
				$kelas = $row['kelas_name'];
				if ($row['scan_in'] == "" AND $row['scan_out'] =="") {
				$scan_masuk = "Tidak Scan";
				$scan_out = "Tidak Scan";
				} else {
				$scan_masuk = $row['scan_in'];
				$scan_out = $row['scan_out'];
				}
				if ($row['terlambat'] == 0){
				$terlambat = "0 Menit";
				} else {
				$terlambat = $row['terlambat'];
				}
				
			   } // End Of While
			   // konfirmasi Absensi
			  $reply = "Kepada Yth. Bpk/Ibu ".$nama_ortu." Tanggal : ".$tanggal." Nama Siswa : ".$nama_siswa." Kelas : ".$kelas." Jam Masuk : ".$scan_masuk." Terlambat : ".$terlambat." Jam Pulang : ".$scan_out;
			}	
			else $reply = "Maaf No HP tidak terdaftar";
		//Tutup Koneksi ke DB Absensi disini
		koneksi1_tutup();
	   }// jika jml parameter tidak 2
	  else $reply = "Maaf, format Untuk CEK ABSENSI salah !";
	 //Koneksi untuk kirim pesan
	 include 'koneksi.php';
	// kirim balasan
	sendsms($nohp, $reply, '');
}	
		
	
/********************************************************************************* INI BAGIAN CEK NILAI ***********************************************************************/	
// NOTE : NILAI CEK PIN PENGIRIM MASIH BELUM DAPAT SOLUSI -- TROUBLE DI KONEKSI CLEAR DI JAM 16.15 WIB 17 MEI 2016
	
	else if ($command == "NILAI")
	{
		// cek jumlah parameter
		if (count($split) == 3)
		{
			// Koneksi ke DB Websch
			koneksi2_buka();
			
			// Merubah Format No Telp dari Pengirim
			$hp0 = substr_replace($nohp,'0',0,3); 

			// cek apakah nomor hp terdaftar
			if (ceknohp($hp0) == 1)
			{
			
				// baca pin
				$pin = $split[2];
			
				// cek kesesuaian pin dan no hp
				if (cekpin($hp0, $pin) == 1)
				{
					// baca id mapel
					$kode_mapel = $split[1];
					// baca nilai dari mapel berdasarkan no hp siswa
					$reply = bacanilai($hp0, $kode_mapel);
				}
				else $reply = "Maaf PIN salah";
			}	
			else $reply = "Maaf No HP tidak terdaftar";
			
		//Tutup Koneksi ke DB Websch
		koneksi2_tutup();
	}
	else $reply = "Format SMS salah";
		
	//Koneksi untuk kirim pesan
	include 'koneksi.php';
	// kirim balasan ke si pengirim pesan
	sendsms($nohp, $reply, '');

}

/********************************************************************************* INI BAGIAN CEK SPP ***********************************************************************/
// NOTE : SPP NOMOR PENGIRIM HARUS SESUAI DENGAN DATABASE Cth : +62 85778099856 -- TROUBLE DI KONEKSI CLEAR DI JAM 15.18 WIB 17 MEI 2016


   // jika keywordnya SPP	
	else if ($command == "SPP")
	{
		// jika jml parameternya 2
		if (count($split) == 2)
		{
	//Koneksi ke DB Websch
	koneksi2_buka();
			// baca nis
			$nis = $split[1];
			// Menampilkan data siswa berdasar nis dan spp nis
			$query2NP = "SELECT sh_siswa.nama_siswa, sh_ortu.nama_ortu, sh_ortu.no_hp, sh_byrspp.tgl_bayar, sh_spp.jumlah
						FROM sh_siswa, sh_ortu, sh_byrspp, sh_spp
						WHERE sh_byrspp.nis ='$nis'
						AND sh_byrspp.nis = sh_siswa.nis
						AND sh_ortu.id_siswa = sh_siswa.id_siswa
						AND sh_siswa.nis ='$nis'
						AND sh_byrspp.id_spp = sh_spp.id_spp";
			$hasilNP = mysql_query($query2NP);
			$dataNP = mysql_fetch_array($hasilNP);
			// Merubah Format No Telp dari Pengirim
			$hp0 = substr_replace($nohp,'0',0,3); 
			// Cek Kesesuaian No Telp Orang Tua
			if ($hp0 == $dataNP['no_hp'])
			{
			// Untuk Merubah Outpout Angka Int DB jadi Format Mata Uang
			$jumlahspp = number_format($dataNP['jumlah'],0,",", ",");
			// konfirmasi SPP
			$reply = "Kepada YTH Bapak/Ibu ".$dataNP['nama_ortu']. " Nama Siswa : ".$dataNP['nama_siswa']." Tgl.Pembayaran SPP : ".$dataNP['tgl_bayar'] ." Jumlah Pembayaran SPP : Rp." .$jumlahspp. ",-" ;
			}	
			else $reply = "Maaf Akses No HP Tidak Sesuai dengan NIS";
		
		}
		// jika jml parameter tidak 2
		else $reply = "Maaf, format Untuk CEK SPP salah";
	//Tutup Koneksi ke DB Websch
	koneksi2_tutup();
	
	//Koneksi untuk kirim pesan
	include 'koneksi.php';
	// kirim balasan
	sendsms($nohp, $reply, '');
	}

	// QUERY UPDATE SETELAH PROSES FILTER
	$query2 = "UPDATE inbox SET Processed = 'true' WHERE id = '$id'";
	mysql_query($query2);
	
} // End Of WHILE
//Tutup Koneksi ke DB Gammu
koneksi3_tutup();

/********************************************************************************* INI BAGIAN AKTIF AUTO RESPON ***********************************************************************/
// NOTE : AKTIF AUTO RESPON SAAT MENAMBAH DATA MASIH TROUBLE TERKIRIM BANYAK -- TROUBLE DI KONEKSI CLEAR DI JAM 10.15 WIB 17 MEI 2016

//Buka Koneksi ke DB Websch
koneksi2_buka();
$querysiswa = "SELECT * FROM sh_siswa , sh_ortu WHERE autorespon = 'non' AND sh_siswa.id_siswa = sh_ortu.id_siswa";
$hasilsiswa = mysql_query($querysiswa);
while ($datasiswa = mysql_fetch_array($hasilsiswa))
{
	$id_siswa = $datasiswa['id_siswa'];
	$nohp = $datasiswa['no_hp'];
	$nama_ortu = $datasiswa['nama_ortu'];
	$pin = $datasiswa['pin'];
	$autorespon = $datasiswa['autorespon'];

if($autorespon == "non") {	

	// Pesan Konfirmasi
	$pesan = "Kpd Yth Bpk/Ibu $nama_ortu tlh trdftr pd Sistem Auto Respon Pin:$pin,Frmt Cek Nilai:NILAI#KODEMAPEL#PIN Cth:NILAI#MP002#1234 Krm ke 0895348099571";
	$pesanWebsite = "Untuk Fasilitas Akses Ke Dalam Website Sekolah Dengan Username : $datasiswa[username] & Password : $datasiswa[password] Login di http://192.168.19.19/websch";
	//Tutup Koneksi ke DB Websch
	 koneksi2_tutup();
	
	//Koneksi untuk kirim pesan
	include 'koneksi.php';
	
	// Kirim SMS Registrasi AutoRespon
	sendsms($nohp, $pesan, '');
	// Kirim SMS Registrasi Website
	sendsms($nohp, $pesanWebsite, '');
  }
 
//Buka Koneksi ke DB Websch
koneksi2_buka();
	// Query update status siswa
	$querysiswa2 = "UPDATE sh_siswa SET autorespon = 'registered' WHERE id_siswa = '$id_siswa'";
	mysql_query($querysiswa2);
}
//Tutup Koneksi ke DB Websch
koneksi2_tutup();

/********************************************************************************* INI BAGIAN AKTIF REAL TIME FTM GURU ***********************************************************************/
// NOTE : BUILD IN 03 NOPEMBER 2016 21:16

//Buka Koneksi ke Gammu
koneksi3_buka();
$queryftm = "SELECT * FROM ftm_scan , ftm_emp WHERE ftm_scan.sms = 'non' AND ftm_scan.pin = ftm_emp.nik";
$hasilftm = mysql_query($queryftm);
while ($dataftm = mysql_fetch_array($hasilftm))
{
    $id = $dataftm['ftm_scanid'];
	$nama = $dataftm['first_name'];
	$nama2 = $dataftm['last_name'];
	$waktu_scan = $dataftm['scan_date'];
	$sms = $dataftm['sms'];

if($sms == "non") {	
$queryftmsetting = "SELECT * FROM ftm_setting";
$hasilftmsetting = mysql_query($queryftmsetting);
while ($dataftmsetting = mysql_fetch_array($hasilftmsetting))
{
  $namabos = $dataftmsetting['nama'];
  $nohp = "+62".$dataftmsetting['nohp'];
  // Masuk
  $jadwalmasukawal = $dataftmsetting['jam_awalmasuk'];
  $jma =  explode(":",$jadwalmasukawal);
  $jadwalmasukakhir = $dataftmsetting['jam_akhirmasuk'];
  $jma2 =  explode(":",$jadwalmasukakhir);
  // Pulang
  $jadwalpulangawal = $dataftmsetting['jam_awalpulang'];
  $jmp =  explode(":",$jadwalpulangawal);
  $jadwalpulangakhir = $dataftmsetting['jam_akhirpulang'];
  $jmp2 =  explode(":",$jadwalpulangakhir);
  //Jam Server
  $jam_server = date("h:i");
  $js = explode(":",$jam_server);
  $jsw = $js[0];
  
  // tampilan
  // echo $jsw;
  // echo $jma[0];
  // echo $jma2[0];
  // echo $jmp[0];
  // echo $jmp2[0];
  // echo $nohp;
  
  if($jsw >= $jma[0] && $jsw <= $jma2[0]) {

	// Pesan Konfirmasi
	$pesan = "$nama $nama2 tlh melakukan scan masuk kerja pada waktu : $waktu_scan";
	
	//Koneksi untuk kirim pesan
	include 'koneksi.php';
	
	// Kirim SMS Scan Masuk FTM
	sendsms($nohp, $pesan, '');
	
	// Query update status ftm_scan
	$queryupdateftmscan = "UPDATE ftm_scan SET sms = 'send' WHERE ftm_scanid = '$id'";
	mysql_query($queryupdateftmscan);
	
	
	} 
	
  else if ($jsw >= $jmp[0] && $jsw <= $jmp2[0]) {
  
    // Pesan Konfirmasi
	$pesan = "$nama $nama2 tlh melakukan scan pulang kerja pada waktu : $waktu_scan";
	
	//Koneksi untuk kirim pesan
	include 'koneksi.php';
	
	// Kirim SMS Scan Masuk FTM
	sendsms($nohp, $pesan, '');
	
	// Query update status ftm_scan
	$queryupdateftmscan = "UPDATE ftm_scan SET sms = 'send' WHERE ftm_scanid = '$id'";
	mysql_query($queryupdateftmscan);
  
  } Else {
  
    // Pesan Konfirmasi
	$pesan = "$nama $nama2 tidak melakukan scan dalam Jadwal Masuk Kerja : $jadwalmasukawal & Jadwal Pulang Kerja : $jadwalpulangawal";
	
	//Koneksi untuk kirim pesan
	include 'koneksi.php';
	
	// Kirim SMS Scan Masuk FTM
	sendsms($nohp, $pesan, '');
	
	// Query update status ftm_scan
	$queryupdateftmscan = "UPDATE ftm_scan SET sms = 'send' WHERE ftm_scanid = '$id'";
	mysql_query($queryupdateftmscan);
  
  
  }
	
     } // End Of While FTM SETTING
	} // End If SMS = non
   } // End Of While FTM SCAN
 
//Tutup Koneksi ke Gammu
koneksi3_tutup();

?>