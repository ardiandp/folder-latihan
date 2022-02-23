<?php
$host="localhost";
$user="root";
$pass="";
$db="test";
$koneksi=mysqli_connect("$host","$user","$pass","$db");
if (mysqli_connect_errno())
{
    echo "Koneksi database mysqli gagal!!! : " . mysqli_connect_error();
}
//$koneksi=new koneksi("$host","$user","$pass","$db");
?>