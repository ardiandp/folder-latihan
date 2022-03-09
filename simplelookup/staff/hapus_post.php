<?php
$id_post=$_GET['id_post'];
$hapus=mysqli_query($koneksi,"delete from ig_posts where id_post='$id_post' ");

echo "<script>alert('Data Terhapus');document.location='?page=posts' </script>"
?>