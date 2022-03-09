<?php
//mysql_select_db($database_local, $local);
//$query_admin = "SELECT *FROM admin, LEVEL WHERE admin.id_level=level.id_level";
$admin = mysqli_query($koneksi,"SELECT *FROM admin, LEVEL WHERE admin.id_level=level.id_level");
$row_admin = mysqli_fetch_assoc($admin);
$totalRows_admin = mysqli_num_rows($admin);
?>

<?php
if(isset($_POST['simpan']))
{
  $username=$_POST['username'];
  $password=$_POST['password'];
  $nama_lengkap=$_POST['nama_lengkap'];
  $email=$_POST['email'];
  $no_telp=$_POST['no_telp'];
  $id_level=$_POST['id_level'];
  $blokir=$_POST['blokir'];

  $simpan=mysqli_query($koneksi,"insert into admin (username,password,nama_lengkap,email,no_telp,id_level,blokir) values
                      ('$username','$password','$nama_lengkap','$email','$no_telp','$id_level','$blokir')");
                      echo "<script>alert('data Terismpan'); document.location='?page=admin' </script>";
}
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Users</h1>
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
<button type="button" class="btn btn-flat btn-sm btn-success" data-toggle="modal" data-target="#modal-default">
                  Tambah Admin
                </button>
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
    <td>username</td>
    <td>nama_lengkap</td>
    <td>blokir</td>
    <td>gambar</td>
    <td>level</td>
    <td>Aksi</td>
  </tr>
  <?php $no=1; do { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row_admin['username']; ?></td>
      <td><?php echo $row_admin['nama_lengkap']; ?></td>
      <td><?php echo $row_admin['blokir']; ?></td>
      <td><?php echo $row_admin['gambar']; ?></td>
      <td><?php echo $row_admin['level']; ?></td>
      <td><a href="?page=edit_admin&id=<?php echo $row_admin['id_admin']; ?>" class="btn-flat btn-sm btn-warning btn">Edit</a><a href="?page=hapus_admin&id=<?php echo $row_admin['id_admin']; ?>" class="btn btn-sm btn-flat btn-danger">Hapus</a></td>
    </tr>
    <?php } while ($row_admin = mysqli_fetch_assoc($admin)); ?>
</table>
</body>
</html>
<?php
mysqli_free_result($admin);
?>

 <!-- modal tambah rekening -->
 <form action="" method="post">
 <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah User Baru</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            <div class="modal-body">
            <div class="row">
                <div class="col-6">
                   <label for="exampleInputPassword1">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Kode karyawan">
                  </div>
                  <div class="col-6">
                   <label for="exampleInputPassword1">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Masukan NIK">
                  </div>
            </div>
            
            <div class="row">
                <div class="col-6">
                   <label for="exampleInputPassword1">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Kode karyawan">
                  </div>
                  <div class="col-6">
                   <label for="exampleInputPassword1">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Masukan NIK">
                  </div>
            </div>

            <div class="row">
                <div class="col-6">
                   <label for="exampleInputPassword1">No Telp</label>
                    <input type="text" name="no_telp" class="form-control" placeholder="Kode karyawan">
                  </div>
                  <div class="col-6">
                   <label for="exampleInputPassword1">Blokir</label>
                    <input type="text" name="blokir" class="form-control" placeholder="Masukan NIK">
                  </div>
            </div>

            <div class="row">
                <div class="col-6">
                   <label for="exampleInputPassword1">Gambar</label>
                    <input type="file" name="gambar" class="form-control" placeholder="Kode karyawan">
                  </div>
                  <div class="col-6">
                   <label for="exampleInputPassword1">Level</label>
                   <select name="id_level" class="form-control select2bs4">
<?php
$tampil=mysqli_query($koneksi,"select *from level");
while($data=mysqli_fetch_assoc($tampil))
{ ?>
      <option value="<?php echo $data['id_level']?>" ><?php echo $data['level']?></option>
        
<?php } ?>
      </select>
                  </div>
            </div>
                      </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn-sm btn-default btn-flat" data-dismiss="modal">Close</button>
              <input type="submit" name="simpan" value="Simpan Data" class="btn-sm btn-flat btn-primary"></button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
</form>
      <!-- akhir modal rekening -->



      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


 