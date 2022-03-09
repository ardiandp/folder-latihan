<html>
    <title>AMbihl data dari tabel</title>
    <head>

  <script type="text/javascript" src="jquery.js"></script> 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


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

	</section></div>
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