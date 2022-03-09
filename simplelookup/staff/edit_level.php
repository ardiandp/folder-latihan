<?php require_once('../Connections/local.php'); ?>
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
  $updateSQL = sprintf("UPDATE `level` SET `level`=%s, aktif=%s WHERE id_level=%s",
                       GetSQLValueString($_POST['level'], "text"),
                       GetSQLValueString($_POST['aktif'], "text"),
                       GetSQLValueString($_POST['id_level'], "int"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($updateSQL, $local) or die(mysql_error());
  echo "<script>alert('Data Tersimpan');document.location='?page=level' </script>";
}

$colname_Recordset1 = "-1";
if (isset($_GET['id_level'])) {
  $colname_Recordset1 = $_GET['id_level'];
}
mysql_select_db($database_local, $local);
$query_Recordset1 = sprintf("SELECT * FROM `level` WHERE id_level = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $local) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
      <td nowrap="nowrap" align="right">Id_level:</td>
      <td><?php echo $row_Recordset1['id_level']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Level:</td>
      <td><input type="text" name="level" value="<?php echo htmlentities($row_Recordset1['level'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Aktif:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input type="radio" name="aktif" value="Y" <?php if (!(strcmp(htmlentities($row_Recordset1['aktif'], ENT_COMPAT, 'utf-8'),"Y"))) {echo "checked=\"checked\"";} ?> />
            Ya</td>
        </tr>
        <tr>
          <td><input type="radio" name="aktif" value="N" <?php if (!(strcmp(htmlentities($row_Recordset1['aktif'], ENT_COMPAT, 'utf-8'),"N"))) {echo "checked=\"checked\"";} ?> />
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
  <input type="hidden" name="id_level" value="<?php echo $row_Recordset1['id_level']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
