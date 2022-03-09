<?php //require_once('../Connections/local.php'); ?>
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
//$query_informasi = "SELECT * FROM informasi";
$informasi = mysqli_query($koneksi,"SELECT * FROM informasi");
$row_informasi = mysqli_fetch_assoc($informasi);
$totalRows_informasi = mysqli_num_rows($informasi);
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
<table border="1">
  <tr>
    <td>id_informasi</td>
    <td>penulis</td>
    <td>judul</td>
    <td>keteranagn</td>
    <td>tanggal</td>
    <td>new</td>
    <td>publish</td>
    <td>Aksi</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_informasi['id_informasi']; ?></td>
      <td><?php echo $row_informasi['penulis']; ?></td>
      <td><?php echo $row_informasi['judul']; ?></td>
      <td><?php echo $row_informasi['keteranagn']; ?></td>
      <td><?php echo $row_informasi['tanggal']; ?></td>
      <td><?php echo $row_informasi['new']; ?></td>
      <td><?php echo $row_informasi['publish']; ?></td>
      <td><a href="?page=edit_informasi&id=<?php echo $row_informasi['id_informasi']; ?>">Edit</a>|| <a href="?page=hapus_informasi&id=<?php echo $row_informasi['id_informasi']; ?>">Hapus</a></td>
    </tr>
    <?php } while ($row_informasi = mysqli_fetch_assoc($informasi)); ?>
</table>
</body>
</html>
<?php
mysqli_free_result($informasi);
?>

  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
