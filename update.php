<?php 
 
include 'koneksi.php';
$id = $_POST['id'];
$npp        = $_POST['npp'];
$nama       = $_POST['nama'];
$unit     = $_POST['unit'];
$userid   = $_POST['userid'];
$pass      = $_POST['pass'];
$no_srt     = $_POST['no_srt'];
$staff      = $_POST['staff'];
mysql_query("UPDATE user_pegawai SET npp = '$npp',nama='$nama',unit = '$unit',userid='$userid',pass='$pass',no_srt='$no_srt',staff='$staff' where id = '$id'");
 
header("location:index.php?pesan=update");
?>