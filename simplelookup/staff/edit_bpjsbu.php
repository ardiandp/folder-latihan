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
  $updateSQL = sprintf("UPDATE bpjs_bu SET nik=%s, no_akun=%s, nama=%s, no_va=%s, hub_keluarga=%s, terdaftar=%s, aktif=%s, parent=%s, karyawan=%s, kelas=%s, biaya=%s WHERE idbpjs=%s",
                       GetSQLValueString($_POST['nik'], "text"),
                       GetSQLValueString($_POST['no_akun'], "text"),
                       GetSQLValueString($_POST['nama'], "text"),
                       GetSQLValueString($_POST['no_va'], "text"),
                       GetSQLValueString($_POST['hub_keluarga'], "text"),
                       GetSQLValueString($_POST['terdaftar'], "text"),
                       GetSQLValueString($_POST['aktif'], "text"),
                       GetSQLValueString($_POST['parent'], "text"),
                       GetSQLValueString($_POST['karyawan'], "text"),
                       GetSQLValueString($_POST['kelas'], "int"),
                       GetSQLValueString($_POST['biaya'], "int"),
                       GetSQLValueString($_POST['idbpjs'], "int"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($updateSQL, $local) or die(mysql_error());
   echo "<script>alert('ata tersimpan'); document.location='?page=bpjsbu' </script>";
}

mysql_select_db($database_local, $local);
$query_parent = "SELECT * FROM bpjs_bu";
$parent = mysql_query($query_parent, $local) or die(mysql_error());
$row_parent = mysql_fetch_assoc($parent);
$totalRows_parent = mysql_num_rows($parent);

$colname_edit = "-1";
if (isset($_GET['idbpjs'])) {
  $colname_edit = $_GET['idbpjs'];
}
mysql_select_db($database_local, $local);
$query_edit = sprintf("SELECT * FROM bpjs_bu WHERE idbpjs = %s", GetSQLValueString($colname_edit, "int"));
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
      <td nowrap="nowrap" align="right">Idbpjs:</td>
      <td><?php echo $row_edit['idbpjs']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nik:</td>
      <td><input type="text" name="nik" value="<?php echo htmlentities($row_edit['nik'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">No_akun:</td>
      <td><input type="text" name="no_akun" value="<?php echo htmlentities($row_edit['no_akun'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama:</td>
      <td><input type="text" name="nama" value="<?php echo htmlentities($row_edit['nama'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">No_va:</td>
      <td><input type="text" name="no_va" value="<?php echo htmlentities($row_edit['no_va'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Hub_keluarga:</td>
      <td><input type="text" name="hub_keluarga" value="<?php echo htmlentities($row_edit['hub_keluarga'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Terdaftar:</td>
      <td><input type="text" name="terdaftar" value="<?php echo htmlentities($row_edit['terdaftar'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
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
      <td nowrap="nowrap" align="right">Parent:</td>
      <td><select name="parent">
        <?php 
do {  
?>
        <option value="<?php echo $row_parent['nik']?>" <?php if (!(strcmp($row_parent['nik'], htmlentities($row_edit['parent'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_parent['nama']?></option>
        <?php
} while ($row_parent = mysql_fetch_assoc($parent));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Karyawan:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input type="radio" name="karyawan" value="Y" <?php if (!(strcmp(htmlentities($row_edit['karyawan'], ENT_COMPAT, 'utf-8'),"Y"))) {echo "checked=\"checked\"";} ?> />
            Ya</td>
        </tr>
        <tr>
          <td><input type="radio" name="karyawan" value="N" <?php if (!(strcmp(htmlentities($row_edit['karyawan'], ENT_COMPAT, 'utf-8'),"N"))) {echo "checked=\"checked\"";} ?> />
            Tidak</td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kelas:</td>
      <td><select name="kelas">
        <option value="1" <?php if (!(strcmp(1, htmlentities($row_edit['kelas'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Kelas 1</option>
        <option value="2" <?php if (!(strcmp(2, htmlentities($row_edit['kelas'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Kelas 2</option>
        <option value="3" <?php if (!(strcmp(3, htmlentities($row_edit['kelas'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>kelas 3</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Biaya:</td>
      <td><input type="text" name="biaya" value="<?php echo htmlentities($row_edit['biaya'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="idbpjs" value="<?php echo $row_edit['idbpjs']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($parent);

mysql_free_result($edit);
?>
