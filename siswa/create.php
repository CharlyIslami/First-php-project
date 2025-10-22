<?php include "../config.php";
$nextId = null;
$q = mysqli_query(
    $koneksi,
    "SELECT AUTO_INCREMENT AS next_id
    FROM information_schema.TABLES
    WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'Siswa'"
);
if ($q && $row = mysqli_fetch_assoc($q)){
    $nextId = (int)$row['next_id'];
} 
?>
    
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
</head>
<body>
    form Data siswa
    <form action="store.php" method="post" enctype="multipart/form-data">
        <label for="id">ID (otomatis)</label><br><br>
        <input type="text" value="<?= $nextId !== null ? $nextId : '-' ?>" readonly>  <br><br>

        <label for="nis">NIS</label><br><br>
        <input type="number" name="nis"><br><br>

        <label for="nama">Nama Lengkap</label><br><br>
        <input type="text" name="nama"><br><br>

        <label for="jk">Jenis Kelamin</label><br><br>
        <select name="jk" id="jk">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="perempuan">perempuan</option>
        </select><br><br>

        <label for="Agama">Jenis Agama</label><br><br>
        <select name="agama" id="agama">
            <option value="">-- Pilih Agama --</option>
            <option value="islam">Islam</option>
            <option value="kristen-protestan">Kristen Protestan</option>
            <option value="kristen-katolik">Kristen Katolik</option>
            <option value="hindu">Hindu</option>
            <option value="buddha">Buddha</option>
            <option value="konghucu">Konghucu</option>
        </select><br><br>

        <label for="alamat">Alamat</label><br><br>
        <textarea name="alamat" id="alamat" cols="20" rows="4" placeholder="Masukkan alamat lengkap..."></textarea><br><br>

        <label for="upload">Upload Foto</label><br><br>
        <input type="file" name="foto" id="file" accept=".jpg,.jpeg,.png,.gif,.webp"><br><br>

        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>