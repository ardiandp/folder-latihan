
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

//mysql_select_db($database_local, $local);
//$query_spahamil = "SELECT gform_spahamil.*, gerai.kode_gerai,gerai.nama_gerai FROM gform_spahamil LEFT JOIN gerai ON gform_spahamil.gerai=gerai.kode_gerai where gform_spahamil.idgform=$_GET[idgform] ";
$spahamil = mysqli_query($koneksi,"SELECT gform_spahamil.*, gerai.kode_gerai,gerai.nama_gerai FROM gform_spahamil LEFT JOIN gerai ON gform_spahamil.gerai=gerai.kode_gerai where gform_spahamil.idgform=$_GET[idgform]");
$row_spahamil = mysqli_fetch_assoc($spahamil);
$totalRows_spahamil = mysqli_num_rows($spahamil);

mysqli_free_result($spahamil);
?>
<table width="390" height="385" border="1" align="center">
  <tr>
    <td height="29" colspan="2" align="center"><strong>*Reservasi Perwatan Spa hamil*</strong></td>
  </tr>
  <tr>
    <td width="158">*Nama Lengkap*</td>
    <td width="131"><?php echo $row_spahamil['nama']; ?></td>
  </tr>
  <tr>
    <td>*alamat*</td>
    <td><?php echo $row_spahamil['alamat']; ?></td>
  </tr>
  <tr>
    <td>*telp*</td>
    <td>https://wa.me/<?php echo $row_spahamil['telp']; ?></td>
  </tr>
  <tr>
    <td>*beratbadan*</td>
    <td><?php echo $row_spahamil['beratbadan']; ?></td>
  </tr>
  <tr>
    <td>*usiakehamilan*</td>
    <td><?php echo $row_spahamil['usiakehamilan']; ?></td>
  </tr>
  <tr>
    <td>*kehamilan_ke*</td>
    <td><?php echo $row_spahamil['kehamilan_ke']; ?></td>
  </tr>
  <tr>
    <td>*menggunakan_pen*</td>
    <td><?php echo $row_spahamil['menggunakan_pen']; ?></td>
  </tr>
  <tr>
    <td>*ada_keluhan*</td>
    <td><?php echo $row_spahamil['ada_keluhan']; ?></td>
  </tr>
  <tr>
    <td>*kondisi_plasenta*</td>
    <td><?php echo $row_spahamil['kondisi_plasenta']; ?></td>
  </tr>
  <tr>
    <td>*kram_rubuh*</td>
    <td><?php echo $row_spahamil['kram_rubuh']; ?></td>
  </tr>
  <tr>
    <td>*pendarahan*</td>
    <td><?php echo $row_spahamil['pendarahan']; ?></td>
  </tr>
  <tr>
    <td>*stretchmark*</td>
    <td><?php echo $row_spahamil['stretchmark']; ?></td>
  </tr>
  <tr>
    <td>*lokasi_perawatan*</td>
    <td><?php echo $row_spahamil['lokasi_perawatan']; ?></td>
  </tr>
  <tr>
    <td>*gerai*</td>
    <td><?php echo $row_spahamil['nama_gerai']; ?></td>
  </tr>
  </table>