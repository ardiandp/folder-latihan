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
    

    <link rel="stylesheet" href="css/colorbox.css" />
 <script src="js/jquery.min.js"></script>
		<script src="js/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".ajax").colorbox({width:'650px',height:'450px'}); 				
			});
		</script>




<script language="javascript">
var my_produk = new Array(); // for example
function passingToParent(){
    arrayOfStrings = my_variable[0].split(',');    
    for (var i=1; i < my_variable.length; i++) {
        $('#' + arrayOfStrings[i-1]).val(my_variable[i]);
    }
    // single form
    //parent.$.fn.colorbox.close();

    // framework form
    jQuery.colorbox.close();;
}
</script>	


<script language="javascript">
		function getSelected(kode_produk, nama_produk, harga){	
			
			var args = new Array();
			
			for (var i = 0; i < arguments.length; i++)
				window.parent.my_produk[i+1] = arguments[i];
				
			window.parent.passingToParent();
		}

</script>



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
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" >                  
                 To :               
                <div class="row">                
                  <div class="col-10">
                  <strong><input type="text" name="nama_pembeli" id="no_va" placeholder="nama Lengkap" readonly class="form-control"></strong>
                  </div>
                  <div class="col-2">
                  <a href="daftar_bpjs.php" class="ajax" onClick="my_variable[0]='no_va,nama,hub_keluarga'"> <img src="button_search.png" border="0" /></a>                    
                  </div>
                  <div class="col-12">
                  <textarea name="alamat" class="form-control" id="nama" readonly placeholder="Alamat langekap"> </textarea>
                  </div>
                  <div class="col-12">
                  <input type="text" name="telp" class="form-control" id="hub_keluarga" readonly placeholder="No telp">
                  </div>
                  <small id="divAlertPegawai"></small>
                </div>
                </div>
                
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->


              <!-- kolom tambah produk -->
              <div class="col-sm-12">                  
              <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-default" onClick="my_produk[0]='kode_produk,nama_produk,harga'">
                  Cari Produk
                </button>         
                <div class="row">                
                 
                  <div class="col-2">
                  <input type="text" name="telp" class="form-control" id="kode_produk" readonly placeholder="Kode">
                  </div>
                  <div class="col-4">
                  <input type="text" name="telp" class="form-control" id="nama_produk" readonly placeholder="Nama Barang">
                  </div>
                  <div class="col-2">
                  <input type="text" name="telp" class="form-control" id="harga" readonly placeholder="Harga">
                  </div>
                  <div class="col-2">
                  <input type="text" name="telp" class="form-control" id="hub_keluarga" readonly placeholder="Jumlah">
                  </div>
                  <div class="col-2">
                  <input type="text" name="telp" class="form-control" id="hub_keluarga" readonly placeholder="Total">
                  </div>
                  <small id="divAlertPegawai"></small>
                </div>
              </div>
              <!-- akhir kolom tambah produk -->
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
                      <td>1</td>
                      <td>Call of Duty</td>
                      <td>455-981-221</td>
                      <td>El snort testosterone trophy driving gloves handsome</td>
                      <td>$64.50</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Need for Speed IV</td>
                      <td>247-925-726</td>
                      <td>Wes Anderson umami biodiesel</td>
                      <td>$50.00</td>
                    </tr>
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- modal barang -->
              <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Daftar Produk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
                  <thead>                
                  <tr>
    <td>No</td>
    <td>Kode</td>   
    <td>Nama Produk</td>
    <td>Harga</td>
    <td>Berat</td>
  </tr>
  
    </thead>
    <tbody>
    <?php
    $produk=mysqli_query($koneksi,"select *from produk");
    $no=1;
    while($data=mysqli_fetch_array($produk))
    {
    ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><a href="javascript:getSelected('<?=$data['kode_produk']?>','<?=$data['nama_produk']?>','<?=$data['harga']?>')">
				<?=$data['kode_produk']?>
			</a></td>     
      <td><?php echo $data['nama_produk']; ?></td>
      <td><?php echo $data['harga']; ?></td>
      <td><?php echo $data['berat'] ?> </td>
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

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
               <!--   <p class="lead">Payment Methods:</p>
                  <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
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