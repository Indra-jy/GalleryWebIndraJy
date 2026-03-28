<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GalleryWeb</title>
    <link rel="icon" href="image/favicon/favicon-16x16.png" type="image/png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-pzjw8f+ua7Kw1TIq0W9f6h6jmASi9d7je1rZ0Z8fjeF1Hb7CXbtrS8kA5aM9i6V8" crossorigin="anonymous">
</head>
<body>
    
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

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="text-center">
                        <h5>Daftar Akun Baru</h5>
                    </div>
                        <form action="config/aksi_register.php" method="POST">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                            <label for="" class="form-label">Nama Lengkap</label>
                            <input type="text" name="namalengkap" class="form-control" required>
                            <label for="" class="form-label">Nomor Telepon</label>
                            <input type="number" name="nohp" class="form-control" required>
                            <label for="" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                            <div class="d-grid mt-2">
                                <button class="btn bg-dark btn-primary" type="submit" name="kirim">Daftar</button>
                            </div>
                        </form>
                        <hr>
                        <p>Sudah Punya Akun? <a href="login.php">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-dark text-light fixed-bottom">
    <p>2025 GalleryWeb | Kukuh Indra Maulana</p>
</footer> 



<script type="text/javascript" src="assets/js/bootstrap.min.js" ></script>

</body>
</html>