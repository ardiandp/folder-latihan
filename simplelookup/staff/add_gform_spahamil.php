<?php
if (isset($_POST['simpan'])) {
  $nama=$_POST['nama'];
  $alamat=$_POST['alamat'];
  $telp=$_POST['telp'];
  $beratbadan=$_POST['beratbadan'];
  $usiakehamilan=$_POST['usiakehamilan'];
  $kehamilanke=$_POST['kehamilan_ke'];
  $menggunakanpen=$_POST['menggunakan_pen'];
  $adakeluhan=$_POST['ada_keluhan'];
  $kondisi_plasenta=$_POST['kondisi_plasenta'];
  $kram_tubuh=$_POST['kram_rubuh'];
  $pendarahan=$_POST['pendarahan'];
  $stretchmark=$_POST['stretchmark'];
  $lokasi_perawatan=$_POST['lokasi_perawatan'];
  $gerai=$_POST['gerai'];

  $simpan=mysqli_query($koneksi,"INSERT INTO gform_spahamil ( nama, alamat, telp, beratbadan, usiakehamilan, kehamilan_ke, menggunakan_pen, ada_keluhan, kondisi_plasenta, kram_rubuh, pendarahan, stretchmark, lokasi_perawatan, gerai)
                     values ('$nama','$alamat','$telp','$beratbadan','$usiakehamilan','$kehamilanke','$menggunakanpen','$adakeluhan','$kondisi_plasenta','$kram_tubuh',
                     '$pendarahan','$stretchmark','$lokasi_perawatan','$gerai')
                     ");

 // mysql_select_db($database_local, $local);
  //$Result1 = mysqli_query($koneksi,$insertSQL);
  echo "<script>alert('data tersimpan'); document.location='?page=gform_spahamil' </script>";
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
      <td nowrap="nowrap" align="right" valign="top">Alamat:</td>
      <td><textarea name="alamat" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Telp:</td>
      <td><input type="text" name="telp" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Beratbadan:</td>
      <td><input type="text" name="beratbadan" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Usiakehamilan:</td>
      <td><input type="text" name="usiakehamilan" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kehamilan_ke:</td>
      <td><input type="text" name="kehamilan_ke" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Menggunakan_pen:</td>
      <td><input type="text" name="menggunakan_pen" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Ada_keluhan:</td>
      <td><input type="text" name="ada_keluhan" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kondisi_plasenta:</td>
      <td><input type="text" name="kondisi_plasenta" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kram_rubuh:</td>
      <td><input type="text" name="kram_rubuh" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Pendarahan:</td>
      <td><input type="text" name="pendarahan" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Stretchmark:</td>
      <td><input type="text" name="stretchmark" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Lokasi_perawatan:</td>
      <td><input type="text" name="lokasi_perawatan" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Gerai:</td>

      <td><select name="gerai" class="form-control">
        <option value='0'>Perawatan Homecare </option>
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
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" name="simpan" value="simpan data" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($gerai);
?>
