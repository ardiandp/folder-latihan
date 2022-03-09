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
    <div class="content">
      <div class="container-fluid">
        <div class="row">
           <div class="col-lg-4">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Different Height</h3>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="box-body">
                 <div class="form-group">
              
                 <input type="file" onchange="preview()" name="resi"  class="form-control" id="exampleInputEmail1" placeholder="No Tagihan">
                </div>
              
              <img id="frame" class="img-thumbnail">
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
                <h3 class="card-title">Different Height</h3>
              </div>
              <div class="card-body">
                    <form action="" method="post" name="norek">
                       <div class="form-group">
  <label for="norek">norek</label>
  <select name="norek" id="norek" class="form-control select2bs4"  onchange="this.form.submit();">
  <option value=""> == Pilih Nomor Rekening == </option>
  <?php 
  $tampil=mysql_query("select *from no_rekening");
  while($data=mysql_fetch_assoc($tampil))
  { ?>
  <option value="<?php echo $data['norek']?>"> <?php echo $data['atas_nama'].'-->'. $data['norek'] ?> </option>
   <?php } ?>
  </select>
</form>
     

                <?php 
error_reporting(0);
$pilih=mysql_query("SELECT *FROM no_rekening,kd_bank WHERE no_rekening.`bank`=kd_bank.`kode` AND no_rekening.`norek`='$_POST[norek]' ") or die (mysql_error());
$data=mysql_fetch_array($pilih);
?> 
</div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Bank</label>
                    <input type="text" value="<?php echo $data['nama_bank'] ?>" class="form-control" id="exampleInputPassword1" placeholder="No Rekening">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Atas Nama</label>
                    <input type="text" value="<?php echo $data['atas_nama']  ?>" class="form-control" id="exampleInputPassword1" placeholder="No Rekening">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Alias</label>
                    <input type="text" value="<?php echo $data['alias'] ?>" class="form-control" id="exampleInputPassword1" placeholder="No Rekening">
                </div>
                
                 <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                    <textarea name="keteragan" class="form-control"></textarea>
                </div>
              </div>
              </div> 
            </div>
            <!-- /.card -->           
         

          <div class="col-lg-4">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Different Height</h3>
              </div>
              <div class="card-body">
                 <div class="form-group">
                    <label for="exampleInputPassword1">Dari Rekening</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="No Rekening">
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="No Rekening">
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="No Rekening">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->           
          </div>
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