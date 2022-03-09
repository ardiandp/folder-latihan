<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE produk SET kode_produk=%s, nama_produk=%s, kategori=%s, berat=%s, gambar=%s, keterangan=%s, harga=%s, aktif=%s WHERE id_produk=%s",
                       GetSQLValueString($_POST['kode_produk'], "text"),
                       GetSQLValueString($_POST['nama_produk'], "text"),
                       GetSQLValueString($_POST['kategori'], "text"),
                       GetSQLValueString($_POST['berat'], "text"),
                       GetSQLValueString($_POST['gambar'], "text"),
                       GetSQLValueString($_POST['keterangan'], "text"),
                       GetSQLValueString($_POST['harga'], "int"),
                       GetSQLValueString($_POST['aktif'], "text"),
                       GetSQLValueString($_POST['id_produk'], "int"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($updateSQL, $local) or die(mysql_error());
   echo "<script>alert(' Data Tersimpan'); document.location='?page=produk' </script>";
}

//mysql_select_db($database_local, $local);
//$query_kategori = "select *from kategori where type='produk'";
$kategori = mysqli_query($koneksi,"select *from kategori where type='produk' ");
$row_kategori = mysqli_fetch_assoc($kategori);
$totalRows_kategori = mysqli_num_rows($kategori);

$id_produk=$_GET['id_produk'];
$edit = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$id_produk' ");
$row_edit = mysqli_fetch_assoc($edit);
$totalRows_edit = mysqli_num_rows($edit);
?>


<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_produk:</td>
      <td><?php echo $row_edit['id_produk']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kode_produk:</td>
      <td><input type="text" name="kode_produk" value="<?php echo htmlentities($row_edit['kode_produk'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama_produk:</td>
      <td><input type="text" name="nama_produk" value="<?php echo htmlentities($row_edit['nama_produk'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kategori:</td>
      <td><select name="kategori">
        <?php 
do {  
?>
        <option value="<?php echo $row_kategori['id_kategori']?>" <?php if (!(strcmp($row_kategori['id_kategori'], htmlentities($row_edit['edit'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_kategori['nama_kategori']?></option>
        <?php
} while ($row_kategori = mysqli_fetch_assoc($kategori));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Berat:</td>
      <td><input type="text" name="berat" value="<?php echo htmlentities($row_edit['berat'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Gambar:</td>
      <td><input type="text" name="gambar" value="<?php echo htmlentities($row_edit['gambar'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Keterangan:</td>
      <td><textarea name="keterangan" cols="50" rows="5"><?php echo htmlentities($row_edit['keterangan'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Harga:</td>
      <td><input type="text" name="harga" value="<?php echo htmlentities($row_edit['harga'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
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
  <input type="hidden" name="id_produk" value="<?php echo $row_edit['id_produk']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($kategori);

mysqli_free_result($edit);
?>
