<?php
session_start();
include 'config/koneksi.php';

$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;
$query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN album ON foto.albumid=album.albumid");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GalleryWeb</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="icon" href="image/favicon/favicon-16x16.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">GalleryWeb</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav me-auto"></div>
                <a href="register.php" class="btn btn-outline-light mx-1">Daftar</a>
                <a href="login.php" class="btn btn-outline-light mx-1">Masuk</a>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        <div class="text-center mb-4">
            <h1>Selamat Datang di GalleryWeb</h1>
            <p class="text-muted">Deskripsi Singkat Tentang Web Galeri Anda.</p>
        </div>
        <div class="row">
            <?php while ($data = mysqli_fetch_array($query)) { ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="assets/img/<?= htmlspecialchars($data['lokasifile'])?>" class="card-img-top" alt="<?= htmlspecialchars($data['judulfoto']) ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($data['judulfoto']) ?></h5>
                        <p class="text-muted">Album: <?= htmlspecialchars($data['namaalbum']) ?></p>
                        <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal<?= $data['fotoid'] ?>">Lihat Detail</a>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modal<?= $data['fotoid'] ?>" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img src="assets/img/<?= htmlspecialchars($data['lokasifile']) ?>" class="img-fluid mb-3" alt="<?= htmlspecialchars($data['judulfoto']) ?>">
                            <h4><?= htmlspecialchars($data['judulfoto']) ?></h4>
                            <p><strong>Deskripsi:</strong> <?= htmlspecialchars($data['deskripsifoto']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <footer class="text-center py-3 bg-dark text-light mt-4">
        <p>2025 GalleryWeb | Kukuh Indra Maulana</p>
    </footer>

    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
