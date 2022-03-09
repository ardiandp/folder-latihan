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
//$query_bpjsmandiri = "SELECT * FROM bpjs_mandiri";
$bpjsmandiri = mysqli_query($koneksi,"SELECT * FROM bpjs_mandiri");
$row_bpjsmandiri = mysqli_fetch_assoc($bpjsmandiri);
$totalRows_bpjsmandiri = mysqli_num_rows($bpjsmandiri);
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
      
<a href="?page=add_bpjsmandiri">Tambah BPJS Mandiri</a>
<body>
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
    <td>No</td>
    <td>nik</td>
    <td>no_akun</td>
    <td>nama</td>   
    <td>hub_keluarga</td>
    <td>aktif</td>
    <td>kelas</td>
    <td>Aksi</td>
  </thead>
    <tbody>
              
  <?php 
  $no=1; do { ?>
    <tr>
      <td><?php echo $no ?></td>
      <td><?php echo $row_bpjsmandiri['nik']; ?></td>
      <td><?php echo $row_bpjsmandiri['no_akun']; ?></td>
      <td><?php echo $row_bpjsmandiri['nama']; ?></td>
      
      <td><?php echo $row_bpjsmandiri['hub_keluarga']; ?></td>
      <td><?php echo $row_bpjsmandiri['aktif']; ?></td>
      <td><?php echo $row_bpjsmandiri['kelas']; ?></td>
      <td><a href="?page=hapus_bpjsmandiri&idbpjs=<?php echo $row_bpjsmandiri['idbpjs']; ?>">Hapus</a> || <a href="?page=edit_bpjsmandiri&idbpjs=<?php echo $row_bpjsmandiri['idbpjs']; ?>">Edit</a></td>
    </tr>
    <?php $no++; } while ($row_bpjsmandiri = mysqli_fetch_assoc($bpjsmandiri)); ?>
</table>
 </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
         </div>
            <!-- /.card -->
</body>
</html>
<?php
mysqli_free_result($bpjsmandiri);
?>
