<?php
session_start();
include ('Connections/local.php');
include ('Connections/library.php');

date_default_timezone_set('Asia/Jakarta');
$pass=$_POST['password'];
$username=$_POST['username'];
$time=date('Y-m-d');
$jam=date('h:i:s');
$ip=$_SERVER['REMOTE_ADDR'];
$browser=$_SERVER['HTTP_USER_AGENT']; 
$day=$hari_ini;


$login=mysqli_query($koneksi,"select *from admin,level where admin.id_level=level.id_level and admin.username='$username' and admin.password='$pass' and admin.blokir='N' ");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

if($ketemu > 0 )
{		
$_SESSION['MM_Username']=$r['username'];	
$_SESSION['nama_lengkap'] =$r['nama_lengkap'];
$_SESSION['pass'] =$r['password'];
$_SESSION['level'] =$r['level'];
$_SESSION['foto']=$r['gambar'];
$_SESSION['lokasi']='BSD';
$_SESSION['waktu']=date('Y-m-d');
$_SESSION['time']=date('H:i:s');
$_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
$_SESSION['browser']=$_SERVER['HTTP_USER_AGENT'];

//$log=mysql_query("insert into log values ('','$username','$ip','$browser','$time','$day','$jam') ") or die (mysql_error());	
//awal log atifitas
$username=$_SESSION['MM_Username'];
$waktu=date('Y-m-d H:i:s');
$keterangan="melakukan login pada $waktu";
$hari=$hari_ini;
//$logact=mysql_query("insert into log_aktifitas (username,keterangan,hari,waktu) values ('$username','$keterangan','$hari','$waktu')") or die (mysql_error());
//akhir simpan log

	echo "<script> document.location='staff/main.php?page=home' </script>";
  
}
else
{
	echo "<script> document.location='login.php' </script>";
}
	?>
	
    
    