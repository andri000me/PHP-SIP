<?php
//Hapus pesan masuk

if(isset($_GET['id'])){
$pesan=mysql_query("SELECT * FROM sh_pesan WHERE id_pesan='$_GET[id]'");
$data=mysql_fetch_array($pesan);
$o=$data['id_pesan'];
if($_SESSION['orangtua']){
	if($data['status_penerima']=="0"){
		$up=mysql_query("UPDATE sh_pesan SET status_penerima='1' WHERE id_pesan='$_GET[id]'");
		echo"<script>alert('Pesan Terhapus')</script>";
	}if($data['status_pengirim']=="1" AND $data['status_penerima']=="1"){
		$up=mysql_query("DELETE sh_pesan WHERE id_pesan='$p'");
		echo"<script>alert('Pesan Terhapus')</script>";
	}
		echo"<meta http-equiv='refresh' content='0; url=?p=inbox'/>";
}

if($_SESSION['guru']){
	if($data['status_penerima']=="0"){
		$up=mysql_query("UPDATE sh_pesan SET status_penerima='1' WHERE id_pesan='$_GET[id]'");
		echo"<script>alert('Pesan Terhapus')</script>";
	}if($data['status_pengirim']=="1" AND $data['status_penerima']=="1"){
		$up=mysql_query("DELETE sh_pesan WHERE id_pesan='$p'");
		echo"<script>alert('Pesan Terhapus')</script>";
	}
		echo"<meta http-equiv='refresh' content='0; url=?p=inbox'/>";
}

}
//Hapus pesan masuk

//Hapus pesan terkirim
if(isset($_GET['id_terkirim'])){
	$pesan=mysql_query("SELECT * FROM sh_pesan WHERE id_pesan='$_GET[id_terkirim]'");
$data=mysql_fetch_array($pesan);
$p=$data['id_pesan'];
if($_SESSION['orangtua']){
	if($data['status_pengirim']=="0"){
		$up=mysql_query("UPDATE sh_pesan SET status_pengirim='1' WHERE id_pesan='$_GET[id_terkirim]'");
		echo"<script>alert('Pesan Terhapus')</script>";
	}if($data['status_pengirim']=="1" AND $data['status_penerima']=="1"){
		$up=mysql_query("DELETE sh_pesan WHERE id_pesan='$p'");
		echo"<script>alert('Pesan Terhapus')</script>";
	}
		echo"<meta http-equiv='refresh' content='0; url=?p=pesanterkirim'/>";
}

if($_SESSION['guru']){
	if($data['status_pengirim']=="0"){
		$up=mysql_query("UPDATE sh_pesan SET status_pengirim='1' WHERE id_pesan='$_GET[id_terkirim]'");
		echo"<script>alert('Pesan Terhapus')</script>";
	}if($data['status_pengirim']=="1" AND $data['status_penerima']=="1"){
		$up=mysql_query("DELETE sh_pesan WHERE id_pesan='$p'");
		echo"<script>alert('Pesan Terhapus')</script>";
	}
		echo"<meta http-equiv='refresh' content='0; url=?p=pesanterkirim'/>";
}

}
//Hapus pesan masuk?>