<?php 
include "../config.php";

$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto FROM siswa WHERE id='$id'"));

if(!empty($data['foto']) && file_exists($data['foto'])) {
    unlink($data['foto']);
}

mysqli_query($koneksi, "DELETE FROM siswa WHERE id='$id'");

header("Location: index.php");
exit;
?>