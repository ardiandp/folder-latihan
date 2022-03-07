<?php
$koneksi=mysqli_connect("localhost","root","","test");
?>

<html>
    <title>AMbihl data dari tabel</title>
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
	<div class="row">
		<div class="col-md-8 col-md-offset-2"> 		
			<br>
				<form class="form-horizontal" >
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-3 control-label">No Rekening</label>
							<div class="col-sm-9">
								<div class="input-group">
									<input type="text" class="form-control" id="kode"  placeholder="No Rekening">
									<span class="input-group-btn">
									  <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal">Browse</button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Nama</label>

							<div class="col-sm-9">
								<input type="text" id="nama" class="form-control" placeholder="Nama Pemilik">
							</div>
						</div>
                        <div class="form-group">
							<label class="col-sm-3 control-label">Nama Alias</label>

							<div class="col-sm-9">
								<input type="text" id="alias" class="form-control" placeholder="Nama alias">
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
					<h3 class="modal-title">Pilih Rekening</h3>
					</center>
				</div>
					<div class="modal-body">		
						
							<table width="100%" class="table table-hover"  id="example">
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

    <script>
    $(document).ready(function(){
        $('#example').DataTable();

        $(document).on('click','#produk',function(e){
            document.getElementById("kode").value = $(this).attr('data-kode');
            document.getElementById("nama").value = $(this).attr('data-nama');
            document.getElementById("alias").value = $(this).attr('data-alias');
            $('#modal').modal('hide');
        })
    })
    </script>