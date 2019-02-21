<div id="isi">
<?php
include"konten/penunjuk.php";

switch($_GET['p']){
    default:
    include"konten/home.php";
	break;
	
    case "halaman_utama":
    include"konten/home.php";
    break;
	
    case "info":
    include"konten/info_sekolah.php";
    break;
	
    case md5("like"):
    include"konten/like.php";
    break;
	
    case "kalendarAkademik":
    include"kalendar_akademik.php";
    break;
    
    case "gmap":
    include"konten/gmap.php";
    break;
    
    case "berita":
    include"konten/berita.php";
    break;
    
    case "madingKaryaTulis":
    include"konten/karya_tulis.php";
    break;
    
    case "komentar_mading":
    include"konten/komentar_mading.php";
    break;
    
    case "detmading":
    include"konten/detmading.php";
    break;
    
    case "agenda":
    include"konten/agenda_sekolah.php";
    break;
    
    case "pengumuman":
    include"konten/pengumuman.php";
    break;
    
    case "guru":
    include"konten/guru.php";
    break;
    
    case "gurujk":
    include"konten/gurujk.php";
    break;
    
    case "gurupencarian":
    include"konten/gurupencarian.php";
    break;
    
    case "staff":
    include"konten/staff.php";
    break;
    
    case "staffjk":
    include"konten/staffjk.php";
    break;
    
    case "staffpencarian":
    include"konten/staffpencarian.php";
    break;
    
    case "siswa":
    include"konten/siswa.php";
    break;
    
    case "siswajk":
    include"konten/siswajk.php";
    break;
    
    case "siswakelas":
    include"konten/siswakelas.php";
    break;
    
    case "siswapencarian":
    include"konten/siswapencarian.php";
    break;
    
    case "alumni":
    include"konten/alumni.php";
    break;
    
    case "alumnijk":
    include"konten/alumnijk.php";
    break;
    
    case "alumnipencarian":
    include"konten/alumnipencarian.php";
    break;
    
    case "formalumni":
    include"konten/formalumni.php";
    break;
    
    case "galeri":
    include"konten/galeri.php";
    break; 
    
    case "foto":
    include"konten/foto.php";
    break; 
    
    case "detfoto":
    include"konten/detfoto.php";
    break;
    
    case "bukutamu":
    include"konten/bukutamu.php";
    break; 
    
    case "psb":
    include"konten/psb.php";
    break; 
    
    case "pencarian":
    include"konten/pencarian.php";
    break; 
    
    case "datapsb":
    include"konten/datapsb.php";
    break; 
    
    case "formpsb":
    include"konten/formpsb.php";
    break; 
    
    case "login":
    include"konten/formlogin.php";
    break; 
    
    case "detberita":
    include"konten/detberita.php";
    break; 
    
    case "katberita":
    include"konten/katberita.php";
    break; 
    
    case "userberita":
    include"konten/userberita.php";
    break;
    
    case "katmading":
    include"konten/katmading.php";
    break; 
    
    case "usermading":
    include"konten/usermading.php";
    break; 
    
    case "tglberita":
    include"konten/tglberita.php";
    break;
}
?>
</div>