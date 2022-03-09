<?php
$hapus=mysql_query("delete from bagian where kode_bagian='$_GET[id]' ") or die (mysql_error());
echo "<script>alert('data terhapus');document.location='?page=bagian' </script> ";
?>