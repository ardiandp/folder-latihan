 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Transaksi</h1>
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


<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Transaksi BCA Ardian</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Keterangan</th>
                      <th>Jumlah</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
        <?php
       $batas = 10;
       $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
       $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

       $previous = $halaman - 1;
       $next = $halaman + 1;
       
       $data = mysqli_query($koneksi,"select * from bca_cv");
       $jumlah_data = mysqli_num_rows($data);
       $total_halaman = ceil($jumlah_data / $batas);

       $bcaardian = mysqli_query($koneksi,"select * from bca_cv limit $halaman_awal, $batas");
       $nomor = $halaman_awal+1;
       $no=1;
       while($data = mysqli_fetch_array($bcaardian)){
           ?>
              <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data['tanggal'] ?></td>
                      <td><?php echo $data['keterangan'] ?></td>
                      <td><?php echo $data['jumlah'] ?></td>
                      <td><?php echo $data['status'] ?></td>
                    </tr>
      <?php   } ?>
                  
                    
                  </tbody>
                </table>
                <nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?page=responsive_hover_table&halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?page=responsive_hover_table&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=responsive_hover_table&halamann=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>



        </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->