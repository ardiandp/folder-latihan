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

mysql_select_db($database_local, $local);
$query_data = "SELECT * FROM guru";
$data = mysql_query($query_data, $local) or die(mysql_error());
$row_data = mysql_fetch_assoc($data);
$totalRows_data = mysql_num_rows($data);
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
<a href="?page=add_guru">Tambah Guru</a>
<body>
<table border="1">
  <tr>
    <td>idguru</td>
    <td>nip</td>
    <td>nama_lengkap</td>
    <td>alamat</td>
    <td>email</td>
    <td>no_telp</td>
    <td>gambar</td>
    <td>tempat_lahir</td>
    <td>tanggal_lahir</td>
    <td>status</td>
    <td>thn_masuk</td>
    <td>pekerjaan</td>
    <td>aktif</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_data['idguru']; ?></td>
      <td><?php echo $row_data['nip']; ?></td>
      <td><?php echo $row_data['nama_lengkap']; ?></td>
      <td><?php echo $row_data['alamat']; ?></td>
      <td><?php echo $row_data['email']; ?></td>
      <td><?php echo $row_data['no_telp']; ?></td>
      <td><?php echo $row_data['gambar']; ?></td>
      <td><?php echo $row_data['tempat_lahir']; ?></td>
      <td><?php echo $row_data['tanggal_lahir']; ?></td>
      <td><?php echo $row_data['status']; ?></td>
      <td><?php echo $row_data['thn_masuk']; ?></td>
      <td><?php echo $row_data['pekerjaan']; ?></td>
      <td><?php echo $row_data['aktif']; ?></td>
    </tr>
    <?php } while ($row_data = mysql_fetch_assoc($data)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($data);
?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->