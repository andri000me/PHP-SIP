<?php
mysql_connect("localhost","root","trimitra19xampp");
mysql_select_db("websch-demo");
$mapel = $_GET['mapel'];
$gurumapel = mysql_query("SELECT sh_guru_staff.id_gurustaff as id_guru , sh_guru_staff.nama_gurustaff FROM sh_mapel_guru , sh_guru_staff where sh_mapel_guru.id_gurustaff = sh_guru_staff.id_gurustaff AND sh_mapel_guru.id_mapel = '$mapel' ");
echo "<option>-- Pilih Guru Pengajar --</option>";
while($gm = mysql_fetch_array($gurumapel)){
    echo "<option value=\"".$gm['id_guru']."\">".$gm['nama_gurustaff']."</option>\n";
}
?>
