<?php 
include 'koneksi.php';
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$pekerjaan = $_POST['pekerjaan'];

$simpan=mysqli_query($koneksi,"insert into user values('',$nama','$alamat','$pekerjaan')");
?>