<?php
$id=$_GET['id_post'];
$edit = mysqli_query($koneksi,"SELECT * FROM ig_posts WHERE id_post = '$id' ");
$row_edit = mysqli_fetch_assoc($edit);
$totalRows_edit = mysqli_num_rows($edit);


$kategori = mysqli_query($koneksi,"select *from kategori");
$row_kategori = mysqli_fetch_assoc($kategori);
$totalRows_kategori = mysqli_num_rows($kategori);
?>






/* form awal */
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menampilkan Posting</h1>
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
              <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
              <div class="card-body">
                  <div class="form-group">                   
                      <div class="box-body">
                        <div class="form-group">
                    <label for="exampleInputPassword1">Judul Artikel</label>
                    <input type="text" class="form-control" readonly name="judul" value="<?php echo htmlentities($row_edit['judul'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                </div>
                         <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                   <?php echo $row_edit['keterangan'] ?>
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
                    <input type="text" class="form-control" readonly name="username" value="<?php echo htmlentities($row_edit['username'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                </div>
                   
                       <div class="form-group">
  <label for="norek">Kategori</label>
  <select name="id_kategori" class="form-control select2bs4 readonly">
        <?php 
do {  
?>
        <option value="<?php echo $row_kategori['id_kategori']?>" <?php if (!(strcmp($row_kategori['id_kategori'], htmlentities($row_edit['id_kategori'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_kategori['nama_kategori']?></option>
        <?php
} while ($row_kategori = mysqli_fetch_assoc($kategori));
?>
      </select>
                 <div class="form-group">
               <label for="exampleInputPassword1">Foto</label>
             <img src="../storage/img_posts/<?php echo $row_edit['gambar'] ?>" class="img-thumbnail">
             <div class="form-group">                   
                    <input type="text" class="form-control" readonly value="<?php echo date('Y-m-d H:i:s') ?>" id="exampleInputPassword1" placeholder="Title">
              </div>
              
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
<?php
mysqli_free_result($edit);

mysqli_free_result($kategori);
?>

