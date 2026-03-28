<?php 
session_start();
include '../config/koneksi.php';

// Debugging sementara, hapus setelah dicek
// var_dump($_SESSION); exit;

// Pastikan hanya admin yang bisa mengakses halaman ini
if (!isset($_SESSION['role']) || trim($_SESSION['role']) !== 'admin') {
    echo "<script>alert('Anda tidak memiliki akses!'); location.href='./index.php';</script>";
    exit;
}

$query = mysqli_query($koneksi, "SELECT foto.*, users.username FROM foto JOIN users ON foto.userid = users.userid ORDER BY foto.tanggalunggah DESC");
$fotoList = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/favicon/favicon-16x16.png" type="image/png">
    <title>Admin Galeri Anda - Kelola Foto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="admin-container">
        <h1>Admin Galeri (Nama Galeri Anda)</h1>
        
        <!-- Navigasi -->
        <nav class="admin-nav">
            <ul>
                <li><a href="datauser.php">Data User</a></li>
                <li><a href="adminfoto.php">Kelola Foto</a></li>
                <li><a href="#album-management">Kelola Album</a></li>
            </ul>
        </nav>

        <!-- Kelola Foto -->
        <h2>Kelola Foto</h2>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Pengguna</th>
                <th>Tanggal Unggah</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; foreach ($fotoList as $foto) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($foto['judulfoto']); ?></td>
                <td><?= htmlspecialchars($foto['deskripsifoto']); ?></td>
                <td><?= htmlspecialchars($foto['username']); ?></td>
                <td><?= $foto['tanggalunggah']; ?></td>
                <td><img src="../assets/img/<?= $foto['lokasifile']; ?>" width="100"></td>
                <td>
                    <form action="admin_manage_photos.php" method="post" style="display:inline;">
                        <input type="hidden" name="fotoid" value="<?= $foto['fotoid']; ?>">
                        <button type="submit" name="hapus" onclick="return confirm('Yakin ingin menghapus?');">Hapus</button>
                    </form>
                    <a href="edit_foto.php?fotoid=<?= $foto['fotoid']; ?>">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <a href="tambah_foto.php">Tambah Foto</a>
    </div>
</body>
</html>
