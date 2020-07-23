<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Dashboard</li>
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if($halaman == "index") echo "active"; ?>">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Dashboard</p>
            </a>
          </li>
         

          <?php

if($level == 'Admin'){
echo "<li class='nav-item has-treeview'>
  <a href='#' class='nav-link'>
    <i class='nav-icon fas fa-table'></i>
    <p>
      Data Master
      <i class='fas fa-angle-left right'></i>
    </p>
  </a>
  <ul class='av nav-treeview'>
    <li class='nav-item'>
      <a href='kelas.php' class='nav-link"; if($halaman == "kelas") echo " active"; echo "'>
        <i class='far fa-circle nav-icon'></i>
        <p>Data Kelas</p>
      </a>
    </li>
    <li class='nav-item'>
      <a href='guru.php' class='nav-link"; if($halaman == "guru") echo " active"; echo "'>
        <i class='far fa-circle nav-icon'></i>
        <p>Data Guru</p>
      </a>
    </li>
    <li class='nav-item'>
      <a href='addsis.php' class='nav-link"; if($halaman == "siswa") echo " active"; echo "'>
        <i class='far fa-circle nav-icon'></i>
        <p>Data Siswa</p>
      </a>
    </li>
   
     <li class='nav-item'>
      <a href='admin.php' class='nav-link"; if($halaman == "admin") echo " active"; echo "'>
        <i class='far fa-circle nav-icon'></i>
        <p>Data Admin</p>
      </a>
    </li>
  
    
  </ul>
</li>
<li class='nav-item has-treeview'>
<a href='#' class='nav-link'>
  <i class='nav-icon fas fa-table'></i>
  <p>
    Data Laporan
    <i class='fas fa-angle-left right'></i>
  </p>
</a>
<ul class='av nav-treeview'>
  <li class='nav-item'>
    <a href='lap.php' class='nav-link"; if($halaman == "datalaporan") echo " active"; echo "'>
      <i class='far fa-circle nav-icon'></i>
      <p>Data Laporan Konseling</p>
    </a>
  </li>
  <li class='nav-item'>
    <a href='laporan.php' class='nav-link"; if($halaman == "cetaklaporan") echo " active"; echo "'>
      <i class='far fa-circle nav-icon'></i>
      <p>Cetak Laporan Konseling</p>
    </a>
  </li>
  
</ul>
</li>";
} else { 

  echo "<li class='nav-item has-treeview'>
  <a href='#' class='nav-link'>
    <i class='nav-icon fas fa-table'></i>
    <p>
      Data Master
      <i class='fas fa-angle-left right'></i>
    </p>
  </a>
  <ul class='nav nav-treeview'>
   
    ";
   if($level == 'Guru'){
      echo "<li class='nav-item'>
      <a href='chatgr.php' class='nav-link"; if($halaman == "chatgr") echo " active"; echo "'>
        <i class='far fa-circle nav-icon'></i>
        <p>Konseling</p>
      </a>
    </li>
    <li class='nav-item'>
    <a href='history.php' class='nav-link"; if($halaman == "history") echo " active"; echo "'>
      <i class='far fa-circle nav-icon'></i>
      <p>History Konseling</p>
    </a>
  </li>";
    } else{ 
      echo "<li class='nav-item'>
      <a href='add_chat.php?nip=$nipchat[nip]' class='nav-link"; if($halaman == "add_chat") echo " active"; echo "'>
        <i class='far fa-circle nav-icon'></i>
        <p>Bimbingan Konseling</p>
      </a>
    </li>
    <li class='nav-item'>
      <a href='history.php' class='nav-link"; if($halaman == "history") echo " active"; echo "'>
        <i class='far fa-circle nav-icon'></i>
        <p>History Konseling</p>
      </a>
    </li>";
  }
    
  echo "</ul>
</li>"; 
}
if($level == 'Guru'){
echo "<li class='nav-item has-treeview'>
<a href='#' class='nav-link'>
  <i class='nav-icon fas fa-table'></i>
  <p>
    Data Laporan
    <i class='fas fa-angle-left right'></i>
  </p>
</a>
<ul class='av nav-treeview'>
  <li class='nav-item'>
    <a href='lap.php' class='nav-link"; if($halaman == "datalaporan") echo " active"; echo "'>
      <i class='far fa-circle nav-icon'></i>
      <p>Data Laporan Konseling</p>
    </a>
  </li>
  <li class='nav-item'>
    <a href='laporan.php' class='nav-link"; if($halaman == "cetaklaporan") echo " active"; echo "'>
      <i class='far fa-circle nav-icon'></i>
      <p>Cetak Laporan Konseling</p>
    </a>
  </li>
  
</ul>
</li>
";
} ?>

          <li class="nav-header">Logout</li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Logout</p>
            </a>
          </li>


        </ul>
      </nav>