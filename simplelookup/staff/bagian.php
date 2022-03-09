<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bagian </h1>
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
           <div class="col-lg-4">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Data Bagian</h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                  <div class="form-group">                   
                      <div class="box-body">
                        <div class="form-group">
                    <label for="exampleInputPassword1">Kode Bagian</label>
                    <input type="text" class="form-control" name="kode_bagian" id="exampleInputPassword1" placeholder="Kode Bagian">
                      </div>
                      <div class="form-group">
                    <label for="exampleInputPassword1">Nama Bagian</label>
                    <input type="text" class="form-control" name="nama_bagian" id="exampleInputPassword1" placeholder="Nama Bagian">
                      </div>
                          <input type="submit" name="simpan" class="btn btn-primary btn-flat" value="Simpan Data">            
                    </div>         
                  </div>
              </div>
              </form>
              </div>
            <!-- Coding Simpan -->       
            <?php
            if(isset($_POST['simpan']))
            {
            $kode=$_POST['kode_bagian'];
            $nama=$_POST['nama_bagian'];
            $simpan=mysqli_query($koneksi,"insert into bagian values ('$kode','$nama')");
            if($simpan)
            {
              echo "<script>alert('Data tersimpan'); document.location='?page=bagian' </script>";
            }
            else
            {
              echo "<script>alert('Gagal tersimpan'); document.location='?page=bagian' </script>";
            } 
            }
            ?>

            <!-- End simpan -->
          </div>
          <!-- /.col-md-6 -->
         <div class="col-lg-8">
            <div class="card card-success">
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
    <td>No</td>
    <td>Kode Bagian</td>
    <td>Nama Bagian</td>
    <td>Aksi</td>
   
 </tr>
    </thead>
    <tbody>
 <?php 
 $no=1;
 $bagian=mysqli_query($koneksi,"select *from bagian");
 while($data=mysqli_fetch_array($bagian))
  { ?>
    <tr>
      <td><?php echo $no++; ?></td>
       <td><?php echo $data['kode_bagian'] ?></td>
      <td><?php echo $data['nama_bagian'] ?></td>
      <td><a href="?page=edit_bagian&id=<?php echo $data['kode_bagian'] ?>" class="btn btn-sm btn-warning btn-flat">Edit</a> | <a href="?page=hapus_bagian&id=<?php echo $data['kode_bagian'] ?>" class="btn btn-sm btn-danger btn-flat">Hapus</a></td>      
    </tr>
    <?php } ?>
</table>
 </tfoot>
                </table>
              </div>
              <!-- /.card-body -->                
                
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

