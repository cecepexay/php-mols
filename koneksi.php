<?php
error_reporting(0);
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "mols";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
?>