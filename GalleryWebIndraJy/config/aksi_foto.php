<?php 
session_start();
include '../config/koneksi.php';

if(isset($_POST['tambah'])){
    $judulfoto = $_POST ['judulfoto'];
    $deskripsifoto = $_POST ['deskripsifoto'];
    $tanggalunggah = date ('Y-m-d');
    $albumid = $_POST['albumid'];
    $userid = $_SESSION ['userid'];
    $foto = $_FILES ['lokasifile'] ['name'];
    $tmp = $_FILES ['lokasifile'] ['tmp_name'];
    $lokasi = '../assets/img/';
    $namafoto = rand().'-'.$foto;

    move_uploaded_file($tmp, $lokasi.$namafoto);
    $sql = mysqli_query($koneksi, "INSERT INTO foto (judulfoto, deskripsifoto, tanggalunggah, lokasifile, albumid, userid) 
                                                        VALUES ('$judulfoto', '$deskripsifoto', '$tanggalunggah', '$namafoto', '$albumid', '$userid')");

    echo "<script>
        alert('Data berhasil di simpan');
        location.href='../home/foto.php';
    </script>";
}

if(isset($_POST['edit'])){
    $fotoid = $_POST['fotoid'];
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date('Y-m-d');
    $albumid = $_POST['albumid'];
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../assets/img/';

    if($foto == null){
        // Jika tidak ada file baru yang diunggah, hanya update teks
        $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', tanggalunggah='$tanggalunggah', albumid='$albumid' WHERE fotoid='$fotoid'");
    } else {
        // Hapus foto lama
        $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
        $data = mysqli_fetch_array($query);
        if (is_file($lokasi.$data['lokasifile'])) {
            unlink($lokasi.$data['lokasifile']);
        }

        // Simpan foto baru
        $namafoto = rand().'-'.$foto;
        if (move_uploaded_file($tmp, $lokasi.$namafoto)) {
            $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', tanggalunggah='$tanggalunggah', lokasifile='$namafoto', albumid='$albumid' WHERE fotoid='$fotoid'");
        }
    }

    echo "<script>
        alert('Data berhasil diperbarui');
        location.href='../home/foto.php';
    </script>";
}

if(isset($_POST['hapus'])){
    $fotoid = $_POST['fotoid'];
    $lokasi = '../assets/img/';

    // Ambil data foto
    $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
    $data = mysqli_fetch_array($query);

    // Hapus file foto dari folder jika ada
    if (!empty($data['lokasifile']) && file_exists($lokasi.$data['lokasifile'])) {
        unlink($lokasi.$data['lokasifile']);
    }

    // Hapus data dari database
    $sql = mysqli_query($koneksi, "DELETE FROM foto WHERE fotoid='$fotoid'");

    if($sql) {
        echo "<script>
            alert('Data berhasil dihapus');
            location.href='../home/foto.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data');
            location.href='../home/foto.php';
        </script>";
    }
}

if (isset($_POST['hapus'])) {
    $fotoid = $_POST['fotoid'];
    mysqli_query($koneksi, "DELETE FROM foto WHERE fotoid='$fotoid'");
    header("location:foto.php");
}

// Menampilkan Semua Foto untuk Admin
$query = mysqli_query($koneksi, "SELECT foto.*, users.username FROM foto JOIN users ON foto.userid = users.userid ORDER BY foto.tanggalunggah DESC");
$fotoList = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

?>