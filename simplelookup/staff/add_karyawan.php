<?php

if (isset($_POST['simpan'])) {
   
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

    $simpan=mysqli_query($koneksi,"insert into karyawan (kode_kry,nik,nama_lengkap,alamat,agama,no_hp,email,tempat_lahir,tgl_lahir,foto,bagian,aktif) values 
      ('$kode_kry','$nik','$nama_lengkap','$alamat','$agama','$no_hp','$email','$tempat_lahir','$tgl_lahir','$foto','$bagian','$aktif')") or die (mysqli_error());; 
    if($simpan)
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

      $simpan=mysqli_query($koneksi,"insert into karyawan (kode_kry,nik,nama_lengkap,alamat,agama,no_hp,email,tempat_lahir,tgl_lahir,bagian,aktif) values 
      ('$kode_kry','$nik','$nama_lengkap','$alamat','$agama','$no_hp','$email','$tempat_lahir','$tgl_lahir','$bagian','$aktif')");; 
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
$bagian = mysqli_query($koneksi,"SELECT * FROM bagian");
$row_bagian = mysqli_fetch_assoc($bagian);
$totalRows_bagian = mysqli_num_rows($bagian);
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
   
   <!-- Membuat kode Karyawan Otomatis -->
  <?php 
  $query = mysqli_query( $koneksi,"SELECT max(kode_kry) as kodekry FROM karyawan");
  $data = mysqli_fetch_array($query);
  $kdry = $data['kodekry'];
 
  // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
  // dan diubah ke integer dengan (int)
  $urutan = (int) substr($kdry, 4, 4);
 
  // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
  $urutan++;
 
  // membentuk kode barang baru
  // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
  // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
  // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
  $tahun = date('Y');
  $kodekaryawan = $tahun . sprintf("%03s", $urutan);
  ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
           <div class="col-lg-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Diri Karyawan</h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                  <div class="form-group">                   
                      <div class="box-body">
                        
                <div class="row">
                <div class="col-4">
                   <label for="exampleInputPassword1">Kode Karyawan</label>
                    <input type="text" name="kode_kry" value="<?php echo $kodekaryawan?> " class="form-control" placeholder="Kode karyawan">
                  </div>
                  <div class="col-8">
                   <label for="exampleInputPassword1">NIK Karyawan</label>
                    <input type="text" name="nik" class="form-control" placeholder="Masukan NIK">
                  </div>
                </div>
                <div class="row">
                <div class="col-4">
                   <label for="exampleInputPassword1">No Handphone</label>
                    <input type="text" name="no_hp" class="form-control" placeholder="No Handphone">
                  </div>
                  <div class="col-8">
                   <label for="exampleInputPassword1">Nama Karyawan</label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                  </div>
                </div>
                <div class="row">
                <div class="col-12">
                   <label for="exampleInputPassword1">Alamat</label>
                    <textarea class="form-control" name="alamat" placeholder="Alamat lengkap [desa - Kel - Kec - Kab]"></textarea>
                  </div>                  
                </div>
                 <div class="row">
                <div class="col-4">
                   <label for="exampleInputPassword1">Agama</label>
                    <select name="agama" class="form-control select2bs4">
        <option value="Islam" <?php if (!(strcmp("Islam", ""))) {echo "SELECTED";} ?>>Islam</option>
        <option value="Kristen" <?php if (!(strcmp("Kristen", ""))) {echo "SELECTED";} ?>>Kristen</option>
        <option value="Lainya" <?php if (!(strcmp("Lainya", ""))) {echo "SELECTED";} ?>>Lainya</option>
      </select>
                  </div>
                  <div class="col-8">
                   <label for="exampleInputPassword1">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="email">
                  </div>
                </div>
                 <div class="row">
                <div class="col-4">
                   <label for="exampleInputPassword1">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="KotaTempat Lahir">
                  </div>
                  <div class="col-8">
                   <label for="exampleInputPassword1">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir">
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
                    <input type="file" onchange="preview()" name="foto"  class="form-control" id="exampleInputEmail1" placeholder="No Tagihan">
                </div>              
              <img id="frame" class="img-thumbnail">
                  </div>                  
                </div>
                 <div class="row">
                <div class="col-12">
                   <label for="exampleInputPassword1">Bagian</label>
                    <select name="bagian" class="form-control select2bs4">
                   <?php 
                    do {  
                    ?>
                    <option value="<?php echo $row_bagian['kode_bagian']?>" ><?php echo $row_bagian['nama_bagian']?></option>
                        <?php
                        } while ($row_bagian = mysqli_fetch_assoc($bagian));
                        ?>
                    </select>
                  </div>                  
                </div>
                <div class="row">
                <div class="col-12">
                   <label for="exampleInputPassword1">Aktif</label>
                    <td><input type="radio" name="aktif" value="Y" /> Ya</td>
                    <td><input type="radio" name="aktif" value="N" /> Tidak</td>
                  </div>                  
                </div>
                 <td><input type="submit" name="simpan" class="btn-flat btn-sm btn btn-success" value="Simpan Data" /></td>
    </tr>
  </table>
  
</form>
                                      
                    </div>           
                  </div>
              </div>              
            </div>           
          </div></div></div></div>



  
  
   
 

<?php
mysqli_free_result($bagian);
?>
  <script type="text/javascript">
function preview() 
{
    frame.src=URL.createObjectURL(event.target.files[0]);
}
</script>