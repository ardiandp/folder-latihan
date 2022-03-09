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
  $updateSQL = sprintf("UPDATE kategori SET nama_kategori=%s, type=%s WHERE id_kategori=%s",
                       GetSQLValueString($_POST['nama_kategori'], "text"),
                       GetSQLValueString($_POST['type'], "text"),
                       GetSQLValueString($_POST['id_kategori'], "int"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($updateSQL, $local) or die(mysql_error());
  echo "<script>alert('data tersimpan'); document.location='?page=kategori' </script>";
}

$colname_edit = "-1";
if (isset($_GET['id_kategori'])) {
  $colname_edit = $_GET['id_kategori'];
}
mysql_select_db($database_local, $local);
$query_edit = sprintf("SELECT * FROM kategori WHERE id_kategori = %s", GetSQLValueString($colname_edit, "int"));
$edit = mysql_query($query_edit, $local) or die(mysql_error());
$row_edit = mysql_fetch_assoc($edit);
$totalRows_edit = mysql_num_rows($edit);
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
      <td nowrap="nowrap" align="right">Id_kategori:</td>
      <td><?php echo $row_edit['id_kategori']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama_kategori:</td>
      <td><input type="text" name="nama_kategori" value="<?php echo htmlentities($row_edit['nama_kategori'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Type:</td>
      <td><select name="type">
        <option value="Produk" <?php if (!(strcmp("Produk", htmlentities($row_edit['type'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Produk</option>
        <option value="Jasa" <?php if (!(strcmp("Jasa", htmlentities($row_edit['type'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Jasa</option>
          <option value="Artikel" <?php if (!(strcmp("Artikel", htmlentities($row_edit['type'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Artikel</option>
        <option value="Lainya" <?php if (!(strcmp("Lainya", htmlentities($row_edit['type'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Lainya</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_kategori" value="<?php echo $row_edit['id_kategori']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($edit);
?>
