<?php
$pembeli = mysqli_query($koneksi,"SELECT * FROM inv_pembeli order by idpembeli desc");
$row_akun = mysqli_fetch_assoc($pembeli);
$totalRows_akun = mysqli_num_rows($pembeli);
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
                  Tambah Customer / Pembeli
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
    <td>Nama Pembeli</td>
    <td>Telp</td>
    <td>Alamat</td>
    <td>Aksi</td>
 </tr>
    </thead>
    <tbody>
  <?php $no=1; do { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row_akun['nama_pembeli']; ?></td>
      <td><?php echo $row_akun['telp']; ?></td>
      <td><?php echo $row_akun['alamat']; ?></td>
      <td> <a href="" class="btn btn-sm btn-info btn-flat" data-toggle="modal"
                                                data-target="#modal<?php echo $row_akun['idpembeli']; ?>">Edit</a> <a href="?page=hapus_inv_pembeli&idpembeli=<?php echo $row_akun['idpembeli']; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger btn-flat">hapus</a>  
        <!-- untuk melihat bentuk-bentuk modal kalian bisa mengunjungi laman bootstrap dan cari modal di kotak pencariannya -->
                                            <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id_barang -->
                                            <div class="modal fade" id="modal<?php echo $row_akun['idpembeli']; ?>" tabindex="-1"
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
                                                                        value="<?php echo $row_akun['idpembeli']; ?>" name="idpembeli">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Nama Pembeli</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $row_akun['nama_pembeli']; ?>" name="nama_pembeli">
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label for="exampleFormControlInput1">No Telp</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $row_akun['telp']; ?>" name="telp">
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Alamat</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $row_akun['alamat']; ?>" name="alamat">
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
    <?php } while ($row_akun = mysqli_fetch_assoc($pembeli)); ?>
</table>
 </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
         </div>
            <!-- /.card -->
<?php
mysqli_free_result($pembeli);
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
              <h4 class="modal-title">Tambah Customer </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            <div class="modal-body">
  <div class="form-group">
      <label for="exampleFormControlInput1">Nama Lengkap</label>
      <td><input type="text" required name="nama_pembeli" class="form-control" value="" size="32" /></td>
  </div>
  <div class="form-group">
      <label for="exampleFormControlInput1">No telp</label>
      <td><input type="text" required name="telp" value="" class="form-control" size="32" /></td>
  </div>
  <div class="form-group">
      <label for="exampleFormControlInput1">Alamat</label>
      <td><textarea name="alamat" class="form-control"> </textarea></td>
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
    $nama_pembeli=$_POST['nama_pembeli'];
    $telp=$_POST['telp'];
    $alamat=$_POST['alamat'];
    $idpembeli=$_POST['idpembeli'];
  
    $simpan=mysqli_query($koneksi,"update inv_pembeli set nama_pembeli='$nama_pembeli',telp='$telp',alamat='$alamat' where idpembeli='$idpembeli' ");
    if($simpan)
    {
      echo "<script>alert('Data Terupdate'); document.location='?page=inv_pembeli' </script>";
    }
    else{
      echo "gagal proses data ";
    }
  }

  elseif (isset($_POST['simpan']))
  {
    $nama_pembeli=$_POST['nama_pembeli'];
    $telp=$_POST['telp'];
    $alamat=$_POST['alamat'];
    
  
    $simpan=mysqli_query($koneksi,"insert into inv_pembeli (nama_pembeli,telp,alamat) values
                ('$nama_pembeli','$telp','$alamat')");
    if($simpan)
    {
      echo "<script>alert('Data tersimpan'); document.location='?page=inv_pembeli' </script>";
    }
    else{
      echo error_reporting();
    }
  }
  ?>