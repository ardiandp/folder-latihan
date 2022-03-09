<?php
if (isset($_POST['update'])) 
{
$idvendor=$_GET['idvendor'];
$nama_vendor=$_POST['nama_vendor'];
$nama_cp=$_POST['nama_cp'];
$jenis_vendor=$_POST['jenis_vendor'];
$email=$_POST['email'];
$handphone=$_POST['handphone'];
$kode_bank=$_POST['kode_bank'];
$norekening=$_POST['norekening'];
$alamat=$_POST['alamat'];
$sosmed=$_POST['sosmed'];
$aktif=$_POST['aktif'];

//$simpan=mysqli_query($koneksi,"insert into jg_vendor (nama_vendor, nama_cp, jenis_vendor, email, handphone, kode_bank, norekening, alamat, sosmed, aktif) VALUES
             // ('$nama_vendor','$nama_cp','$jenis_vendor','$email','$handphone','$kode_bank','$norekening','$alamat','$sosmed','$aktif') ");
$update=mysqli_query($koneksi,"update jg_vendor set nama_vendor='$nama_vendor',nama_cp='$nama_cp',jenis_vendor='$jenis_vendor',email='$email',handphone='$handphone',kode_bank='$kode_bank',norekening='$norekening',alamat='$alamat',sosmed='$sosmed',aktif='$aktif' where idvendor='$idvendor' ");
  //mysql_select_db($database_local, $local);
  //$Result1 = mysql_query($insertSQL, $local) or die(mysql_error());
 echo "<script>alert('Data terupdate');document.location='?page=vendor' </script>";
}

//mysql_select_db($database_local, $local);
//$query_bank = "SELECT * FROM kd_bank";
$bank = mysqli_query($koneksi,"SELECT * FROM kd_bank");
$row_bank = mysqli_fetch_assoc($bank);
$totalRows_bank = mysqli_num_rows($bank);


//$query_edit = sprintf("SELECT * FROM jg_vendor WHERE idvendor = %s", GetSQLValueString($colname_edit, "int"));
$edit = mysqli_query($koneksi,"SELECT * FROM jg_vendor WHERE idvendor='$_GET[idvendor]' ");
$row_edit = mysqli_fetch_assoc($edit);
$totalRows_edit = mysqli_num_rows($edit);
?>



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Vendor Baru</h1>
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
    <div class="content">
      <div class="container-fluid">
        <div class="row">
           <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Vendor Rumah Joglo dian Mustika</h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                  <div class="form-group">                   
                      <div class="box-body">
                        
                <div class="row">
                <div class="col-4">
                   <label for="exampleInputPassword1">Nama Vendor</label>
                    <input type="text" name="nama_vendor" value="<?php echo htmlentities($row_edit['nama_vendor'], ENT_COMPAT, 'utf-8'); ?>" class="form-control" placeholder="Kode karyawan">
                  </div>
                  <div class="col-4">
                   <label for="exampleInputPassword1">Nama PIC</label>
                    <input type="text" name="nama_cp" value="<?php echo $row_edit['nama_cp']?>" class="form-control" placeholder="Masukan NIK">
                  </div>
                  <div class="col-4">
                   <label for="exampleInputPassword1">Jenis Vendor</label>
                    <input type="text" name="jenis_vendor" class="form-control" placeholder="No Handphone">
                  </div>
                </div>
                <div class="row">
                
                  <div class="col-4">
                   <label for="exampleInputPassword1">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Nama Lengkap">
                  </div>
                  <div class="col-4">
                   <label for="exampleInputPassword1">Sosial Media</label>
                    <input type="text" name="sosmed" class="form-control" placeholder="No Handphone">
                  </div>
                  <div class="col-4">
                   <label for="exampleInputPassword1">Aktif</label>
                <select name="aktif" class="form-control">
                  <option value="Y">Aktif </option>   
                  <option value="N"> Tidak</option>
            </select>
       
                  </div>
                  
                </div>
                <div class="row">
                <div class="col-4">
                   <label for="exampleInputPassword1">Handphone</label>
                    <input type="text" name="handphone" class="form-control" placeholder="No Handphone">
                  </div>
                  <div class="col-4">
                   <label for="exampleInputPassword1">No Rekening</label>
                    <input type="text" name="norekening" class="form-control" placeholder="No Handphone">
                  </div>
                  <div class="col-4">
                   <label for="exampleInputPassword1">Bank</label>
                   <select name="kode_bank" class="form-control select2bs4">
        <?php 
do {  
?>
        <option value="<?php echo $row_bank['kode']?>" <?php if (!(strcmp($row_bank['kode'], htmlentities($row_edit['kode_bank'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_bank['nama_bank']?></option>
        <?php
} while ($row_bank = mysqli_fetch_assoc($bank));
?>
      </select>
                  </div>
                </div>
                <div class="row">
                
                 
                </div>
                <div class="row">
                <div class="col-12">
                   <label for="exampleInputPassword1">Alamat</label>
                    <textarea class="form-control" name="alamat" placeholder="Alamat lengkap [desa - Kel - Kec - Kab]"></textarea>
                  </div>                  
                </div><br>         
                      <td><input type="submit" name="update" class="btn-flat btn-sm btn btn-warning" value="Update Data" /></td>       
                </div>              
            </div>           
          </div></form>
        
              </div>              
            </div>           
          </div></div></div></div>


<?php
mysqli_free_result($bank);
mysqli_free_result($edit);
?>
