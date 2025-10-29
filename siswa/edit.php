<?php 
include "../config.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$q  = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id=$id");
$r  = mysqli_fetch_assoc($q);

if (!$r) {
    echo "Data tidak ditemukan. <a href='index.php'>← Kembali</a>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <h2 class="edit-heading">Edit Data Siswa</h2>

    <a href="index.php" class="top-link">← Kembali ke Data Siswa</a>
    <div class="container">
    <form action="update.php" method="post" enctype="multipart/form-data">
        <label for="id">ID (otomatis)</label><br><br>
        <input type="text" value="<?= $r['id'] ?>" readonly>
        <input type="hidden" name="id" value="<?= $r['id'] ?>">

        <label for="nis">NIS</label><br><br>
        <input type="text"  id="nis" name="nis" value="<?= htmlspecialchars($r['nis']) ?>" required><br><br>

        <label for="nama">Nama Lengkap</label><br><br>
        <input type="text" name="nama" id="nama" value="<?=htmlspecialchars($r['nama']) ?>" required><br><br>

        <label for="jk">Jenis Kelamin</label><br><br>
        <select name="jk" id="jk" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki" <?= ($r['jk'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
            <option value="perempuan" <?= ($r['jk'] == 'Perempuan') ? 'selected' : '' ?>>perempuan</option>
        </select><br><br>

        <label for="Agama">Jenis Agama</label><br><br>
        <select name="agama" id="agama" required>
            <?php
             $opt = ['islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'];
             foreach ($opt as $o) {
                 $sel = ($r['agama'] === $o) ? 'selected' : '';
                 echo "<option value=\"$o\" $sel>$o</option>";
                }
            ?>    
        </select><br><br>

        <label for="alamat">Alamat</label><br><br>
        <textarea name="alamat" id="alamat" cols="20" rows="4" placeholder="Masukkan alamat lengkap..."><?= htmlspecialchars($r['alamat']) ?></textarea><br><br>
        <label>Foto Sekarang</label><br><br>
        <?php if(!empty($r['foto']) && file_exists($r['foto'])): ?>
            <img src="<?= $r['foto'] ?>" class="preview" alt="foto">
        <?php else: ?>
            <div style="color:#888; margin-bottom:10px" class="nophoto">- tidak ada foto -</div>
        <?php endif; ?><br><br>

        <label for="foto">Ganti Foto (opsional)</label>
        <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png,.gif,.webp"><br><br>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>