<?php

if (isset($_POST['simpan'])) {

$nama=$_POST['nama'];
$no_hp=$_POST['no_hp'];
$alamat=$_POST['alamat'];
$rencana_lahiran=$_POST['rencana_lahiran'];
$hpl=$_POST['hpl'];
$berat_badan=$_POST['berat_badan'];
$anak_ke=$_POST['anak_ke'];
$proses_lahiran=$_POST['proses_lahiran'];
$rencana_asi=$_POST['rencana_asi'];
$implan=$_POST['implan'];
$perawatan=$_POST['perawatan'];
$slimming=$_POST['slimming'];
$riwayat_penyakit=$_POST['riwayat_penyakit'];


$simpan=mysqli_query($koneksi,"insert into gform_pascalahiran (nama, no_hp, alamat, `rencana lahiran`, hpl, berat_badan, anak_ke, proses_lahiran, rencana_asi, implan, perawatan, slimming, riwayat_penyakit) VALUES
  ('$nama','$no_hp','$alamat','$rencana_lahiran','$hpl','$berat_badan','$anak_ke','$proses_lahiran','$rencana_asi','$implan','$perawatan','$slimming','$riwayat_penyakit')");
 
 // mysql_select_db($database_local, $local);
  //$Result1 = mysql_query($insertSQL, $local) or die(mysql_error());
  echo "<script>alert('Data Tersimpan');document.location='?page=gform_pascalahiran' </script>";
}
?>

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
      <td nowrap="nowrap" align="right">Rencana lahiran:</td>
      <td><input type="text" name="rencana_lahiran" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Hpl:</td>
      <td><input type="text" name="hpl" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Berat_badan:</td>
      <td><input type="text" name="berat_badan" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Anak_ke:</td>
      <td><input type="text" name="anak_ke" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Proses_lahiran:</td>
      <td><input type="text" name="proses_lahiran" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Rencana_asi:</td>
      <td><input type="text" name="rencana_asi" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Implan:</td>
      <td><input type="text" name="implan" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Perawatan:</td>
      <td><input type="text" name="perawatan" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Slimming:</td>
      <td><input type="text" name="slimming" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Riwayat_penyakit:</td>
      <td><textarea name="riwayat_penyakit" cols="50" rows="5"></textarea></td>
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