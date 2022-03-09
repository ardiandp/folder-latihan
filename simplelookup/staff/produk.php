<?php
//mysql_select_db($database_local, $local);
//$query_produk = "SELECT *FROM produk left join kategori on produk.kategori=kategori.id_kategori";
$produk = mysqli_query($koneksi,"SELECT *FROM produk left join kategori on produk.kategori=kategori.id_kategori");
$row_produk = mysqli_fetch_assoc($produk);
$totalRows_produk = mysqli_num_rows($produk);
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Produk</h1>
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
    <a href="?page=add_produk" class="btn btn-flat btn-primary btn-sm">Tambah produk</a>
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
    <td>nama_produk</td>
    <td>berat</td>
    <td>harga</td>
    <td>nama_kategori</td>
    <td>Aksi</td>
   </tr>
    </thead>
    <tbody>
  <?php $no=1; do { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row_produk['nama_produk']; ?></td>
      <td><?php echo $row_produk['berat']; ?></td>
      <td><?php echo $row_produk['harga']; ?></td>
      <td><?php echo $row_produk['nama_kategori']; ?></td>
      <td><a href="?page=edit_produk&id_produk=<?php echo $row_produk['id_produk']; ?>" class="btn-sm btn btn-flat btn-warning">Edit</a> <a href="?page=hapus_produk&id_produk=<?php echo $row_produk['id_produk']; ?>" class="btn btn-sm btn-flat btn-danger">Hapus</a></td>
    </tr>
    <?php } while ($row_produk = mysqli_fetch_assoc($produk)); ?>
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
mysqli_free_result($produk);
?>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
