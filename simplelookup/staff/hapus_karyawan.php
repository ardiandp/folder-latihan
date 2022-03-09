<?php
$hapus=mysqli_query($koneksi,"delete from karyawan where kode_kry='$_GET[kode_kry]' ");

echo "<script>alert('Data terhapus');document.location='?page=karyawan' </script>";
?>