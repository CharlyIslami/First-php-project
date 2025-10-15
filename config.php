<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "sekolah";

$koneksi = mysqli_connect($server, $username, $password, $dbname);

if (!$koneksi) {
    die("koneksi gagal: " . mysqli_connect_error());
} else {
    //echo "koneksi berhasil!";
}
?>