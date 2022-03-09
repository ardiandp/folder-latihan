<?php
if (isset($_POST['update'])) {

  $name=$_POST['name'];
  $link=$_POST['link'];
  $icon=$_POST['icon'];
  $is_active=$_POST['is_active'];
  $is_parent=$_POST['is_parent'];
  $id=$_POST['id'];

  $update=mysqli_query($koneksi,"update menu set name='$name',link='$link',icon='$icon',is_active='$is_active',is_parent='$is_parent' where id='$id' ");
  //mysql_select_db($database_local, $local);
  //$Result1 = mysql_query($updateSQL, $local) or die(mysql_error());
  echo "<script>alert('Data Berhasil Disimpan');document.location='?page=menu' </script> ";
}

//mysql_select_db($database_local, $local);
//$query_menu = "SELECT * FROM menu";
$menu = mysqli_query($koneksi,"SELECT * FROM menu");
$row_menu = mysqli_fetch_assoc($menu);
$totalRows_menu = mysqli_num_rows($menu);

$id=$_GET['id'];
//$query_edit = mysqli_query($koneksi,"SELECT * FROM menu WHERE id='$id' ");
$edit = mysqli_query($koneksi,"SELECT * FROM menu WHERE id='$id' ");
$row_edit = mysqli_fetch_assoc($edit);
$totalRows_edit = mysqli_num_rows($edit);
?>


<body>
<form action="" method="post">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id:</td>
      <td><?php echo $row_edit['id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Name:</td>
      <td><input type="text" name="name" value="<?php echo htmlentities($row_edit['name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Link:</td>
      <td><input type="text" name="link" value="<?php echo htmlentities($row_edit['link'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Icon:</td>
      <td><input type="text" name="icon" value="<?php echo htmlentities($row_edit['icon'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Is_active:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input type="radio" name="is_active" value="Y" <?php if (!(strcmp(htmlentities($row_edit['is_active'], ENT_COMPAT, 'utf-8'),"Y"))) {echo "checked=\"checked\"";} ?> />
            Ya</td>
        </tr>
        <tr>
          <td><input type="radio" name="is_active" value="N" <?php if (!(strcmp(htmlentities($row_edit['is_active'], ENT_COMPAT, 'utf-8'),"N"))) {echo "checked=\"checked\"";} ?> />
            Tidak</td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Is_parent:</td>
      <td><select name="is_parent">
      <option value="0"> Menu Utama</option>
        <?php 
do {  
?>
        <option value="<?php echo $row_menu['id']?>" <?php if (!(strcmp($row_menu['id'], htmlentities($row_edit['is_parent'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_menu['name']?></option>
        <?php
} while ($row_menu = mysqli_fetch_assoc($menu));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <input type="hidden" name="id" value="<?php echo $row_edit['id']; ?>" />
      <td><input type="submit" value="Update record" name="update" class="btn-flat btn-warning btn-sm" /></td>
    </tr>
  </table>
  
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($menu);

mysqli_free_result($edit);
?>
