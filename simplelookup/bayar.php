<?php
  $koneksi=mysqli_connect("localhost","root","","test");
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bayar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: <?php echo date ('Y-m-d') ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                
                <!-- /.col -->
               
                
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <!-- /.row -->


              <!-- kolom tambah produk -->
              <div class="col-sm-12">                  
              <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-item">
                  Cari Norekening
                </button>         
                <div class="row">                
                 
                  <div class="col-2">
                  <input type="text" name="nama_name" class="form-control" id="nama_id" readonly placeholder="nama">
                  </div>
                  <div class="col-4">
                  <input type="text" name="alias_name" class="form-control" id="alias_id" readonly placeholder="Alias">
                  </div>
                  <div class="col-2">
                  <input type="text" name="norek_nmae" class="form-control" id="norek_id" readonly placeholder="No Rekening">
                  </div>
                  <div class="col-2">
                  <input type="text" name="telp" class="form-control" id="hub_keluarga"   placeholder="Jumlah">
                  </div>
                  <div class="col-2">
                  <input type="text" name="telp" class="form-control" id="hub_keluarga"   placeholder="Total">
                  </div>
                  <small id="divAlertPegawai"></small>
                </div>
              </div>
              <!-- akhir kolom tambah produk -->
             
             <br>

              <!-- modal barang -->
      <div class="modal fade" id="modal-item">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Daftar Norekening</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
                  <thead>                
                  <tr>
    <td>Pilih</td>
    <td>Nama</td>   
    <td>Alias</td>
    <td>No Rekening</td>   
  </tr>
  
    </thead>
    <tbody>
    <?php
    $norek=mysqli_query($koneksi,"select *from no_rekening");
    $no=1;
    while($data=mysqli_fetch_array($norek))
    {
    ?>
    <tr>
      <td><button class="btn btn-sm btn-primary" id="select" 
                        data-nama="<?php echo $data['atas_nama'] ?>"
                        data-alias="<?php echo $data['alias'] ?>"
                        data-norek="<?php echo $data['norek'] ?>"
                       <i class="fa fa-check"></i>
                        select </button>
                    </td>
      <td> <?php echo $data['atas_nama']; ?> </td>     
      <td><?php echo $data['alias']; ?></td>
      <td><?php echo $data['norek']; ?></td>
     
    </tr>
   <?php } ?>
 </tfoot>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

              <!-- akhir modal barang -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script> 
    $(document).ready(function() {
        $(document).on('click','#select',function() {
            var nama = $(this).data('nama');
            var alias = $(this).data('alias');
            var norek = $(this).data('norek');
            $('#nama_name').val(name_id);
            $('#alias_name').val(alias_id);
            $('#norek').val(norek_id); 
            $('#modal-item').modal('hide');
        )}
    })
</script>