<?php
mysql_connect("localhost","root","trimitra19xampp");
mysql_select_db("websch-demo");
$var = $_GET['kelas'];
$pisah = explode("-",$var);
$kelas = $pisah[0];
$tahun = $pisah[1];
$mapel = $pisah[2];
$katkelas = mysql_query("SELECT * FROM sh_kategori_nilai WHERE id_kelas = '$kelas' AND id_tahun_ajaran = '$tahun' AND id_mapel_guru = '$mapel' ");
echo "<option>- Pilih Kategori Nilai -</option>";
// echo "<option value=semua> Semua Kategori </option>"; // Sedang dibuat
while($kk = mysql_fetch_array($katkelas)){
    echo "<option value=\"".$kk['id_kategori_nilai']."\">".$kk['nama_kategori_nilai']."</option>\n";
}
?>
