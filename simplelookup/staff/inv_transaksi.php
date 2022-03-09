<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
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
    <script type="text/javascript" src="jquery.js"></script> 
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
                    <i class="fas fa-globe"></i> Dian Mustika Care
                    <small class="float-right">Tanggal: <?php echo date('d-m-Y') ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Dari
                  <address>
                    <strong>Dian Mustika</strong><br>
                    Perum Dasana Indah Blok SS5 No 2<br>
                    kelapa Dua - Tangerang Banten<br>
                    Phone: 085235714803<br>
                    Email: mustikacare@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Kepada<form method="post" action="">
                  <address>
                          <select name="pembeli" class="form-control select2bs4" onchange="this.form.submit()">
                               <?php 
                    $pembeli=mysqli_query($koneksi,"select *from inv_pembeli");
                    while($data=mysqli_fetch_array($pembeli))
                    {?>
                          <option value="<?php echo $data['idpembeli']?>"><?php echo $data['nama_pembeli'] ?></option>    <?php } ?>
                        </select> 
                
                    Grand depok city cluster new anggrek 3 Blok A-22, sukmajaya, kota depok <br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address></form>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <!-- satu kolom sengaja di kosongkan -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td> <button type="button" class="btn-sm btn-info btn-flat" data-toggle="modal" data-target="#modal"><i class="fa fa-search"></i></button></td>
                      <td><input type="text" id="nama" class="form-control" placeholder="Nama Pemilik"></td>
                      <td><input type="text" id="alias" class="form-control" placeholder="Nama alias"></td>
                      <td><input type="text" class="form-control"></td>
                      <td><input type="text" class="form-control"></td>
                    </tr>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

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
    $(document).ready(function(){
        $('#example2').DataTable2();

        $(document).on('click','#produk',function(e){
            document.getElementById("kode").value = $(this).attr('data-kode');
            document.getElementById("nama").value = $(this).attr('data-nama');
            document.getElementById("alias").value = $(this).attr('data-alias');
            $('#modal').modal('hide');
        })
    })
  </script>





  <!-- awal modal -->
<div id="modal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form role="form" id="form-tambah" method="post" action="input.php">
				<div class="modal-header">
					<center>
					<h3 class="modal-title">Pilih Rekening</h3>
					</center>
				</div>
					<div class="modal-body">					
							<table width="100%" class="table table-hover"  id="example2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Rekening</th>
                                        <th>Nama Pemilik</th>
                                        <th>Alias</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $norek=mysqli_query($koneksi,"select *from no_rekening");
                               $no=1;
                                while($data=mysqli_fetch_array($norek))
                                {?>                              
                                    <tr id="produk" data-kode="<?php echo $data['norek'] ?>" data-nama="<?php echo $data['atas_nama']?>" data-alias="<?php echo $data['alias'] ?>" >
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['norek'] ?></td>
                                        <td><?php echo $data['atas_nama'] ?></td>
                                        <td> <?php echo $data['alias'] ?></td>
                                        <td class="center">Denshin</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>					
					</div>						
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					</div>
			</div>
		</div>
	</div>
	<!-- akhir modal -->

