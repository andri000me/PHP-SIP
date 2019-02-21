<!-- Combo Cari Guru -->
<script type="text/javascript" src="js/jquery-combo.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=mapel>
  $("#mapel").change(function(){
    var mapel = $("#mapel").val();
    $.ajax({
        url: "carikelas.php",
        data: "mapel="+mapel,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=guru>
            $("#kelas").html(msg);
        }
    });
  });
  $("#kelas").change(function(){
    var guru = $("#kelas").val();
    $.ajax({
        url: "",
        data: "kelas="+guru,
        cache: false,
        success: function(msg){
            $("#ggg").html(msg);
        }
    });
  });
});
</script>

<!--POPUP-->
<style>
	/* style untuk link popup11 */
a.popup2-link {
padding:17px 0;
text-align: center;
margin:10% auto;
position: relative;
width: 300px;
color: black;
text-decoration: none;
background-color: #FFBA00;
border-radius: 3px;
box-shadow: 0 5px 0px 0px #eea900;
display: block;
}
a.popup2-link:hover {
background-color: #ff9900;
box-shadow: 0 3px 0px 0px #eea900;
-webkit-transition:all 1s;
transition:all 1s;
}
/* end link popup1*/
/* animasi popup1 */
@-webkit-keyframes autopopup2 {
from {opacity: 0;margin-top:-100px;}
to {opacity: 1;}
}
@-moz-keyframes autopopup2 {
from {opacity: 0;margin-top:-100px;}
to {opacity: 1;}
}
@keyframes autopopup2 {
from {opacity: 0;margin-top:-100px;}
to {opacity: 1;}
}
/* end animasi popup1 */
/*style untuk popup1 */
#popup2 {
background-color: rgba(7,111,192, .5);
position: fixed;
top:0;
left:0;
right:0;
bottom:0;
margin:0;
-webkit-animation:autopopup2 2s;
-moz-animation:autopopup2 2s;
animation:autopopup2 2s;
}
#popup2:target {
-webkit-transition:all 1s;
-moz-transition:all 1s;
transition:all 1s;
opacity: 0;
visibility: hidden;
}@media (min-width: 768px){
.popup2-containerr {
width:600px;
}
}
@media (max-width: 767px){
.popup2-containerr {
width:80%;
top:50px;
z-index:999999;
}
a.popup2-close{
	top:50px;
	margin:0px;
}
}
.popup2-containerr {
position: relative;
margin:10% auto;
padding:40px 50px;
background-color: #EEE;
color:#333;
border-radius: 10px;
}

a.popup2-close {
position: absolute;
top:3px;
right:3px;
background-color: transparant;
padding:7px 10px;
font-size: 20px;
text-decoration: none;
line-height: 1;
color:red;
}
/* end style popup1 *//* style untuk isi popup1 */

</style>

<div class="popup2-wrapper" id="popup2">
			  <div class="popup2-containerr"> 
    
		<form class="form-horizontal popup2-form" method="POST" action="proses.php?pilih=guru&untukdi=upload" enctype="multipart/form-data" name="tambahmapel" id="tambahmapel">
		<?php
		$mapelku=mysql_query("SELECT * FROM sh_guru_staff WHERE nip='$_SESSION[guru]'");
		$r=mysql_fetch_array($mapelku);
		
		echo "
		<input type='hidden' name='guru' value='$_SESSION[guru]'>
		";
		?>
		
	   <label class="control-label">Judul Materi</label>
        <input type="text" name="judul_materi" class="form-control"/>
		
       <label class="control-label">Deskripsi Materi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
		
       <label class="control-label">File Materi</label>
        <input type="file" name="fupload" class="form-control"/>
		
		<label class="control-label">Mata Pelajaran</label>
        <select class="form-control" name="mapel" id="mapel">
            <option value="Kosong">-Pilih Mapel-</option>
                <?php
				$profilsay=mysql_query("SELECT * FROM  sh_mapel_guru,sh_guru_staff WHERE sh_guru_staff.id_gurustaff=sh_mapel_guru.id_gurustaff AND nip='$_SESSION[guru]'");
				while($p=mysql_fetch_array($profilsay)){
				echo"<option value='$p[id_mapel_guru]'>$p[nama_mapel]</option>";} ?>
        </select>

       <label class="control-label">Untuk Kelas</label>
        <select name="kelas" id="kelas" class="form-control">
				<option value="" selected>-- Pilih Kelas --</option>
		    </select>
		 <br />
        <input type="submit" class="btn btn-md btn-primary" value="Upload"/> <br />
 </form>
  
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahmapel");
			
			frmvalidator.addValidation("fupload","req","Anda belum memilih file");
			
			frmvalidator.addValidation("judul_materi","req","Judul Materi harus diisi");
			frmvalidator.addValidation("judul_materi","maxlen=60","Judul Materi maksimal 50 karakter");
			//]]>
		</script>
 <a class="popup2-close" href="?p=upload">X</a>
</div>
</div>