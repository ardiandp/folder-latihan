<?php
$spahamil = mysqli_query($koneksi,"SELECT * FROM gform_spahamil");
$row_spahamil = mysqli_fetch_assoc($spahamil);
$totalRows_spahamil = mysqli_num_rows($spahamil);
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Spa Hamil</h1>
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
<a href="?page=add_gform_spahamil" class="btn-sm btn btn-success btn-flat"> Tambah</a>
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
    <td>telp</td>
    <td>Aksi</td>
  </tr>
  </thead>
    <tbody>
  <?php $no=1; do { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row_spahamil['nama']; ?></td>
      <td><?php echo $row_spahamil['telp']; ?></td>
      <td><a href="?page=sendwa_spahamil&idgform=<?php echo $row_spahamil['idgform']; ?>" class="btn-success btn-flat btn-sm"> Send Wa</a><a href="?page=hapus_gform_spahamil&idgform=<?php echo $row_spahamil['idgform']; ?>" class="btn-danger btn-flat btn-sm"> Hapus</a></td>
    </tr>
    <?php } while ($row_spahamil = mysqli_fetch_assoc($spahamil)); ?>
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
mysqli_free_result($spahamil);
?>



 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->