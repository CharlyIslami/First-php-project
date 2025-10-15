<?php
include "../config.php";
$result = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id asc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <header class="header">
        <h2>TABEL SISWA</h2>
    </header>

    <a href="create.php" class="btn">+ Tambah Data</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>NIS</th>
            <th>NAMA</th>
            <th>JENIS KELAMIN</th>
            <th>AGAMA</th>
            <th>ALAMAT</th>
            <th>FOTO</th>
            <th>AKSI</th>   
        </tr>
        <?php if(mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nis'] ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= $row['jk'] ?></td>
                <td><?= $row['agama'] ?></td>
                <td><?= htmlspecialchars($row['alamat']) ?></td>
                <td>
                    <?php if (!empty($row['foto']) && file_exists($row['foto'])) : ?>
                        <img src="<?= $row['foto'] ?>" alt="Foto">
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
                <td class="aksi">
                    <a href="edit.php?id=<?= $row['id']?>" class="edit">Edit</a>
                    <a href="delete.php?id=<?= $row['id']?>" class="hapus" onclick="return confirm('Yakin ingin menghapus data ini')" >Hapus</a>
                </td>
            </tr>
     <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="8" class="empty">Belum ada data siswa.</td></tr>
    <?php endif; ?>
    </table>
    </div>
    
</body>
</html>