<?php
$hapus=mysqli_query($koneksi,"DELETE FROM akses WHERE id='$_GET[id]' ");
echo "<script>alert('Data Terhapus');document.location='?page=akses' </script>";
?>