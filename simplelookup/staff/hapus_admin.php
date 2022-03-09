<?php
$hapus=mysqli_query($koneksi,"delete from admin where id_admin='$_GET[id]' ");
echo "<script>alert('data terhapus'); document.location='?page=admin' </script>";
?>