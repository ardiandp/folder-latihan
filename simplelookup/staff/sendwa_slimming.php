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
//$query_slimming = "SELECT * FROM gform_slimming where idgform='$_GET[idgform]' ";
$slimming = mysqli_query($koneksi,"SELECT * FROM gform_slimming where idgform='$_GET[idgform]'");
$row_slimming = mysqli_fetch_assoc($slimming);
$totalRows_slimming = mysqli_num_rows($slimming);
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Legacy User Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Legacy User Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
<table width="438" height="236" border="0" align="center">
 <tr>
    <td  colspan="2"><center>*Pendaftaran Slimming*</center></td>
   
  </tr>
  <tr>
    <td width="205">*Nama Lengkap*</td>
    <td width="217"><?php echo $row_slimming['nama']; ?></td>
  </tr>
  <tr>
    <td>*No HP* </td>
    <td><a href="https://wa.me/<?php echo $row_slimming['no_hp']; ?>"> https://wa.me/<?php echo $row_slimming['no_hp']; ?> </td>
  </tr>
  <tr>
    <td>*Alamat*</td>
    <td><?php echo $row_slimming['alamat']; ?></td>
  </tr>
  <tr>
    <td>*Berat Badan*</td>
    <td><?php echo $row_slimming['berat_badan']; ?></td>
  </tr>
  <tr>
    <td>*Lokasi Perawatan*</td>
    <td><?php echo $row_slimming['lokasi_perawatan']; ?></td>
  </tr>
  <tr>
    <td>*Gerai*</td>
    <td><?php echo $row_slimming['gerai']; ?></td>
  </tr>
  <tr>
    <td>*Riwayat Penyakit*</td>
    <td><?php echo $row_slimming['riwayat_penyakit']; ?></td>
  </tr>
  <tr>
    <td>*Keterangan lain*</td>
    <td><?php echo $row_slimming['keterangan_lain']; ?></td>
  </tr>
  </table>
<?php
mysqli_free_result($slimming);
?>


 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->