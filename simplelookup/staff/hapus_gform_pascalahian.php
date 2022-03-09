<?php 
$hapus=mysqli_query($koneksi,"delete from gform_pascalahiran where idgform='$_GET[idgform]' ");

echo "<script>alert('Data Terhapus');document.location='?page=gform_pascalahiran' </script>";
?>