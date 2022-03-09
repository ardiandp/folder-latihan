<?php
$hapus=mysqli_query($koneksi,"delete from bon where idbon='$_GET[idbon]' "); 
echo "<script>alert('Data Terhapus');document.location='?page=bon' </script>";
?>
