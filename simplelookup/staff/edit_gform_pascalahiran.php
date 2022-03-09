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
  $updateSQL = sprintf("UPDATE gform_pascalahiran SET nama=%s, no_hp=%s, alamat=%s, `rencana lahiran`=%s, hpl=%s, berat_badan=%s, anak_ke=%s, proses_lahiran=%s, rencana_asi=%s, implan=%s, perawatan=%s, slimming=%s, riwayat_penyakit=%s WHERE idgform=%s",
                       GetSQLValueString($_POST['nama'], "text"),
                       GetSQLValueString($_POST['no_hp'], "text"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['rencana_lahiran'], "text"),
                       GetSQLValueString($_POST['hpl'], "text"),
                       GetSQLValueString($_POST['berat_badan'], "text"),
                       GetSQLValueString($_POST['anak_ke'], "text"),
                       GetSQLValueString($_POST['proses_lahiran'], "text"),
                       GetSQLValueString($_POST['rencana_asi'], "text"),
                       GetSQLValueString($_POST['implan'], "text"),
                       GetSQLValueString($_POST['perawatan'], "text"),
                       GetSQLValueString($_POST['slimming'], "text"),
                       GetSQLValueString($_POST['riwayat_penyakit'], "text"),
                       GetSQLValueString($_POST['idgform'], "int"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($updateSQL, $local) or die(mysql_error());
}

$colname_edit = "-1";
if (isset($_GET['idgform'])) {
  $colname_edit = $_GET['idgform'];
}
mysql_select_db($database_local, $local);
$query_edit = sprintf("SELECT * FROM gform_pascalahiran WHERE idgform = %s", GetSQLValueString($colname_edit, "int"));
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
      <td nowrap="nowrap" align="right">Idgform:</td>
      <td><?php echo $row_edit['idgform']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama:</td>
      <td><input type="text" name="nama" value="<?php echo htmlentities($row_edit['nama'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">No_hp:</td>
      <td><input type="text" name="no_hp" value="<?php echo htmlentities($row_edit['no_hp'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Alamat:</td>
      <td><textarea name="alamat" cols="50" rows="5"><?php echo htmlentities($row_edit['alamat'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Rencana lahiran:</td>
      <td><input type="text" name="rencana_lahiran" value="<?php echo htmlentities($row_edit['rencana lahiran'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Hpl:</td>
      <td><input type="text" name="hpl" value="<?php echo htmlentities($row_edit['hpl'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Berat_badan:</td>
      <td><input type="text" name="berat_badan" value="<?php echo htmlentities($row_edit['berat_badan'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Anak_ke:</td>
      <td><input type="text" name="anak_ke" value="<?php echo htmlentities($row_edit['anak_ke'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Proses_lahiran:</td>
      <td><input type="text" name="proses_lahiran" value="<?php echo htmlentities($row_edit['proses_lahiran'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Rencana_asi:</td>
      <td><input type="text" name="rencana_asi" value="<?php echo htmlentities($row_edit['rencana_asi'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Implan:</td>
      <td><input type="text" name="implan" value="<?php echo htmlentities($row_edit['implan'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Perawatan:</td>
      <td><input type="text" name="perawatan" value="<?php echo htmlentities($row_edit['perawatan'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Slimming:</td>
      <td><input type="text" name="slimming" value="<?php echo htmlentities($row_edit['slimming'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Riwayat_penyakit:</td>
      <td><textarea name="riwayat_penyakit" cols="50" rows="5"><?php echo htmlentities($row_edit['riwayat_penyakit'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
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
?>
