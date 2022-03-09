<?php
if(isset($_POST['update']))
{
  
$username=$_POST['username'];
$password=$_POST['password'];
$nama_lengkap=$_POST['nama_lengkap'];
$email=$_POST['email'];
$no_telp=$_POST['no_telp'];
$id_level=$_POST['id_level'];
$blokir=$_POST['blokir'];
$id_admin=$_POST['id_admin'];
   
   $simpan=mysqli_query($koneksi,"update admin set username='$username',password='$password',nama_lengkap='$nama_lengkap',email='$email',no_telp='$no_telp',id_level='$id_level',blokir='$blokir' where id_admin='$id_admin' ");                    
  //mysql_select_db($database_local, $local);
  //$Result1 = mysql_query($updateSQL, $local) or die(mysql_error());
  echo "<script>alert('data Terupdate');document.location='?page=admin' </script>";
}


//mysql_select_db($database_local, $local);
//$query_edit = sprintf("SELECT * FROM `admin` WHERE id_admin = %s", GetSQLValueString($colname_edit, "int"));
$edit = mysqli_query($koneksi,"SELECT * FROM admin WHERE id_admin='$_GET[id]' ");
$row_edit = mysqli_fetch_assoc($edit);
$totalRows_edit = mysqli_num_rows($edit);


$lvl = mysqli_query($koneksi,"select *from level");
$row_lvl = mysqli_fetch_assoc($lvl);
$totalRows_lvl = mysqli_num_rows($lvl);
?>

<body>
<form action="" method="post">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_admin:</td>
      <td><?php echo $row_edit['id_admin']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Username:</td>
      <td><input type="text" name="username" value="<?php echo htmlentities($row_edit['username'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Password:</td>
      <td><input type="text" name="password" value="<?php echo htmlentities($row_edit['password'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama_lengkap:</td>
      <td><input type="text" name="nama_lengkap" value="<?php echo htmlentities($row_edit['nama_lengkap'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td><input type="text" name="email" value="<?php echo htmlentities($row_edit['email'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">No_telp:</td>
      <td><input type="text" name="no_telp" value="<?php echo htmlentities($row_edit['no_telp'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_level:</td>
      <td><select name="id_level">
        <?php 
do {  
?>
        <option value="<?php echo $row_lvl['id_level']?>" <?php if (!(strcmp($row_lvl['id_level'], htmlentities($row_edit['id_level'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_lvl['level']?></option>
        <?php
} while ($row_lvl = mysqli_fetch_assoc($lvl));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Blokir:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input type="radio" name="blokir" value="Y" <?php if (!(strcmp(htmlentities($row_edit['blokir'], ENT_COMPAT, 'utf-8'),"Y"))) {echo "checked=\"checked\"";} ?> />
            Ya</td>
        </tr>
        <tr>
          <td><input type="radio" name="blokir" value="N" <?php if (!(strcmp(htmlentities($row_edit['blokir'], ENT_COMPAT, 'utf-8'),"N"))) {echo "checked=\"checked\"";} ?> />
            Tidak </td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Gambar:</td>
      <td><input type="text" name="gambar" value="<?php echo htmlentities($row_edit['gambar'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" name="update" value="Update Admin" class="btn-flat btn-sm btn-warning" /></td>
    </tr>
  </table>  
  <input type="hidden" name="id_admin" value="<?php echo $row_edit['id_admin']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($edit);

mysqli_free_result($lvl);
?>
