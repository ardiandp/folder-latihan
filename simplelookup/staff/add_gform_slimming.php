<?php
if (isset($_POST['simpan'])) {
$nama=$_POST['nama'];
$no_hp=$_POST['no_hp'];
$alamat=$_POST['alamat'];
$berat_badan=$_POST['berat_badan'];
$lokasi_perawatan=$_POST['lokasi_perawatan'];
$gerai=$_POST['gerai'];
$riwayat_penyakit=$_POST['riwayat_penyakit'];
$keterangan_lain=$_POST['keterangan_lain'];

$simpan=mysqli_query($koneksi,"insert into gform_slimming (nama, no_hp, alamat, berat_badan, lokasi_perawatan, gerai, riwayat_penyakit, keterangan_lain)
                  VALUES
                  ('$nama','$no_hp','$alamat','$berat_badan','$lokasi_perawatan','$gerai','$riwayat_penyakit','$keterangan_lain')");
 // mysql_select_db($database_local, $local);
  //$Result1 = mysql_query($insertSQL, $local) or die(mysql_error());
   echo "<script>alert('data tersimpan');document.location='?page=gform_slimming' </script>";
}

//mysql_select_db($database_local, $local);
//$query_gerai = "SELECT * FROM gerai";
$gerai = mysqli_query($koneksi,"SELECT * FROM gerai");
$row_gerai = mysqli_fetch_assoc($gerai);
$totalRows_gerai = mysqli_num_rows($gerai);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Idgform:</td>
      <td><input type="text" name="idgform" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama:</td>
      <td><input type="text" name="nama" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">No_hp:</td>
      <td><input type="text" name="no_hp" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Alamat:</td>
      <td><textarea name="alamat" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Berat_badan:</td>
      <td><input type="text" name="berat_badan" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Lokasi_perawatan:</td>
      <td><select name="lokasi_perawatan">
        <option value="Homecare" <?php if (!(strcmp("Homecare", ""))) {echo "SELECTED";} ?>>Homecare</option>
        <option value="gerai" <?php if (!(strcmp("gerai", ""))) {echo "SELECTED";} ?>>gerai</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Gerai:</td>
      <td><select name="gerai">
        <option value="Homecare">Homecare [ Dirumah Saja ] </option>
        <?php 
do {  
?>
        <option value="<?php echo $row_gerai['kode_gerai']?>" ><?php echo $row_gerai['nama_gerai']?></option>
        <?php
} while ($row_gerai = mysqli_fetch_assoc($gerai));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Riwayat_penyakit:</td>
      <td><input type="text" name="riwayat_penyakit" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Keterangan_lain:</td>
      <td><textarea name="keterangan_lain" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" name="simpan" value="Insert record" /></td>
    </tr>
  </table>
 
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($gerai);
?>
