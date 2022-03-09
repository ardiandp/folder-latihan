<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE jg_vendor SET nama_vendor=%s, nama_cp=%s, jenis_vendor=%s, email=%s, handphone=%s, kode_bank=%s, norekening=%s, alamat=%s, sosmed=%s, aktif=%s WHERE idvendor=%s",
                       GetSQLValueString($_POST['nama_vendor'], "text"),
                       GetSQLValueString($_POST['nama_cp'], "text"),
                       GetSQLValueString($_POST['jenis_vendor'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['handphone'], "text"),
                       GetSQLValueString($_POST['kode_bank'], "text"),
                       GetSQLValueString($_POST['norekening'], "text"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['sosmed'], "text"),
                       GetSQLValueString($_POST['aktif'], "text"),
                       GetSQLValueString($_POST['idvendor'], "int"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($updateSQL, $local) or die(mysql_error());
  echo "<script>alert('Data Tersimpan');document.location='?page=vendor' </script>";
}

//mysql_select_db($database_local, $local);
//$query_bank = "SELECT * FROM kd_bank";
$bank = mysqli_query($koneksi,"SELECT * FROM kd_bank");
$row_bank = mysqli_fetch_assoc($bank);
$totalRows_bank = mysqli_num_rows($bank);


//$query_edit = sprintf("SELECT * FROM jg_vendor WHERE idvendor = %s", GetSQLValueString($colname_edit, "int"));
$edit = mysqli_query($koneksi,"SELECT * FROM jg_vendor WHERE idvendor='$_GET[idvendor]' ");
$row_edit = mysqli_fetch_assoc($edit);
$totalRows_edit = mysqli_num_rows($edit);
?>


<body>
<form action="" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Idvendor:</td>
      <td><?php echo $row_edit['idvendor']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama_vendor:</td>
      <td><input type="text" name="nama_vendor" value="<?php echo htmlentities($row_edit['nama_vendor'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama_cp:</td>
      <td><input type="text" name="nama_cp" value="<?php echo htmlentities($row_edit['nama_cp'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Jenis_vendor:</td>
      <td><input type="text" name="jenis_vendor" value="<?php echo htmlentities($row_edit['jenis_vendor'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td><input type="text" name="email" value="<?php echo htmlentities($row_edit['email'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Handphone:</td>
      <td><input type="text" name="handphone" value="<?php echo htmlentities($row_edit['handphone'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kode_bank:</td>
      <td><select name="kode_bank">
        <?php 
do {  
?>
        <option value="<?php echo $row_bank['kode']?>" <?php if (!(strcmp($row_bank['kode'], htmlentities($row_edit['kode_bank'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_bank['nama_bank']?></option>
        <?php
} while ($row_bank = mysqli_fetch_assoc($bank));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Norekening:</td>
      <td><input type="text" name="norekening" value="<?php echo htmlentities($row_edit['norekening'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Alamat:</td>
      <td><textarea name="alamat" cols="50" rows="5"><?php echo htmlentities($row_edit['alamat'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sosmed:</td>
      <td><input type="text" name="sosmed" value="<?php echo htmlentities($row_edit['sosmed'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
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
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="idvendor" value="<?php echo $row_edit['idvendor']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($bank);

mysqli_free_result($edit);
?>
