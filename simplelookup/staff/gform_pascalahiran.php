<?php
$gform=mysqli_query($koneksi,"select *from gform_pascalahiran order by idgform desc");
$row_gform = mysqli_fetch_assoc($gform);
$totalRows_gform = mysqli_num_rows($gform);
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
<a href="?page=add_gform_pascalahiran" class="btn-flat btn-success btn">Tambah</a>
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
    <td>nama</td>
    <td>no_hp</td>
    <td>alamat</td>
    <td>aksi</td>
    </tr>
    </thead>
    <tbody>
  <?php $no=1; do { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row_gform['nama']; ?></td>
      <td><?php echo $row_gform['no_hp']; ?></td>
      <td><?php echo $row_gform['alamat']; ?></td>
      <td><a href="?page=edit_gform_pascalahiran&idgform=<?php echo $row_gform['idgform']; ?>" class="btn-flat btn btn-sm btn-warning">edit</a> <a href="?page=hapus_gform_pascalahian&idgform=<?php echo $row_gform['idgform']; ?>" class="btn btn-sm btn-flat btn-danger">hapus</a> <a href="?page=sendwa&idgform=<?php echo $row_gform['idgform']; ?>" class="btn-flat btn-sm btn-secondary">Kirim Ke Wa</a></td>
    </tr>
    <?php } while ($row_gform = mysqli_fetch_assoc($gform)); ?>
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
mysqli_free_result($gform);
?>
 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->