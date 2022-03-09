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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO bpjs_mandiri (idbpjs, nik, no_akun, nama, no_va, hub_keluarga, terdaftar, aktif, parent, karyawan, kelas, biaya) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['idbpjs'], "int"),
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
                       GetSQLValueString($_POST['biaya'], "int"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($insertSQL, $local) or die(mysql_error());
  echo "<script>alert('data tersimpan');document.location='?page=bpjsmandiri' </script>";
}

mysql_select_db($database_local, $local);
$query_master = "SELECT * FROM bpjs_mandiri";
$master = mysql_query($query_master, $local) or die(mysql_error());
$row_master = mysql_fetch_assoc($master);
$totalRows_master = mysql_num_rows($master);
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
      <td><input type="text" name="idbpjs" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nik:</td>
      <td><input type="text" name="nik" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">No_akun:</td>
      <td><input type="text" name="no_akun" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama:</td>
      <td><input type="text" name="nama" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">No_va:</td>
      <td><input type="text" name="no_va" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Hub_keluarga:</td>
      <td><input type="text" name="hub_keluarga" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Terdaftar:</td>
      <td><input type="text" name="terdaftar" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Aktif:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input type="radio" name="aktif" value="Y" />
            Ya</td>
        </tr>
        <tr>
          <td><input type="radio" name="aktif" value="N" />
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
        <option value="<?php echo $row_master['nik']?>" ><?php echo $row_master['nama']?></option>
        <?php
} while ($row_master = mysql_fetch_assoc($master));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Karyawan:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input type="radio" name="karyawan" value="Y" />
            Ya</td>
        </tr>
        <tr>
          <td><input type="radio" name="karyawan" value="N" />
            Tidak</td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kelas:</td>
      <td><select name="kelas">
        <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Kelas 1</option>
        <option value="2" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>Kelas 2</option>
        <option value="3" <?php if (!(strcmp(3, ""))) {echo "SELECTED";} ?>>Kelas 3</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Biaya:</td>
      <td><input type="text" name="biaya" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($master);
?>
