<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_local, $local);
$query_akses = "SELECT akses.`id`,level.`level`,menu.`name`,menu.`is_active`,menu.`link` FROM akses,menu,LEVEL WHERE akses.`menu`=menu.`id` AND akses.`id_level`=level.`id_level`  ORDER BY level.`level` DESC";
$akses = mysql_query($query_akses, $local) or die(mysql_error());
$row_akses = mysql_fetch_assoc($akses);
$totalRows_akses = mysql_num_rows($akses);
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
                <h3 class="card-title">Tambah Akses</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pilih Akses</label>						
                    <select name="level" class="form-control select2bs4">
					<?php 
					$level=mysql_query("select *from level");
					while($data=mysql_fetch_array($level))
					{
					echo "<option value=$data[id_level] > $data[level] </option>";
					} ?>
					</select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Menu</label>
                     <select name="menu" class="form-control select2bs4">
					<?php 
					$menu=mysql_query("select *from menu");
					while($data=mysql_fetch_array($menu))
					{
					echo "<option value=$data[id] > $data[name] </option>";
					} ?>
					</select>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Aktif</label>
                     <input type="radio" name="aktif" value="Y"> YA
					 <input type="radio" name="aktif" value="N"> Tidak
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="simpanakses" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
<?php
if(isset($_POST['simpanakses']))
{
	$simpan=mysql_query("insert into akses (id_level,menu,aktif) values('$_POST[level]','$_POST[menu]','$_POST[aktif]')");
	echo "<script>alert('data tersimpan') </script> ";
}
?>
            <!-- general form elements -->
      
            <!-- /.card -->

            <!-- Input addon -->
        
            <!-- /.card -->
            <!-- Horizontal Form -->
       
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Daftar Menu Akses</h3>
              </div>
             
			 
			 <table border="1">
  <tr>
    <td>id</td>
    <td>level</td>
    <td>name</td>
    <td>is_active</td>
    <td>link</td>
    <td>Aksi</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_akses['id']; ?></td>
      <td><?php echo $row_akses['level']; ?></td>
      <td><?php echo $row_akses['name']; ?></td>
      <td><?php echo $row_akses['is_active']; ?></td>
      <td><?php echo $row_akses['link']; ?></td>
      <td><a href="?page=edit_akses&id=<?php echo $row_akses['id']; ?>">Edit</a> || <a href="?page=hapus_akses&id=<?php echo $row_akses['id']; ?>">Hapus</a></td>
    </tr>
    <?php } while ($row_akses = mysql_fetch_assoc($akses)); ?>
</table>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
            <!-- /.card -->

            <!-- general form elements disabled -->
        
            <!-- /.card -->
            <!-- general form elements disabled -->
    
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
  <?php
mysql_free_result($akses);
?>
