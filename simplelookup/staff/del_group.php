<?php
$hapus=mysqli_query($koneksi,"delete from level where id_level='$_GET[id]' ");

echo "<script>alert('data terhapus'); document.location='?page=group' </script>";
?>