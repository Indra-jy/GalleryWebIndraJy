<?php
include '../config/koneksi.php'; // Sesuaikan path dengan struktur folder Anda

// Cek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <link rel="icon" href="image/favicon/favicon-16x16.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data User Galeri</h1>
        <nav>
            <a style="text-decoration: none;" href="../admin/admin.php">Admin Galeri</a>
        </nav>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data User</li>
        </ol>
        
        <br><br>
        <table class="table table-bordered">
            <tr>
                <th>ID User</th>
                <th>Username</th>
                <th>Email</th>
                <th>Nama Lengkap</th>
                <th>No Telepon</th>
                <th>Alamat</th>
            </tr>
            <?php
            $query = mysqli_query($koneksi, "SELECT userid, username, email, namalengkap, nohp, alamat FROM user");
            if (!$query) {
                die("Query gagal: " . mysqli_error($koneksi));
            }

            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $data['userid']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['namalengkap']; ?></td>
                    <td><?php echo $data['nohp']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>