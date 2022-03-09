<?php
$data = mysqli_query($koneksi,"select *from menu");
$row_data = mysqli_fetch_assoc($data);
$totalRows_data = mysqli_num_rows($data);

if(isset($_POST['update']))
{
  echo "<script>alert('update data') </script>";
}
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Menu</h1>
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
	
	
<a href="?page=add_menu" class="btn btn-flat btn-sm btn-success">Tambah Menu </a>
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
    <th>No</th>
    <th>name</th>
    <th>link</th>
    <th>icon</th>	
    <th>is_active</th>
    <th>is_parent</th>
    <th>aksi</th>
   </tr>
    </thead>
    <tbody>
                  
  <?php $no=1;do { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row_data['name']; ?></td>
      <td><?php echo $row_data['link']; ?></td>
      <td><?php echo $row_data['icon']; ?></td>
      <td><?php echo $row_data['is_active']; ?></td>
      <td><?php echo $row_data['is_parent']; ?></td>
      <td><a href="?page=edit_menu&id=<?php echo $row_data['id']; ?>" class="btn btn-sm btn-flat btn-warning">Edit</a><a href="?page=hapus_menu&id=<?php echo $row_data['id']; ?>" class="btn btn-sm btn-flat btn-danger">Hapus</a>  
      <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal<?php echo $row_data['id']; ?>">Pop Up</a>  
    </td>
    </tr>

    <!-- untuk melihat bentuk-bentuk modal kalian bisa mengunjungi laman bootstrap dan cari modal di kotak pencariannya -->
                                            <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id_barang -->
                                            <div class="modal fade" id="modal<?php echo $row_data['id']; ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                        data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                                                        <div class="modal-body">
                                                            <form method="post" action="">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Nama Menu</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $row_data['name']; ?>">
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Link</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $row_data['link']; ?>">
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Icon Menu</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $row_data['icon']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Aktif</label>
                                                                    <input type="radio" name="is_active" value="Y" <?php if (!(strcmp(htmlentities($row_data['is_active'], ENT_COMPAT, 'utf-8'),"Y"))) {echo "checked=\"checked\"";} ?> />
            Ya
            <input type="radio" name="is_active" value="N" <?php if (!(strcmp(htmlentities($row_data['is_active'], ENT_COMPAT, 'utf-8'),"N"))) {echo "checked=\"checked\"";} ?> />
            Tidak
          
        
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Menu Utama</label>
                                                                    <select name="is_parent" class="form-control select2bs4">
      <option value="0"> Menu Utama</option>
      <?php
      $menu = mysqli_query($koneksi,"select *from menu");
      while($mn=mysqli_fetch_array($menu))
      { ?>
      <option value="<?php echo $mn['id'] ?>"> <?php echo $mn['name'] ?></option>
      <?php } ?>
      </select>
                                                                </div>
                                                           
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="update" class="btn btn-sm btn-flat btn-warning">Update Menu</button>
                                                        </div> </form>
                                                    </div>
                                                </div>
                                            </div>


    <?php } while ($row_data = mysqli_fetch_assoc($data)); ?>
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
mysqli_free_result($menu);

?>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  