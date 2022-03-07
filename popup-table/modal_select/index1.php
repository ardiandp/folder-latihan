<!DOCTYPE html>
<html>
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
<body>


<div class="container" style="margin-top:8%">
	<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<p>
				<center>
					<h2>Modal Select Option DataTables</h2>
					Oleh : <a href="https://www.facebook.com.pendeta.mokong" target="_blank">Rully Studio</a>
				</center>
			</p>
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
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary pull-right">Simpan</button>
					</div>
				</form>
		</div>
	</div>
	
	<p style="margin-top:5%;">
	<center>Copyright @ 2018 by : <a href="https://www.facebook.com.pendeta.mokong" target="_blank">Rully Studio</a> All rights reserved.</center>
	</p>
</div>
	<script type="text/javascript" src="style/jquery.js"></script>
	<script type="text/javascript" src="style/bootstrap.js"></script>	
		<script src="style/jquery.dataTables.min.js"></script>	
		<script src="style/dataTables.bootstrap4.min.js"></script>	
</body>
</html>



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
                                        <th>Merk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="produk" data-kode="KPH-5514" data-nama="Cover Lampu Depan" >
                                        <td>1</td>
                                        <td>KPH-5514</td>
                                        <td>Cover Lampu Depan</td>
                                        <td class="center">55.000</td>
                                        <td class="center">Denshin</td>
                                    </tr>
                                    <tr id="produk" data-kode="KPH-5515" data-nama="Cover Lampu Belakang">
                                        <td>2</td>
                                        <td>KPH-5515</td>
                                        <td>Cover Lampu Belakang</td>
                                        <td class="center">50.000</td>
                                        <td class="center">Federal</td>
                                    </tr>
                                    <tr id="produk" data-kode="KPH-5516" data-nama="Cover Body">
                                        <td>3</td>
                                        <td>KPH-5516</td>
                                        <td>Cover Body</td>
                                        <td class="center">85.000</td>
                                        <td class="center">Strong</td>
                                    </tr>
                                    <tr id="produk" data-kode="KPH-5517" data-nama="Piston Set">
                                        <td>3</td>
                                        <td>KPH-5517</td>
                                        <td>Piston Set</td>
                                        <td class="center">155.000</td>
                                        <td class="center">AHM</td>
                                    </tr>
                                </tbody>
                            </table>
						
						
					</div>	
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					</div>
			</div>
		</div>
	</div>
	
	
	
<script type="text/javascript">
$(document).ready(function(){
	$('#example').DataTable();
	
	$(document).on('click', '#produk', function (e) {
		document.getElementById("kode").value = $(this).attr('data-kode');
		document.getElementById("nama").value = $(this).attr('data-nama');
		$('#modal').modal('hide');
	});	
	
});
</script>
        
	