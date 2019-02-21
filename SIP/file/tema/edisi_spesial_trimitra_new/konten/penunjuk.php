<?php
	if($_GET['p']=="halaman_utama"){
		echo"<p class=navigasi>Halaman Utama</p>";
	}elseif($_GET['p']==""){
		echo"<p class=navigasi>Halaman Utama</p>";
	}elseif($_GET['p']=="info"){
		if($_GET['id']=="13"){
			echo"<p class=navigasi>Profil Sekolah &raquo; Sejarah Sekolah</p>";
		}elseif($_GET['id']=="14"){
			echo"<p class=navigasi>Profil Sekolah &raquo; Visi dan Misi</p>";
		}elseif($_GET['id']=="17"){
			echo"<p class=navigasi>Profil Sekolah &raquo; Fasilitas Sekolah</p>";
		}elseif($_GET['id']=="15"){
			echo"<p class=navigasi>Profil Sekolah &raquo; Profil Kepala Sekolah</p>";
		}elseif($_GET['id']=="18"){
			echo"<p class=navigasi>OSIS</p>";
		}
	}elseif($_GET['p']=="berita"){
		echo"<p class=navigasi>Artikel Sekolah</p>";
	}elseif($_GET['p']=="userberita"){
		echo"<p class=navigasi>Artikel Sekolah</p>";
	}elseif($_GET['p']=="detberita"){
		echo"<p class=navigasi>Artikel Sekolah &raquo; Detail Artikel</p>";
	}elseif($_GET['p']=="katberita"){
		echo"<p class=navigasi>Artikel Sekolah</p>";
	}elseif($_GET['p']=="madingKaryaTulis"){
		echo"<p class=navigasi>Mading Siswa &raquo; Karya Tulis</p>";
	}elseif($_GET['p']=="madingKaryaSeni"){
		echo"<p class=navigasi>Mading Siswa &raquo; Karya Seni</p>";
	}elseif($_GET['p']=="agenda"){
		echo"<p class=navigasi>Informasi &raquo; Agenda Sekolah</p>";
	}elseif($_GET['p']=="pengumuman"){
		echo"<p class=navigasi>Informasi &raquo; Pengumuman</p>";
	}elseif($_GET['p']=="guru"){
		echo"<p class=navigasi>Sekolah &raquo; Data Guru</p>";
	}elseif($_GET['p']=="gurujk"){
		echo"<p class=navigasi>Sekolah &raquo; Pencarian Data Guru</p>";
	}elseif($_GET['p']=="gurupencarian"){
		echo"<p class=navigasi>Sekolah &raquo; Pencarian Data Guru</p>";
	}elseif($_GET['p']=="staff"){
		echo"<p class=navigasi>Sekolah &raquo; Data Guru Staff</p>";
	}elseif($_GET['p']=="staffjk"){
		echo"<p class=navigasi>Sekolah &raquo; Pencarian Data Guru Staff</p>";
	}elseif($_GET['p']=="staffpencarian"){
		echo"<p class=navigasi>Sekolah &raquo; Pencarian Data Guru Staff</p>";
	}elseif($_GET['p']=="siswa"){
		echo"<p class=navigasi>Sekolah &raquo; Data Siswa</p>";
	}elseif($_GET['p']=="siswajk"){
		echo"<p class=navigasi>Sekolah &raquo; Pencarian Data Siswa</p>";
	}elseif($_GET['p']=="siswakelas"){
		echo"<p class=navigasi>Sekolah &raquo; Pencarian Data Siswa</p>";
	}elseif($_GET['p']=="siswapencarian"){
		echo"<p class=navigasi>Sekolah &raquo; Pencarian Data Siswa</p>";
	}elseif($_GET['p']=="alumni"){
		echo"<p class=navigasi>Sekolah &raquo; Data Alumni</p>";
	}elseif($_GET['p']=="alumnijk"){
		echo"<p class=navigasi>Sekolah &raquo; Pencarian Data Alumni</p>";
	}elseif($_GET['p']=="alumnipencarian"){
		echo"<p class=navigasi>Sekolah &raquo; Pencarian Data Alumni</p>";
	}elseif($_GET['p']=="galeri"){
		echo"<p class=navigasi>Galeri &raquo; Album Foto</p>";
	}elseif($_GET['p']=="foto"){
		echo"<p class=navigasi>Galeri &raquo; Album Foto &raquo; Foto</p>";
	}elseif($_GET['p']=="detfoto"){
		echo"<p class=navigasi>Galeri &raquo; Album Foto &raquo; Foto &raquo; Detail Foto</p>";
	}elseif($_GET['p']=="bukutamu"){
		echo"<p class=navigasi>Kirim Saran</p>";
	}elseif($_GET['p']=="psb"){
		echo"<p class=navigasi>Penerimaan Siswa Baru</p>";
	}elseif($_GET['p']=="tglberita"){
		echo"<p class=navigasi>Artikel &raquo; Detail Artikel</p>";
	}elseif($_GET['p']=="gmap"){
		echo"<p class=navigasi>ProfilSekolah &raquo; Lokasi Sekolah</p>";
	}elseif($_GET['p']=="formpsb"){
		echo"<p class=navigasi>Penerimaan Siswa Baru &raquo; Formulir Pendaftaran</p>";
	}elseif($_GET['p']=="datapsb"){
		echo"<p class=navigasi>Penerimaan Siswa Baru &raquo; Data Penerimaan Siswa Baru</p>";
	}elseif($_GET['p']=="formalumni"){
		echo"<p class=navigasi>Data Alumni &raquo; Form Alumni</p>";
	}elseif($_GET['p']=="detmading"){
		echo"<p class=navigasi>Mading &raquo; Mading Detail</p>";
	}elseif($_GET['p']=="kalendarAkademik"){
		echo"<p class=navigasi>Informasi &raquo; Kalendar Akademik</p>";
	}elseif($_GET['p']=="katmading"){
		if($_GET['id']=="1"){
			echo"<p class=navigasi>Mading Siswa &raquo; Mading Karya Seni</p>";
		}else{echo"<p class=navigasi>Mading Siswa &raquo; Mading Karya Tulis</p>";}
	}elseif($_GET['p']=="usermading"){
		echo"<p class=navigasi>Mading</p>";
	}elseif($_GET['p']=="komentar_mading"){
		echo"<p class=navigasi>Mading &raquo; Komentar Mading</p>";
	}else{
		echo"Kosong";
	}