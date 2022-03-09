
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
            <form method="post" action="">
			<div class="form-group">
                      <label for="exampleInputPassword1">Nama Group</label>
                 <td><input type="text" name="level" class="form-control" value="" size="32" /></td>
            </div>
			<input type="submit" value="Simpan Data" name="simpan" class="btn btn-success">
		 </form>
		 <?php
		 if(isset($_POST['simpan']))
		 {
			 $simpan=mysqli_query($koneksi,"insert into level (level) values ('$_POST[level]')");
			 echo "<script>alert('proses data'); document.location='?page=group' </script>";
		 }?>
		 
            </div>
            <!-- /.box-body -->
          
          </div>
          <!-- /.box -->

       
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-7">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Group</h3>

             
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Nama Prodi</th>
                  <th>Akses</th>
                  <th style="width: 40px">Aksi</th>
                </tr>
				<?php 
				$level=mysqli_query($koneksi,"select *from level");
				$no=1;
				while($data=mysqli_fetch_array($level))
				{ ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $data['level'] ?></td>
                  <td>
                    <a href="?page=add_akses&id=<?php echo $data['id_level'];?>" class="badge bg-green" > Akses </a>
                  </td>
                  <td><a href="?page=del_group&id=<?php echo $data['id_level'];?>" class="badge bg-red" > Hapus </a></td>
                </tr>
                <?php $no++;} ?>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
     
    </section>
    <!-- /.content -->
  </div>
