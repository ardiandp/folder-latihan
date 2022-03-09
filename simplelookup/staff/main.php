<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
include ('../Connections/local.php');
include ('../Connections/library.php');
// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../login.php";
  if ($logoutGoTo) {
    //header("Location: $logoutGoTo");
	echo "<script>alert('Anda Telah Logout');document.location='../index.php' </script>";
    exit;
  }
}
?>
<?php include ('layout/header.php') ?>
<?php include ('layout/sidebar.php') ?>

  <!-- konten disii -->
  <?php
$page=htmlentities($_GET['page']);
$halaman="$page.php";

if(!file_exists($halaman) || empty($page)){
	include "beranda.php";
}else{
	include "$halaman";
}
?>
  
  <!-- akhir konten -->

  <?php include ('layout/footer.php') ?>