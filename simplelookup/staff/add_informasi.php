<?php include ('../Connections/local.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO informasi (id_informasi, penulis, judul, keteranagn, tanggal, `new`, publish) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_informasi'], "int"),
                       GetSQLValueString($_POST['penulis'], "text"),
                       GetSQLValueString($_POST['judul'], "text"),
                       GetSQLValueString($_POST['keteranagn'], "text"),
                       GetSQLValueString($_POST['tanggal'], "date"),
                       GetSQLValueString(isset($_POST['new']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['publish']) ? "true" : "", "defined","'Y'","'N'"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($insertSQL, $local) or die(mysql_error());

  echo "<script>alert('Data Berhasil Disimpan');document.location='?page=informasi' </script> ";
}
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
      <td nowrap="nowrap" align="right">Id_informasi:</td>
      <td><input type="text" name="id_informasi" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Penulis:</td>
      <td><input type="text" name="penulis" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Judul:</td>
      <td><input type="text" name="judul" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Keteranagn:</td>
      <td><input type="text" name="keteranagn" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tanggal:</td>
      <td><input type="text" name="tanggal" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">New:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input type="radio" name="new" value="Y" />
            Ya</td>
        </tr>
        <tr>
          <td><input type="radio" name="new" value="N" />
            Tidak</td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Publish:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input type="radio" name="publish" value="Y" />
            Publish</td>
        </tr>
        <tr>
          <td><input type="radio" name="publish" value="N" />
            Draf</td>
        </tr>
      </table></td>
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