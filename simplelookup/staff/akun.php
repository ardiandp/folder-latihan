<?php
$akun = mysqli_query($koneksi,"SELECT * FROM akun");
$row_akun = mysqli_fetch_assoc($akun);
$totalRows_akun = mysqli_num_rows($akun);
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

 <button type="button" class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#modal-default">
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
    <td>username</td>
    <td>password</td>
    <td>Nama Sosmed</td>
    <td>Aksi</td>
 </tr>
    </thead>
    <tbody>
  <?php $no=1; do { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row_akun['username']; ?></td>
      <td><?php echo $row_akun['password']; ?></td>
      <td><?php echo $row_akun['title']; ?></td>
      <td> <a href="" class="btn btn-sm btn-info btn-flat" data-toggle="modal"
                                                data-target="#modal<?php echo $row_akun['idakun']; ?>">Edit</a> <a href="?page=hapus_akun&idakun=<?php echo $row_akun['idakun']; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger btn-flat">hapus</a>  
        <!-- untuk melihat bentuk-bentuk modal kalian bisa mengunjungi laman bootstrap dan cari modal di kotak pencariannya -->
                                            <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id_barang -->
                                            <div class="modal fade" id="modal<?php echo $row_akun['idakun']; ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                        data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                                                        <div class="modal-body">
                                                            <form method="post" action="">
                                                            <input type="hidden" class="form-control"
                                                                        value="<?php echo $row_akun['idakun']; ?>" name="idakun">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Username</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $row_akun['username']; ?>" name="username">
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Password</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $row_akun['password']; ?>" name="password">
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label for="exampleFormControlInput1">URL</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $row_akun['url']; ?>" name="url">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Tittle</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $row_akun['title']; ?>" name="title">
                                                                </div>
                                                           
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div></form>
                                            </div>
    
    
    </td>
    </tr>
    <?php } while ($row_akun = mysqli_fetch_assoc($akun)); ?>
</table>
 </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
         </div>
            <!-- /.card -->
<?php
mysqli_free_result($akun);
?>

 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- modal tambah rekening -->
 <form action="" method="post">
 <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Akun</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            <div class="modal-body">
  <div class="form-group">
      <label for="exampleFormControlInput1">Username</label>
      <td><input type="text" required name="username" class="form-control" value="" size="32" /></td>
  </div>
  <div class="form-group">
      <label for="exampleFormControlInput1">Password</label>
      <td><input type="text" required name="password" value="" class="form-control" size="32" /></td>
  </div>
  <div class="form-group">
      <label for="exampleFormControlInput1">URL</label>
      <td><input type="text" required name="url" value="" class="form-control" size="32" /></td>
  </div>
  <div class="form-group">
      <label for="exampleFormControlInput1">Title</label>
      <td><input type="text" required name="title" value="" class="form-control" size="32" /></td>
  </div>
    <tr> </tr>
    <tr valign="baseline">   
  </table>
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


  <?php
  if(isset($_POST['update']))
  {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $url=$_POST['url'];
    $title=$_POST['title'];
    $idakun=$_POST['idakun'];
  
    $simpan=mysqli_query($koneksi,"update akun set username='$username',password='$password',url='$url',title='$title' where idakun='$idakun' ");
    if($simpan)
    {
      echo "<script>alert('Data tersimpan'); document.location='?page=akun' </script>";
    }
    else{
      echo "gagal proses data ";
    }
  }

  elseif (isset($_POST['simpan']))
  {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $url=$_POST['url'];
    $title=$_POST['title'];
  
    $simpan=mysqli_query($koneksi,"insert into akun (username,password,url,title) values
                ('$username','$password','$url','$title')");
    if($simpan)
    {
      echo "<script>alert('Data tersimpan'); document.location='?page=akun' </script>";
    }
    else{
      echo error_reporting();
    }
  }
  ?>