<?php
$sliming = mysqli_query($koneksi,"SELECT *FROM gform_slimming LEFT JOIN gerai ON gerai.kode_gerai=gform_slimming.gerai");
$row_sliming = mysqli_fetch_assoc($sliming);
$totalRows_sliming = mysqli_num_rows($sliming);
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pendaftaran Slimming</h1>
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
<a href="?page=add_gform_slimming" class="btn-flat btn btn-sm btn-success">Tambah</a>
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
    <td>whatsapp</td>
    <td>aksi</td>
    </tr>
    </thead>
    <tbody>
  <?php $no=1;do { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row_sliming['nama']; ?></td>
      <td><?php echo $row_sliming['no_hp']; ?></td>
      <td><?php echo $row_sliming['whatsapp']; ?></td>
      <td><a href="?page=hapus_gform_slimming&idgform=<?php echo $row_sliming['idgform']; ?>">Hapus</a> | <a href="?page=sendwa_slimming&idgform=<?php echo $row_sliming['idgform']; ?>">Kirim WA</a></td>
    </tr>
    <?php } while ($row_sliming = mysqli_fetch_assoc($sliming)); ?>
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
mysqli_free_result($sliming);
?>


 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->