
<?php 
include ('layout/header.php') ;
include ('layout/sidebar.php') ;
include ('Connections/local.php');
include ('Connections/library.php');
?>
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