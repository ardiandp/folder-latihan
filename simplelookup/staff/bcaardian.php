<?php
//mysql_select_db($database_local, $local);
//$query_bcacv = "SELECT * FROM bca_cv";
$bcacv = mysqli_query($koneksi,"SELECT * FROM bca_ardian");
$row_bcacv = mysqli_fetch_assoc($bcacv);
$totalRows_bcacv = mysqli_num_rows($bcacv);
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
    <td>tanggal</td>
    <td>keterangan</td>
    <td>jumlah</td>
    <td>status</td>
    </tr>
    </thead>
    <tbody>
  <?php $no=1; do { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row_bcacv['tanggal']; ?></td>
      <td><?php echo $row_bcacv['keterangan']; ?></td>
      <td><?php echo $row_bcacv['jumlah']; ?></td>
      <td><?php echo $row_bcacv['status']; ?></td>
      </tr>
    <?php } while ($row_bcacv = mysqli_fetch_assoc($bcacv)); ?>
</table>
 </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
</div>
            <!-- /.card -->
<?php
mysqli_free_result($bcacv);
?>
