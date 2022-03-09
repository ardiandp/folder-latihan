<?php

if (isset($_POST['simpan'])) {


$atas_nama=$_POST['atas_nama'];
$alias=$_POST['alias'];
$norek=$_POST['norek'];
$bank=$_POST['bank'];
$created_at=$_POST['created_at'];

$simpan=mysqli_query($koneski,"insert into no_rekening (atas_nama, `alias`, norek, bank, created_at) VALUES
                  ('atas_nama','$alias','$norek','$bank','$created_at')");
  //mysql_select_db($database_local, $local);
  //$Result1 = mysql_query($insertSQL, $local) or die(mysql_error());
  echo "<script>alert('Data Tersimpan');document.location='?page=norekening' </script>";
}

//mysql_select_db($database_local, $local);
//$query_bank = "SELECT * FROM kd_bank";
$bank = mysqli_query($koneksi,"SELECT * FROM kd_bank");
$row_bank = mysqli_fetch_assoc($bank);
$totalRows_bank = mysqli_num_rows($bank);
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

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Idrek:</td>
      <td><input type="text" name="idrek" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Atas_nama:</td>
      <td><input type="text" name="atas_nama" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Alias:</td>
      <td><input type="text" name="alias" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Norek:</td>
      <td><input type="text" name="norek" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Bank:</td>
      <td><select name="bank">
        <?php 
do {  
?>
        <option value="<?php echo $row_bank['kode']?>" ><?php echo $row_bank['nama_bank']?></option>
        <?php
} while ($row_bank = mysqli_fetch_assoc($bank));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Created_at:</td>
      <td><input type="text" name="created_at" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($bank);
?>
