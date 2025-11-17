<?php
include("koneksi.php");

// query data barang
$sql = "SELECT * FROM data_barang";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">
    <h1>Data Barang</h1>

    <div class="actions">
        <a href="tambah.php" class="button">Tambah Barang</a>
    </div>

    <table>
        <tr>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php if(mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>
                        <img src="gambar/<?= $row['gambar']; ?>" class="thumb">
                    </td>

                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['kategori'] ?></td>
                    <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.') ?></td>
                    <td>Rp <?= number_format($row['harga_beli'], 0, ',', '.') ?></td>
                    <td><?= $row['stok'] ?></td>

                    <td>
                        <a class="action" href="ubah.php?id=<?= $row['id_barang'] ?>">Ubah</a> |
                        <a class="action delete" href="hapus.php?id=<?= $row['id_barang'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>

        <?php else: ?>
            <tr>
                <td colspan="7" style="text-align:center;">Belum ada data</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

</body>
</html>



