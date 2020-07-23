<?php 
error_reporting(0);
session_start();
if(empty($_SESSION['level'])){
    header('location: ../index.php');
    exit(); 
}
include '../config.php';
         
$username = $_SESSION['username'];
$nipses = $_SESSION['nip'];
$nisnses = $_SESSION['nisn'];
$level = $_SESSION['level'];
$nm_users = $_SESSION['nm_users'];
$nm_siswa = $_SESSION['nm_siswa'];
$nm_guru = $_SESSION['nm_guru'];
$idklse = $_SESSION['idkls'];

$datanip = mysqli_query($connect, "SELECT c.nip from tb_siswa a, tb_kelas b, tb_guru c where a.nisn=$nisnses and a.id_kls=b.id_kls and b.nip=c.nip limit 1");
$nipchat = mysqli_fetch_array($datanip); 

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Website Konseling</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     

     <?php
     if($level == "Guru"){
      $notif = mysqli_query($connect, "SELECT count(*) as jml FROM chat where nip=$nipses and stat_chat=1 and status=0");
      $datlap = mysqli_fetch_array($notif); ?>
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="" onclick="window.location.href='updatestatus.php?nip=<?php echo $nipses ?>'" >
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $datlap['jml'];?></span>
        </a>
       
      </li>
     <?php }else if($level == "Siswa"){

      $notif = mysqli_query($connect, "SELECT count(*) as jml FROM chat where nisn=$nisnses and stat_chat=2 and status=0");
      $datlap = mysqli_fetch_array($notif); ?>
      <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="" onclick="window.location.href='updatestatsis.php?nisn=<?php echo $nisnses ?>&nip=<?php echo $nipchat['nip']; ?>'" >
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $datlap['jml'];?></span>
        </a>
      
      </li>
    <?php }
     ?>

     
      <!-- Notifications Dropdown Menu -->
   
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
       <img src="https://i0.wp.com/udfauzi.com/wp-content/uploads/2018/02/Lambang-tut-wuri-handayani.jpg?zoom=2.625&resize=349%2C356&ssl=1" class="brand-image img-circle elevation-3"
           style="opacity: .8">
    
      <span class="brand-text font-weight-light">Web Konseling</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <?php if($level == "Admin"){ ?>
                <a href="#" class="d-block"><?php echo $nm_users; ?></a>
                <?php }elseif($level == "Guru"){ ?>
                  <a href="#" class="d-block"><?php echo $nm_guru; ?></a>
                <?php }else{ ?>
                  <a href="#" class="d-block"><?php echo $nm_siswa; ?></a>

                <?php } ?>
         
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php include "navigasi.php"; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>