<?php
$bpjsbu = mysqli_query($koneksi,"SELECT * FROM bpjs_bu");
$row_bpjsbu = mysqli_fetch_assoc($bpjsbu);
$totalRows_bpjsbu = mysqli_num_rows($bpjsbu);
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

 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  Tambah Akun
                </button>
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
    <td>aktif</td>
    <td>karyawan</td>
    <td>kelas</td>
    <td>Aksi</td>
    </tr>
    </thead>
    <tbody>
  <?php $no=1; do { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row_bpjsbu['nik']; ?></td>
      <td><?php echo $row_bpjsbu['no_akun']; ?></td>
      <td><?php echo $row_bpjsbu['nama']; ?></td>
      <td><?php echo $row_bpjsbu['aktif']; ?></td>
      <td><?php echo $row_bpjsbu['karyawan']; ?></td>
      <td><?php echo $row_bpjsbu['kelas']; ?></td>
      <td><a href="?page=edit_bpjsbu&idbpjs=<?php echo $row_bpjsbu['idbpjs']; ?>">Edit</a>||<a href="?page=hapus_bpjsbu&idbpjs=<?php echo $row_bpjsbu['idbpjs']; ?>">hapus</a></td>
    </tr>
    <?php } while ($row_bpjsbu = mysqli_fetch_assoc($bpjsbu)); ?>
    </table>
 </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
         </div>
            <!-- /.card -->
<?php mysqli_free_result($bpjsbu); ?>
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->