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
  $updateSQL = sprintf("UPDATE no_rekening SET atas_nama=%s, `alias`=%s, norek=%s, bank=%s, created_at=%s WHERE idrek=%s",
                       GetSQLValueString($_POST['atas_nama'], "text"),
                       GetSQLValueString($_POST['alias'], "text"),
                       GetSQLValueString($_POST['norek'], "text"),
                       GetSQLValueString($_POST['bank'], "text"),
                       GetSQLValueString($_POST['created_at'], "date"),
                       GetSQLValueString($_POST['idrek'], "int"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($updateSQL, $local) or die(mysql_error());
  echo "<script>alert('Data Tersimpan');document.location='?page=norekening' </script>";
}

//mysql_select_db($database_local, $local);
//$query_bank = "SELECT * FROM kd_bank";
$bank = mysqlI_query($koneksi,"SELECT * FROM kd_bank");
$row_bank = mysqli_fetch_assoc($bank);
$totalRows_bank = mysqli_num_rows($bank);


//mysql_select_db($database_local, $local);
//$query_edit = sprintf("SELECT * FROM no_rekening WHERE idrek = %s", GetSQLValueString($colname_edit, "int"));
$edit = mysqli_query($koneksi,"SELECT * FROM no_rekening WHERE idrek='$_GET[idrek]' ");
$row_edit = mysqli_fetch_assoc($edit);
$totalRows_edit = mysqli_num_rows($edit);
?>


<body>
<form action="" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Idrek:</td>
      <td><?php echo $row_edit['idrek']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Atas_nama:</td>
      <td><input type="text" name="atas_nama" value="<?php echo htmlentities($row_edit['atas_nama'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Alias:</td>
      <td><input type="text" name="alias" value="<?php echo htmlentities($row_edit['alias'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Norek:</td>
      <td><input type="text" name="norek" value="<?php echo htmlentities($row_edit['norek'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Bank:</td>
      <td><select name="bank">
        <?php 
do {  
?>
        <option value="<?php echo $row_bank['kode']?>" <?php if (!(strcmp($row_bank['kode'], htmlentities($row_edit['bank'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_bank['nama_bank']?></option>
        <?php
} while ($row_bank = mysqli_fetch_assoc($bank));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Created_at:</td>
      <td><input type="text" name="created_at" value="<?php echo htmlentities($row_edit['created_at'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="idrek" value="<?php echo $row_edit['idrek']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($bank);

mysqli_free_result($edit);
?>
