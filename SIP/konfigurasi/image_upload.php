<?php
function UploadGaleri($fupload_name){
   //direktori untuk foto galeri
  $vdir_upload = "../../../images/foto/galeri/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadAlbum($fupload_name){
   //direktori untuk foto galeri
  $vdir_upload = "../../../images/foto/galeri/album/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadImage($fupload_name){
   //direktori untuk foto guru & staff
  $vdir_upload = "../../../images/foto/guru/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}


function UploadSiswa($fupload_name){
   //direktori untuk foto guru & staff
  $vdir_upload = "../../../images/foto/siswa/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}


function UploadGambar($fupload_name){
   //direktori untuk gambar umum
  $vdir_upload = "../../../images/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadMading($fupload_name){
   //direktori untuk gambar umum
  $vdir_upload = "../../images/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function UploadMading2($fupload_name){
   //direktori untuk gambar umum
  $vdir_upload = "../../../images/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}


?>