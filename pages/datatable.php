<?php 
error_reporting(0);
session_start();
if(empty($_SESSION['level'])){
    header('location: ../index.php');
    exit(); 
}
include '../config.php';
include 'header.php'; 
$nip = $_SESSION['nip'];
$idkls = $_SESSION['idkls'];

// $id = $_GET['id_sekolah'];
// $sql = mysqli_query($connect, "SELECT * FROM profil WHERE id_sekolah='1'");
// $data = mysqli_fetch_array($sql);
// echo $data['nama'];  
?>

 <!-- DataTables -->
 <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Laporan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Laporan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
       

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NISN Siswa</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Topik</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                 
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $no =1;
                  $query = mysqli_query($connect, "SELECT * FROM laporan a, tb_siswa b, tb_kelas c, tb_guru d where a.nisn = b.nisn and a.nip=d.nip and c.id_kls=b.id_kls and a.nip=$nip ORDER BY a.nip DESC");
                  while ($data = mysqli_fetch_array($query)) {
                  ?>
                <tr>
                  <td><?php echo $no++;?></td>
                 
                   <td><?php echo $data['nisn'];?></td>
                  <td><?php echo $data['nm_siswa'];?></td>
                  <td><?php echo $data['nm_kls'];?></td>
                  <td><?php echo $data['topik'];?></td>
                  <td><?php echo $data['tgl_lap'];?></td>
                  <td><center>
                                <a class='fa fa-fw fa-eye' title='Detail' href='detail_lap.php?id_lap=<?php echo $data['id_lap'];?>'></a>
                                <a class='fa fa-fw fa-eraser' title='Hapus' href='delete_lap.php?id_lap="<?php echo $data['id_lap'];?>"' onclick="javascript: return confirm('Anda yakin hapus ?')"></a>
                              </center></td>
                </tr>
                  <?php } ?>
               </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.1
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
  <?php

if(isset($_POST['insert'])){
  
    $hari = $_POST['hari'];
    $tgl_lap = $_POST['tgl_lap'];
    $nipe = $_POST['nipe'];
    $nisn = $_POST['nisn'];
    $topik = $_POST['topik'];
    $uraian = $_POST['uraian'];
    $alternatif_mslh = $_POST['alternatif_mslh'];
    $tindak_lanjut = $_POST['tindak_lanjut'];
   
    
    $sql = "INSERT INTO laporan (id_lap, nisn, nip, topik, uraian, alternatif_mslh, tindak_lanjut) VALUES ('','$nisn','$nipe','$topik','$uraian','$alternatif_mslh','$tindak_lanjut')";
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.location='lap.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

}?>