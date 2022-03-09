
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
<a href="?page=add_norekening" class="btn btn-flat btn-primary btn-sm">Tambah No Rekening</a> 
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Launch Default Modal
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
    <td>atas_nama</td>
    <td>alias</td>
    <td>norek</td>
    <td>nama_bank</td>
    <td>Aksi</td>
</tr>
    </thead>
    <tbody>
 <?php
 $tampil=mysqli_query($koneksi,"SELECT *FROM no_rekening,kd_bank WHERE no_rekening.bank=kd_bank.kode");
 $no=1;
 while($data=mysqli_fetch_assoc($tampil))
  { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $data['atas_nama']; ?></td>
      <td><?php echo $data['alias']; ?></td>
      <td><?php echo $data['norek']; ?></td>
      <td><?php echo $data['nama_bank']; ?></td>
      <td><a href="?page=edit_norekening&idrek=<?php echo $data['idrek']; ?>">Edit</a>||<a href="?page=hapus_norekening&idrek=<?php echo $data['idrek']; ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a>

       <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal<?php echo $data['idrek']; ?>">Pop Up</a></td>
    </tr>
  
                                        </td>
                                    </tr>

                                      <!-- untuk melihat bentuk-bentuk modal kalian bisa mengunjungi laman bootstrap dan cari modal di kotak pencariannya -->
                                            <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id_barang -->
                                            <div class="modal fade" id="modal<?php echo $data['idrek']; ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit No Rekening</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                        data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Atas Nama</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $data['atas_nama']; ?>">
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Alias</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $data['alias']; ?>">
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label for="exampleFormControlInput1">No Rekening</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $data['norek']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Nama Bank</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $data['nama_bank']; ?>">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               
    <?php //}  ?>


</table>
 </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
         </div>
            <!-- /.card -->
</body>
</html>







<!-- modal tambah rekening -->
 <form action="" method="post">
 <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah No rekninng</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
  <table align="center">
   
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Atas_nama:</td>
      <td><input type="text" name="atas_nama" class="form-control" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Alias:</td>
      <td><input type="text" name="alias" value="" class="form-control" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Norek:</td>
      <td><input type="text" name="norek" value="" class="form-control" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Bank:</td>
      <td><select name="bank" class="form-control select2bs4">
<?php
$tampil=mysqli_query($koneksi,"select *from kd_bank");
while($data=mysqli_fetch_assoc($tampil))
{ ?>
      <option value="<?php echo $data['kode']?>" ><?php echo $data['nama_bank']?></option>
        
<?php } ?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Created_at:</td>
      <td><input type="text" name="created_at" value="<?php echo date('Y-m-d H:i:s') ?>" readonly class="form-control" size="32" /></td>
    </tr>
   
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
if (isset($_POST['simpan'])) {
$atas_nama=$_POST['atas_nama'];
$alias=$_POST['alias'];
$norek=$_POST['norek'];
$bank=$_POST['bank'];
$created_at=$_POST['created_at'];
$simpan=mysqli_query($koneksi,"insert into no_rekening (atas_nama, alias, norek, bank, created_at) VALUES
                  ('atas_nama','$alias','$norek','$bank','$created_at')") or die (mysqli_error());
  //mysql_select_db($database_local, $local);
  //$Result1 = mysql_query($insertSQL, $local) or die(mysql_error());
  echo "<script>alert('Data Tersimpan');document.location='?page=norekening' </script>";
}

//mysql_select_db($database_local, $local);
//$query_bank = "SELECT * FROM kd_bank";

?>



