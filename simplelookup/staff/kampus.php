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
$query_kampus = "SELECT * FROM kampus";
$kampus = mysql_query($query_kampus, $local) or die(mysql_error());
$row_kampus = mysql_fetch_assoc($kampus);
$totalRows_kampus = mysql_num_rows($kampus);
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
<a href="?page=add_kampus">Tambah Kampus</a>
<body>
<table border="1">
  <tr>
    <td>idkampus</td>
    <td>kode</td>
    <td>namakampus</td>
    <td>telp</td>
    <td>alamat</td>
    <td>kk</td>
    <td>Aksi</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_kampus['idkampus']; ?></td>
      <td><?php echo $row_kampus['kode']; ?></td>
      <td><?php echo $row_kampus['namakampus']; ?></td>
      <td><?php echo $row_kampus['telp']; ?></td>
      <td><?php echo $row_kampus['alamat']; ?></td>
      <td><?php echo $row_kampus['kk']; ?></td>
      <td><a href="?page=edit_kampus&id=<?php echo $row_kampus['idkampus']; ?>">Edit</a>|| <a href="?page=hapus_kampus&id=<?php echo $row_kampus['idkampus']; ?>">Hapus</a></td>
    </tr>
    <?php } while ($row_kampus = mysql_fetch_assoc($kampus)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($kampus);
?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->