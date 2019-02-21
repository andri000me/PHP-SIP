<?php if($_SESSION['orangtua']){?>
<div class="panel panel-primary">
<div class="panel-heading">Pesan Orang Tua</div>
<div class="panel-body"><?php
$kirim=mysql_query("SELECT * FROM sh_guru_staff WHERE id_gurustaff='$_GET[id]'");
$dkirim=mysql_fetch_array($kirim);

$or=mysql_query("SELECT * FROM sh_ortu WHERE id_ortu='$_SESSION[orangtua]'");
$dortu=mysql_fetch_array($or);


if(isset($_POST['btn_kirim'])){
    if($_POST['isi']==""){
        echo"<script>alert('Isi Pesan Anda Terlebih Dahulu ..!')</script>";
    }else{
        $i=mysql_query("INSERT INTO sh_pesan VALUE ('',NOW(),'$_POST[isi]','$_POST[pengirim]','$_POST[penerima]','0','0','0')");
        if($i){
            echo"<script>alert('Pesan Terkirim..')</script>";
            echo"<meta http-equiv='refresh' content='0; url=?p=pesanterkirim'/>";
        }
    }
}
?>
<form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
    <input  class="form-control" type="hidden" name="penerima" value="<?php echo $dkirim['nip']?>"/>
    <input  class="form-control" type="hidden" name="pengirim" value="<?php echo $_SESSION['orangtua']?>"/>
    <input  class="form-control" type="text" name="nama" readonly="" placeholder="<?php echo"Kepada : ". $dkirim['nama_gurustaff']?>"/>
    <br/>
    <textarea name="isi" class="form-control" placeholder="Masukan Pesan Anda.." rows="5"></textarea><br />
    <input class=" btn btn-primary" type="submit" value="Kirim Pesan" name="btn_kirim"/>
</form>
</div>
</div>
<?php }?>

<!------------------------------------------------------------>

<?php if($_SESSION['guru']){?>
<div class="panel panel-primary">
<div class="panel-heading">Pesan Guru</div>
<div class="panel-body"><?php
$kirim=mysql_query("SELECT * FROM sh_ortu WHERE id_ortu='$_GET[id]'");
$dkirim=mysql_fetch_array($kirim);

$or=mysql_query("SELECT * FROM sh_ortu WHERE id_ortu='$_SESSION[guru]'");
$dortu=mysql_fetch_array($or);

if(isset($_POST['btn_kirim'])){

        
    if($_POST['isi']==""){
        echo"<script>alert('Isi Pesan Anda Terlebih Dahulu ..!')</script>";
    }else{
        $i=mysql_query("INSERT INTO sh_pesan VALUE ('',NOW(),'$_POST[isi]','$_POST[pengirim]','$_POST[penerima]','0','0','0')");
        if($i){
            echo"<script>alert('Pesan Terkirim..')</script>";
            echo"<meta http-equiv='refresh' content='0; url=?p=pesanterkirim'/>";
        }
    }
}
?>
<form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
    <input  class="form-control" type="hidden" name="penerima" value="<?php echo $dkirim['id_ortu']?>"/>
    <input  class="form-control" type="hidden" name="pengirim" value="<?php echo $_SESSION['guru']?>"/>
    <input  class="form-control" type="text" name="nama" readonly="" placeholder="<?php echo"Kepada : ". $dkirim['nama_ortu']?>"/>
    <br/>
    <textarea name="isi" class="form-control" placeholder="Masukan Pesan Anda.." rows="5"></textarea><br />
    <input class=" btn btn-primary" type="submit" value="Kirim Pesan" name="btn_kirim"/>
</form>
</div>
</div>
<?php }?>