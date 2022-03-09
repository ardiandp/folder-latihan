<?php
$hapus=mysqli_query($koneksi,"delete from no_rekening where idrek='$_GET[idrek]' ");
echo "<script>alert ('data terhapus'); document.location='?page=norekening' </script>";
?>