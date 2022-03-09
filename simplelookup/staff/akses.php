<?php

//mysql_select_db($database_local, $local);
//$query_akses = "SELECT akses.`id`,level.`level`,menu.`name`,menu.`is_active`,menu.`link` FROM akses,menu,LEVEL WHERE akses.`menu`=menu.`id` AND akses.`id_level`=level.`id_level` order by level.level desc;";
$akses = mysqli_query($koneksi,"SELECT akses.`id`,level.`level`,menu.`name`,menu.`is_active`,menu.`link` FROM akses,menu,LEVEL WHERE akses.`menu`=menu.`id` AND akses.`id_level`=level.`id_level` order by level.level desc");
$row_akses = mysqli_fetch_assoc($akses);
$totalRows_akses = mysqli_num_rows($akses);
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
<a href="?page=group" class="btn-flat btn-sm btn btn-success">Tambah Akses</a>
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
    <td>Nama Level</td>
    <td>Nama Menu</td>
    <td>Aktif</td>
    <td>Link</td>
    <td>Aksi</td>
    </tr>
    </thead>
    <tbody>
               
  <?php $no=1; do { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row_akses['level']; ?></td>
      <td><?php echo $row_akses['name']; ?></td>
      <td><?php echo $row_akses['is_active']; ?></td>
      <td><?php echo $row_akses['link']; ?></td>
      <td><a href="?page=edit_akses&id=<?php echo $row_akses['id']; ?>"></a> <a href="?page=hapus_akses&id=<?php echo $row_akses['id']; ?>" class="btn-flat btn btn-sm btn-danger">Hapus</a></td>
    </tr>
    <?php } while ($row_akses = mysqli_fetch_assoc($akses)); ?>
</table>
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
mysqli_free_result($akses);
?>

 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  