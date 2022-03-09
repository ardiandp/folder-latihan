<?php
//mysql_select_db($database_local, $local);
//$query_kry = "SELECT *FROM karyawan,bagian WHERE karyawan.`bagian`=bagian.`kode_bagian`";
$kry = mysqli_query($koneksi,"SELECT *FROM karyawan,bagian WHERE karyawan.`bagian`=bagian.`kode_bagian`");
$row_kry = mysqli_fetch_assoc($kry);
$totalRows_kry = mysqli_num_rows($kry);
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
<a href="?page=add_karyawan" class="btn btn-sm btn-flat btn-success">Tambah karyawan</a>
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
    <td>kode_kry</td>
    <td>nik</td>
    <td>nama_lengkap</td>
    <td>no_hp</td>
    <td>aktif</td>
    <td>nama_bagian</td>
    <td>Aksi</td>
  </tr>
    </thead>
    <tbody>
  <?php $no=1; do { ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $row_kry['kode_kry']; ?></td>
      <td><?php echo $row_kry['nik']; ?></td>
      <td><?php echo $row_kry['nama_lengkap']; ?></td>
      <td><?php echo $row_kry['no_hp']; ?></td>
      <td><?php echo $row_kry['aktif']; ?></td>
      <td><?php echo $row_kry['nama_bagian']; ?></td>
      <td><a href="?page=edit_karyawan&kode_kry=<?php echo $row_kry['kode_kry']; ?>" class="btn btn-flat btn-sm btn-danger">[Edit]</a> <a href="?page=hapus_karyawan&kode_kry=<?php echo $row_kry['kode_kry']; ?>" class="btn btn-flat btn-sm btn-warning" onclick="return confirm('Anda yakin mau menghapus item ini ?')">[Hapus]</a></td>
    </tr>
    <?php } while ($row_kry = mysqli_fetch_assoc($kry)); ?>
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
mysqli_free_result($kry);
?>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->