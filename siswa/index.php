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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <header class="header">
        <h2 class="heading">TABEL SISWA</h2>
    </header>

    <a href="create.php" class="btn">+ Tambah Data</a>
    <table border="1" class="table" class="th">
        <tr>
            <th class="th">ID</th>
            <th class="th">NIS</th>
            <th class="th">NAMA</th>
            <th class="th">JENIS KELAMIN</th>
            <th class="th">AGAMA</th>
            <th class="th">ALAMAT</th>
            <th class="th">FOTO</th>
            <th class="th">AKSI</th>   
        </tr>
        <?php if(mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td class="td"><?= $row['id'] ?></td>
                <td class="td"><?= $row['nis'] ?></td>
                <td class="td"><?= htmlspecialchars($row['nama']) ?></td>
                <td class="td"><?= $row['jk'] ?></td>
                <td class="td"><?= $row['agama'] ?></td>
                <td class="td"><?= htmlspecialchars($row['alamat']) ?></td>
                <td class="td">
                    <?php if (!empty($row['foto']) && file_exists($row['foto'])) : ?>
                        <img src="<?= $row['foto'] ?>" alt="Foto">
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
                <td class="aksi td">
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