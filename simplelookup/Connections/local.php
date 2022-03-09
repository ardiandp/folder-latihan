<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

/*
$hostname_local = "178-18-253-214.cprapid.com";
$database_local = "ur5rc6ey_dev_staff";
$username_local = "ur5rc6ey_root";
$password_local = "dianmustika99";
*/

$hostname_local = "localhost";
$database_local = "dev_staff";
$username_local = "root";
$password_local = "";

$koneksi = mysqli_connect("$hostname_local","$username_local","$password_local","$database_local");
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>


