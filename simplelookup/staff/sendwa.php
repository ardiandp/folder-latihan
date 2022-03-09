<?php
$wa = mysqli_query($koneksi,"SELECT * FROM gform_pascalahiran WHERE idgform='$_GET[idgform]' ");
$row_wa = mysqli_fetch_assoc($wa);
$totalRows_wa = mysqli_num_rows($wa);

mysqli_free_result($wa);
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Legacy User Menu</h1>
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
    
    
<center>*PENDAFTARAN PERAWATAB PASCA MELAHIRKAN*
      <p>*nama* <?php echo $row_wa['nama']; ?> <br>
*No_hp:*  https://wa.me/<?php echo $row_wa['no_hp']; ?><br>
*Alamat:* <?php echo $row_wa['alamat']; ?><br>
*Rencana lahiran:*	<?php echo $row_wa['rencana lahiran']; ?> <br />
*HPL:* <?php echo $row_wa['hpl']; ?> <br>
*berat_badan:*  <?php echo $row_wa['berat_badan']; ?><br>
*anak_ke:* <?php echo $row_wa['anak_ke']; ?> <br>
*proses_lahiran:*  <?php echo $row_wa['proses_lahiran']; ?><br>
*rencana_asi:*  <?php echo $row_wa['rencana_asi']; ?><br>
*implan:* <?php echo $row_wa['implan']; ?> <br>
*perawatan:* <?php echo $row_wa['perawatan']; ?> <br>	
*slimming:*  <?php echo $row_wa['slimming']; ?><br>	
*riwayat_penyakit:* <?php echo $row_wa['riwayat_penyakit']; ?><br>	 </center>


</p>
      <p><br>
      </p>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->