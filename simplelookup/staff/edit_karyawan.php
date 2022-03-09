<?php

if (isset($_POST['update'])) {
   
  if(!empty($_FILES['foto']['name']))
  {
     $foto = $_FILES['foto']['name'];
     $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "../storage/img_karyawan/".$foto);


  $kode_kry=$_POST['kode_kry'];
  $nik=$_POST['nik'];
  $nama_lengkap=$_POST['nama_lengkap'];
  $alamat=$_POST['alamat'];
  $agama=$_POST['agama'];
  $no_hp=$_POST['no_hp'];
  $email=$_POST['email'];
  $tempat_lahir=$_POST['tempat_lahir'];
  $tgl_lahir=$_POST['tgl_lahir'];
  $bagian=$_POST['bagian'];
  $aktif=$_POST['aktif'];

  $update=mysqli_query($koneksi,"update karyawan set nik='$nik',nama_lengkap='$nama_lengkap',alamat='$alamat',agama='$agama',email='$email',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',foto='$foto',bagian='$bagian',aktif='$aktif' where kode_kry='$kode_kry' ");
  if($update)
  {
     echo "<script>alert('ada Fotonya');document.location='?page=karyawan' </script>";
  }
  else
  {
    echo "gagal";
  }
 
  }
  else
  {
    $kode_kry=$_POST['kode_kry'];
    $nik=$_POST['nik'];
    $nama_lengkap=$_POST['nama_lengkap'];
    $alamat=$_POST['alamat'];
    $agama=$_POST['agama'];
    $no_hp=$_POST['no_hp'];
    $email=$_POST['email'];
    $tempat_lahir=$_POST['tempat_lahir'];
    $tgl_lahir=$_POST['tgl_lahir'];
    $bagian=$_POST['bagian'];
    $aktif=$_POST['aktif'];

    $simpan=mysqli_query($koneksi,"update karyawan set nik='$nik',nama_lengkap='$nama_lengkap',alamat='$alamat',agama='$agama',no_hp='$no_hp',email='$email',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',bagian='$bagian',aktif='$aktif' where kode_kry='$kode_kry' ");
    if($simpan)
    {
     echo "<script>alert('Fotonya Kosong');document.location='?page=karyawan' </script>";
    }
    else
    {
    echo "gagal";
    }  
  }
  

//mysql_select_db($database_local, $local);
//$Result1 = mysql_query($insertSQL, $local) or die(mysql_error());
//echo "<script>alert('data terimpan');document.location='?page=karyawan' </script>";
}

//mysql_select_db($database_local, $local);
//$query_bagian = "SELECT * FROM bagian";
$bagian = mysqli_query($koneksi,"select *from bagian");
$row_bagian = mysqli_fetch_assoc($bagian);
$totalRows_bagian = mysqli_num_rows($bagian);

$kode_kry=$_GET['kode_kry'];
//mysql_select_db($database_local, $local);
//$query_edit = sprintf("SELECT * FROM karyawan WHERE kode_kry = %s", GetSQLValueString($colname_edit, "text"));
$edit = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE kode_kry='$kode_kry' ");
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
            <h1>Tambah Karyawan Baru</h1>
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
           <div class="col-lg-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><a href="javascript:window.history.go(-1);">Kembali</a></h3>
              </div>
              <form action="" method="post"  enctype="multipart/form-data">
              <div class="card-body">
                  <div class="form-group">                   
                      <div class="box-body">
                        
                <div class="row">
                <div class="col-4">
                   <label for="exampleInputPassword1">Kode Karyawan</label>
                    <input type="text" name="kode_kry" readonly value="<?php echo $row_edit['kode_kry']; ?>" class="form-control" placeholder="Kode karyawan">
                  </div>
                  <div class="col-8">
                   <label for="exampleInputPassword1">NIK Karyawan</label>
                    <input type="text" name="nik" value="<?php echo htmlentities($row_edit['nik'], ENT_COMPAT, 'utf-8'); ?>" class="form-control" placeholder="Masukan NIK">
                  </div>
                </div>
                <div class="row">
                <div class="col-4">
                   <label for="exampleInputPassword1">No Handphone</label>
                    <input type="text" name="no_hp" value="<?php echo htmlentities($row_edit['no_hp'], ENT_COMPAT, 'utf-8'); ?>" class="form-control" placeholder="No Handphone">
                  </div>
                  <div class="col-8">
                   <label for="exampleInputPassword1">Nama Karyawan</label>
                    <input type="text" name="nama_lengkap" value="<?php echo htmlentities($row_edit['nama_lengkap'], ENT_COMPAT, 'utf-8'); ?>" class="form-control" placeholder="Nama Lengkap">
                  </div>
                </div>
                <div class="row">
                <div class="col-12">
                   <label for="exampleInputPassword1">Alamat</label>
                    <textarea class="form-control" name="alamat" placeholder="Alamat lengkap [desa - Kel - Kec - Kab]"><?php echo htmlentities($row_edit['alamat'], ENT_COMPAT, 'utf-8'); ?></textarea>
                  </div>                  
                </div>
                 <div class="row">
                <div class="col-4">
                   <label for="exampleInputPassword1">Agama</label>
                   <select name="agama" class="form-control select2bs4">
        <option value="Islam" <?php if (!(strcmp("Islam", htmlentities($row_edit['agama'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Islam</option>
        <option value="Kristen" <?php if (!(strcmp("Kristen", htmlentities($row_edit['agama'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Kristen</option>
        <option value="lainya" <?php if (!(strcmp("lainya", htmlentities($row_edit['agama'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Lainya</option>
      </select>
                  </div>
                  <div class="col-8">
                   <label for="exampleInputPassword1">Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo htmlentities($row_edit['email'], ENT_COMPAT, 'utf-8'); ?>" placeholder="email">
                  </div>
                </div>
                 <div class="row">
                <div class="col-4">
                   <label for="exampleInputPassword1">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="<?php echo htmlentities($row_edit['tempat_lahir'], ENT_COMPAT, 'utf-8'); ?>" placeholder="KotaTempat Lahir">
                  </div>
                  <div class="col-8">
                   <label for="exampleInputPassword1">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="<?php echo htmlentities($row_edit['tgl_lahir'], ENT_COMPAT, 'utf-8'); ?>" placeholder="Tanggal Lahir">
                  </div>
                </div>

                                      
                    </div>           
                  </div>
              </div>              
            </div>           
          </div>
          <div class="col-lg-4">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Profil</h3>
              </div>
            
              <div class="card-body">
                  <div class="form-group">                   
                      <div class="box-body">
                        <div class="row">
                <div class="col-12">
                   <label for="exampleInputPassword1">Foto</label>
                   <img src="../storage/img_karyawan/<?php echo $row_edit['foto'] ?>" class="img-thumbnail" >
                    <input type="file" name="foto"  class="form-control" id="exampleInputEmail1" placeholder="No Tagihan">
                </div>              
             
                  </div>                  
                </div>
                 <div class="row">
                <div class="col-12">
                   <label for="exampleInputPassword1">Bagian</label>
                    <select name="bagian" class="form-control select2bs4">
        <?php 
do {  
?>
        <option value="<?php echo $row_bagian['kode_bagian']?>" <?php if (!(strcmp($row_bagian['kode_bagian'], htmlentities($row_edit['bagian'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_bagian['nama_bagian']?></option>
        <?php
} while ($row_bagian = mysqli_fetch_assoc($bagian));
?>
      </select>
                  </div>                  
                </div>
                <div class="row">
                <div class="col-12">
                   <label for="exampleInputPassword1">Aktif</label>
                  <td><input type="radio" name="aktif" value="Y" <?php if (!(strcmp(htmlentities($row_edit['aktif'], ENT_COMPAT, 'utf-8'),"Y"))) {echo "checked=\"checked\"";} ?> />
            Ya</td>
        </tr>
        <tr>
          <td><input type="radio" name="aktif" value="N" <?php if (!(strcmp(htmlentities($row_edit['aktif'], ENT_COMPAT, 'utf-8'),"N"))) {echo "checked=\"checked\"";} ?> />
            Tidak</td>
                  </div>                  
                </div>
                 
    <tr valign="baseline">
     <input type="submit" name="update" class="btn btn-warning btn-flat" value="Update Data Diri">
</form>
                                      
                    </div>           
                  </div>
              </div>              
            </div>           
          </div></div></div></div>

<?php
mysqli_free_result($bagian);

mysqli_free_result($edit);
?>



