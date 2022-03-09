<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO `admin` (id_admin, username, password, nama_lengkap, email, no_telp, id_level, blokir, gambar) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_admin'], "int"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['nama_lengkap'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['no_telp'], "text"),
                       GetSQLValueString($_POST['id_level'], "text"),
                       GetSQLValueString($_POST['blokir'], "text"),
                       GetSQLValueString($_POST['gambar'], "text"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($insertSQL, $local) or die(mysql_error());
}

//mysql_select_db($database_local, $local);
//$query_level = "SELECT * FROM `level`";
$level = mysqli_query($koneksi,"select *from level");
$row_level = mysqli_fetch_assoc($level);
$totalRows_level = mysqli_num_rows($level);
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
   <label for="exampleInputEmail1">Username</label>
     <td><input type="text" name="username" class="form-control" value="" size="32" /></td>
   </div>

   <div class="form-group">
   <label for="exampleInputEmail1">Password</label>
     <td><input type="text" name="password" class="form-control" value="" size="32" /></td>
   </div>

   <div class="form-group">
   <label for="exampleInputEmail1">Nama Lengkap</label>
     <td><input type="text" name="nama_lengkap" class="form-control" value="" size="32" /></td>
   </div>
   
   <div class="form-group">
   <label for="exampleInputEmail1">Email</label>
     <td><input type="text" name="email" class="form-control" value="" size="32" /></td>
   </div>
    
   <div class="form-group">
   <label for="exampleInputEmail1">NO Telp</label>
     <td><input type="text" name="no_telp" class="form-control" value="" size="32" /></td>
   </div>

   <div class="form-group">
   <label for="exampleInputEmail1">Level</label>
   <select name="id_level" class="form-control select2bs4">
        <?php 
do {  
?>
        <option value="<?php echo $row_level['id_level']?>" ><?php echo $row_level['level']?></option>
        <?php
} while ($row_level = mysqli_fetch_assoc($level));
?>
      </select>
   </div>

   <div class="form-group">
   <label for="exampleInputEmail1">Blokir</label>
   <tr>
          <td><input type="radio" name="blokir" value="Y" />
            YA</td>
        </tr>
        <tr>
          <td><input type="radio" name="blokir" value="N" />
            Tidak</td>
        </tr>
   </div>
      
   <div class="form-group">
   <label for="exampleInputEmail1">Gambar</label>
     <td><input type="file" name="gambar" value="" class="form-control" size="32" /></td>
   </div>
      
  
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" class="btn btn-sm btn-flat btn-primary" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($level);
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