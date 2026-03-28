<?php 
session_start();
include 'koneksi.php';

$fotoid = $_POST['fotoid'];
$userid = $_SESSION['userid'];
$isikomentar = $_POST['isikomentar'];
$tanggalkomentar = date ('Y-m-d');

var_dump($fotoid, $userid, $isikomentar);

$query = mysqli_query($koneksi,"INSERT INTO komentarfoto (fotoid,userid,isikomentar,tanggalkomentar) VALUES  ('$fotoid','$userid','$isikomentar','$tanggalkomentar') ");

echo "<script>location.href='../home/index.php';</script>";

?>