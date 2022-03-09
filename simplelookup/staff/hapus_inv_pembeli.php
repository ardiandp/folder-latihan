<?php
$hapus=mysqli_query($koneksi,"delete from inv_pembeli where idpembeli='$_GET[idpembeli]' ");
echo "<script>alert('Data terhapus');document.location='?page=inv_pembeli' </script>";
?>