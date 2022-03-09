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
//$query_posts = "select *from ig_posts left join kategori on ig_posts.id_kategori=kategori.id_kategori";
$posts = mysqli_query($koneksi,"select *from ig_posts left join kategori on ig_posts.id_kategori=kategori.id_kategori");
$row_posts = mysqli_fetch_assoc($posts);
$totalRows_posts = mysqli_num_rows($posts);
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Artikel Sosial Media</h1>
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
<a href="?page=add_posts" class="btn btn-sm btn-success">Tambah Artikel </a>
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
    <td>judul</td>   
    <td>nama_kategori</td>
     <td>created_at</td>
    <td>Aksi</td>
  </tr>
    </thead>
    <tbody>
  <?php $no=1; do { ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $row_posts['judul']; ?></td>     
      <td><?php echo $row_posts['nama_kategori']; ?></td>
       <td><?php echo $row_posts['created_at']; ?></td>
      <td><a href="?page=edit_posts&id_post=<?php echo $row_posts['id_post']; ?>" class="btn-flat btn-warning btn-sm">Edit</a>|<a href="?page=hapus_post&id_post=<?php echo $row_posts['id_post']; ?>" class="btn-flat btn-danger btn-sm">Hapus</a> <a href="?page=tampil_posts&id_post=<?php echo $row_posts['id_post']; ?>" class="btn-flat btn-success btn-sm">View</a></td>
    </tr>
    <?php } while ($row_posts = mysqli_fetch_assoc($posts)); ?>
 </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
         </div>
            <!-- /.card -->
<?php
mysqli_free_result($posts);
?>

 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->