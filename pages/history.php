<?php 
$halaman = "history";

error_reporting(0);
session_start();
if(empty($_SESSION['level'])){
    header('location: ../index.php');
    exit(); 
}
include '../config.php';
include 'header.php'; 
$idkls = $_SESSION['idkls'];
$nisnses = $_SESSION['nisn'];
$level = $_SESSION['level'];
$nipses = $_SESSION['nip'];

// $sql = mysqli_query($connect, "SELECT * FROM profil WHERE id_sekolah='1'");
// $data = mysqli_fetch_array($sql);
// echo $data['nama'];
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>History Konseling</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">History Konseling</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">History Bimbingan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Isi Chat</th>
                  <th>Pengirim</th>
                  <th>Tanggal</th>
                 
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $no =1;
                  if($level == "Siswa"){
                  $query = mysqli_query($connect, "SELECT * FROM chat a, tb_guru b, tb_siswa c where a.nisn=$nisnses and a.nip=b.nip and a.nisn=c.nisn and a.status = 2 order by a.id_chat desc");
                  }else if($level == "Guru"){
                    $query = mysqli_query($connect, "SELECT * FROM chat a, tb_guru b, tb_siswa c where a.nip=$nipses and a.nip=b.nip and a.nisn=c.nisn and a.status = 2 order by a.id_chat desc");
                  }
                  while ($data = mysqli_fetch_array($query)) {
                  ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <?php
                  if($level == "Siswa"){?>
                  <td><?php echo $data['nm_guru'];?></td>
                  <?php } else if($level == "Guru"){ ?>
                  <td><?php echo $data['nm_siswa'];?></td>
                  <?php } ?>
                  <td><?php echo $data['chat'];?></td>
                  <td><?php echo $data['stat_chat'] == 1 ? 'Siswa' : 'Guru';?></td>
                  <td><?php echo $data['tgl'];?></td>
                  
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
    $("#example12").DataTable();
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