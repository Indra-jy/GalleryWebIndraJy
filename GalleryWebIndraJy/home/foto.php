<?php 

session_start();
include '../config/koneksi.php';
if($_SESSION['status']!= 'login' ){

    echo "<script>
    alert ('Anda belum Login');
    location.href='../index.php';
    </script>";

}
$userid = $_SESSION['userid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GalleryWeb</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="icon" href="../image/favicon/favicon-16x16.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-pzjw8f+ua7Kw1TIq0W9f6h6jmASi9d7je1rZ0Z8fjeF1Hb7CXbtrS8kA5aM9i6V8" crossorigin="anonymous">
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


<div class="container">
    <div class="row">
<div class="col-md-4">
    <div class="card mt-2">
        <div class="card-header">Tambah Foto</div>
        <div class="card-body">
            <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data" >
            <label for="" class="form-label">Judul Foto</label>
            <input type="text" name="judulfoto" class="form-control" required>
            <label for="" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsifoto" id=""></textarea>
            <label for="" class="form-label">Album</label>
            <select class="form-control" name="albumid" id="" required>
                <?php 
                
                $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                while($data_album = mysqli_fetch_array($sql_album)){ ?>

                <option value="<?php echo $data_album ['albumid'] ?> "><?php echo $data_album ['namaalbum'] ?> </option>

               <?php } ?>
            </select>
            <label for="" class="form-label">File</label>
            <input type="file" class="form-control" name="lokasifile" required>
            <button type="submit" class="btn btn-dark mt-2" name="tambah">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
        <div class="col-md-8">
        <div class="card mt-2">
        <div class="card-header">Data Galeri</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>judul foto</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $no = 1;
                    $userid = $_SESSION['userid'];

                    $sql = mysqli_query($koneksi,"SELECT * FROM foto WHERE userid = '$userid'" );
                    while ($data = mysqli_fetch_array($sql)){

                    
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><img src="../assets/img/<?php echo $data['lokasifile']; ?>" width="100" alt="">
                        <td><?php echo $data ['judulfoto'] ?></td>
                        <td><?php echo $data ['deskripsifoto'] ?></td>
                        <td><?php echo $data ['tanggalunggah'] ?></td>
                        <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data ['fotoid'] ?>">
                          Edit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="edit<?php echo $data ['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data" >

                                <input type="hidden" name="fotoid" value="<?php echo $data ['fotoid']  ?>">
                                <label class="form-label" for="">Judul Foto</label>
                                <input type="text" name="judulfoto" value="<?php echo $data ['judulfoto'] ?>" class="form-control" required>
                                <label for="" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsifoto" id=""><?php echo $data ['deskripsifoto'] ?>
                              </textarea>
                              <label for="" class="form-label">Album</label>
                              <select class="form-control" name="albumid" id="" >
                              <?php 
                              
                              $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                              while($data_album = mysqli_fetch_array($sql_album)){ ?>

                              <option <?php if($data_album ['albumid'] ==$data ['albumid']) { ?> selected="selected" <?php } ?> value="<?php echo $data_album ['albumid'] ?> "><?php echo $data_album ['namaalbum'] ?> </option>

                            <?php } ?>
                            </select>
                            <label for="" class="form-label">Foto</label>
                            <div class="row">
                              <div class="col-md-4">
                              <img src="../assets/img/<?php echo $data['lokasifile']; ?>" width="100" alt="">
                              </div>
                              <div class="col-md-8">
                              <label for="" class="form-label">Ganti File</label>
                              <input type="file" class="form-control" name="lokasifile" >
                              </div>
                            </div>
                           
                              </div>
                              <div class="modal-footer">
                                <button type="submit" name="edit" class="btn btn-dark">Edit Data</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>



                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data ['fotoid'] ?>">
                          Hapus
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="hapus<?php echo $data ['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form action="../config/aksi_foto.php" method="POST">
                                <input type="hidden" name="fotoid" value="<?php echo $data ['fotoid']  ?>">

                                Aapakah Anda Yakin Ingin Menghapus Data <strong> <?php echo $data ['judulfoto']?> </strong> ?
                              
                              </div>
                              <div class="modal-footer">
                                <button type="submit" name="hapus" class="btn btn-dark">Hapus Data</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>


                        </td>
                    </tr>
                    <?php 

                    }

                    ?>
                </tbody>
            </table>
        </div>
        </div>
        </div>
    </div>
</div>


<footer class="text-center py-3 bg-dark text-light mt-4 fixed-bottom">
    <p>2025 GalleryWeb | Kukuh Indra Maulana</p>
</footer> 

<script type="text/javascript" src="../assets/js/bootstrap.min.js" ></script>

</body>
</html>