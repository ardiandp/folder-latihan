  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?page=home" class="brand-link">
      <img src="../storage/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../storage/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nama_lengkap'] ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
         
		 
		    <!-- awal menu -->
<?php
$main=mysqli_query($koneksi,"SELECT `level`.`level`,admin.nama_lengkap,admin.username,akses.id_level,akses.menu,menu.`name`,menu.id,menu.icon from `level`,admin,akses,menu WHERE admin.`id_level`=`level`.id_level AND admin.`id_level`=akses.id_level AND akses.menu=menu.id AND menu.is_parent='0' and menu.is_active='Y' and  admin.username='$_SESSION[MM_Username]' ");
while($r=mysqli_fetch_array($main))
{?>
                
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="<?php echo $r['icon']?>"></i>
              <p>
               <?php echo" $r[name] ";?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>


			   <ul class="nav nav-treeview">
			   <?php
$sub=mysqli_query($koneksi,"SELECT `level`.`level`,admin.nama_lengkap,admin.username,akses.id_level,akses.menu,menu.`name`,menu.link,menu.icon from `level`,admin,akses,menu WHERE admin.`id_level`=`level`.id_level AND admin.`id_level`=akses.id_level AND akses.menu=menu.id AND menu.is_parent='$r[id]' AND menu.is_active='Y' and admin.username='$_SESSION[MM_Username]'");
while($w=mysqli_fetch_array($sub))
                   {?>
              <li class="nav-item">
                <a href="<?php echo $w['link']?>" class="nav-link">
                  <i class="<?php echo $w['icon']?>"></i>
                  <p><?php echo" $w[name] ";?></p>
                </a>
              </li>
             
            <?php } ?>
            </ul>   <?php } ?>
          </li>
<!--akhir menu-->
         
         
         
         
         
     
     
        
        
  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
