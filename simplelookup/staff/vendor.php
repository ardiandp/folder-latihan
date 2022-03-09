<?php
$vdr = mysqli_query($koneksi,"SELECT *FROM jg_vendor, kd_bank WHERE jg_vendor.`kode_bank`=kd_bank.`kode` ORDER BY jg_vendor.`idvendor` DESC");
$row_vdr = mysqli_fetch_assoc($vdr);
$totalRows_vdr = mysqli_num_rows($vdr);
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
<a href="?page=add_vendor" class="btn btn-primary btn-flat btn-sm">Tambah Vendor </a>
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
    <td>nama_vendor</td>
    <td>nama_cp</td>
    <td>handphone</td>
    <td>norekening</td>
    <td>aktif</td>
    <td>nama_bank</td>
    <td>Aksi</td>
  </tr>
    </thead>
    <tbody>
  <?php $no=1; do { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row_vdr['nama_vendor']; ?></td>
      <td><?php echo $row_vdr['nama_cp']; ?></td>
      <td><?php echo $row_vdr['handphone']; ?></td>
      <td><?php echo $row_vdr['norekening']; ?></td>
      <td><?php echo $row_vdr['aktif']; ?></td>
      <td><?php echo $row_vdr['nama_bank']; ?></td>
      <td><a href="?page=edit_vendor1&idvendor=<?php echo $row_vdr['idvendor']; ?>" class="btn btn-sm btn-flat btn-warning">Edit</a><a href="?page=hapus_vendor&idvendor=<?php echo $row_vdr['idvendor']; ?>" class="btn btn-sm btn-flat btn-danger">Hapus</a></td>
    </tr>
    <?php } while ($row_vdr = mysqli_fetch_assoc($vdr)); ?>
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
mysqli_free_result($vdr);
?>
 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --