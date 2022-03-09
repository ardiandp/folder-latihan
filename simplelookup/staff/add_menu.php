<?php

if (isset($_POST['simpan'])) {

  $name=$_POST['name'];
  $link=$_POST['link'];
  $icon=$_POST['icon'];
  $is_active=$_POST['is_active'];
  $is_parent=$_POST['is_parent'];

  $simpan=mysqli_query($koneksi,"insert into menu (name, link, icon, is_active, is_parent) VALUES
                  ('$name','$link','$icon','$is_active','$is_parent') ");
  echo "<script>alert('Data Berhasil Disimpan');document.location='?page=menu' </script> ";
}

//mysql_select_db($database_local, $local);
//$query_menu = "SELECT * FROM menu";
$menu = mysqli_query($koneksi,"SELECT * FROM menu");
$row_menu = mysqli_fetch_assoc($menu);
$totalRows_menu = mysqli_num_rows($menu);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
			  

<body>
<form action="" method="post" >
  <div class="card-body">
   
    <div class="form-group">
    <label for="exampleInputEmail1">Nama Menu</label>
      <td><input type="text" name="name" class="form-control" value="" size="32" /></td>
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Link</label>
      <td><input type="text" name="link" value="" class="form-control" size="32" /></td>
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Icon</label>
      <td><input type="text" name="icon" value="" class="form-control" size="32" /></td>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Aktif</label>
        <tr>
          <td><input type="radio" name="is_active" value="Y" />
            Ya</td>
        </tr>
        <tr>
          <td><input type="radio" name="is_active" value="N" />
            Tidak</td>
        </tr>
      </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Parent</label>
      <td><select name="is_parent" class="form-control select2bs4">
      <option value="0"> Menu Utama</option>
        <?php 
do {  
?>
        <option value="<?php echo $row_menu['id']?>" ><?php echo $row_menu['name']?></option>
        <?php
} while ($row_menu = mysqli_fetch_assoc($menu));
?>
      </select></td>
    </div>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Simpan Menu" name="simpan" class="btn-flat btn-success btn-sm" /></td>
    </tr>
 
  
</form>
</div>
                <!-- /.card-body -->
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($menu);
?>


 </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
	  </div>
  <!-- /.content-wrapper -->