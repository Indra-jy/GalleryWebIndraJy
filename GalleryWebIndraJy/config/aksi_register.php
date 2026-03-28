 <?php
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];

$cekusername = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
if(mysqli_num_rows($cekusername) > 0 ){
 
    echo "<script> 
    alert ('Username Sudah Terdaftar, Silahkan Pilih Username Yang Lain!!');
    location.href='../register.php';
    </script> ";
}else{

    $sql = mysqli_query($koneksi, "INSERT INTO user (username,password,email,namalengkap,nohp,alamat) VALUES ('$username','$password','$email','$namalengkap','$nohp','$alamat')");

    if ($sql){
        echo "<script>
        alert ('Pendaftaran Akun Berhasi');
        location.href='../login.php';
        </script> ";
    }
}
?>