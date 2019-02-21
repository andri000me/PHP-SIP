<?php
mysql_connect("localhost","root","trimitra19xampp");
mysql_select_db("websch-demo");
$mapel = $_GET['mapel'];
$gurumapel = mysql_query("SELECT DISTINCT sh_kelas.id_kelas as id_kelas , sh_kelas.nama_kelas FROM sh_kelas , sh_mapel_guru , sh_jadwal
						  where  sh_mapel_guru.id_mapel = sh_jadwal.id_mapel AND sh_mapel_guru.id_gurustaff = sh_jadwal.id_gurustaff AND sh_kelas.id_kelas = sh_jadwal.id_kelas AND sh_mapel_guru.id_mapel_guru = '$mapel' ");
echo "<option>-- Pilih Kelas --</option>";
while($gm = mysql_fetch_array($gurumapel)){
    echo "<option value=\"".$gm['id_kelas']."\">".$gm['nama_kelas']."</option>\n";
}
?>
