<?php
include "../config.php";

$nis     =$_POST['nis'];
$nama    =$_POST['nama'];
$jk      =$_POST['jk'];
$agama   =$_POST['agama'];
$alamat  =$_POST['alamat'];

$foto = null;

if(!empty($_FILES['foto']['name'])) {
    $folder = "uploads/";
    $nameFile = basename($_FILES['foto']['name']);
    $tujuan = $folder . $nameFile;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $tujuan)) {
    $foto = $tujuan;
    }
}

$sql = "INSERT INTO siswa (nis, nama, jk, agama, alamat, foto)
    VALUES ('$nis', '$nama', '$jk', '$agama', '$alamat', '$foto')";

if(mysqli_query($koneksi, $sql)) {
    header("Location:index.php");
    exit;
}else{
    echo "Gagal menyimpan data:" .mysqli_error($koneksi);
    echo "<br><a href='create.php'>Kembali</a>";
}
?>