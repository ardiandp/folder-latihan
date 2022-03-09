<?php
$bon = mysqli_query($koneksi,"select *from bon");
$row_bon = mysqli_fetch_assoc($bon);
$totalRows_bon = mysqli_num_rows($bon);
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
<a href="?page=add_bon" class="btn btn-sm btn-primary btn-flat">Tambah Bon</a>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
    <td>idbon</td>
    <td>kategori</td>
    <td>penerima</td>
    <td>biaya</td>
    <td>file</td>
    <td>tanggal</td>
    <td>Aksi</td>
    </tr>
    </thead>
    <tbody>
  <?php $no=1; do { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row_bon['kategori']; ?></td>
      <td><?php echo $row_bon['penerima']; ?></td>
      <td><?php echo $row_bon['biaya']; ?></td>
      <td><img src="../storage/img_bon/<?php echo $row_bon['file']; ?> " class="img-fluid img-thumbnail" width="70" height="70"></td>
      <td><?php echo $row_bon['tanggal']; ?></td>
      <td><a href="?page=edit_bon&idbon=<?php echo $row_bon['idbon']; ?>" class="btn-flat btn-warning btn-sm">Edit</a>|<a href="?page=hapus_bon&idbon=<?php echo $row_bon['idbon']; ?>" class="btn-flat btn-danger btn-sm">Hapus</a></td>
    </tr>
    <?php } while ($row_bon = mysqli_fetch_assoc($bon)); ?>
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
mysqli_free_result($bon);
?>



 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->