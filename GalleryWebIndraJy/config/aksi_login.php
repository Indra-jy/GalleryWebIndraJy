<?php 
session_start();
include 'koneksi.php';

$username = $_POST ['username'];
$password = md5($_POST ['password']);

$username = mysqli_real_escape_string($koneksi,$username);
$password = mysqli_real_escape_string($koneksi,$password);

$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username ='$username' AND password = '$password'");
$cek = mysqli_num_rows($sql);

if ($cek > 0){
    $data = mysqli_fetch_array($sql);
    $_SESSION['username'] = $data['username'];
    $_SESSION['userid'] = $data['userid'];
    $_SESSION['status'] = 'login';

    echo "<script>
    alert ('Login Berhasil');
    location.href='../home/index.php';
    </script>";

}else{

    echo "<script>
    alert ('Username atau Password Salah');
    location.href='../login.php';
    </script>";
    
}

?>