<?php

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO produk (id_produk, kode_produk, nama_produk, kategori, berat, gambar, keterangan, harga, aktif) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_produk'], "int"),
                       GetSQLValueString($_POST['kode_produk'], "text"),
                       GetSQLValueString($_POST['nama_produk'], "text"),
                       GetSQLValueString($_POST['kategori'], "text"),
                       GetSQLValueString($_POST['berat'], "text"),
                       GetSQLValueString($_POST['gambar'], "text"),
                       GetSQLValueString($_POST['keterangan'], "text"),
                       GetSQLValueString($_POST['harga'], "int"),
                       GetSQLValueString($_POST['aktif'], "text"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($insertSQL, $local) or die(mysql_error());
   echo "<script>alert(' Data Tersimpan'); document.location='?page=produk' </script>";
}

//mysql_select_db($database_local, $local);
//$query_kategori = "select *from kategori where type='produk'";
$kategori = mysqli_query($koneksi,"select *from kategori where type='produk'");
$row_kategori = mysqli_fetch_assoc($kategori);
$totalRows_kategori = mysqli_num_rows($kategori);
?>


<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_produk:</td>
      <td><input type="text" name="id_produk" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kode_produk:</td>
      <td><input type="text" name="kode_produk" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama_produk:</td>
      <td><input type="text" name="nama_produk" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kategori:</td>
      <td><select name="kategori">
        <?php 
do {  
?>
        <option value="<?php echo $row_kategori['id_kategori']?>" ><?php echo $row_kategori['nama_kategori']?></option>
        <?php
} while ($row_kategori = mysqli_fetch_assoc($kategori));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Berat:</td>
      <td><input type="text" name="berat" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Gambar:</td>
      <td><input type="text" name="gambar" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Keterangan:</td>
      <td><textarea name="keterangan" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Harga:</td>
      <td><input type="text" name="harga" value="" size="32" /></td>
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
mysqli_free_result($kategori);
?>
