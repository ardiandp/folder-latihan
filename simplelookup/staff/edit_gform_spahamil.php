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
  $updateSQL = sprintf("UPDATE gform_spahamil SET nama=%s, alamat=%s, telp=%s, beratbadan=%s, usiakehamilan=%s, kehamilan_ke=%s, menggunakan_pen=%s, ada_keluhan=%s, kondisi_plasenta=%s, kram_rubuh=%s, pendarahan=%s, stretchmark=%s, lokasi_perawatan=%s, gerai=%s WHERE idgform=%s",
                       GetSQLValueString($_POST['nama'], "text"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['telp'], "text"),
                       GetSQLValueString($_POST['beratbadan'], "text"),
                       GetSQLValueString($_POST['usiakehamilan'], "text"),
                       GetSQLValueString($_POST['kehamilan_ke'], "text"),
                       GetSQLValueString($_POST['menggunakan_pen'], "text"),
                       GetSQLValueString($_POST['ada_keluhan'], "text"),
                       GetSQLValueString($_POST['kondisi_plasenta'], "text"),
                       GetSQLValueString($_POST['kram_rubuh'], "text"),
                       GetSQLValueString($_POST['pendarahan'], "text"),
                       GetSQLValueString($_POST['stretchmark'], "text"),
                       GetSQLValueString($_POST['lokasi_perawatan'], "text"),
                       GetSQLValueString($_POST['gerai'], "text"),
                       GetSQLValueString($_POST['idgform'], "int"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($updateSQL, $local) or die(mysql_error());
}

$colname_edit = "-1";
if (isset($_GET['idgform'])) {
  $colname_edit = $_GET['idgform'];
}
mysql_select_db($database_local, $local);
$query_edit = sprintf("SELECT * FROM gform_spahamil WHERE idgform = %s", GetSQLValueString($colname_edit, "int"));
$edit = mysql_query($query_edit, $local) or die(mysql_error());
$row_edit = mysql_fetch_assoc($edit);
$totalRows_edit = mysql_num_rows($edit);

mysql_select_db($database_local, $local);
$query_gerai = "SELECT * FROM gerai";
$gerai = mysql_query($query_gerai, $local) or die(mysql_error());
$row_gerai = mysql_fetch_assoc($gerai);
$totalRows_gerai = mysql_num_rows($gerai);
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
      <td nowrap="nowrap" align="right">Idgform:</td>
      <td><?php echo $row_edit['idgform']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama:</td>
      <td><input type="text" name="nama" value="<?php echo htmlentities($row_edit['nama'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Alamat:</td>
      <td><textarea name="alamat" cols="50" rows="5"><?php echo htmlentities($row_edit['alamat'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Telp:</td>
      <td><input type="text" name="telp" value="<?php echo htmlentities($row_edit['telp'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Beratbadan:</td>
      <td><input type="text" name="beratbadan" value="<?php echo htmlentities($row_edit['beratbadan'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Usiakehamilan:</td>
      <td><input type="text" name="usiakehamilan" value="<?php echo htmlentities($row_edit['usiakehamilan'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kehamilan_ke:</td>
      <td><input type="text" name="kehamilan_ke" value="<?php echo htmlentities($row_edit['kehamilan_ke'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Menggunakan_pen:</td>
      <td><input type="text" name="menggunakan_pen" value="<?php echo htmlentities($row_edit['menggunakan_pen'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Ada_keluhan:</td>
      <td><input type="text" name="ada_keluhan" value="<?php echo htmlentities($row_edit['ada_keluhan'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kondisi_plasenta:</td>
      <td><input type="text" name="kondisi_plasenta" value="<?php echo htmlentities($row_edit['kondisi_plasenta'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kram_rubuh:</td>
      <td><input type="text" name="kram_rubuh" value="<?php echo htmlentities($row_edit['kram_rubuh'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Pendarahan:</td>
      <td><input type="text" name="pendarahan" value="<?php echo htmlentities($row_edit['pendarahan'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Stretchmark:</td>
      <td><input type="text" name="stretchmark" value="<?php echo htmlentities($row_edit['stretchmark'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Lokasi_perawatan:</td>
      <td><input type="text" name="lokasi_perawatan" value="<?php echo htmlentities($row_edit['lokasi_perawatan'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Gerai:</td>
      <td><select name="gerai">
        <?php 
do {  
?>
        <option value="<?php echo $row_gerai['kode_gerai']?>" <?php if (!(strcmp($row_gerai['kode_gerai'], htmlentities($row_edit['gerai'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_gerai['nama_gerai']?></option>
        <?php
} while ($row_gerai = mysql_fetch_assoc($gerai));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="idgform" value="<?php echo $row_edit['idgform']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($edit);

mysql_free_result($gerai);
?>
