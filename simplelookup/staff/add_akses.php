<?php
//include ('Connections/menu.php');
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

    	
<form method="post" action="">
<table width="364" border=1>
<tr><td width="107">LEVEL</td><td width="241">
<select name="level">
<?php
$akses=mysqli_query($koneksi,"select *from level where id_level='$_GET[id]' ");
while($a=mysqli_fetch_array($akses))
{
	echo "<option value=$a[id_level]>$a[level] </option>";
} ?>
</select>
</td></tr>
<tr><td>Menu </td>
<td>
<?php
$parent=mysqli_query($koneksi,"select *from menu where is_parent='0' ");
while($p=mysqli_fetch_array($parent))
{
	?>
    <b><input type="checkbox" name="menu[]" value="<?php echo $p['id'] ?>"   /><?php echo $p['name'] ?>	</b><br />
    
    <?php
$sub=mysqli_query($koneksi,"select *from menu where is_parent='$p[id]' ");
while($s=mysqli_fetch_array($sub))
{
	?>
   <input type="checkbox" name="menu[]" value="<?php echo $s['id'] ?>"   /><?php echo $s['name'] ?> <br />
    
    <?php } 
 } ?>

--


</td></tr>
<tr><td colspan="2"><input type="submit" value="Simpan" name="simpan"></td></tr>
</table>
</form>


<?php
if(isset($_POST['simpan']))
{
	$level=$_POST['level'];
	$menu=$_POST['menu'];
	$jml=count($menu);

	echo "$level <br>";
	echo "$jml";

	for($a=0;$a<$jml;$a++)
	{
      $simpan=mysqli_query($koneksi,"insert into akses (id_level,menu) values ('$level','$menu[$a]') ") ;
      if($simpan)
      {
        echo "<script>alert('akses berhasil ditambahkan');document.location='?page=akses' </script>";
      }
      else
      {
        echo "<script>alert('akses Gagal ditambahkan');document.location='?page=akses' </script>";
      }
      
	}

}