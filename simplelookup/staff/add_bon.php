<?php
if (isset($_POST['simpan'])) 
{
    $nama = $_FILES['file']['name'];
    $lokasi = $_FILES['file']['tmp_name'];
    //$namabaru = "nama-baru".$nama;
    move_uploaded_file($lokasi, "../storage/img_bon/".$nama);
                       
$keterangan=$_POST['keterangan'];
$kategori=$_POST['kategori'];
$penerima=$_POST['penerima'];
$biaya=$_POST['biaya'];
$tanggal=$_POST['tanggal'];
$created_at=$_POST['created_at'];

$simpan=mysqli_query($koneksi,"insert into bon (keterangan, kategori,penerima,biaya,file,tanggal,created_at) values
  ('$keterangan','$kategori','$penerima','$biaya','$nama','$tanggal','$created_at')");

echo "<script>alert('Data Bon Tersimpan'); document.location='?page=bon' </script>";
}
?>


  



<!-- batas atas -->

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
                <h3 class="card-title"><a href="?page=bon" class="btn btn-sm btn-flat btn-success">Kembali </a></h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                  <div class="form-group">                   
                      <div class="box-body">
                        <div class="form-group">
                    <label for="exampleInputPassword1">Penerima</label>
                    <input type="text" name="penerima" value="" class="form-control" size="32" />
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
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="text" name="biaya" class="form-control" value="" id="exampleInputPassword1" placeholder="Title">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Kategori</label>
                    <input type="text" name="kategori" class="form-control" value="" id="exampleInputPassword1" placeholder="Title">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="" id="exampleInputPassword1" placeholder="Title">
                </div>                
                      
                 <div class="form-group">
               <label for="exampleInputPassword1">Upload Foto</label>
                 <input type="file" onchange="preview()" name="file"  class="form-control" id="exampleInputEmail1" placeholder="No Tagihan">
                </div>              
              <img id="frame" class="img-thumbnail">

              <div class="form-group">                   
                    <input type="text" name="created_at" class="form-control" readonly value="<?php echo date('Y-m-d H:i:s') ?>" id="exampleInputPassword1" placeholder="Title">
              </div>
              <input type="submit" name="simpan" class="btn btn-primary btn-flat" value="Simpa Data">
              </div>       
                
              </div>
              </div> 
            </div>
            <!-- /.card -->     
</form>
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
