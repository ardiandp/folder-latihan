<?php //virtual('/alumni/Connections/local.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE akses SET id_level=%s, menu=%s, aktif=%s WHERE id=%s",
                       GetSQLValueString($_POST['id_level'], "text"),
                       GetSQLValueString($_POST['menu'], "text"),
                       GetSQLValueString($_POST['aktif'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($updateSQL, $local) or die(mysql_error());
  echo "<script>alert('Data Tersimpan'); document.location='?page=akses' </script>";
}

$colname_edit = "-1";
if (isset($_GET['id'])) {
  $colname_edit = $_GET['id'];
}
mysql_select_db($database_local, $local);
$query_edit = sprintf("SELECT * FROM akses WHERE id = %s", GetSQLValueString($colname_edit, "int"));
$edit = mysql_query($query_edit, $local) or die(mysql_error());
$row_edit = mysql_fetch_assoc($edit);
$totalRows_edit = mysql_num_rows($edit);

mysql_select_db($database_local, $local);
$query_menu = "SELECT * FROM menu";
$menu = mysql_query($query_menu, $local) or die(mysql_error());
$row_menu = mysql_fetch_assoc($menu);
$totalRows_menu = mysql_num_rows($menu);

mysql_select_db($database_local, $local);
$query_level = "SELECT * FROM `level`";
$level = mysql_query($query_level, $local) or die(mysql_error());
$row_level = mysql_fetch_assoc($level);
$totalRows_level = mysql_num_rows($level);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id:</td>
      <td><?php echo $row_edit['id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_level:</td>
      <td><select name="id_level">
        <?php 
do {  
?>
        <option value="<?php echo $row_level['id_level']?>" <?php if (!(strcmp($row_level['id_level'], htmlentities($row_edit['id_level'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_level['level']?></option>
        <?php
} while ($row_level = mysql_fetch_assoc($level));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Menu:</td>
      <td><select name="menu">
        <?php 
do {  
?>
        <option value="<?php echo $row_menu['id']?>" <?php if (!(strcmp($row_menu['id'], htmlentities($row_edit['menu'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_menu['name']?></option>
        <?php
} while ($row_menu = mysql_fetch_assoc($menu));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Aktif:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input type="radio" name="aktif" value="Y" <?php if (!(strcmp(htmlentities($row_edit['aktif'], ENT_COMPAT, 'utf-8'),"Y"))) {echo "checked=\"checked\"";} ?> />
            Ya</td>
        </tr>
        <tr>
          <td><input type="radio" name="aktif" value="N" <?php if (!(strcmp(htmlentities($row_edit['aktif'], ENT_COMPAT, 'utf-8'),"N"))) {echo "checked=\"checked\"";} ?> />
            Tidak</td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_edit['id']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($edit);

mysql_free_result($menu);

mysql_free_result($level);
?>
