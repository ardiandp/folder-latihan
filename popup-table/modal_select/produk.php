<?php
$koneksi=mysqli_connect("localhost","root","","test");
?>

<html>
    <title>Mengambil Data Produk</title>
    <head>
    <head>
	<title>Rully Studio | Modal Select </title>
	<link rel="stylesheet" type="text/css" href="style/bootstrap.css">
	<link rel="stylesheet" href="style/dataTables.bootstrap4.min.css" />
	<style>
		tr 
		{
			cursor:default;
		}
	</style
</head>
    </head>
    <body>
    <script type="text/javascript" src="style/jquery.js"></script>
	<script type="text/javascript" src="style/bootstrap.js"></script>	
    <script src="style/jquery.dataTables.min.js"></script>	
	<script src="style/dataTables.bootstrap4.min.js"></script>	

    </body>



    <div class="container" style="margin-top:8%">

    <div class="col-md-8 col-md-offset-2"> 		
			<br>
				<form class="form-horizontal" action="?page=cus&id" method="post">
					<div class="box-body">					
                        <div class="form-group">
							<label class="col-sm-3 control-label">Pilih CUstomer</label>
							<div class="col-sm-9">
								<select name="pembeli" class="form-control select2" bootstrap4 onchange="this.form.submit()">
                                <?php 
                                $prd=mysqli_query($koneksi,"select *from produk");
                                while ($data=mysqli_fetch_array($prd))
                                { ?>
                        <option value="$data['kode_barang']"> <?php echo $data['nama_produk'] ?> </option>        
                                <?php  } ?>  
                                </select>
							</div>
                           
						</div>
					</div>
                  
                    <div class="box-body">					
                        <div class="form-group">
							<label class="col-sm-3 control-label">No Telp</label>
							<div class="col-sm-9">
								<input type="text" id="harga" class="form-control" placeholder="Harga">
							</div>
						</div>
					</div>
                    <div class="box-body">					
                        <div class="form-group">
							<label class="col-sm-3 control-label">Alamat</label>
							<div class="col-sm-9">
								<input type="text" id="harga" class="form-control" placeholder="Harga">
							</div>
						</div>
					</div>

					
				</form>
		</div>


	<div class="row">
		<div class="col-md-8 col-md-offset-2"> 		
			<br>
				<form class="form-horizontal" >
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-3 control-label">Kode</label>
							<div class="col-sm-9">
								<div class="input-group">
									<input type="text" class="form-control" id="kode"  placeholder="Kode Produk">
									<span class="input-group-btn">
									  <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal">Browse</button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Nama Produk</label>

							<div class="col-sm-9">
								<input type="text" id="nama" class="form-control" placeholder="Nama Produk">
							</div>
						</div>
                        <div class="form-group">
							<label class="col-sm-3 control-label">Harga</label>

							<div class="col-sm-9">
								<input type="text" id="harga" class="form-control" placeholder="Harga">
							</div>
						</div>
					</div>
					
				</form>
		</div>
	</div>
		
</div>
</html>

<!-- awal modal -->
<div id="modal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form role="form" id="form-tambah" method="post" action="input.php">
				<div class="modal-header">
					<center>
					<h3 class="modal-title">Pilih Produk</h3>
					</center>
				</div>
					<div class="modal-body">		
						
							<table width="100%" class="table table-hover"  id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $produk=mysqli_query($koneksi,"select *from produk");
                               $no=1;
                                while($data=mysqli_fetch_array($produk))
                                {?>

                               
                                    <tr id="produk" data-kode="<?php echo $data['kode_produk'] ?>" data-nama="<?php echo $data['nama_produk']?>" data-harga="<?php echo $data['harga'] ?>" >
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['kode_produk'] ?></td>
                                        <td><?php echo $data['nama_produk'] ?></td>
                                        <td> <?php echo $data['harga'] ?></td>
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

    <script>
    $(document).ready(function(){
        $('#example').DataTable();

        $(document).on('click','#produk',function(e){
            document.getElementById("kode").value = $(this).attr('data-kode');
            document.getElementById("nama").value = $(this).attr('data-nama');
            document.getElementById("harga").value = $(this).attr('data-harga');
            $('#modal').modal('hide');
        })
    })
    </script>