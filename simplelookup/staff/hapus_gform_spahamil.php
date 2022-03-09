<?php
$hapus=mysqli_query($koneksi,"delete from gform_spahamil where idgform='$_GET[idgform]' ");

echo "<script>alert('data terhapus'); document.location='?page=gform_spahamil' </script>";
?>