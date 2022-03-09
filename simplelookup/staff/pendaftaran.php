 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pendafatran Pearwatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Legacy User Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
 <?php
 $pasca=mysqli_query($koneksi,"select *from gform_pascalahiran");
 $slimming=mysqli_query($koneksi,"select *from gform_slimming");
 $spahamil=mysqli_query($koneksi,"select *from gform_spahamil");
 $jumlah_pasca=mysqli_num_rows($pasca);
 $jumlah_slimming=mysqli_num_rows($slimming);
 $jumlah_spahamil=mysqli_num_rows($spahamil);

 ?>   


     <section class="content">
      <div class="container-fluid">
   <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jumlah_pasca ?> <sup style="font-size: 20px">Pendaftar</sup></h3>
                <p>Pasca Lahiran</p>
              </div>
              <div class="icon">
              <i class="ion ion-person-add"></i>
              </div>
              <a href="?page=gform_pascalahiran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jumlah_slimming ?> <sup style="font-size: 20px">Pendaftar</sup></h3>

                <p>Slimming</p>
              </div>
              <div class="icon">
              <i class="ion ion-person-add"></i>
              </div>
              <a href="?page=gform_slimming" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $jumlah_spahamil ?> <sup style="font-size: 20px">Pendaftar</sup></h3>

                <p>Spa Hamil</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="?page=gform_spahamil" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>



    
        </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->