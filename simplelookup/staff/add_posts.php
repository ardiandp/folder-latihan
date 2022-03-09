<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post Artikel Baru</h1>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Different Height</h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                  <div class="form-group">                   
                      <div class="box-body">
                        <div class="form-group">
                    <label for="exampleInputPassword1">Judul Artikel</label>
                    <input type="text" class="form-control" name="judul" id="exampleInputPassword1" placeholder="Title">
                </div>
                         <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                    <textarea name="keterangan" id="summernote" cols="15" rows="10" class="form-control" placeholder="Isi Artikel"></textarea>
                     </div>                
                    </div>               
                   
                  </div>
              </div>
              
            </div>
            <!-- /.card -->          
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
         <div class="col-lg-4">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Pengaturan</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Penulis</label>
                    <input type="text" name="username" class="form-control" readonly value="<?php echo $_SESSION['MM_Username'] ?>" id="exampleInputPassword1" placeholder="Title">
                </div>
                   
                       <div class="form-group">
  <label for="norek">Kategori</label>
  <select name="id_kategori" id="id_kategori" class="form-control select2bs4">
  <option value=""> == Pilih Kategori == </option>
  <?php 
  $tampil=mysqli_query($koneksi,"select *from kategori where type='Artikel' ");
  while($data=mysqli_fetch_assoc($tampil))
  { ?>
  <option value="<?php echo $data['id_kategori']?>"> <?php echo $data['nama_kategori'] ?> </option>
   <?php } ?>
  </select>
                 <div class="form-group">
               <label for="exampleInputPassword1">Upload Foto</label>
                 <input type="file" onchange="preview()" name="gambar"  class="form-control" id="exampleInputEmail1" placeholder="No Tagihan">
                </div>              
              <img id="frame" class="img-thumbnail">

              <div class="form-group">                   
                    <input type="text" class="form-control" readonly value="<?php echo date('Y-m-d H:i:s') ?>" id="exampleInputPassword1" placeholder="Title">
              </div>
              <input type="submit" name="simpan" class="btn btn-primary btn-flat" value="Simpa Data">
              </div>       
                
              </div>
              </div> 
            </div>
            <!-- /.card -->     

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
function preview() 
{
    frame.src=URL.createObjectURL(event.target.files[0]);
}
</script>

<?php if(isset($_POST['simpan']))
{
  
  $username=$_POST['username'];
  $judul=$_POST['judul'];
  $judul_seo = create_url($_POST['judul']);
  $id_kategori=$_POST['id_kategori'];
  $keterangan=$_POST['keterangan'];
  $created_at=date('Y-m-d H:i:s');
  /* ini untuk gambar */
    $nama = $_FILES['gambar']['name'];
    $lokasi = $_FILES['gambar']['tmp_name'];
    $namabaru = "nama-baru".$nama;
    move_uploaded_file($lokasi, "../storage/img_posts/".$nama);
    echo "gambar telah diupload !";
   
  /* akhir deskripsi gambar */

  $simpan=mysqli_query($koneksi,"insert into ig_posts (username,judul,judul_seo,id_kategori,keterangan,gambar,created_at) values ('$username','$judul','$judul_seo','$id_kategori','$keterangan','$nama','$created_at')") or die (mysql_error());
  //move_uploaded_file($lokasi, "gambar/".$namabaru);
  echo "<script>alert('Artikel Tersimpan');document.location='?page=posts' </script>";
}
?>

