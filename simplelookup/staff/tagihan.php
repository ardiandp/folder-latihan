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
//$query_tagihan = "SELECT * FROM daftar_tagihan";
$tagihan = mysqli_query($koneksi,"SELECT * FROM daftar_tagihan");
$row_tagihan = mysqli_fetch_assoc($tagihan);
$totalRows_tagihan = mysqli_num_rows($tagihan);
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

<body>
<a href="?page=add_tagihan">Tambah Tagihan </a>
 <!-- /.card-header -->
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
    <td>idtagihan</td>
    <td>no_tagihan</td>
    <td>keterangan</td>
    <td>aktif</td>
    <td>Aksi</td>
  </tr>
    </thead>
    <tbody>
  <?php do { ?>
    <tr>
      <td><?php echo $row_tagihan['idtagihan']; ?></td>
      <td><?php echo $row_tagihan['no_tagihan']; ?></td>
      <td><?php echo $row_tagihan['keterangan']; ?></td>
      <td><?php echo $row_tagihan['aktif']; ?></td>
      <td><a href="?page=edit_tagihan&idtagihan=<?php echo $row_tagihan['idtagihan']; ?>">Edit</a>||<a href="?page=hapus_tagihan&idtagihan=<?php echo $row_tagihan['idtagihan']; ?>">Hapus</a></td>
    </tr>
    <?php } while ($row_tagihan = mysqli_fetch_assoc($tagihan)); ?>
</table>
 </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
			   </div>
            <!-- /.card -->
<?php
mysqli_free_result($tagihan);
?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->