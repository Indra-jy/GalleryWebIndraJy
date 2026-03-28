<?php 
session_start();
include '../config/koneksi.php';
$userid = $_SESSION['userid'];
if($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum Login');
    location.href='../index.php';
    </script>"; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GalleryWeb</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="icon" href="../image/favicon/favicon-16x16.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
  <div class="container">
    <a class="navbar-brand" href="index.php">GalleryWeb</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
        <a href="home.php" class="nav-link">Home</a>
        <a href="album.php" class="nav-link">Album</a>
        <a href="foto.php" class="nav-link">Foto</a>
      </div>
      <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
    </div>
  </div>
</nav>

<div class="container mt-3">
    <div class="album-buttons">
        Album :
        <?php 
        $album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
        while($row = mysqli_fetch_array($album)) { ?>
            <a href="home.php?albumid=<?php echo $row['albumid']; ?>" class="btn btn-outline-dark">
                <?php echo $row['namaalbum']; ?>
            </a>
        <?php } ?>
    </div>

    <div class="row">
        <?php
        if(isset($_GET['albumid'])) {
            $albumid = $_GET['albumid'];
            $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid' AND albumid='$albumid'");
            while($data = mysqli_fetch_array($query)) { ?>
                <div class="col-md-3 mt-2">
                    <div class="card">
                        <img src="../assets/img/<?php echo $data['lokasifile']; ?>" class="card-img-top" title="<?php echo $data['judulfoto']; ?>" style="height: 12rem;" alt="">
                        <div class="card-footer text-center">
                            <?php 
                            $fotoid = $data['fotoid'];
                            $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                            echo mysqli_num_rows($like) . ' Suka';
                            ?>
                            <br>
                            <?php 
                            $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                            echo mysqli_num_rows($jmlkomen) . ' Komentar';
                            ?>
                        </div>
                    </div>   
                </div>
            <?php }
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
            while ($data = mysqli_fetch_array($query)) { ?>
                <div class="col-md-3 mt-2">
                    <div class="card">
                        <img src="../assets/img/<?php echo $data['lokasifile']; ?>" class="card-img-top" title="<?php echo $data['judulfoto']; ?>" style="height: 12rem;" alt="">
                        <div class="card-footer text-center">
                            <?php 
                            $fotoid = $data['fotoid'];
                            $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                            echo mysqli_num_rows($like) . ' Suka';
                            ?>
                            <br>
                            <?php 
                            $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                            echo mysqli_num_rows($jmlkomen) . ' Komentar';
                            ?>
                        </div>
                    </div>   
                </div>
            <?php }
        } ?>
    </div>
</div>

<footer class="text-center py-3 bg-dark text-light mt-4 fixed-bottom">
    <p>2025 GalleryWeb | Kukuh Indra Maulana</p>
</footer> 

<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>

</body>
</html>