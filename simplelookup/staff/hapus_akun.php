<?php
$hapus=mysqli_query($koneksi,"delete from akun where idakun='$_GET[idakun]' ");

echo "<script>alert('data terhapus'); document.location='?page=akun' </script>";
?>