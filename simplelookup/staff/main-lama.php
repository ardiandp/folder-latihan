<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

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
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php 
//session_start();
include ('../Connections/local.php') ?>
<body>
<table width="1000" height="434" border="1" align="center">
  <tr>
    <td height="47" colspan="2" align="center" bgcolor="#00FF00">Header</td>
  </tr>
  <tr>
    <td width="203" height="352" valign="top" bgcolor="#33CC66"><h2><?php echo $_SESSION['MM_Username'] ?> </h2> <a href="<?php echo $logoutAction ?>">Log out</a>
<hr />
   <!-- awal menu -->
<?php
$main=mysql_query("SELECT `level`.`level`,admin.nama_lengkap,admin.username,akses.id_level,akses.menu,menu.`name`,menu.id,menu.icon from `level`,admin,akses,menu WHERE admin.`id_level`=`level`.id_level AND admin.`id_level`=akses.id_level AND akses.menu=menu.id AND menu.is_parent='0' and admin.username='$_SESSION[MM_Username]' ");
while($r=mysql_fetch_array($main))
{?>
            <li class="treeview">

			   <a href="">
         <i class="<?php echo $r['icon']?>"></i><span><?php echo" $r[name] ";?></span></a>


			  <ul class="treeview-menu">
<?php
$sub=mysql_query("SELECT `level`.`level`,admin.nama_lengkap,admin.username,akses.id_level,akses.menu,menu.`name`,menu.link,menu.icon from `level`,admin,akses,menu WHERE admin.`id_level`=`level`.id_level AND admin.`id_level`=akses.id_level AND akses.menu=menu.id AND menu.is_parent='$r[id]'  and admin.username='$_SESSION[MM_Username]'");
while($w=mysql_fetch_array($sub))
                   {?>

			    <li><a href="<?php echo $w['link']?>">
         <i class="<?php echo $w['icon']?>"></i><span><?php echo" $w[name] ";?></span></a> </li>

			   <?php } ?>

			  </ul>
  <?php } ?> </li>
<!--akhir menu-->
    </td>
    <td width="781" valign="top"><?php include ('content.php') ?></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="center" bgcolor="#33FF33">Footer</td>
  </tr>
</table>
</body>
</html>