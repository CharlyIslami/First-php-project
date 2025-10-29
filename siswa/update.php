<?php
include "../config.php";

$id     = $_POST['id']; $nis    = $_POST['nis'];    $nama   = $_POST['nama']; $jk   =$_POST['jk'];
$agama  = $_POST['agama'];  $alamat = $_POST['alamat'];

$query  = mysqli_query($koneksi, "SELECT foto FROM siswa WHERE id='$id'");
$data   = mysqli_fetch_assoc($query);
$fotoLama  = $data['foto'];

$foto = $fotolama;
if (!empty($_FILES['foto']['name'])) {
    $folder = "uploads/";
    $namaFile = time() . "_" . basename($_FILES['foto']['name']);
    $tujuan = $folder . $nameFile;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $tujuan)) {
        if (!empty($fotoLama) && file_exists($fotoLama)) {
            unlink($fotoLama);
        }
        $foto = $tujuan;
    }
}

$sql = "UPDATE siswa SET
            nis='$nis',
            nama='$nama',
            jk='$jk',
            agama='$agama',
            alamat='$alamat',
            foto='$foto'
        WHERE id='$id'";
if (mysqli_query($koneksi, $sql)) {
    header("location: index.php");
    exit;
}else{
    echo "Gagal mengupdate data: ". mysqli_error($koneksi);
    echo "<br><a href='edit.php?id=$id'>Kembali</a>";
}
?>