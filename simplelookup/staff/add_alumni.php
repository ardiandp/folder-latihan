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
  $insertSQL = sprintf("INSERT INTO alumni (idalumni, kampus, nim, nama_lengkap, alamat, no_hp, tempat_lahir, tanggal_lahir, jurusan, no_sk, no_ijasah, nilai, foto) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['idalumni'], "int"),
                       GetSQLValueString($_POST['kampus'], "text"),
                       GetSQLValueString($_POST['nim'], "text"),
                       GetSQLValueString($_POST['nama_lengkap'], "text"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['no_hp'], "text"),
                       GetSQLValueString($_POST['tempat_lahir'], "text"),
                       GetSQLValueString($_POST['tanggal_lahir'], "date"),
                       GetSQLValueString($_POST['jurusan'], "text"),
                       GetSQLValueString($_POST['no_sk'], "text"),
                       GetSQLValueString($_POST['no_ijasah'], "text"),
                       GetSQLValueString($_POST['nilai'], "double"),
                       GetSQLValueString($_POST['foto'], "text"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($insertSQL, $local) or die(mysql_error());
  echo "<script>alert('Data Tersimpan');document.location='?page=alumni' </script>";
}

mysql_select_db($database_local, $local);
$query_jurusan = "SELECT * FROM jurusan";
$jurusan = mysql_query($query_jurusan, $local) or die(mysql_error());
$row_jurusan = mysql_fetch_assoc($jurusan);
$totalRows_jurusan = mysql_num_rows($jurusan);

mysql_select_db($database_local, $local);
$query_kampus = "SELECT * FROM kampus";
$kampus = mysql_query($query_kampus, $local) or die(mysql_error());
$row_kampus = mysql_fetch_assoc($kampus);
$totalRows_kampus = mysql_num_rows($kampus);
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
      <td nowrap="nowrap" align="right">Idalumni:</td>
      <td><input type="text" name="idalumni" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kampus:</td>
      <td><select name="kampus">
        <?php 
do {  
?>
        <option value="<?php echo $row_kampus['idkampus']?>" ><?php echo $row_kampus['namakampus']?></option>
        <?php
} while ($row_kampus = mysql_fetch_assoc($kampus));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nim:</td>
      <td><input type="text" name="nim" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama_lengkap:</td>
      <td><input type="text" name="nama_lengkap" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Alamat:</td>
      <td><textarea name="alamat" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">No_hp:</td>
      <td><input type="text" name="no_hp" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tempat_lahir:</td>
      <td><input type="text" name="tempat_lahir" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tanggal_lahir:</td>
      <td><input type="text" name="tanggal_lahir" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Jurusan:</td>
      <td><select name="jurusan">
        <?php 
do {  
?>
        <option value="<?php echo $row_jurusan['idjurusan']?>" ><?php echo $row_jurusan['nama_jurusan']?></option>
        <?php
} while ($row_jurusan = mysql_fetch_assoc($jurusan));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">No_sk:</td>
      <td><input type="text" name="no_sk" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">No_ijasah:</td>
      <td><input type="text" name="no_ijasah" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nilai:</td>
      <td><input type="text" name="nilai" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Foto:</td>
      <td><input type="text" name="foto" value="" size="32" /></td>
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
mysql_free_result($jurusan);

mysql_free_result($kampus);
?>
